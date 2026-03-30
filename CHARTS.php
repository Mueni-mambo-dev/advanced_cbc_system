<?php

include "db.php";

$class = $_GET['class'];
$term = $_GET['term'];
$year = $_GET['year'];

$query = "

SELECT students.name, AVG(marks.marks) as average

FROM marks

JOIN students ON students.id = marks.student_id

WHERE students.class = '$class'
AND marks.term = '$term'
AND marks.year = '$year'

GROUP BY students.id
ORDER BY average DESC

";

$result = $conn->query($query);

$data = [];

while($row = $result->fetch_assoc()){
$data[] = $row;
}

echo json_encode($data);

?>