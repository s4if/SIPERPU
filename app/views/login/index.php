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

?>
<div class="container" style="margin-top:30px">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><strong>Silahkan Login</strong></h3></div>
            <div class="panel-body">
                <?php if(empty($data['errors']) === false){
                    echo '<div class="alert alert-danger"><p>' . implode('</p><p>', $data['errors']) . '</p></div>';			
                } 
                ?>
                <form role="form" method="post" action="<?=$data['baseUrl']?>public/">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="NIP" name="nip" value="<?php echo isset($data['nip'])? $data['nip']:'';?>" required="true">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required="true">
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