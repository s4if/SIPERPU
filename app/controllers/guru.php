<?php

/*
 * The MIT License
 *
 * Copyright 2014 s4if.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Description of guru
 *
 * @author s4if
 */
class guru extends Controller{
    
    public function index(){
        $model = $this->model('Guru');
        $data_guru = $model->fetchTable();
        $baseUrl = Config::getBaseUrl();
        
        $this->view('admin/guru/index', ['baseUrl' => $baseUrl , 
            'nav-location' => 'admin',
            'title' => 'Tabel Guru',
            'data_guru' => $data_guru]);
    }
    
    public function tambah(){
        $baseUrl = Config::getBaseUrl();
        $errors = array();
        $success = false;
        $guru = $this->model('Guru');
        if(!empty($_POST['nip'])){
            $guru->nip = $_POST['nip'];
            
            if($guru->userExists()){
                $errors[] = 'maaf, NIP sudah dipakai';
            }else{
                //ini mohon dicermati untuk paswordnya nge-hash-nya gmana!?
                $success = $guru->add($_POST['nip'], 'qwerty', $_POST['nama'], $_POST['jenis_kelamin']);
            }
        }
        if($success){
            $model = $this->model('Guru');
            $data_guru = $model->fetchTable();
            $baseUrl = Config::getBaseUrl();
            $notice = array();
            $notice [] = 'Data Guru Berhasil Ditambahkan';
            $this->view('admin/guru/index', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Tabel Guru',
                'data_guru' => $data_guru,
                'notice' => $notice]);
        }  else {
            $this->view('admin/guru/tambah_guru', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Tambah Guru',
                'errors' => $errors]);
        }
    }
    
    public function edit($nip = ''){
        $baseUrl = Config::getBaseUrl();
        $errors = array();
        $modified = FALSE;
        $success = false;
        $guru = $this->model('Guru');
        if(!empty($_POST['nip'])){
            $success = $guru->update($_POST['nip'], $_POST['nama'],
                    $_POST['jenis_kelamin'], $nip);
            $modified = TRUE;
        }
        if($modified && $success){
            $data_guru = $guru->fetchTable();
            $notice = array();
            $notice [] = 'Data Guru Berhasil Dimodifikasi';
            $this->view('admin/guru/index', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Tabel Guru',
                'data_guru' => $data_guru,
                'notice' => $notice]);
        } elseif ($modified && (!$success)) {
            $guru->nip = $nip;
            $guru->fetch();
            $errors [] = 'maaf, Data Guru Gagal Dimodifikasi';
            $this->view('admin/guru/edit_guru', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Edit Guru',
                'errors' => $errors,
                'guru' => $guru]);
        } else {
            $guru->nip = $nip;
            $guru->fetch();
            $this->view('admin/guru/edit_guru', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Edit GUru',
                'errors' => $errors,
                'guru' => $guru]);
        }
    }
    
    public function hapus($nip = ""){
        $baseUrl = Config::getBaseUrl();
        $errors = array();
        $model = $this->model('Guru');
        $notice = array();
        $success = $model->delete($nip);
        if($success){
            $notice [] = 'Data Guru berhasil dihapus';
        }else{
           $errors [] = 'maaf, data guru gagal dihapus';
        }
        $data_guru = $model->fetchTable();
        $this->view('admin/guru/index', ['baseUrl' => $baseUrl , 
            'nav-location' => 'admin',
            'title' => 'Tabel Guru',
            'data_guru' => $data_guru,
            'notice' => $notice,
            'errors' => $errors]);
    }
}
