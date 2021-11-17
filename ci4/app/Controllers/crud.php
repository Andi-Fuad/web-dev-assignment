<?php

namespace App\Controllers;

use App\Models\crudModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

class crud extends BaseController
{
    protected $datamhsModel;
    public function __construct()
    {
        $this->datamhsModel = new \App\Models\crud_mahasiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home | CRUD Mahasiswa'
        ];
        echo view('crud/home', $data);
    }

    public function form()
    {
        $data = [
            'title' => 'Form | CRUD Mahasiswa'
        ];
        return view('crud/form', $data);
    }

    public function save()
    {
        $filefoto = $this->request->getFile('foto');
        $filefoto->move('img');
        $namafoto = $filefoto->getName();
        $this->datamhsModel->save([
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'prodi' => $this->request->getVar('prodi'),
            'foto' => $namafoto,
        ]);


        return redirect()->to(base_url('crud/datamhs'));
    }

    public function datamhs()
    {
        $datamhs = $this->datamhsModel->findAll();
        $data = [
            'title' => 'Data Mahasiswa | CRUD Mahasiswa',
            'datamhs' => $datamhs
        ];

        return view('crud/database', $data);
    }

    public function edit($id)
    {
        $data = [
            'datamhs' => $this->datamhsModel->getVar($id)
        ];

        return view('crud/edit', $data);
    }

    public function delete($id)
    {
        $this->datamhsModel->delete($id);
        return redirect()->to(base_url('crud/datamhs'));
    }
}