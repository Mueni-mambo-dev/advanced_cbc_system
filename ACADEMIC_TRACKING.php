<?php
// Include your local database connection
// include 'db_connect.php'; 

// Mock data for offline demonstration if DB is not connected
$tracking_data = [
    ['subject' => 'Mathematics', 'ee' => 12, 'me' => 25, 'ae' => 5, 'be' => 2],
    ['subject' => 'English', 'ee' => 18, 'me' => 15, 'ae' => 8, 'be' => 1],
    ['subject' => 'Science', 'ee' => 10, 'me' => 20, 'ae' => 10, 'be' => 4],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitere Pro | Academic Tracking</title>
    <style>
        :root { --primary: #4f46e5; --slate-900: #0f172a; --slate-50: #f8fafc; }
        body { font-family: system-ui, -apple-system, sans-serif; background: var(--slate-50); margin: 0; padding: 20px; color: var(--slate-900); }
        .container { max-width: 1000px; margin: 0 auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
        .card { background: white; border-radius: 30px; padding: 30px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); margin-bottom: 25px; }
        .track-row { display: grid; grid-template-columns: 2fr 4fr 1fr; gap: 20px; align-items: center; padding: 15px 0; border-bottom: 1px solid #f1f5f9; }
        .bar-container { height: 12px; background: #f1f5f9; border-radius: 10px; overflow: hidden; display: flex; }
        .bar-segment { height: 100%; }
        .ee-bg { background: #10b981; } /* Emerald */
        .me-bg { background: #6366f1; } /* Indigo */
        .ae-bg { background: #f59e0b; } /* Amber */
        .be-bg { background: #ef4444; } /* Rose */
        .legend { display: flex; gap: 15px; font-size: 11px; font-weight: 800; text-transform: uppercase; margin-top: 10px; }
        .dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; margin-right: 4px; }
        .btn-back { text-decoration: none; color: var(--primary); font-weight: 900; font-size: 13px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <a href="dashboard.html" class="btn-back">← CONSOLE</a>
                <h1 style="margin: 10px 0 0 0; font-weight: 900; letter-spacing: -1px;">Academic Tracking</h1>
            </div>
            <div style="text-align: right">
                <div style="font-weight: 900; color: var(--primary);">KITERE PRO</div>
                <small style="color: #64748b; font-weight: 700;">OFFLINE CORE v2.0</small>
            </div>
        </div>

        <div class="card">
            <h3 style="margin-top: 0; text-transform: uppercase; font-size: 12px; letter-spacing: 2px; color: #64748b;">Subject Distribution</h3>
            
            <?php foreach($tracking_data as $data): 
                $total = $data['ee'] + $data['me'] + $data['ae'] + $data['be'];
                $p_ee = ($data['ee'] / $total) * 100;
                $p_me = ($data['me'] / $total) * 100;
                $p_ae = ($data['ae'] / $total) * 100;
                $p_be = ($data['be'] / $total) * 100;
            ?>
            <div class="track-row">
                <div style="font-weight: 800;"><?php echo $data['subject']; ?></div>
                <div class="bar-container">
                    <div class="bar-segment ee-bg" style="width: <?php echo $p_ee; ?>%"></div>
                    <div class="bar-segment me-bg" style="width: <?php echo $p_me; ?>%"></div>
                    <div class="bar-segment ae-bg" style="width: <?php echo $p_ae; ?>%"></div>
                    <div class="bar-segment be-bg" style="width: <?php echo $p_be; ?>%"></div>
                </div>
                <div style="font-weight: 900; text-align: right; color: #64748b;"><?php echo $total; ?> <small>LVL</small></div>
            </div>
            <?php endforeach; ?>

            <div class="legend">
                <span><span class="dot ee-bg"></span> EE</span>
                <span><span class="dot me-bg"></span> ME</span>
                <span><span class="dot ae-bg"></span> AE</span>
                <span><span class="dot be-bg"></span> BE</span>
            </div>
        </div>
    </div>
</body>
</html>