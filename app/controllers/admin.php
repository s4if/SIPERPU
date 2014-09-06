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
    
    public function index(){
        $model = $this->model('Guru');
        $data_guru = $model->fetchTable();
        $baseUrl = Config::getBaseUrl();
        
        $this->view('admin/guru/index', ['baseUrl' => $baseUrl , 
            'nav-location' => 'admin',
            'title' => 'Tabel Guru',
            'data_guru' => $data_guru]);
    }
    
    public function password(){
        $model = $this->model('Guru');
        $data_guru = $model->fetchTable();
        $baseUrl = Config::getBaseUrl();
        
        $this->view('admin/password', ['baseUrl' => $baseUrl , 
            'nav-location' => 'admin',
            'title' => 'Tabel Guru',
            'data_guru' => $data_guru]);
    }
    
    public function ganti_password(){
        $model = $this->model('Guru');
        $baseUrl = Config::getBaseUrl();
        $nip = $_SESSION['nip'];
        $model->nip = $nip;
        $stored_password = $_POST['stored_password'];
        $new_password = $_POST['new_password'];
        $password = $model->fetchPassword();
        if ($stored_password === $password){
            $notice = array();
            $model->updatePassword($nip, $new_password);
            $data_guru = $model->fetchTable();
            $notice[] = "Password berhasil diganti";
            $this->view('admin/guru/index', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Tabel Guru',
                'notice' => $notice,
                'data_guru' => $data_guru]);
        }  else {
            $notice[] = "Maaf, Password lama yang anda masukkan salah";
            $this->view('admin/password', ['baseUrl' => $baseUrl , 
                'nav-location' => 'admin',
                'title' => 'Password',
                'errors' => $notice]);
        }
    }
}
