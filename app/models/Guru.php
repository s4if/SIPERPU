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
 * Model dari Guru
 *
 * @author s4if
 */
class Guru extends Model {
    public $nip;
    public $nama;
    public $password;
    public $jenis_kelamin;
    public $alamat;
    public $cp;
    
    public function fetch(){
        
        $query = $this->db->prepare("select * from guru where nip = ?");
        $query->bindValue(1, $this->nip);
        
        try{
		
            $query->execute();
            $data = $query->fetch();
            $this->nama = $data['nama'];
            $this->password = $data['password'];
            $this->alamat = $data['alamat'];
            $this->jenis_kelamin = $data['jenis_kelamin'];
            $this->cp = $data['cp'];
 
	}catch(PDOException $e){
            die($e->getMessage());
        }
    }
    
    public function assign($data = []){
        
        $this->nama = $data['nama'];
        $this->password = $data['password'];
        $this->alamat = $data['alamat'];
        $this->jenis_kelamin = $data['jenis_kelamin'];
        $this->cp = $data['cp'];
        
    }
    
    public function fetchPassword(){
        $query = $this->db->prepare("select password from guru where nip = ?");
        $query->bindValue(1, $this->nip);
        try{
		
            $query->execute();
            $data = $query->fetch();
            $this->password = $data['password'];
            return $this->password;
 
	}catch(PDOException $e){
		die($e->getMessage());
	}
    }
    
    public function userExists() {
        
        $strquery = "SELECT COUNT(`nip`) FROM `guru` WHERE `nip`= ?";
        $query = $this->db->prepare($strquery);
        $query->bindValue(1, $this->nip);

        try{

            $query->execute();
            $rows = $query->fetchColumn();

            if($rows == 1){
                return true;
            }else{
                return false;
            }

        } catch (PDOException $e){
            die($e->getMessage());
        }
    }
}
