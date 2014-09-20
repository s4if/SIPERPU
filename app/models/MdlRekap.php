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
 * Description of MdlRekap
 *
 * @author s4if
 */

class MdlRekap extends Model {
    
    public function rekapHarian($tanggal){
        $query = $this->db->prepare("SELECT siswa.kelas as 'out_kelas', 
            siswa.jurusan as 'out_jurusan', 
            siswa.paralel as 'out_paralel',
            (select count(absen.nis)  
            from absen right join siswa on absen.nis = siswa.nis 
            where absen.tanggal  = ? and
            siswa.kelas = out_kelas and
            siswa.jurusan = out_jurusan and
            siswa.paralel = out_paralel
            group by kelas, jurusan, paralel
            ) as 'count'
            from absen right join siswa on absen.nis = siswa.nis
            group by kelas, jurusan, paralel");
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
