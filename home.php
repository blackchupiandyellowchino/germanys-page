<?php

session_start()


if($_COOKIE['logueado']!="si"){
	header("location: index.php");	//
	exit();
}

$sql = "SELECT * FROM $tbl_name_datos";		//
$result = mysql_query($sql);


if (!$result) {
    echo "DB Error, could not show table\n";
    echo 'MySQL Error: ' . mysql_error();
    exit();
}

$fields_num = mysql_num_fields($result);


// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    echo "$field->name";
}
echo "\n";

// printing table rows
while($row = mysql_fetch_row($result))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "$cell";

    echo "\n";
}

mysql_free_result($result);
?>