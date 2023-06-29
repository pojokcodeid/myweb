<?php

namespace App\Controllers;

use App\Models\GroupKategoriModel;
use App\Models\KategoriModel;

class Home extends BaseController
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
		return view('home', $data);
	}

	public function about()
	{
		$groupKategoriModel = new GroupKategoriModel();
		$kategoriModel = new KategoriModel();
		$data = [
			'title' => 'Tutorial',
			'groupKategori' => $groupKategoriModel->findAll(),
			'allKategori' => $kategoriModel->where('is_root', 1)->findAll()
		];
		return view('about', $data);
	}
}