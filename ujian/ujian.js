<script>
var totalwaktu = 2000; //batas waktu pengerjaan semua soal
var indexsoal = 0;
var topik;
var timer;
var habis = 0;
var nilaiakhir = 0;
var inputpilihan;
var inputjawaban;
$(document).ready(function(){
    $("#benar").val(nilaiakhir);
    checkCookie();
    topik = $("#divtopik").html();
    url = "ambilsoal.php?topik="+topik
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            topik = msg;
            setinputpilihan();
            setinputjawaban()
            tampilkan();
            mainkanwaktu();
        }
    });
    $("#next").click(function(){
        indexsoal++;
        $("#divpertanyaan").hide();
        $("#divoption").hide();
        tampilkan();
    });
});

function setinputpilihan(){
    inputpilihan = "";
    for(i=0;i<topik.soal.length;i++){
        inputpilihan = inputpilihan+"<input type=hidden name=pilihan[] id=pilihan"+i+">";
    }
    $("#divpilihan").html(inputpilihan);
}

function setinputjawaban(){
    inputjawaban = "";
    for(i=0;i<topik.soal.length;i++){
        inputjawaban = inputjawaban+"<input type=hidden name=jawaban[] value='"+topik.soal[i].jawaban+"'>";
    }
    $("#divjawaban").html(inputjawaban);
}
function mainkanwaktu(){
    if(totalwaktu>0){
        $("#divtotalwaktu").html(totalwaktu);
        totalwaktu--;
        timer = setTimeout("mainkanwaktu()",1000);
    }else{
        clearTimeout(timer);
        habis = 1;
        document.getElementById("formulir").submit();
    }
}
function setnilai(nilai){
    idinput = "#pilihan"+indexsoal;
    $(idinput).val(nilai);
}
function tampilkan(){
    if(indexsoal<topik.soal.length){
        nomorsoal = indexsoal + 1;
        $("#divnomor").html("Soal "+nomorsoal+" dari "+ topik.soal.length);
        $("#divpertanyaan").html(topik.soal[indexsoal].pertanyaan);
        $("#divpertanyaan").fadeIn(2000);
        $("#jawaban_a").html("<input type='radio' onclick='setnilai(this.value)' name='R"+indexsoal+"'value='A'>A. "+topik.soal[indexsoal].a);
        $("#jawaban_b").html("<input type='radio' onclick='setnilai(this.value)' name='R"+indexsoal+"'value='B'>B. "+topik.soal[indexsoal].b);
        $("#jawaban_c").html("<input type='radio' onclick='setnilai(this.value)' name='R"+indexsoal+"'value='C'>C. "+topik.soal[indexsoal].c);
        $("#jawaban_d").html("<input type='radio' onclick='setnilai(this.value)' name='R"+indexsoal+"'value='D'>D. "+topik.soal[indexsoal].d);
        $("#divoption").slideDown(750);
    }else{
        habis = 1;
        document.getElementById("formulir").submit();
    }
}

function getCookie(c_name){
    if (document.cookie.length>0){
        c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1){
            c_start=c_start + c_name.length+1;
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return "";
}

function setCookie(c_name,value,expiredays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

function checkCookie(){
    totalwaktucookies=getCookie('waktucookies');
    if (totalwaktucookies!=null && totalwaktucookies!=""){
        totalwaktu = totalwaktucookies;
    }else{
        setCookie('waktucookies',totalwaktu,7);
    }
}
function keluar(){
    if(habis==0){
        setCookie('waktucookies',totalwaktu,7);
    }else{
        setCookie('waktucookies',0,-1);
    }
}
</script>