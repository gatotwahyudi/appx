<?php

namespace App\Controllers;

class Users extends BaseController
{
    protected $db = null; // class variable

    /**
     * Constructor
     */
    public function __construct()
    {
        // inisiasi koneksi ke database
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // mendapatkan query string
        $qs = $this->request->getVar();

        // query builder
        $builder = $this->db->table('users');
        if(isset($qs['key']) && $qs['key'] != "") {
            $builder->like('email', $qs['key']);
        }
        // get data
        $items = $builder->get()->getResult();

        // prepare data for page
        $data['items']  = $items;
        $data['qs']     = $qs;
        // return "Users - Index";
        return view('users/index', $data);
    }

    public function detail($id = null)
    {
        // get data
        $record = $this->db->table('users')->where('id', $id)->get()->getRow();
        $data['rec'] = $record;

        // return "Users - Detail";
        return view('users/detail', $data);
    }

    public function create()
    {
        // return "Users - Create";
        return view('users/create');
    }

    public function save()
    {
        // mengambil data dari form
        $form = $this->request->getPost();

        // populate data for insert
        $data = [
            "id"        => uniqid("", true),
            "status"    => $form["status"],
            "created"   => date('Y-m-d H:i:s'),
            "email"     => $form["email"],
            "hash"      => hash("sha256", $form['password']),
            "role"      => $form["role"],
            "fullname"  => $form["fullname"],
        ];
        // execute insert
        $this->db->table('users')->insert($data);
        // back to index
        return redirect()->to('/users');
    }

    public function edit($id = null)
    {
        // get data
        $record = $this->db->table('users')->where('id', $id)->get()->getRow();
        $data['rec'] = $record;

        // return "Users - Edit";
        return view('users/edit', $data);
    }

    public function update($id = null)
    {
        // mengambil data dari form
        $form = $this->request->getPost();
        print_r($form);
        // populate data for insert
        $data = [
            "status"    => $form["status"],
            "updated"   => date('Y-m-d H:i:s'),
            "role"      => $form["role"],
            "fullname"  => $form["fullname"],
        ];
        // execute update
        $this->db->table('users')->set($data)->where('id', $id)->update();
        // back to index
        return redirect()->to('/users');
    }

    public function delete($id = null)
    {
        // get data
        $record = $this->db->table('users')->where('id', $id)->get()->getRow();
        $data['rec'] = $record;

        // return "Users - Delete";
        return view('users/delete', $data);
    }

    public function purge($id = null)
    {
        // execute delete
        $this->db->table('users')->where('id', $id)->delete();

        // back to index
        return redirect()->to('/users');
    }

    public function upload($id = null)
    {
        // dapatkan referensi ke file yang diupload
        $file = $this->request->getFile('image');

        if (!$file->hasMoved()) {
            // buat nama file
            $ext    = $file->getClientExtension();
            $fname  = "$id.$ext";
            $fpath  = ROOTPATH . 'public/pics';
            $file->move($fpath, $fname, true);
        }

        // back to detail
        return redirect()->to('/users/detail/' . $id);
    }
}
