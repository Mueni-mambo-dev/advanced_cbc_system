<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "your_db_name"); // change your_db_name

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if(isset($_POST['submit'])){
    $date = $_POST['date'];
    foreach($_POST['attendance'] as $teacher_id => $status){
        // Check if record exists
        $check = $conn->query("SELECT * FROM teacher_attendance WHERE teacher_id=$teacher_id AND attendance_date='$date'");
        if($check->num_rows > 0){
            // Update existing
            $conn->query("UPDATE teacher_attendance SET status='$status' WHERE teacher_id=$teacher_id AND attendance_date='$date'");
        } else {
            // Insert new
            $conn->query("INSERT INTO teacher_attendance (teacher_id, attendance_date, status) VALUES ($teacher_id, '$date', '$status')");
        }
    }
    echo "<p style='color:green; text-align:center;'>Attendance recorded successfully!</p>";
    echo "<p style='text-align:center;'><a href='attendance.html'>Back to Attendance Form</a></p>";
}
?>
