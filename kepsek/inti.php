<?php
function sambung(){
//**Seting ke databaseee **//
@mysql_connect("localhost", "root", "root") or die("<strong>Tidak Dapat Tersambung dengan Pusat Data</strong>");
@mysql_selectdb('psb');
};
function putus(){
    mysql_close();
};
	function password(){
		$gpass=NULL;
		$n = 6;	// <--- banyaknya karakter yang diinginkan
		$chr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvqxyz0123456789@"; //kombinasi karakter
		for($i=0;$i<$n;$i++){
			$rIdx = rand(1,strlen($chr));
			$gpass .=substr($chr,$rIdx,1);
		}
		return $gpass;
	};
//echo generatePass();
function exel() //fungsi eksport exel
{
    $nama_file="PSB-SMKN1-".date('j-F-H.i').".xls";
    //**Seting ke databaseee **//
    $conn = mysql_connect("localhost","root","root");
    $db = mysql_select_db("psb",$conn);
   
    $sql = "SELECT * FROM biodata_siswa";
    $rec = mysql_query($sql) or die (mysql_error());
   
    $num_fields = mysql_num_fields($rec);
   
    for($i = 0; $i < $num_fields; $i++ )
    {
        $header .= mysql_field_name($rec,$i)."\t";
    }
   
    while($row = mysql_fetch_row($rec))
    {
        $line = '';
        foreach($row as $value)
        {                                           
            if((!isset($value)) || ($value == ""))
            {
                $value = "\t";
            }
            else
            {
                $value = str_replace( '"' , '""' , $value );
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
        $data .= trim( $line ) . "\n";
    }
   
    $data = str_replace("\r" , "" , $data);
   
    if ($data == "")
    {
        $data = "\n No Record Found!\n";                       
    }
   
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$nama_file");
    header("Pragma: no-cache");
    header("Expires: 0");
    print "$header\n$data";
};
function masuk($aksi){
    echo "
    <div class='login'>
    <form action='".$aksi."' method='POST'>
        No. Registrasi: </br>
        <input type='text' name='no'></br>
        Kunci: </br>
        <input type='password' name='kunci'></br>
        <input class='submit' type='submit' value='Masuk' name='tmbl'>
    </form>
    </div>
    ";
};
$sekarang=date('H.i');
function hari($jam){
    if($jam <= '10.00'){
        echo "Selamat Pagi";
    }elseif($jam <= '14.30'){
        echo "Selamat Siang";
    }elseif($jam <= '18.00'){
        echo "Selamat Sore";
    }elseif($jam <= '23.00'){
        echo "Selamat Malam";
    }elseif($jam <= '23.59'){
        echo "Selamat Tidur";
    }else{
        echo "Mumet";
    }
    
};
//////////////////////////////////////////////////////////////////////
function waktu(){
    echo "
    <script language='javascript'>
    function jam(){
    var waktu = new Date();
    var jam = waktu.getHours();
    var menit = waktu.getMinutes();
    var detik = waktu.getSeconds();
    
    if (jam < 10){
    jam = '0' + jam;
    }
    if (menit < 10){
    menit = '0' + menit;
    }
    if (detik < 10){
    detik = '0' + detik;
    }
    var jam_div = document.getElementById('jam');
    jam_div.innerHTML = jam + ':' + menit + ':' + detik;
    setTimeout('jam()', 1000);
    }
    jam();
    </script>
    ";
};
//////////////////////////////////////////////////////////////////////////////
//fungsi pembuat log
function loging($tindak){
    $ip=$_SERVER['REMOTE_ADDR'];
    $jam=date('H:i');
    //$hal=$_SERVER['REQUEST_URI'];
    $isi="[ ".$ip." ] ".$jam." -- ".$tindak."\n";
    $_logfilename = "log/log-".date('d-M-Y').".txt";
    ////
    if(!file_exists($_logfilename)){
        $_logfilehandler = fopen($_logfilename,'a+'); 
        @fwrite($_logfilehandler, "# Jejak pada: [ ".date('d-M-Y')." ] #\n");
	@fopen($_logfilename,'a+');
        @fwrite($_logfilehandler,$isi);
        @fclose($_logfilehandler);
        @fclose($_logfilehandler);
	    sambung();
            $simpan="log-".date('d-M-Y').".txt";
            mysql_query("update sistem set file_log='$simpan' where id='1'");
            putus();
    }else{
        $_logfilehandler = fopen($_logfilename,'a+');
	@fopen($_logfilename,'a+');
        @fwrite($_logfilehandler,$isi);
        @fclose($_logfilehandler);
    };

};
/////////////
//fungsi pembuka log
function buka_log($isi){

    $file = @fopen($isi, "r") or exit("Tidak bisa membuka file ".$isi);
    while(!feof($file)) 
    {
	    echo @fgets($file). "<br />";
    }
fclose($file);

};
?>
