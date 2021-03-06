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

use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class MdlSiswa extends Model {    
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
    //ok
    public function fetchByClass($kelas){
        $query = $this->db->prepare("select * from siswa where kelas = ?");
        $query->bindValue(1, $kelas);
        try{
		
            $query->execute();
            $data = $query->fetchAll();
            return $data;
            
	}catch(PDOException $e){
            
            die($e->getMessage());
            
        }
    }
    //ok
    public function fetchByJur($jurusan){
        $query = $this->db->prepare("select * from siswa where jurusan = ?");
        $query->bindValue(1, $jurusan);
        try{
		
            $query->execute();
            $data = $query->fetchAll();
            return $data;
            
	}catch(PDOException $e){
            
            die($e->getMessage());
            
        }
    }
    
    public function fetchByJurPar($jurusan, $paralel){
        $query = $this->db->prepare("select * from siswa where jurusan = ? and paralel = ?");
        $query->bindValue(1, $jurusan);
        $query->bindValue(2, $paralel);
        try{
		
            $query->execute();
            $data = $query->fetchAll();
            return $data;
            
	}catch(PDOException $e){
            
            die($e->getMessage());
            
        }
    }
    //ok
    public function fetchByClassJur($kelas, $jurusan){
        $query = $this->db->prepare("select * from siswa where kelas = ? and jurusan = ?");
        $query->bindValue(1, $kelas);
        $query->bindValue(2, $jurusan);
        try{
		
            $query->execute();
            $data = $query->fetchAll();
            return $data;
            
	}catch(PDOException $e){
            
            die($e->getMessage());
            
        }
    }
    
    public function fetchByClassJurPar($kelas, $jurusan, $paralel){
        $query = $this->db->prepare("select * from siswa where kelas = ? and jurusan = ? and paralel = ?");
        $query->bindValue(1, $kelas);
        $query->bindValue(2, $jurusan);
        $query->bindValue(3, $paralel);
        try{
		
            $query->execute();
            $data = $query->fetchAll();
            return $data;
            
	}catch(PDOException $e){
            
            die($e->getMessage());
            
        }
    }

    public function fetchQuery(){
        
        $query = $this->db->prepare($strQuery);
        
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
    
    public function upload($urlFIle){
        
        $pdo = $this->db;

        $config = new LexerConfig();
        $config->setDelimiter(";");
        $config->setIgnoreHeaderLine(TRUE);
        $lexer = new Lexer($config);

        $interpreter = new Interpreter();
        $interpreter->unstrict(); // Ignore row column count consistency

        $interpreter->addObserver(function(array $columns) use ($pdo) {
            $stmt = $pdo->prepare('REPLACE INTO siswa (nis, nama, jenis_kelamin, kelas, jurusan, paralel) '
                    . 'VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute($columns);
        });
        try {
            $lexer->parse($urlFIle, $interpreter);
            return TRUE;
        } catch (Exception $ex) {
            die($ex->getMessage());
            return FALSE;
        }
    }
    
    public function search($name){
        $strquery = "SELECT * FROM siswa where siswa.nama like '%".$name."%'";
        $query = $this->db->prepare($strquery);
        
        try{
		
            $query->execute();
            $data = $query->fetchAll();
            return $data;
            
	}catch(PDOException $e){
            
            die($e->getMessage());
            
        }
    }
}