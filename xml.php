<?php 
header("Content-Disposition:attachment;filename='rss.php'");
$query = "SELECT * FROM recipes";
$linkID = mysqli_connect('localhost', 'root', '', 'register');
$resultID = mysqli_query  ($linkID,$query)  or die  ("Sql error : ") . mysql_error  ;
$xml_output = "";
$xml_output .="<?xml version=\"1.0\" encoding=\"UTF-8\" ?>" . PHP_EOL;
$xml_output .= "<rss version=\"2.0\">". PHP_EOL;
$xml_output .="<channel>" . PHP_EOL;
$xml_output .= "   " . "<title>" . "Retete culinare" ."</title>". PHP_EOL;
$xml_output .= "   " . "<link>" ."http://localhost/retete.php" . "</link>" . PHP_EOL;
$xml_output .= "   " . "<description>" . "Retete pe placul tau!" . "<description>" . PHP_EOL;


for($x = 0 ; $x < mysqli_num_rows($resultID) ; $x++){ 
    $row = mysqli_fetch_assoc($resultID); 
	
    $xml_output .= "   " . "<item>" . PHP_EOL; 
    $xml_output .= "\t" . "<title>" . $row['titlu'] . "</title>" . PHP_EOL; 
	
	$xml_output .= "\t" . "<link>" . "http://localhost/ingrediente.php?id=" . $row['id'] . "</link>" . PHP_EOL; 
	
 	$xml_output .= "\t" . "<description>" . "Cea mai gustoasa reteta!" . "</description>" . PHP_EOL; 
	$xml_output .= "   " . "</item>" . PHP_EOL; 
	
 
} 
$xml_output .= "</channel>";

echo $xml_output; 
?> 