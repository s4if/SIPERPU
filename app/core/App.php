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

/**
 * Description of App
 *
 * @author s4if
 */
class App {
    
    //Disini nanti dibuat priviledge control!!
    
    protected $controller = 'home';

    protected $method = 'index';
    
    protected $params = [];
    
    public function __construct() {
        
        $url = $this->parseUrl();
        
        if(isset($_SESSION['nip'])||$url[0]=='login'||$url[0]=='presensi'){
            if(file_exists('../app/controllers/'.$url[0].'.php')){
                $this->controller = $url[0];
                unset($url[0]);
            }

            require_once '../app/controllers/'.$this->controller.'.php';

            $this->controller = new $this->controller;

            if(isset($url[1])){
                if(method_exists($this->controller, $url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
        }else{
            header('location:'.Config::getBaseUrl().'public/login/index');
        }
    }
    
    public function parseUrl(){
        if(isset ($_POST['url'])){
            return $url = explode('/',filter_var(rtrim($_POST['url'],'/'), FILTER_SANITIZE_URL));
        }elseif(isset($_GET['url'])){
            return $url = explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
        }
    }
    
}
