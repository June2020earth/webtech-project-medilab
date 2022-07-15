<?php
include('../../api/public/dbcon.php');

if(isset($_GET['serviceID']))
{
$sID=$_GET['serviceID'];

$ref_table = 'service/'.$sID;
$database->getReference($ref_table)->remove();
echo "<script> location.href='http://localhost:8080/frontend/ViewService/viewService.php'; </script>";
}
?>
