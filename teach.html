<?php
$conn = new mysqli("localhost", "root", "", "your_db_name");
if($conn->connect_error) die("DB Connection failed: " . $conn->connect_error);

if(isset($_POST['submit'])){
    $student_id = $_POST['student_id'];
    $query = $conn->query("SELECT * FROM students WHERE id=$student_id");

    if($query->num_rows == 0){
        echo "<h3 style='text-align:center;color:red;'>Student not found</h3>";
        exit;
    }

    $student = $query->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Profile</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #eef2f7;
    padding: 30px;
}
.profile-container {
    max-width: 800px;
    margin: auto;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
}
.profile-header {
    text-align: center;
    margin-bottom: 30px;
}
.profile-header h2 {
    color: #003366;
}
.profile-body {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
.profile-photo {
    flex: 1 1 200px;
    text-align: center;
}
.profile-photo img {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #003366;
}
.profile-details {
    flex: 2 1 400px;
    font-size: 16px;
    line-height: 1.8;
}
.profile-details strong {
    color: #003366;
}
.back-btn {
    display: block;
    margin: 30px auto 0 auto;
    text-align: center;
    padding: 12px 25px;
    background: #003366;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
}
.back-btn:hover {
    background: #001f4d;
}
</style>
</head>
<body>

<div class="profile-container">
    <div class="profile-header">
        <h2>Student Profile</h2>
    </div>

    <div class="profile-body">
        <div class="profile-photo">
            <img src="<?php echo $student['photo'] ?? 'default.png'; ?>" alt="Profile Photo">
        </div>
        <div class="profile-details">
            <p><strong>Name:</strong> <?php echo $student['name']; ?></p>
            <p><strong>Admission Number:</strong> <?php echo $student['admission_no']; ?></p>
            <p><strong>Class:</strong> <?php echo $student['class']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $student['dob']; ?></p>
            <p><strong>Parent/Guardian:</strong> <?php echo $student['parent_name']; ?></p>
            <p><strong>Contact:</strong> <?php echo $student['parent_contact']; ?></p>
            <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
            <p><strong>Address:</strong> <?php echo $student['address']; ?></p>
        </div>
    </div>

    <a href="STU_PROFILE.html" class="back-btn">Back to Form</a>
</div>

</body>
</html>
