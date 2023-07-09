<?php

namespace App\Controllers;

use App\Models\GroupKategoriModel;
use App\Models\KategoriModel;
use App\Models\UserModel;

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
			'title' => 'Home',
			'groupKategori' => $this->groupKategoriModel->findAll(),
			'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll()
		];
		return view('home', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About Me',
			'groupKategori' => $this->groupKategoriModel->findAll(),
			'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll()
		];
		return view('about', $data);
	}
	public function contact()
	{
		$data = [
			'title' => 'Kontak',
			'groupKategori' => $this->groupKategoriModel->findAll(),
			'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll()
		];
		return view('contact', $data);
	}
	public function privasi()
	{
		$data = [
			'title' => 'Kebijakan Privasi',
			'groupKategori' => $this->groupKategoriModel->findAll(),
			'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll()
		];
		return view('privasi', $data);
	}
}