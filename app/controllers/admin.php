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
 * Description of home
 *
 * @author s4if
 */
//ga yakin, ini home besar ato home kecil
class Admin extends Controller {
    
    public function index($name = ''){
        $user = $this->model('Guru');
        $user->name = $name;
        $baseUrl = Config::getBaseUrl();
       
        $this->view('admin/index', ['baseUrl' => $baseUrl ,
            'nav-location' => 'admin',
            'title'=>'Home!',
            'name' => $user->name]);
    }
    
    public function guru(){
        $model = $this->model('Guru');
        $data_guru = $model->fetchTable();
        $baseUrl = Config::getBaseUrl();
        
        $this->view('admin/guru', ['baseUrl' => $baseUrl , 
            'nav-location' => 'admin',
            'title' => 'Home!',
            'data_guru' => $data_guru]);
    }
    
    public function tambah_guru(){
        $baseUrl = Config::getBaseUrl();
        $errors = array();
        $success = false;
        $guru = $this->model('Guru');
        if(!empty($_POST['nip'])){
            $guru->nip = $_POST['nip'];
            $guru->nama = $_POST['nama'];
            $guru->jenis_kelamin = $_POST['jenis_kelamin'];
            //ini mohon dicermati untuk hash-nya!
            $guru->password = 'qwerty';
            if($guru->userExists()){
                $errors[] = 'maaf, NIP sudah dipakai';
            }else{
                $success = $guru->add();
            }
        }
        if($success){
            $model = $this->model('Guru');
            $data_guru = $model->fetchTable();
            $baseUrl = Config::getBaseUrl();
            $notice = array();
            $notice [] = 'Guru berhasil ditambahkan';
            $this->view('admin/guru', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Home!',
                'data_guru' => $data_guru,
                'notice' => $notice]);
        }  else {
            $this->view('admin/crud_guru', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Home!',
                'errors' => $errors]);
        }
    }

    public function lihat_guru(){
        
    }
    
    public function edit_guru(){
        
    }
    
    public function hapus_guru(){
        
    }
    public function siswa(){
        
    }
    
    public function tambah_siswa(){
        
    }
    
    public function lihat_siswa(){
        
    }
    
    public function edit_siswa(){
        
    }
    
    public function hapus_siswa(){
        
    }
}
