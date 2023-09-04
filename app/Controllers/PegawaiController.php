<?php

namespace App\Controllers;

use App\Models\Pegawai;

class PegawaiController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new Pegawai;
        $data['pegawai'] = $model->findAll();
        return view('pegawai/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        return view('pegawai/create');
        
    }

    public function store()
    {
        $model = new Pegawai;

        $rules = [
            'nama' => 'required|max_length[40]',
            'email' => 'required|max_length[40]',
            'alamat' => 'required',
            'no_telp' => 'required|max_length[13]',
            'gambar' => 'uploaded[gambar]|max_size[gambar, 300]|mime_in[gambar, image/jpg,image/jpeg]'
        ];

        if ($this->validate($rules)) {
            $file = $this->request->getFile('gambar');
        
            if ($file->isValid() && ! $file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('uploads/', $imageName);
            }
            $data = [
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telp' => $this->request->getPost('no_telp'),
                'gambar' => $imageName,
            ];
            $model->save($data);
            return redirect()->to('/pegawai')->with('status', 'Data Berhasil Disimpan!');
        }
        else{
            session()->setFlashdata('failed', 'Data Gagal Disimpan!');
            return redirect()->back()->withInput();
        }


        
    }
    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id)
    {
        $model = new Pegawai;
        $data['pegawai'] = $model->find($id);
        return view('pegawai/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id)
    {
        $model = new Pegawai;
        $prod_item = $model->find($id);

        $rules = [
            'nama' => 'required|max_length[40]',
            'email' => 'required|max_length[40]',
            'alamat' => 'required',
            'no_telp' => 'required|max_length[13]',
            'gambar' => 'max_size[gambar, 300]|mime_in[gambar, image/jpg,image/jpeg]'
        ];

        if ($this->validate($rules)) {
        $old_img_name = $prod_item['gambar'];
            
        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) 
        {

            if (file_exists("uploads/".$old_img_name)) {
                unlink("uploads/".$old_img_name);
            }

            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
        }
        else{
            $imageName = $old_img_name;
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'gambar' => $imageName,
        ];
        $model->update($id, $data);
        return redirect()->to('/pegawai')->with('status', 'Data Berhasil Diubah!');
        }
        else{
            session()->setFlashdata('failed', 'Data Gagal Diubah!');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id)
    {
        $model = new Pegawai;
        $data = $model->find($id);
        $imagefile = $data['gambar'];
        if (file_exists('uploads/'. $imagefile)) {
            unlink('uploads/'. $imagefile);
        }
        $model->delete($id);
        return redirect()->to('/pegawai')->with('status', 'Data Berhasil Dihapus!');
    }
}
