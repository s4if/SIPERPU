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

require_once '../app/views/core/navbar.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-info col-md-offset-4 col-md-4">
            <div class="panel-heading">
                <h3><p class="text-center">Data diri</p></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group error">
                        <label class="col-sm-3 control-label">NIS :</label>
                        <div class="col-sm-6">
                            <p class="form-control-static"><?=$data['siswa']->nis;?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama :</label>
                        <div class="col-sm-6">
                            <p class="form-control-static"><?=$data['siswa']->nama?></p>
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">P/L :</label>
                        <div class="col-sm-5">
                            <p class="form-control-static"><?=$data['siswa']->jenis_kelamin?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kelas :</label>
                        <div class="col-sm-5">
                            <p class="form-control-static"><?=$data['siswa']->kelas?>-<?=$data['siswa']->jurusan?>-<?=$data['siswa']->paralel?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <a class="btn btn-sm btn-primary" 
                               href="<?=$data['baseUrl'];?>public/presensi/konfirmasi/<?=$data['siswa']->nis?>">OK</a>
                            <a class="btn btn-sm btn-warning" href="<?=$data['baseUrl'];?>public/presensi/index">Batal</a>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>