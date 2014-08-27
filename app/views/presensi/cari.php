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
        <div class="col-md-offset-1 col-md-10">
            <a class="btn btn-sm btn-warning" href="<?=$data['baseUrl'];?>public/presensi/index">Batal</a>
        </div>
        <div class="col-md-offset-1 col-md-10">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>NIS</td>
                            <td>Nama</td>
                            <td>P/L</td>
                            <td>Kelas</td>
                            <td>Jurusan</td>
                            <td>Paralel</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data['data_siswa'] as $siswa){?>
                        <tr>
                        <td><?php echo $siswa['nis'];?></td>
                        <td><?php echo $siswa['nama'];?></td>
                        <td><?php echo $siswa['jenis_kelamin'];?></td>
                        <td><?php echo $siswa['kelas'];?></td>
                        <td><?php echo $siswa['jurusan'];?></td>
                        <td><?php echo $siswa['paralel'];?></td>
                        <td>
                        <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModal<?php echo $siswa['nis'];?>">
                            <span class="glyphicon glyphicon-ok"></span>&nbsp;Presensi
                        </a>
                        <div class="modal fade" id="myModal<?php echo $siswa['nis'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel'.$siswa['nis'].'" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel<?php echo $siswa['nis'];?>">Konfirmasi</h4>
                        </div>
                        <div class="modal-body">
                        Apakah ini benar data anda?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <a class="btn btn-success" href="<?php echo $data['baseUrl'].'public/presensi/konfirmasi/'.$siswa['nis'];?>">OK</a>
                        </div>
                        </div>
                        </div>
                        </div>
                        </td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
