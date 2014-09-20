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
            <?php if(empty($data['errors']) === false){
                echo '<div class="alert alert-danger"><p>' . implode('</p><p>', $data['errors']) . '</p></div>';			
            } 
            ?>
            <form class="form-horizontal" role="form" method="post" action="<?=$data['baseUrl'];?>public/">
                <div class="form-group error">
                    <label class="col-sm-3 control-label">Masukkan Password Lama :</label>
                    <div class="col-sm-3 error">
                        <input type="password" class="form-control" name="stored_password" required="true">
                    </div>
                </div>
                <div class="form-group error">
                    <label class="col-sm-3 control-label">Masukkan Password Baru :</label>
                    <div class="col-sm-3 error">
                        <input type="password" class="form-control" name="new_password" required="true">
                    </div>
                    <div class="col-sm-1 error">
                        <!-- INI ADALAH POST UNTUK MENENTUKAN PAGE!! 
                        HARAP DIGANTI JIKA MAU COPASS!! -->
                        <input type="text" class="form-control invisible" name="url" value="admin/ganti_password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" class="btn btn-sm btn-primary">OK</button>
                        <a class="btn btn-sm btn-warning" href="<?=$data['baseUrl'];?>public/admin">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    