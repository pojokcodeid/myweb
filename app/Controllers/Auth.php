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
      'active' => 1
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
    return view('auth/login', $data);
  }
}