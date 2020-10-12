<?php

$host="localhost";
$dbname="attendance";
$user="root1";
$pass="";


$link= new mysqli($host,$user,$pass,$dbname);

if($link){

    echo "connection sucessful";

}

else{

    echo "error";
}



?>