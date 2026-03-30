<?php

include "db.php";

$data=[];

$data['students']=$conn->query("SELECT COUNT(*) FROM students")->fetch_row()[0];
$data['teachers']=$conn->query("SELECT COUNT(*) FROM teachers")->fetch_row()[0];
$data['subjects']=$conn->query("SELECT COUNT(*) FROM subjects")->fetch_row()[0];
$data['marks']=$conn->query("SELECT COUNT(*) FROM marks")->fetch_row()[0];

echo json_encode($data);

?>