<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new User;
        $data['user'] = $model->findAll();
        return view('user/index', $data);
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
        return view('user/create');
    }

    public function store()
    {
        $model = new User;

        $rules = [
            'nama' => 'required|max_length[40]',
            'email' => 'required|max_length[40]',
            'alamat' => 'required',
            'no_telp' => 'required|max_length[13]',
            'tanggal_lahir' => 'required',
        ];

        if ($this->validate($rules)) {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        ];
        $model->save($data);
        return redirect('user')->with('status', 'Data Berhasil Disimpan!');
        }
        else{
            session()->setFlashdata('failed', 'Data Gagal Ditambahkan');
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
        $model = new User;
        $data['user'] = $model->find($id);
        return view('user/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id)
    {
        $model = new User;
        
        $rules = [
            'nama' => 'required|max_length[40]',
            'email' => 'required|max_length[40]',
            'alamat' => 'required',
            'no_telp' => 'required|max_length[13]',
            'tanggal_lahir' => 'required',
        ];

        if ($this->validate($rules)) {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        ];
        $model->update($id, $data);
        return redirect()->to('/user')->with('status', 'Data Berhasil Diubah!');
        }
        else{
            session()->setFlashdata('failed', 'Data Gagal Diubah');
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
        $model = new User;
        $model->delete($id);
        return redirect()->to('/user')->with('status', 'Data Berhasil Dihapus!');
    }
}
