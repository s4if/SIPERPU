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
<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-title"><strong>Silahkan Masukkan NIS</strong></h3></div>
            <div class="panel-body">
                <form role="form" method="post" action="<?=$data['baseUrl']?>public/">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="NIS" 
                               name="nip" value="<?php echo isset($data['nip'])? $data['nip']:'';?>" 
                               required="true" list="listSiswa">
                        <datalist id="listSiswa">
                            <?php if(empty($data['data_siswa']) === false){
                                foreach ($data['data_siswa'] as $siswa){
                                    echo '<option value="'.$siswa[0].'">';
                                }
                            } 
                            ?>
                        </datalist>
                    </div>
                    <div class="form-group form-horizontal">
                        <input type="text" class="form-control col-xs-4 hidden" name="url" value="login/login">
                        <button type="submit" class="btn btn-sm btn-default col-xs-4">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>