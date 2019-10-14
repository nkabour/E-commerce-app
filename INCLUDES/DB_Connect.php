<?php




$db = @mysqli_connect ('localhost', 'root', '','shampoo_factory') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($db, 'utf8');
