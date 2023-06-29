<?php

namespace App\Controllers;

use App\Models\GroupKategoriModel;
use App\Models\KategoriModel;
use App\Models\TutorialModel;

class Tutorial extends BaseController
{
	private $groupKategoriModel;
	private $kategoriModel;
	private $tutorialModel;
	public function __construct()
	{
		$this->groupKategoriModel = new GroupKategoriModel();
		$this->kategoriModel = new KategoriModel();
		$this->tutorialModel = new TutorialModel();
	}
	public function index()
	{

		$data = [
			'title' => 'Tutorial',
			'groupKategori' => $this->groupKategoriModel->findAll(),
			'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll()
		];
		return view('tutorial/index', $data);
	}
	public function view($slug)
	{
		$categori = $this->kategoriModel->where('slug', $slug)->first();
		$categoriItem = [];
		$itemselected = $categori;
		if ($categori['is_root'] == 1) {
			$categoriItem = $this->kategoriModel->where('parent', $categori['id'])->findAll();
			$itemselected = $this->kategoriModel->where('parent', $categori['id'])->first();
		} else {
			$categori = $this->kategoriModel->where('id', $categori['parent'])->first();
			$categoriItem = $this->kategoriModel->where('parent', $categori['id'])->findAll();
		}
		$content = $this->tutorialModel->where('kategoriid', $itemselected['id'])->first();

		$data = [
			'title' => 'Tutorial',
			'groupKategori' => $this->groupKategoriModel->findAll(),
			'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll(),
			'kategori' => $categori,
			'categoriItem' => $categoriItem,
			'itemselected' => $itemselected,
			'content' => $content
		];
		return view('tutorial/index', $data);
	}


}