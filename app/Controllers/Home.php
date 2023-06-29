<?php

namespace App\Controllers;

use App\Models\GroupKategoriModel;
use App\Models\KategoriModel;

class Home extends BaseController
{
	private $groupKategoriModel;
	private $kategoriModel;
	public function __construct()
	{
		$this->groupKategoriModel = new GroupKategoriModel();
		$this->kategoriModel = new KategoriModel();
	}
	public function index()
	{
		$data = [
			'title' => 'Tutorial',
			'groupKategori' => $this->groupKategoriModel->findAll(),
			'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll()
		];
		return view('home', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'Tutorial',
			'groupKategori' => $this->groupKategoriModel->findAll(),
			'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll()
		];
		return view('about', $data);
	}
}