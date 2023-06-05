<html>
 <head>
 <title>Workers</title>
 </head>
 <body bgcolor=grey background="https://cineuropa.org/imgCache/2019/02/01/1549016566076_0620x0435_0x0x0x0_1573340872150.jpg" style="background-repeat:no-repeat;background-position:center;background-attachment:fixed;font-size:20;">
 <div align = left>
 <div><B><a href="Mester2.html"><font size=5 color=black>Home</font></a><B></div>
 </div>
 <h1 align = center>Information</h1>
 <br><br>
 <ol>
 <li>Workers in this area:
 <br>
 <form method=post >
 <select name =varos>
 <option value="Tapolca">Tapolca
 <option value="Ózd">Ózd
 <option value="Debrecen">Debrecen
 <option value="Miskolc">Miskolc
 <option value="Hatvan">Hatvan
 <option value="Kiskunfélegyháza">Kiskunfélegyháza
 <option value="Sopron">Sopron
 <option value="Sátoraljaújhely">Sátoraljaújhely
 <option value="Keszthely">Keszthely
 <option value="Köszeg">Köszeg
 <option value="Szeged">Szeged
 <option value="Györ">Györ
 <option value="Pécs">Pécs
 <option value="Siófok">Siófok
 <option value="Budapest">Budapest
 </select>
 <input name = "g1" type=submit value = "Search">
 <input name="reset" type=submit value= "Reset">
 <br>
 <?php
$conn=mysqli_connect("localhost","root","","mester");
if(isset($_POST['g1']))
{
	$varos=$_POST['varos'];
	$tabla = mysqli_query($conn,"SELECT nev , telefon FROM mester WHERE varos LIKE '%$varos%' ORDER BY nev");
	echo "<h2>" ;
	echo $varos ;
	echo "</h2>" ;
	echo "<table border = 1	> " ;
		echo "<th align=center >Name</th>
			  <th align=center 	>Phone number</th>" ;	
	while($sor=mysqli_fetch_array($tabla))
	{	echo "<tr>" ;
		echo "<td align=center>" ;
		echo $sor['nev'] ;
		echo"</td>" ;
		echo "<td align=center>" ;
		echo $sor['telefon']."<br>" ;
		echo "</td>" ;
		echo "</tr>" ;
	}
	echo "</table>" ;
}
?>
 <br><br>
 <div align=center>
 </div>
 <li>Trying to reach a worker? 
 <br> 
 Type his name in here and we'll give you his phone number:
 <br>
 <input name = "nev" type=textbox placeholder="Ex.'Antal Attila'">
 <input name = "g5" type=submit value="Search">
 <input name="reset" type=submit value="Reset">
 <br>
 <?php
 $conn=mysqli_connect("localhost","root","","mester") ;
 if(isset($_POST['g5']))
{
	$nev=$_POST['nev'] ;
	$tabla=mysqli_query($conn,"SELECT telefon , nev FROM mester WHERE nev LIKE '$nev'");
	$sor=mysqli_fetch_array($tabla) ;
	if($sor['nev'] === $nev ) 
	   echo $sor['telefon'] ;
	   else echo "Worker not found!" ;
}
 ?>
 <br><br>
 <li>Interested in workers for a certain occupation? Choose one from here!
 <br>
 <select name="tevekenysegek">
 <option value="Gázszerelő">Gázszerelő
 <option value="Vízvezeték-szerelő">Vízvezeték-szerelő
 <option value="Asztalos">Asztalos
 <option value="Autószerelő">Autószerelő
 <option value="Ács">Ács
 <option value="Tetőfedő">Tetőfedő
 <option value="Kőműves">Kőműves
 <option value="Pék">Pék
 <option value="Ötvös">Ötvös
 <option value="Kovács">Kovács
 <option value="Hangszerkészítő">Hangszerkészítő
 <option value="Kertész">Kertész
 <option value="Bádogos">Bádogos
 <option value="Villanyszerelő">Villanyszerelő
 <option value="Szobafestő">Szobafestő
 <option value="Hidegburkoló">Hidegburkoló
 <option value="Melegburkoló">Melegburkoló
 <option value="TV-szerelő">TV-szerelő
 <option value="Számítógép-szerelő">Számítógép-szerelő
 <option value="Háztartásigép-szerelő">Háztartásigép-szerelő
 <option value="Cukrász">Cukrász
 <option value="Szakács">Szakács
 <option value="Optikus">Optikus
 <option value="Gyertyaöntő">Gyertyaöntő
 <option value="Cipész">Cipész
 <option value="Szabó">Szabó
 <option value="Favágó">Favágó
 <option value="Kútásó">Kútásó
 <option value="Üveges">Üveges
 <option value="Lakatos">Lakatos
 
</select> <input name="g6" type = submit value="Search"> 
<input name="Reset2" type=submit value="Reset">
<br><br>
 Max. price:<input name="max" type=text size=7 ><input name="filter" type=submit value="Filter search">
 <br><?php
 $conn=mysqli_connect("localhost","root","","mester");
 if(isset($_POST['g6']))
{	
    $tevekenyseg=$_POST['tevekenysegek'];
	$tabla=mysqli_query($conn,"SELECT nev, telefon , tevekenyseg FROM mester,mester_tevekenyseg,tevekenyseg WHERE mester.mesterazon = mester_tevekenyseg.mesterazon and mester_tevekenyseg.tevekenysegazon=tevekenyseg.tevekenysegazon and tevekenyseg.tevekenyseg LIKE '$tevekenyseg'") ;
	echo "<h2>" ;
	echo $tevekenyseg ;
	echo "</h2>" ;
	echo "<table border = 1	> " ;
		echo "<th align=center >Name</th>
			  <th align=center 	>Phone number</th>" ;	
	while($sor=mysqli_fetch_array($tabla))
	{	echo "<tr>" ;
		echo "<td align=center>" ;
		echo $sor['nev'] ;
		echo"</td>" ;
		echo "<td align=center>" ;
		echo $sor['telefon']."<br>" ;
		echo "</td>" ;
		echo "</tr>" ;
	}
	echo "</table>" ;
}
if(isset($_POST['filter']))
{	
    $tevekenyseg=$_POST['tevekenysegek'];
	$ar=$_POST['max'];
	$tabla=mysqli_query($conn,"SELECT nev, telefon , munkadij , tevekenyseg FROM mester,mester_tevekenyseg,tevekenyseg,munka WHERE mester.mesterazon = mester_tevekenyseg.mesterazon and mester_tevekenyseg.tevekenysegazon=tevekenyseg.tevekenysegazon and tevekenyseg.tevekenyseg LIKE '$tevekenyseg' and mester.mesterazon=munka.mtazon and munka.munkadij<='$ar' ORDER BY mester.nev ") ;
	echo "<h2>" ;
	echo $tevekenyseg ;
	echo "</h2>" ;
	echo "<table border = 1	> " ;
		echo "<th align=center >Name</th>
			  <th align=center 	>Phone number</th> 
			  <th align=center >Price</th>";	
	while($sor=mysqli_fetch_array($tabla))
	{	echo "<tr>" ;
		echo "<td align=center>" ;
		echo $sor['nev'] ;
		echo"</td>" ;
		echo "<td align=center>" ;
		echo $sor['telefon']."<br>" ;
		echo "</td>" ;
		echo "<td align =center>" ;
		echo $sor['munkadij'] ;
		echo "</td>";
		echo "</tr>" ;
	}
	echo "</table>" ;
}
?>
 </ol>
 </form>
 </body>
</html>