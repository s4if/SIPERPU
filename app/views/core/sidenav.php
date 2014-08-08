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
<div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            ADMIN</a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <a href="<?=$data['baseUrl'];?>public/admin/guru">Guru</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="<?=$data['baseUrl'];?>public/admin/siswa">Siswa</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
            Laporan</a>
        </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                        <a href="#">Per Kelas</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">Per Tanggal</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">Per Jurusan</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">Per Siswa</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>