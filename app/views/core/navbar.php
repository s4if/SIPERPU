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
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sistem Absensi Perpustakaan SMK N 2 Magelang</a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="<?php if(isset($data['nav-location'])) {
                    echo ($data['nav-location'] == 'absensi')?'active':''; 
                }?>"><a href="<?php echo $data['baseUrl'];?>public/presensi/index">Presensi</a></li>
                <li class="<?php if(isset($data['nav-location'])) {
                    echo ($data['nav-location'] == 'admin')?'active':''; 
                }?>"><a href="<?php echo $data['baseUrl'];?>public/admin/index">Admin</a></li>
            </ul>
            <?php if(isset($data['nav-location'])) {
                if($data['nav-location'] == 'admin'){?>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=$data['baseUrl'];?>public/admin/password">
                                <span class="glyphicon glyphicon-user"></span>&MediumSpace;Ganti Password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=$data['baseUrl'];?>public/login/logout"><span class="glyphicon glyphicon-log-out"></span>&MediumSpace;Keluar</a></li>
                    </ul>
                </li>
            </ul>
            <?php }
            } ?>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
