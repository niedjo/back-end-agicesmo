<?php

// echo md5(uniqid(rand(), true));

// 1244109e872dc8f25934ec42caac9a6f

// var_dump($_SERVER);



include("ConstantesBd.php");

$const = new Constant();

echo $const->dbname;