<?php

namespace App\Controllers;

use App\Models\GroupKategoriModel;
use App\Models\KategoriModel;
use App\Models\TutorialModel;
use App\Models\CommentModel;

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
		// get list commnet top 5
		$list = $this->tutorialModel->getCommentLimit($content['id'], 5);
		$hasil = [];
		foreach ($list as $item) {
			array_push($hasil, [
				'user_id' => $item['user_id'],
				'nama' => $item['nama'],
				'image' => $item['image'],
				'comment' => $item['comment'],
				'created_at' => $item['created_at'],
				'comment_id' => $item['comment_id'],
				'parent' => $this->tutorialModel->getParent($item['comment_id'])
			]);
		}
		$data = [
			'title' => 'Tutorial',
			'groupKategori' => $this->groupKategoriModel->findAll(),
			'allKategori' => $this->kategoriModel->where('is_root', 1)->findAll(),
			'kategori' => $categori,
			'categoriItem' => $categoriItem,
			'itemselected' => $itemselected,
			'content' => $content,
			'slug' => $slug,
			'comment' => $hasil
		];
		return view('tutorial/index', $data);
	}

	public function comment($slug, $id)
	{
		// pastikan user login
		if (!session('user_id')) {
			return redirect()->to(base_url('login'));
		}
		// lakukan validasi
		$validationRule = [
			'txtComment' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Komentar harus diisi'
				]
			]
		];
		// redirect error
		if (!$this->validate($validationRule)) {
			session()->setFlashdata('errors', $this->validator->getErrors());
			return redirect()->to(base_url('tutorial/' . $slug));
		}
		$comment = $this->request->getVar('txtComment');
		$data = [
			'user_id' => session('user_id'),
			'tutorial_id' => $id,
			'comment' => $comment,
			'created_at' => date('Y-m-d H:i:s'),
		];
		$commentModel = new CommentModel();
		$process = $commentModel->save($data);
		if ($process) {
			return redirect()->to(base_url('tutorial/' . $slug));
		} else {
			$error = [
				'errors' => 'Gagal menyimpan data'
			];
			session()->setFlashdata('errors', $error);
			return redirect()->to(base_url('tutorial/' . $slug));
		}
	}
	public function comment2($slug, $id)
	{
		// pastikan user login
		if (!session('user_id')) {
			return redirect()->to(base_url('login'));
		}
		// lakukan validasi
		$validationRule = [
			'txtComment' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Komentar harus diisi'
				]
			]
		];
		// redirect error
		if (!$this->validate($validationRule)) {
			session()->setFlashdata('errors', $this->validator->getErrors());
			return redirect()->to(base_url('tutorial/' . $slug));
		}
		$comment = $this->request->getVar('txtComment');
		$data = [
			'user_id' => session('user_id'),
			'tutorial_id' => $id,
			'comment' => $comment,
			'created_at' => date('Y-m-d H:i:s'),
		];
		$commentModel = new CommentModel();
		$process = $commentModel->save($data);
		if ($process) {
			// ambil data komen
			$last_insert_id = $commentModel->getInsertID();
			$tutorialModel = new TutorialModel();
			$hasil = $tutorialModel->getCommentById($last_insert_id, 5);
			$data = [
				'item' => $hasil,
				'slug' => $slug,
			];
			return view('tutorial/newcomment', $data);
		} else {
			// jika error
			echo 'Gagal menyimpan data';
		}
	}

	public function commentUpdate($slug)
	{
		// pastikan user login
		if (!session('user_id')) {
			return redirect()->to(base_url('login'));
		}
		// validation
		$validationRule = [
			'txtComment' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Komentar harus diisi'
				]
			]
		];
		// redirect error
		if (!$this->validate($validationRule)) {
			session()->setFlashdata('errors', $this->validator->getErrors());
			return redirect()->to(base_url('tutorial/' . $slug));
		}
		// process update
		$comment = $this->request->getVar('txtComment');
		$data = [
			'comment' => $comment
		];
		$key = [
			'comment_id' => $this->request->getVar('comid'),
			'user_id' => session('user_id'),
		];
		$commentModel = new CommentModel();
		$process = $commentModel->update($key, $data);
		if ($process) {
			// return redirect()->to(base_url('tutorial/' . $slug));
			echo $comment;
		} else {
			$error = [
				'errors' => 'Gagal menyimpan data'
			];
			session()->setFlashdata('errors', $error);
			return redirect()->to(base_url('tutorial/' . $slug));
		}
	}

	public function commentDelete($slug, $id)
	{
		// pastikan user login
		if (!session('user_id')) {
			return redirect()->to(base_url('login'));
		}
		// process delete
		$commentModel = new CommentModel();
		$process = $commentModel->deleteComment($id, session('user_id'));
		if ($process) {
			echo $id;
			// return redirect()->to(base_url('tutorial/' . $slug));
		}
	}

	public function nestedComment($slug, $id)
	{
		// pastikan user login
		if (!session('user_id')) {
			return redirect()->to(base_url('login'));
		}
		// validasi input
		$validationRule = [
			'txtComment' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Komentar harus diisi'
				]
			]
		];
		// redirect error
		if (!$this->validate($validationRule)) {
			session()->setFlashdata('errors', $this->validator->getErrors());
			return redirect()->to(base_url('tutorial/' . $slug));
		}
		// process
		$comment = $this->request->getVar('txtComment');
		$data = [
			'user_id' => session('user_id'),
			'tutorial_id' => $id,
			'comment' => $comment,
			'created_at' => date('Y-m-d H:i:s'),
			'parent_id' => $this->request->getVar('comid')
		];
		$commentModel = new CommentModel();
		$process = $commentModel->save($data);
		if ($process) {
			return redirect()->to(base_url('tutorial/' . $slug));
		} else {
			$error = [
				'errors' => 'Gagal menyimpan data'
			];
			session()->setFlashdata('errors', $error);
			return redirect()->to(base_url('tutorial/' . $slug));
		}
	}
}