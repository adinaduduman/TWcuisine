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

  $posts[] = array('titlu'=> $titlu, 'timp'=> $timp,'ingresiente'=> $ingrediente, 'descriere'=> $descriere);
} 

$response['Retete'] = $posts;

$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
fclose($fp);


?> 