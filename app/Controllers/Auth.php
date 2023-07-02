<?php
namespace App\Controllers;

use App\Models\GroupKategoriModel;
use App\Models\KategoriModel;
use App\Models\UserModel;

class Auth extends BaseController
{
  private $groupKategoriModel;
  private $kategoriModel;

  public function __construct()
  {
    $this->groupKategoriModel = new GroupKategoriModel();
    $this->kategoriModel = new KategoriModel();
  }

  public function register()
  {
    $data = [
      'title' => 'Register',
      'groupKategori' => $this->groupKategoriModel->findAll(),
      'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll(),
    ];
    // cek jika sudah login
    if (session('user_id')) {
      return redirect()->to(base_url('/'));
    }
    return view('auth/register', $data);
  }

  public function insert()
  {
    // validasi data
    if (
      !$this->validate([
        'email' => [
          'rules' => 'required|valid_email|is_unique[user.email]',
          'errors' => [
            'required' => 'Email harus diisi',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email sudah digunakan'
          ]
        ]
      ])
    ) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->to(base_url('register'));
    }
    $data = [
      'nama' => $this->request->getVar('nama'),
      'email' => $this->request->getVar('email'),
      'password' => password_hash($this->request->getVar('password1'), PASSWORD_BCRYPT),
      'is_admin' => 0,
      'created_at' => date('Y-m-d H:i:s'),
      'activated_at' => date('Y-m-d H:i:s'),
      'active' => 1,
      'image' => 'img_avatar1.png'
    ];
    $user = new UserModel();
    $hasil = $user->insert($data);
    if ($hasil) {
      $errmessage = [
        'success' => 'Register berhasil, silahkan login'
      ];
      session()->setFlashdata('success', $errmessage);
      return redirect()->to(base_url('login'));
    } else {
      $errmessage = [
        'errors' => 'Register gagal, silahkan hubungi administrator'
      ];
      session()->setFlashdata('message', $errmessage);
      return redirect()->to(base_url('register'));
    }
  }

  public function login()
  {
    $data = [
      'title' => 'Login',
      'groupKategori' => $this->groupKategoriModel->findAll(),
      'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll()
    ];
    // cek jika sudah login
    if (session('user_id')) {
      return redirect()->to(base_url('/'));
    }
    return view('auth/login', $data);
  }

  public function loginAuth()
  {
    // cek email dan password
    $session = session();
    $userModel = new UserModel();
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    $value = [
      'email' => $email,
      'password' => $password
    ];
    $session->setFlashdata('data', $value);
    // validasi input
    if (
      !$this->validate([
        'email' => [
          'rules' => 'required|valid_email',
          'errors' => [
            'required' => 'Email harus diisi',
            'valid_email' => 'Email tidak valid'
          ]
        ],
        'password' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Password harus diisi'
          ]
        ]
      ])
    ) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->to(base_url('login'));
    }


    $data = $userModel->where('email', $email)->first();
    if ($data) {
      $pass = $data['password'];
      $authenticatePassword = password_verify($password, $pass);
      if ($authenticatePassword) {
        $ses_data = [
          'user_id' => $data['user_id'],
          'nama' => $data['nama'],
          'email' => $data['email'],
          'isLoggedIn' => TRUE,
          'image' => $data['image']
        ];
        $session->set($ses_data);
        return redirect()->to(base_url('/'));
      } else {
        $pesan = [
          'invalid' => 'Password tidak valid'
        ];
        $session->setFlashdata('msg', $pesan);
        return redirect()->to(base_url('login'));
      }
    } else {
      $pesan = [
        'invalid' => 'Email tidak ditemukan'
      ];
      $session->setFlashdata('msg', $pesan);
      return redirect()->to(base_url('login'));
    }
  }

  public function logout()
  {
    $session = session();
    $session->remove('user_id');
    $session->remove('nama');
    $session->remove('email');
    $session->remove('isLoggedIn');
    $session->remove('image');
    $session->destroy();
    return redirect()->to(base_url('login'));
  }

  public function profile()
  {
    $userModel = new UserModel();
    $data = [
      'title' => 'Home',
      'groupKategori' => $this->groupKategoriModel->findAll(),
      'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll(),
      'user' => $userModel->where('user_id', session('user_id'))->first()
    ];
    return view('auth/profile', $data);
  }
}