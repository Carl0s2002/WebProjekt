<html>
 <body background="https://www.yourvalued.co.uk/wp-content/uploads/2018/11/value-business.jpg" style="background-repeat:no-repeat;background-position:center;background-attachment:fixed;">
 <div align=center>
 <div align = center style="background-color:rgb(255,255,255,0.5);max-width:50%;">
<?php
$conn=mysqli_connect("localhost","root","","mester");
if(isset($_POST['g2']))
{
	$sem=$_POST['sem'];
	if($sem==1)
	{
		echo " <font size=5 > " ;
		$tabla = mysqli_query($conn,"SELECT megrendelo.nev , megrendelo.megrendeloazon FROM megrendelo , munka WHERE munka.megrendeloazon = megrendelo.megrendeloazon and munka.megrenddatum < '7/1/2009'") ;
		while($sor=mysqli_fetch_array($tabla))
			 echo $sor['nev']."<br>" ;
		echo "</font>" ;
	}
	else if($sem==2)
	{
		echo " <font size=5 > " ;
		$tabla = mysqli_query($conn,"SELECT megrendelo.nev , megrendelo.megrendeloazon FROM megrendelo , munka WHERE munka.megrendeloazon = megrendelo.megrendeloazon and munka.megrenddatum > '7/1/2009'") ;
		while($sor=mysqli_fetch_array($tabla))
			 echo $sor['nev']."<br>" ;
		echo "</font>" ;
	}
}
if(isset($_POST['g11']))
{
	$varos=$_POST['var'];
	echo "<h2>" ;
	echo $varos ;
	echo "</h2>" ;
	echo "<table border = 1	> " ;
		echo "<th align=center >Name</th>
			  <th align=center 	>E-mail</th>" ;
	$tabla=mysqli_query($conn,"SELECT `nev` , `E-mail` FROM megrendelo WHERE varos LIKE '$varos'");
	while($sor=mysqli_fetch_array($tabla))
	{
		echo "<tr>" ;
		echo "<td align=center>" ;
		echo $sor['nev'] ;
		echo"</td>" ;
		echo "<td align=center>" ;
		echo $sor['E-mail']."<br>" ;
		echo "</td>" ;
		echo "</tr>" ;
	}
	echo "</table>";
}
if(isset($_POST['g4']))
{
	echo " <font size=5 > " ;
	$varos=$_POST['VAROS'];
	$tabla=mysqli_query($conn,"SELECT nev FROM `megrendelo` WHERE varos LIKE '%$varos%'");
	while($sor = mysqli_fetch_array($tabla))
	     echo $sor['nev']."<br>" ;
		 echo "Megrendelő" ;
		 echo "</font>" ;
}
?>
  </div>
  </div>
 </body>
</html>