<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kostan;

class KostanController extends BaseController
{
    protected $KostanModel;

    public function __construct()
    {
        $this->KostanModel = new Kostan();
    }

    public function index()
    {
        $currentPage = $this->request->getVar("page_isitabel")
            ? $this->request->getVar("page_isitabel")
            : 1;
        $keyword = $this->request->getVar("keyword");
        $jumlah = $this->request->getVar("jumlah");
        if ($keyword) {
            $search = $this->KostanModel->search($keyword, $jumlah);
        } else {
            $search = $this->KostanModel;
        }
        $data = [
            "title" => "Database Kostan | PBD",
            "isitabel" => $search->paginate(4, "isitabel"),
            "pager" => $this->KostanModel->pager,
            "currentPage" => $currentPage,
        ];
        //dd($data);
        return view("kostan/index", $data);
    }

    public function save()
    {
        if (
            !$this->validate([
                "nama" => "required",
                "alamat" => "required",
                'banyak_kamar' => 'required|numeric',
                'sisa_kamar' => 'required|numeric',
                'harga' => 'required|numeric',
            ])
        ) {
            $validation = \Config\Services::validation();
            session()->setFlashdata("failed", $validation->getErrors());
            return redirect()->to("/");
        }
        $fiturstring = implode(",", $this->request->getVar("fitur[]"));
        $this->KostanModel->save([
            "nama" => $this->request->getVar("nama"),
            'alamat' => $this->request->getVar("alamat"),
            'banyak_kamar' => $this->request->getVar("banyak_kamar"),
            'sisa_kamar' => $this->request->getVar("sisa_kamar"),
            'harga' => $this->request->getVar("harga"),
            "fitur" => $fiturstring,
        ]);
        session()->setFlashdata("success", "Data berhasil ditambahkan!");
        return redirect()->to("/");
    }

    public function delete($id)
    {
        $this->KostanModel->where("id", $id)->delete($id);
        session()->setFlashdata("success", "Data berhasil dihapus!");
        return redirect()->to("/");
    }

    public function edit($id)
    {
        $currentPage = $this->request->getVar("page_isitabel")
            ? $this->request->getVar("page_isitabel")
            : 1;
        $keyword = $this->request->getVar("keyword");
        $jumlah = $this->request->getVar("jumlah");
        if ($keyword) {
            $search = $this->KostanModel->search($keyword, $jumlah);
        } else {
            $search = $this->KostanModel;
        }
        $data = [
            "title" => "Database Kostan | PBD",
            "isitabel" => $search->paginate(4, "isitabel"),
            "pager" => $this->KostanModel->pager,
            "currentPage" => $currentPage,
            "tabel" => $this->KostanModel->find($id),
        ];
        //dd($data);
        return view("kostan/edit", $data);
    }

    public function update($id)
    {
        if (
            !$this->validate([
                "nama" => "required",
                "alamat" => "required",
                'banyak_kamar' => 'required|numeric',
                'sisa_kamar' => 'required|numeric',
                'harga' => 'required|numeric',
            ])
        ) {
            $validation = \Config\Services::validation();
            session()->setFlashdata("failed", $validation->getErrors());
            return redirect()->to("/");
        }
        $fiturstring = implode(",", $this->request->getVar("fitur[]"));
        $this->KostanModel->save([
            'id' => $id,
            "nama" => $this->request->getVar("nama"),
            'alamat' => $this->request->getVar("alamat"),
            'banyak_kamar' => $this->request->getVar("banyak_kamar"),
            'sisa_kamar' => $this->request->getVar("sisa_kamar"),
            'harga' => $this->request->getVar("harga"),
            "fitur" => $fiturstring,
        ]);
        session()->setFlashdata("success", "Data berhasil diubah!");
        return redirect()->to("/");
    }

}
