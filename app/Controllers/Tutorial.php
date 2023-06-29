<?php

namespace App\Controllers;

use App\Models\GroupKategoriModel;
use App\Models\KategoriModel;

class Tutorial extends BaseController
{
	public function index()
	{
		$groupKategoriModel = new GroupKategoriModel();
		$kategoriModel = new KategoriModel();
		$data = [
			'title' => 'Tutorial',
			'groupKategori' => $groupKategoriModel->findAll(),
			'allKategori' => $kategoriModel->where('is_root', 1)->findAll()
		];
		return view('tutorial/index', $data);
	}
}