<?php 
$select = "SELECT * FROM recipes";
$db = mysqli_connect('localhost', 'root', '', 'register');
$export = mysqli_query ( $db,$select ) or die ( "Sql error : " . mysql_error( ) );
$fields = mysqli_num_fields ( $export );
$header='';
for ( $i = 0; $i < $fields; $i++ )
{
	$fieldinfo = mysqli_fetch_field_direct( $export , $i );
	$header .= $fieldinfo->name . ", ";
}
$header = rtrim($header, ", ");

$data = "";
while( $row = mysqli_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = ", ";
        }
        else
        {
            $value = $value . ", ";
        }
        $line .= $value;
    }
    $data .= rtrim( $line, ", ") . PHP_EOL;
}

if ( $data == "" )
{
    $data = "(0) Records Found!";                        
}
echo $header . PHP_EOL . $data;
?> 