<?php
namespace App\Controllers;

use App\Models\GroupKategoriModel;
use App\Models\KategoriModel;

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