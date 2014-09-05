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

class Rekap extends Controller {
    
    public function index($name = ''){
        $user = $this->model('User');
        $user->name = $name;
        $baseUrl = Config::getBaseUrl();
       
        $this->view('home/index', ['baseUrl' => $baseUrl ,
            'name' => $user->name, 
            'nav-location' => 'admin',
            'title'=>'Home!']);
    }
    
    public function harian($tanggal = NULL){
        $rekap = $this->model('Rekap');
        $baseUrl = Config   ::getBaseUrl();
        if($tanggal === NULL){
            $tanggal = date("Y-m-d");
        }
        $data_siswa = $rekap->fetchHarian($tanggal);
        $this->view('rekap/index', ['baseUrl' => $baseUrl ,
            'nav-location' => 'absensi',
            'title'=>'Absensi Perpustakaan',
            'data_siswa' => $data_siswa,
            'tanggal' => $tanggal]);
    }
}
