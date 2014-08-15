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
 * Description of Presensi
 *
 * @author s4if
 */
class Presensi extends Model {
    public function fetchPresensi($tanggal){
        
        $query = $this->db->prepare("select siswa.nis as 'nis', "
                . "siswa.nama as 'nama', siswa.kelas as 'kelas', "
                . "siswa.jurusan as 'jurusan', "
                . "siswa.paralel as 'paralel', "
                . "siswa.jenis_kelamin as 'jenis_kelamin' "
                . "from siswa cross join absen using (nis) "
                . "where absen.tanggal = ?;");
        $query->bindValue(1, $tanggal);
        try{
            
            $query->execute();
            $data = $query->fetchAll();
            return $data;
            
	}catch(PDOException $e){
            
            die($e->getMessage());
            
        }
    }
}