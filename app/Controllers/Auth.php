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
      'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll()
    ];
    return view('auth/register', $data);
  }

  public function insert(){
    // validasi data
    if(! $this->validate([
      'email'=>[
        'rules'=>'required|valid_email|is_unique[user.email]',
        'error'=>[
          'required'=>'Email harus diisi',
          'valid_email'=>'Email tidak valid',
          'is_unique'=>'Email sudah digunakan'
        ]
      ]
    ])){
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->to(base_url('register'));
    }
    $data=[
      'nama'=> $this->request->getVar('nama'),
      'email'=> $this->request->getVar('email'),
      'password'=> password_hash($this->request->getVar('password1'), PASSWORD_BCRYPT),
      'is_admin'=> 0,
      'created_at'=> date('Y-m-d H:i:s'),
      'activated_at'=> date('Y-m-d H:i:s'),
      'active'=> 1
    ];
    $user=new UserModel();
    $hasil=$user->insert($data);
    if($hasil){
      return redirect()->to(base_url('login'));
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