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
class Siswa extends Model {
    public $nis;
    public $nama;
    public $kelas;
    public $jurusan;
    public $paralel;
    public $jenis_kelamin;
    
    public function fetch(){
        
        $query = $this->db->prepare("select * from siswa where nis = ?");
        $query->bindValue(1, $this->nis);
        
        try{
		
            $query->execute();
            $data = $query->fetch();
            $this->nama = $data['nama'];
            $this->kelas = $data['kelas'];
            $this->jurusan = $data['jurusan'];
            $this->paralel = $data['paralel'];
            $this->jenis_kelamin = $data['jenis_kelamin'];
 
	}catch(PDOException $e){
            die($e->getMessage());
        }
    }
    
    public function fetchTable(){
        
        $query = $this->db->prepare("select * from siswa");
        
        try{
		
            $query->execute();
            $data = $query->fetchAll();
            return $data;
            
	}catch(PDOException $e){
            
            die($e->getMessage());
            
        }
    }
    
    public function assign($data = []){
        
        $this->nama = $data['nama'];
        $this->kelas = $data['kelas'];
        $this->jurusan = $data['jurusan'];
        $this->paralel = $data['paralel'];
        $this->jenis_kelamin = $data['alamat'];
        
    }
    
    public function add($nis, $nama, $kelas, $jurusan, $paralel, $jenis_kelamin){
         $query = $this->db->prepare("insert into siswa "
                . "SET nis=?, "
                . "nama=?, "
                . "kelas=?, "
                . "jurusan=?, "
                . "paralel=?, "
                . "jenis_kelamin=?");
        $query->bindValue(1, $nis);
        $query->bindValue(2, $nama);
        $query->bindValue(3, $kelas);
        $query->bindValue(4, $jurusan);
        $query->bindValue(5, $paralel);
        $query->bindValue(6, $jenis_kelamin);
        try{
		
            $query->execute();
            $this->nis = $nis;
            $this->nama = $nama;
            $this->kelas = $kelas;
            $this->jurusan = $jurusan;
            $this->paralel =$paralel;
            $this->jenis_kelamin = $jenis_kelamin;
            return TRUE;            
	}catch(PDOException $e){
            //die($e->getMessage());
            return false;
	}
    }
    
    public function update($nis, $nama, $kelas, $jurusan, $paralel, $jenis_kelamin, $nis_lama){
         $query = $this->db->prepare("update siswa  "
                . "SET nis=?, "
                . "nama=?, "
                . "kelas=?, "
                . "jurusan=?, "
                . "paralel=?, "
                . "jenis_kelamin=?"
                . "where nis = ?");
        $query->bindValue(1, $nis);
        $query->bindValue(2, $nama);
        $query->bindValue(3, $kelas);
        $query->bindValue(4, $jurusan);
        $query->bindValue(5, $paralel);
        $query->bindValue(6, $jenis_kelamin);
        $query->bindValue(7, $nis_lama);
        try{
		
            $query->execute();
            $this->nis = $nis;
            $this->nama = $nama;
            $this->kelas = $kelas;
            $this->jurusan = $jurusan;
            $this->paralel =$paralel;
            $this->jenis_kelamin = $jenis_kelamin;
            return TRUE;            
	}catch(PDOException $e){
            //die($e->getMessage());
            return false;
	}
    }
    
    public function userExists() {
        
        $strquery = "SELECT COUNT(`nis`) FROM `siswa` WHERE `nis`= ?";
        $query = $this->db->prepare($strquery);
        $query->bindValue(1, $this->nis);

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
    
    public function delete($nis = 'err'){
        $query = $this->db->prepare("delete from siswa where nis = ? ");
        $query->bindValue(1, $nis);
        
        try{
		
            $query->execute();
            return true;
            
	}catch(PDOException $e){
            //die($e->getMessage());
            return false;
        }
    }
}