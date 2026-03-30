<?php
$conn = new mysqli("localhost", "root", "", "your_db_name");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $teacher_id = $_POST['teacher_id'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO teachers (name, teacher_id, subject, email, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $teacher_id, $subject, $email, $phone);

    if($stmt->execute()){
        $message = "Teacher added successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Teacher</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f7;
        padding: 40px;
    }
    .message-box {
        max-width: 500px;
        margin: auto;
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        text-align: center;
        font-size: 18px;
        color: #003366;
    }
    .back-link {
        display: block;
        margin-top: 25px;
        text-decoration: none;
        color: white;
        background: #003366;
        padding: 12px;
        border-radius: 6px;
    }
    .back-link:hover {
        background: #001f4d;
    }
</style>
</head>
<body>

<div class="message-box">
    <?php echo $message ?? ''; ?>
    <a href="teach.html" class="back-link">Add Another Teacher</a>
</div>

</body>
</html>
