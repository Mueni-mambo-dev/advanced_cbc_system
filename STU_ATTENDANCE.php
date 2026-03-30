<?php
// include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['att'])) {
    $date = date('Y-m-d');
    
    // In a real scenario, you would loop through the array and insert into MySQL
    /*
    foreach ($_POST['att'] as $student_id => $status) {
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, status, date) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $student_id, $status, $date);
        $stmt->execute();
    }
    */

    // Offline Success Feedback
    echo "
    <body style='font-family:sans-serif; background:#020617; color:white; display:flex; flex-direction:column; align-items:center; justify-content:center; height:100vh;'>
        <div style='background:#10b981; width:60px; height:60px; border-radius:20px; display:flex; align-items:center; justify-content:center; margin-bottom:20px;'>
            <svg width='30' height='30' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><polyline points='20 6 9 17 4 12'></polyline></svg>
        </div>
        <h1 style='font-weight:900; letter-spacing:-1px;'>Attendance Recorded</h1>
        <p style='color:#64748b; font-weight:bold;'>Kitere Primary Institutional Registry Updated.</p>
        <a href='attendance.html' style='margin-top:30px; color:#4f46e5; text-decoration:none; font-weight:900; text-transform:uppercase; font-size:12px; border:2px solid #4f46e5; padding:10px 25px; border-radius:99px;'>Add Another</a>
    </body>";
} else {
    header("Location: attendance.html");
}
?>