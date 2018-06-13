<?php 
//header("Content-type: descriere/xml"); 
$query = "SELECT * FROM recipes";
$linkID = mysqli_connect('localhost', 'root', '', 'register');
$resultID = mysqli_query ( $linkID,$query ) or die ( "Sql error : " . mysql_error( ) );
$xml_output = '';
$xml_output .= htmlentities("<Retete>") . "<br>"; 
for($x = 0 ; $x < mysqli_num_rows($resultID) ; $x++){ 
    $row = mysqli_fetch_assoc($resultID); 
	
    $xml_output .= "&nbsp;&nbsp;&nbsp;&nbsp;" . htmlentities("<Reteta>") . "<br>"; 
    $xml_output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . htmlentities("<titlu>") . $row['titlu'] . htmlentities("</titlu>") . "<br>"; 
	
	$xml_output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . htmlentities("<timp>") . $row['timp'] . htmlentities("</timp>") . "<br>"; 
	
 	$xml_output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . htmlentities("<ingrediente>") . $row['ingrediente'] . htmlentities("</ingrediente>") . "<br>"; 
    $xml_output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . htmlentities("<descriere>") . $row['descriere'] . htmlentities("</descriere>") . "<br>"; 
    
	$xml_output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . htmlentities("<stil>") . $row['stil'] . htmlentities("</stil>") . "<br>"; 
	$xml_output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . htmlentities("<restrictii>") . $row['restrictii'] . htmlentities("</restrictii>") . "<br>"; 
	$xml_output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . htmlentities("<dotari>") . $row['dotari'] . htmlentities("</dotari>") . "<br>"; 
	$xml_output .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . htmlentities("<abilitati>") . $row['abilitati'] . htmlentities("</abilitati>") . "<br>"; 
	$xml_output .= "&nbsp;&nbsp;&nbsp;&nbsp;" . htmlentities("</Reteta>") . "<br>"; 
	
 
} 
$xml_output .= htmlentities("</Retete>");
echo $xml_output; 
?> 