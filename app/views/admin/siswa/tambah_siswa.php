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
        <div class="col-md-2">
            <?php require_once '../app/views/core/sidenav.php'; ?>
        </div>
        <div class="col-md-10">
            <div class="container-fluid">
                <?php if(empty($data['errors']) === false){
                    ?>
                <div class="alert alert-warning alert-dismissible">
                <?php
                    echo '<button type="button" class="close" data-dismiss="alert"><p>' . 
                            '<span aria-hidden="true">&times;</span><span class="sr-only">'.
                            'Close</span></button>'.
                            implode('</p><p>', $data['errors']) . '</p></span></button>';	
                    ?>
                </div>
                <?php
                } ?>
                <form class="form-horizontal" role="form" method="post" action="<?=$data['baseUrl'];?>public/">
                    <div class="form-group error">
                        <label class="col-sm-3 control-label">NIS:</label>
                        <div class="col-sm-6 error">
                            <input type="text" class="form-control" name="nis" 
                                   placeholder="Masukkan NIS" value="" required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama :</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama" 
                                   placeholder="Masukkan Nama" value="" required="true">
                        </div>
                    </div>
                    <!-- -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Kelamin :</label>
                        <div class="col-sm-5">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jenis_kelamin" value="L">
                                    Laki - Laki
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jenis_kelamin" value="P">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    <div class="col-sm-1">
                        <!-- INI ADALAH POST UNTUK MENENTUKAN PAGE!! 
                        HARAP DIGANTI JIKA MAU COPASS!! -->
                        <input type="text" class="form-control invisible" name="url" value="siswa/tambah">
                    </div>
                </div>
                <div class="form-group error">
                    <label class="col-sm-3 control-label">Kelas - Jurusan - Paralel :</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="kelas">
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control" name="jurusan">
                            <option value="AP" >AP</option>
                            <option value="AK">AK</option>
                            <option value="PM">PM</option>
                            <option value="RPL">RPL</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="paralel" 
                               value="" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" class="btn btn-sm btn-primary">OK</button>
                        <a class="btn btn-sm btn-warning" href="<?=$data['baseUrl'];?>public/siswa/index/">Cancel</a>
                    </div>
                </div>
            </form>  
        </div>
    </div>
</div>