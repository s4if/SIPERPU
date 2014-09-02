<?php

/* 
 * The MIT License
 *
 * Copyright 2014 s4if.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentatideal
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
                } ?>
                <div class="btn-group">
                    <a href="<?=$data['baseUrl'];?>public/siswa/tambah" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-plus"></span>
                        Tambah
                    </a>
                    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#ModalImport">
                        <span class="glyphicon glyphicon-import"></span>
                        Import
                    </a>
                    <div class="modal fade" id="ModalImport" tabindex="-1" role="dialog" aria-labelledby="ModalImport" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="ModalImportLabel>">Pilih File</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post" action="<?=$data['baseUrl'];?>public/" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Masukkan Input</label>
                                            <input type="file" id="file" name="file">
                                            <input type="text" class="form-control hidden" name="url" value="siswa/import">
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ModalSort">
                        <span class="glyphicon glyphicon-sort"></span>
                        Filter
                    </a>
                    <div class="modal fade" id="ModalSort" tabindex="-1" role="dialog" aria-labelledby="ModalSort" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="ModalImportLabel>">Urut Berdasarkan :</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form role="form form-inline" method="post" action="<?=$data['baseUrl'];?>translator.php">
                                            <div class="form-group col-xs-12">
                                                <div class="col-xs-5">
                                                    <label class="control-label">
                                                        <small>Kelas - Jurusan - Paralel :</small>
                                                    </label>
                                                </div>
                                                <div class="input-group-sm col-xs-2">
                                                    <select class="form-control" name="kelas">
                                                        <option value="empty" >--</option>
                                                        <option value="X">X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>
                                                </div>
                                                <div class="input-group-sm col-xs-2">
                                                    <select class="form-control" name="jurusan">
                                                        <option value="empty" >--</option>
                                                        <option value="AP" >AP</option>
                                                        <option value="AK">AK</option>
                                                        <option value="PM">PM</option>
                                                        <option value="RPL">RPL</option>
                                                    </select>
                                                </div>
                                                <div class="input-group-sm col-xs-2">
                                                    <input type="text" class="form-control" name="paralel" 
                                                           value="">
                                                    <input type="text" class="form-control hidden" name="url" value="siswa/lihat">
                                                    <input type="text" class="form-control hidden" name="kode" value="siswa">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-6">
                                                    <button type="submit" class="btn btn-sm btn-primary">OK</button>
                                                    <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>NIS</td>
                            <td>Nama</td>
                            <td>P/L</td>
                            <td>Kelas</td>
                            <td>Jurusan</td>
                            <td>Paralel</td>
                            <td>Aksi</td>
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
                        <a class="btn btn-xs btn-success" href="<?php echo $data['baseUrl'].'public/siswa/edit/'.$siswa['nis'];?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal<?php echo $siswa['nis'];?>">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                        <div class="modal fade" id="myModal<?php echo $siswa['nis'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel'.$siswa['nis'].'" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel<?php echo $siswa['nis'];?>">Konfirmasi</h4>
                        </div>
                        <div class="modal-body">
                        Apakah Anda Yakin Untuk Menghapus Data Siswa dengan NIS = <?php echo $siswa['nis'];?>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger" href="<?php echo $data['baseUrl'].'public/siswa/hapus/'.$siswa['nis'];?>">OK</a>
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