<?php
$sql_location = $conn -> prepare('select distinct location from jobs');
$sql_location -> execute();
$location_result = $sql_location -> get_result();
$location_values = $location_result -> fetch_all(MYSQLI_ASSOC);
$sql_location -> close();

$sql_category = $conn -> prepare('select distinct job_type from jobs');
$sql_category -> execute();
$category_result = $sql_category -> get_result();
$category_values = $category_result -> fetch_all(MYSQLI_ASSOC);
$sql_category -> close();

if(!empty($_GET['search'])){
    $value = $_GET["search"];
    $search = '%'.$value.'%';
    $sql_search = $conn -> prepare("select * from jobs where job_title like ? ");
    $sql_search -> bind_param("s", $search);
    $sql_search -> execute();
    $result = $sql_search -> get_result();
    $values = $result -> fetch_all(MYSQLI_ASSOC);
    $sql_search -> close();
}