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
        <div class="col-md-4">
            <p class="text-center"><?=$data['tanggal']?></p>
        </div>
        <div class="col-md-offset-4 col-md-4">
            <p class="text-center"><?=$data['waktu']?></p>
        </div>
        <div class="col-md-12">
            <?php if(empty($data['notice']) === false){
                    ?>
                <div class="alert alert-success alert-dismissible">
                <?php
                    echo '<button type="button" class="close" data-dismiss="alert"><p>' . 
                            '<span aria-hidden="true">&times;</span><span class="sr-only">'.
                            'Close</span></button>'.
                            implode('</p><p>', $data['notice']) . '</p>';	
                    ?>
                </div>
                <?php
                }
                if(empty($data['errors']) === false){
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
                }?>
        </div>
        <div class="col-md-offset-4 col-md-5">
            <form class="form-inline" role="form" method="post" action="<?=$data['baseUrl'];?>translator.php">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">NIS</div>
                        <input type="text" class="form-control" name="param" placeholder="Masukkan NIS">
                        <input type="text" class="form-control hidden" name="url" value="presensi/tambah">
                    </div>
                </div>
                <button type="submit" class="btn btn-default">OK</button>
                <a class="btn btn-info" data-toggle="modal" data-target="#myModalSearch">
                    Cari nama
                </a>
            </form>
            <div class="modal fade" id="myModalSearch" tabindex="-1" role="dialog" aria-labelledby="myModalSearch" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabelSearch">Masukkan Nama</h4>
            </div>
            <div class="modal-body">
                <form class="form-inline" role="form" method="post" action="<?=$data['baseUrl'];?>translator.php">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">Nama</div>
                            <input type="text" class="form-control" name="param" placeholder="Masukkan Nama">
                            <input type="text" class="form-control hidden" name="url" value="presensi/cari">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">OK</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
            </div>
            </div>
        </div>
        <div class="col-md-12">
            &InvisibleComma;
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
                        <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?php echo $siswa['nis'];?>">
                            <span class="glyphicon glyphicon-remove"></span>&nbsp;Hapus
                        </a>
                        <div class="modal fade" id="myModal<?php echo $siswa['nis'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel'.$siswa['nis'].'" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel<?php echo $siswa['nis'];?>">Konfirmasi</h4>
                        </div>
                        <div class="modal-body">
                        Apakah Anda Yakin Untuk Menghapus Presensi Siswa dengan NIS = <?php echo $siswa['nis'];?>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger" href="<?php echo $data['baseUrl'].'public/presensi/hapus/'.$siswa['nis'];?>">OK</a>
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