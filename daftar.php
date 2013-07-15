<? include 'header.php';
?>
<div class="content_box">
            <!-- mulai form isian -->
             <form action='langkah1.php' method='post' class='form' >
              <table border='0' cellpadding='5' cellspacing='0' class='form'>
              <tr><td colspan='3' align='center'><img src='img/icon/plontos.png' width='22' height='22' title='Data Siswa'>   DATA SISWA</td></tr>
                <tr>
                    <td><a name='formulir'>Nama</a></td>
                    <td>:</td>
                    <td><input type='text' name='nama' size='50'> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
				<tr>
                    <td><a name='formulir'>NISN</a></td>
                    <td>:</td>
                    <td><input type='text' name='nisn' size='50'> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><input type='radio' name='jkel' value='LAKI-LAKI'>Laki Laki  <input type='radio' name='jkel' value='PEREMPUAN'>Perempuan <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td><input type='text' name='tem_lahir' size='25'></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir: </td>
                    <td>:</td>
                    <td>
                        <select name='tgl'>
                            <option value='#'>Tanggal</option>
                            <?php for ($tgl=1; $tgl <= 31; $tgl++){
                             echo  "<option value='".$tgl."'>".$tgl."</option> " ;
                            };
                            ?>
                        </select> /
                        <select name='bln'>
                            <option value='#'>Bulan</option>
                            <?php for ($tgl=1; $tgl <= 12; $tgl++){
                             echo  "<option value='".$tgl."'>".$tgl."</option> " ;
                            };
                            ?>
                        </select> /
                        <select name='tahun'>
                            <option value='#'>Tahun</option>
                            <?php for ($tgl=1990; $tgl <= 2000; $tgl++){
                             echo  "<option value='".$tgl."'>".$tgl."</option> " ;
                            };
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gol Darah</td>
                    <td>:</td>
                    <td><input type='radio' name='gol_drh' value='A'>A <input type='radio' name='gol_drh' value='B'>B <input type='radio' name='gol_drh' value='AB'>AB <input type='radio' name='gol_drh' value='O'>O <input type='radio' name='gol_drh' value='(Kosong)'><i>(Tidak Tahu)</i></td>
                </tr>
                <tr>
                    <td valign='top'>Berat / Tinggi Badan</td>
                    <td valign='top'>:</td>
                    <td><input type='text' name='berat' size='3'> Kg / <input type='text' name='tinggi' size='3'> Cm</td>
                </tr>
                <tr>
                    <td valign='top'>Alamat Lengkap</td>
                    <td valign='top'>:</td>
                    <td><textarea name='alamat' cols='50' rows='5'></textarea> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Kode Pos</td>
                    <td>:</td>
                    <td><input type='text' name='k_pos' size='5'></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><select name='agama'>
                        <option value='(Kosong)'>Agama</option>
                        <option value='ISLAM'>Islam</option>
                        <option value='KRISTEN'>Kristen</option>
                        <option value='HINDU'>Hindu</option>
                        <option value='BUDHA'>Budha</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>:</td>
                    <td><input type='text' name='asal_sek' size='50'> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Alamat Sekolah</td>
                    <td>:</td>
                    <td><input type='text' name='alamat_sek' size='50'> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Tahun Lulus</td>
                    <td>:</td>
                    <td><select name='thn_lls'>
                            <option value='(Kosong)'>Tahun Lulus</option>
                            <?php for ($tgl=2000; $tgl <= 2011; $tgl++){
                             echo  "<option value='".$tgl."'>".$tgl."</option> " ;
                            };
                            ?>
                        </select> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>No Ijazah</td>
                    <td>:</td>
                    <td><input type='text' name='no_ijazah' size='25'></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td><input type='text' name='hp' size='12'></td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>:</td>
                    <td><input type='email' name='email' size='25'></td>
                </tr>
                <tr>
                    <td>Pilih Jurusan</td>
                    <td>:</td>
                    <td>
                        <select name='jurusan1'>
                            <option value='0'>Pilihan Jurusan</option>
                           <?php
$ket = mysql_query("select * from type_soal ");
while($p=mysql_fetch_array($ket)){
echo "<option value=\"$p[ket_soal]\">$p[ket_soal]</option>\n";
}
?>     
                        </select>
                       
                     <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                <td>Nilai UN</td>
                <td> : </td>
                    <td>
                        <table border='0' cellpadding='4' cellspacing='0' class='tampil'>
                            <tr>
                                <td class='nilai_un' align='center'>MTK</td>
                                <td class='nilai_un' align='center'>BIN</td>
                                <td class='nilai_un' align='center'>BIG</td>
                                <td class='nilai_un' align='center'>IPA</td>
                            </tr>
                            <tr>
                                <td><input type='text' name='mtk' size='2'></td>
                                <td><input type='text' name='bin' size='2'></td>
                                <td><input type='text' name='big' size='2'></td>
                                <td><input type='text' name='ipa' size='2'></td>
                                <td> <b style='color: red; font-size: 20px;'>*</td>
                               
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td colspan='3' align='center'><hr><img src='img/icon/ortu.png' width='22' height='22' title='Data Siswa'> DATA ORANG TUA / WALI MURID</td></tr>
                <tr>
                    <td>Ayah</td>
                    <td>:</td>
                    <td><input type='text' name='ayah' size='50'> <b style='color: red; font-size: 20px;'>*</b></td>
                </tr>
                <tr>
                    <td>Ibu</td>
                    <td>:</td>
                    <td><input type='text' name='ibu' size='50'></td>
                </tr>
                <tr>
                    <td>Wali</td>
                    <td>:</td>
                    <td><input type='text' name='wali' size='50'></td>
                </tr>
                <tr>
                    <td valign='top'>Alamat Lengkap</td>
                    <td valign='top'>:</td>
                    <td><textarea name='alamat_wali' cols='50' rows='5'></textarea></td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td><input type='text' name='hp_wali' size='12'></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><select name="kerja_wali" id="kerja_wali">
<option>--Pilih Pekerjaan--</option>
<?php
$ket = mysql_query("select ket from tbl_kerja ");                
while($p=mysql_fetch_array($ket)){
echo "<option value=\"$p[ket]\">$p[ket]</option>\n";
}
?>
</select></td>
                </tr>
                <tr>
                    <td colspan='3'><input type='radio' name='setuju' onClick="daftar.disabled=false;"><font size='2'><i><b>Saya setuju untuk mendaftar di SMKN 2 SAWAHLUNTO  dan telah memasukkan data dengan sebenar benarnya.</b></i></font></td>
                </tr>
                <tr><td colspan='3' align='center'><input class='inpuoet' name='daftar' type='submit' value='Daftar' style='background-color: #ffa20f;' disabled='disabled'> <input style='background-color: #ffa20f;' onClick="daftar.disabled=true;" type='reset' value='Ulangi'></td></tr>
              <tr>
                <td colspan='4'>
                     <b style='color: red; font-size: 20px;'>* Wajib di isi
                </td>
              </tr>
              </table>
             </form>
             
            <!--akhir form isian -->    
            </div>
        </td>
    </tr>
	</div>
 <? 
	include 'footer.php';
	?></table>

</body>
</html>
