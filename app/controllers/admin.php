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
        $this->guru();
    }
    
    public function guru(){
        $model = $this->model('Guru');
        $data_guru = $model->fetchTable();
        $baseUrl = Config::getBaseUrl();
        
        $this->view('admin/guru/index', ['baseUrl' => $baseUrl , 
            'nav-location' => 'admin',
            'title' => 'Tabel Guru',
            'data_guru' => $data_guru]);
    }
    
    public function tambah_guru(){
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
    
    public function edit_guru($nip = ''){
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
    
    public function hapus_guru($nip = ""){
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
    public function siswa(){
        $model = $this->model('Siswa');
        $data_siswa = $model->fetchTable();
        $baseUrl = Config::getBaseUrl();
        
        $this->view('admin/siswa/index', ['baseUrl' => $baseUrl , 
            'nav-location' => 'admin',
            'title' => 'Tabel Siswa',
            'data_siswa' => $data_siswa]);
    }
    
    public function tambah_siswa(){
        $baseUrl = Config::getBaseUrl();
        $errors = array();
        $success = false;
        $siswa = $this->model('Siswa');
        if(!empty($_POST['nis'])){
            $siswa->nip = $_POST['nis'];
            
            if($siswa->userExists()){
                $errors[] = 'maaf, NIS sudah dipakai';
            }else{
                $success = $siswa->add($_POST['nis'],
                        $_POST['nama'],
                        $_POST['kelas'],
                        $_POST['jurusan'],
                        $_POST['paralel'],
                        $_POST['jenis_kelamin']);
            }
        }
        if($success){
            $data_siswa = $siswa->fetchTable();
            $baseUrl = Config::getBaseUrl();
            $notice = array();
            $notice [] = 'Data Siswa berhasil ditambahkan';
            $this->view('admin/siswa/index', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Tabel Siswa',
                'data_siswa' => $data_siswa,
                'notice' => $notice]);
        }  else {
            $this->view('admin/siswa/tambah_siswa', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Tambah Siswa',
                'errors' => $errors]);
        }
    }
    
    public function edit_siswa($nis = ''){
        $baseUrl = Config::getBaseUrl();
        $errors = array();
        $modified = FALSE;
        $success = false;
        $siswa = $this->model('Siswa');
        if(!empty($_POST['nis'])){
            $success = $siswa->update($_POST['nis'],
                        $_POST['nama'],
                        $_POST['kelas'],
                        $_POST['jurusan'],
                        $_POST['paralel'],
                        $_POST['jenis_kelamin'],
                        $nis);
            $modified = TRUE;
        }
        if($modified && $success){
            $data_siswa = $siswa->fetchTable();
            $notice = array();
            $notice [] = 'Data Siswa Berhasil Dimodifikasi';
            $this->view('admin/siswa/index', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Tabel Siswa',
                'data_siswa' => $data_siswa,
                'notice' => $notice]);
        } elseif ($modified && (!$success)) {
            $siswa->nis = $nis;
            $siswa->fetch();
            $errors [] = 'maaf, Data Siswa Gagal Dimodifikasi';
            $this->view('admin/siswa/edit_siswa', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Edit Siswa',
                'errors' => $errors,
                'siswa' => $siswa]);
        } else {
            $siswa->nis = $nis;
            $siswa->fetch();
            $this->view('admin/siswa/edit_siswa', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Edit SIswa',
                'errors' => $errors,
                'siswa' => $siswa]);
        }
    }
    
    public function hapus_siswa($nis = ''){
        $baseUrl = Config::getBaseUrl();
        $errors = array();
        $model = $this->model('Siswa');
        $notice = array();
        $success = $model->delete($nis);
        if($success){
            $notice [] = 'Data siswa berhasil dihapus';
        }else{
            $errors [] = 'maaf, data siswa gagal dihapus';
        }
        $data_siswa = $model->fetchTable();
        $this->view('admin/siswa/index', ['baseUrl' => $baseUrl , 
            'nav-location' => 'admin',
            'title' => 'Tabel Siswa',
            'data_siswa' => $data_siswa,
            'notice' => $notice,
            'errors' => $errors]);
    }
}
