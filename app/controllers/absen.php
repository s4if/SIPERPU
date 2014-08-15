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
class Absen extends Controller {
    
    public function index(){
        $presensi = $this->model('Presensi');
        $baseUrl = Config::getBaseUrl();
        $tanggal = date('l, d M Y');
        $data_siswa = $presensi->fetchPresensi(date("Y-m-d"));
        $this->view('absen/index', ['baseUrl' => $baseUrl ,
            'nav-location' => 'absensi',
            'title'=>'Absensi Perpustakaan',
            'data_siswa' => $data_siswa,
            'tanggal' => $tanggal]);
    }
    
    public function tambah($nis = ''){
        $baseUrl = Config::getBaseUrl();
        $siswa = $this->model("Siswa");
        $siswa->nis = $nis; //$_POST['nis'];
        if($siswa->userExists()){
            $siswa->fetch();
            $this->view('absen/tambah', ['baseUrl' => $baseUrl ,
                'nav-location' => 'absensi',
                'title'=>'Absensi Perpustakaan',
                'siswa' => $siswa]);
        }  else {
            $this->view('absen/tidak_ditemukan', ['baseUrl' => $baseUrl ,
                'nav-location' => 'absensi',
                'title'=>'Absensi Perpustakaan',
                'siswa' => $siswa]);
        }
    }
}