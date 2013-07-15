<?php
error_reporting(0);
sambung();
session_start();
//keluar//
if($_GET['keluar']=='yo'){ 
    sambung();
    $nama=$_SESSION['panitia'];
    mysql_query("update panitia set sedang_login='tidak' where nama='$nama'");
    unset($_SESSION['panitia']);
    loging($nama." Log Out");
}?><?
	
	if (isset($_POST['submit'])){
		
		$pertanyaan=ucwords(htmlentities((trim($_POST['pertanyaan']))));
		$pilihan_a=ucwords(htmlentities((trim($_POST['pilihan_a']))));
		$pilihan_b=ucwords(htmlentities((trim($_POST['pilihan_b']))));
		$pilihan_c=ucwords(htmlentities((trim($_POST['pilihan_c']))));
		$pilihan_d=ucwords(htmlentities((trim($_POST['pilihan_d']))));
		
		$jawaban=ucwords(htmlentities((trim($_POST['jawaban']))));
		$publish=htmlentities((trim($_POST['publish'])));
		//$tipe=htmlentities((trim($_POST['tipe'])));
		
		$query=mysql_query("insert into tabel_soal values('','$pertanyaan','$pilihan_a','$pilihan_b','$pilihan_c','$pilihan_d','$jawaban','$publish','')");
		
		if($query){
			?><script language="javascript">document.location.href="?hal=soal";</script><?php
		}else{
			echo mysql_error();
		}
		
	}else{
		unset($_POST['submit']);
	}
	?>
<div class="grid_16" id="content">
    <h1>Input Soal</h1>
    
    <form action="?hal=input_soal" method="post">
    <table class="datatable" align="center">
    <tr>
        <td width="29%" height="37" valign="top"><font size="2" face="verdana"><p>Pertanyaan</p></font></td>
        <td><textarea cols="23" rows="5" name="pertanyaan"></textarea></td>
    </tr>
    
    <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan A</p></font></td>
        <td><input type="text" name="pilihan_a" size="30"/></td>
    </tr>
    
    <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan B</p></font></td>
        <td><input type="text" name="pilihan_b" size="30"/></td>
    </tr>
    
     <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan C</p></font></td>
        <td><input type="text" name="pilihan_c" size="30"/></td>
    </tr>
    
     <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan D</p></font></td>
        <td><input type="text" name="pilihan_d" size="30"/></td>
    </tr>
    
     <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p><b>JABAWAN</b></p></font></td>
        <td>
        <select name="jawaban">
        	<option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
        </select>
        </td>
    </tr>
    
    
    <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p><b>PUBLISH</b></p></font></td>
        <td>
        <select name="publish">
        	<option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        </td>
    </tr>
    
    <!--
    <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p><b>TIPE</b></p></font></td>
        <td>
        <select name="tipe">
        <?php
$ket = mysql_query("select * from type_soal ");
while($p=mysql_fetch_array($ket)){
echo "<option value=\"$p[id_soal]\">$p[ket_soal]</option>\n";
}
?>     
        </select>
        </td>
    </tr>-->
    
    <tr>
        <td>&nbsp;</td>
        <td width="71%"><input name="submit" type="submit" value="Submit" />&nbsp;</td>
    </tr>
    </table>
    </form>

    

</div>



    
