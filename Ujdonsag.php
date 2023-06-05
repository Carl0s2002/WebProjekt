<html>
 <body bgcolor=black>
 <div align=middle>
<?php
$conn=mysqli_connect("localhost","root","","mester");
if(isset($_POST['g1']))
{
	echo "<font color=yellow size=5> " ;
	$azonosito=$_POST['azonosito1'] ;
	$nev=$_POST['nev1'] ;
	$varos=$_POST['varos1'];
	$telefon=$_POST['telefon1'];
	$tabla=mysqli_query($conn, "INSERT INTO mester( mesterazon , nev , varos , telefon ) VALUES ( '$azonosito' , '$nev' , '$varos' , '$telefon' )");
	echo "<a href='Ujdonsag.html'>" ;
	echo "Művelet elvégezve!"."<br>" ;
	echo "</a>" ;
	echo "(Kattintson az írásra hogy visszalépjen!)" ;
}
if(isset($_POST['g2']))
{
	echo "<font color=yellow size=5> " ;
	$azonosito=$_POST['azonosito2'] ;
	$nev=$_POST['nev2'] ;
	$varos=$_POST['varos2'];
	$telefon=$_POST['telefon2'];
	$tabla=mysqli_query($conn,"DELETE FROM `mester` WHERE mesterazon=$azonosito and nev LIKE '%$nev%' and varos LIKE '%$varos%' and telefon LIKE '%$telefon%'");
	echo "<a href='Ujdonsag.html'>" ;
	echo "Művelet elvégezve!"."<br>" ;
	echo "</a>" ;
	echo "(Kattintson az írásra hogy visszalépjen!)" ;
}
if(isset($_POST['g3']))
{
	echo "<font color=yellow size=5> " ;
	$azonosito=$_POST['azonosito'] ;
	$nev=$_POST['nev'] ;
	$varos=$_POST['varos'];
	$telefon=$_POST['telefon'];
	$tabla=mysqli_query($conn,"UPDATE mester SET varos='$varos',telefon='$telefon' WHERE nev LIKE '%$nev%' and mesterazon=$azonosito");
	echo "<a href='Ujdonsag.html'>" ;
	echo "Művelet elvégezve!"."<br>" ;
	echo "</a>" ;
	echo "(Kattintson az írásra hogy visszalépjen!)" ;
}
?>
 </body>
</html>