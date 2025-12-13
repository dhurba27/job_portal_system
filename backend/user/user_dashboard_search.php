<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
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
}