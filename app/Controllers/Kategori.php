<?php
namespace App\Controllers;

use App\Models\GroupKategoriModel;
use App\Models\KategoriModel;
use App\Models\TutorialModel;

class Kategori extends BaseController
{

  private $groupKategoriModel;
  private $kategoriModel;

  public function __construct()
  {
    $this->groupKategoriModel = new GroupKategoriModel();
    $this->kategoriModel = new KategoriModel();
  }

  public function index($slug)
  {
    $group = $this->groupKategoriModel->where('slug', $slug)->first();
    $kategoriByGroup = $this->kategoriModel->where(['group_kategori_id' => $group['id'], 'is_root' => 1])->findAll();
    $data = [
      'title' => 'Tutorial',
      'groupKategori' => $this->groupKategoriModel->findAll(),
      'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll(),
      'group' => $group,
      'kategoriByGroup' => $kategoriByGroup
    ];
    return view('tutorial/kategori', $data);
  }

}