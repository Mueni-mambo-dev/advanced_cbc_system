<?php
$conn = new mysqli("localhost", "root", "", "your_db_name");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $class_level = $_POST['class_level'];

    $stmt = $conn->prepare("INSERT INTO subjects (subject_name, subject_code, class_level) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $subject_name, $subject_code, $class_level);

    if($stmt->execute()){
        $message = "Subject added successfully!";
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
<title>Add Subject</title>
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
    <a href="SUB.html" class="back-link">Add Another Subject</a>
</div>

</body>
</html>
