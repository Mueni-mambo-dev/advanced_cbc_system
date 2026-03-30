<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $group = $_POST['recipient_group'];
    $message = htmlspecialchars($_POST['message']);
    $type = $_POST['type'];
    $timestamp = date('H:i');

    // Here you would typically loop through your database for phone numbers
    // and call your SMS API.
    
    echo "
    <body style='font-family:system-ui,sans-serif; background:#f8fafc; display:flex; align-items:center; justify-content:center; height:100vh; margin:0;'>
        <div style='background:white; padding:50px; border-radius:40px; text-align:center; border:1px solid #e2e8f0; max-width:400px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05);'>
            <div style='background:#fef3c7; color:#d97706; width:70px; height:70px; border-radius:24px; display:flex; align-items:center; justify-content:center; margin:0 auto 25px auto;'>
                <svg width='35' height='35' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'><path d='M22 11.08V12a10 10 0 1 1-5.93-9.14'></path><polyline points='22 4 12 14.01 9 11.01'></polyline></svg>
            </div>
            <h1 style='font-weight:900; color:#020617; margin:0; letter-spacing:-1px;'>Queueing Successful</h1>
            <p style='color:#64748b; font-weight:600; margin-top:10px;'>Your <b>$type</b> message is being broadcasted to <b>$group</b>.</p>
            
            <div style='background:#f1f5f9; padding:15px; border-radius:15px; margin-top:20px; text-align:left; font-size:13px; color:#475569; font-style:italic;'>
                \"$message\"
            </div>

            <div style='margin-top:30px; display:flex; gap:10px;'>
                <a href='notifications.html' style='flex:1; text-decoration:none; background:#020617; color:white; padding:12px; border-radius:12px; font-weight:800; font-size:12px; text-transform:uppercase;'>New SMS</a>
                <a href='dashboard.php' style='flex:1; text-decoration:none; background:#f1f5f9; color:#475569; padding:12px; border-radius:12px; font-weight:800; font-size:12px; text-transform:uppercase;'>Home</a>
            </div>
        </div>
    </body>";
}
?>