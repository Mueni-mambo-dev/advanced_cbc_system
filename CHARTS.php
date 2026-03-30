<?php
$conn = new mysqli("localhost", "root", "", "your_db_name"); // change DB

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    $student_id = $_POST['student_id'];
    $term = $_POST['term'];
    $year = $_POST['year'];

    // Fetch student marks
    $marks_query = $conn->query("SELECT subject, marks FROM marks WHERE student_id=$student_id AND term='$term' AND year='$year'");

    $subjects = [];
    $marks = [];

    while($row = $marks_query->fetch_assoc()){
        $subjects[] = $row['subject'];
        $marks[] = (int)$row['marks'];
    }

    // Pass data to HTML file using GET parameter as JSON
    $chartData = json_encode(['subjects'=>$subjects, 'marks'=>$marks]);
    header("Location: charts.html?data=" . urlencode($chartData));
    exit;
}
?>
