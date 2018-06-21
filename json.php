<?php 
	$db = mysqli_connect('localhost', 'root', '', 'register');
$sql="select * from recipes limit 20"; 
$response = array();
$posts = array();
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)) { 
  $titlu=$row['titlu']; 
  $timp=$row['timp'];
  $ingrediente=$row['ingrediente']; 
  $descriere=$row['descriere'];
  $posts[] = array('titlu'=> $titlu, 'timp'=> $timp,'ingrediente'=> str_replace("°C","grade C",str_replace("½","jumatate ",str_replace("⅓","o treime",str_replace("\r\n",", ",$ingrediente)))), 'descriere'=> str_replace("\r\n","",$descriere));
} 
$response['Retete'] = $posts;
echo'<pre>';
echo json_encode($response,JSON_PRETTY_PRINT);
echo'</pre>';
?> 