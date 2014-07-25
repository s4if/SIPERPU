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

class Login extends Controller {
    
    public function index($name = ''){
        $baseUrl = Config::getBaseUrl();
        $user = $this->model('User');
        $user->name = $name;
       
        $this->view('login/index', ['baseUrl' => $baseUrl ,
            'name' => $user->name, 
            'title'=>'Home!']);
    }
    
    public function test(){
        $baseUrl = Config::getBaseUrl();
        $user = $this->model('User');
        $user->name = $_POST['username'];
        $user->password = $_POST['password'];
       
        $this->view('login/test', ['baseUrl' => $baseUrl ,
            'name' => $user->name, 
            'password' => $user->password, 
            'title'=>'Home!']);
    }
}
