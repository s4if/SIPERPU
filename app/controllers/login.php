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

class Login extends Controller {
    
    public function index($nip = '', $errors = []){
        $this->sessionCheck();
        $baseUrl = Config::getBaseUrl();
       
        $this->view('login/index', ['baseUrl' => $baseUrl ,
            'nip' => $nip,
            'errors' => $errors,
            'title'=>'Login Sistem Absensi Perpustakaan']);
    }
    
    //nanti dihapus
//    public function test(){
//        $baseUrl = Config::getBaseUrl();
//        $user = $this->model('User');
//        $user->name = $_POST['username'];
//        $user->password = $_POST['password'];
//       
//        $this->view('login/test', ['baseUrl' => $baseUrl ,
//            'name' => $user->name, 
//            'password' => $user->password, 
//            'title'=>'Login Sistem Absensi Perpustakaan']);
//    }
    
    public function login(){
        $this->sessionCheck();
        $guru = $this->model('Guru');
        $errors = [];
        $nip = '';
        if(isset($_POST['nip'])&&isset($_POST['password'])){
            $nip = $_POST['nip'];
            $password = $_POST['password'];
            $guru->nip = $nip;
            if($guru->userExists()){
                $this->auth($guru, $password);
            }else{
                $errors [] = 'Kesalahan : Guru dengan NIP = '.$nip.' tidak ditemukan!!';
                $this->view('login/index', ['baseUrl' => Config::getBaseUrl() ,
                    'nip' => $nip,
                    'errors' => $errors,
                    'title'=>'Login Sistem Absensi Perpustakaan']);
            }
        }  else {
            $this->view('login/index', ['baseUrl' => Config::getBaseUrl() ,
                    'nip' => $nip,
                    'errors' => $errors,
                    'title'=>'Login Sistem Absensi Perpustakaan']);
        }
    }
    
    //autentifikasi password
    private function auth($guru, $password){
        $stored_password = $guru->fetchPassword();
        if($stored_password == $password){
            $guru->fetch();
            $_SESSION['nip'] = $guru->nip;
            $_SESSION['nama'] = $guru->nama;
            $_SESSION['jenis_kelamin'] = $guru->jenis_kelamin;
            $_SESSION['cp'] = $guru->cp;
            $this->view('home/index', ['nama' => $guru->nama,
                'baseUrl' => Config::getBaseUrl(),
                'title' => 'Beranda']);
        }else{
            $errors [] = 'Kesalahan : Password Salah!';
            $this->view('login/index', ['baseUrl' => Config::getBaseUrl() ,
                'nip' => $guru->nip,
                'errors' => $errors,
                'title'=>'Login Sistem Absensi Perpustakaan']);
        }
    }
    
    //mengecek jika sesi sudah ada, maka tidak boleh menampilkan login!
    private function sessionCheck(){
        if(isset($_SESSION['nip'])){
            header('location:'.Config::getBaseUrl().'public/home/index');
        }
    }
}
