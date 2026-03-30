<?php
// Kitere Pro - Attendance Analytics Logic
$working_days = 22; // Total school days in the current month
$month_name = "March 2026";

$reports = [
    ['id' => 'TR/001', 'name' => 'Stephen Omondi', 'role' => 'Head Teacher', 'present' => 22, 'absent' => 0, 'leave' => 0],
    ['id' => 'TR/002', 'name' => 'Mary Atieno', 'role' => 'Deputy Head', 'present' => 20, 'absent' => 1, 'leave' => 1],
    ['id' => 'TR/003', 'name' => 'John Kamau', 'role' => 'Senior Teacher', 'present' => 16, 'absent' => 4, 'leave' => 2],
    ['id' => 'TR/004', 'name' => 'Grace Wambui', 'role' => 'Assistant Teacher', 'present' => 21, 'absent' => 1, 'leave' => 0],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitere Pro | Attendance Report</title>
    <style>
        :root { --primary: #0891b2; --bg: #f8fafc; --slate-900: #0f172a; }
        body { font-family: 'Inter', system-ui, sans-serif; background-color: var(--bg); color: var(--slate-900); margin: 0; padding: 40px; }
        .container { max-width: 1100px; margin: 0 auto; }
        
        .top-nav { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
        .top-nav h1 { font-size: 2.2rem; font-weight: 900; letter-spacing: -1.5px; margin: 0; }
        
        /* Summary Cards */
        .stats-overview { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px; }
        .s-card { background: white; padding: 25px; border-radius: 24px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .s-card small { font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 1px; }
        .s-card div { font-size: 1.8rem; font-weight: 900; margin-top: 5px; color: var(--primary); }

        /* Report Table */
        .report-box { background: white; border-radius: 28px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { background: #f1f5f9; padding: 20px; font-size: 11px; font-weight: 800; text-transform: uppercase; color: #64748b; letter-spacing: 0.5px; }
        td { padding: 20px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 600; }

        /* Visual Progress Bar */
        .progress-wrapper { width: 100%; display: flex; align-items: center; gap: 15px; }
        .bar-bg { flex: 1; height: 10px; background: #f1f5f9; border-radius: 20px; overflow: hidden; }
        .bar-fill { height: 100%; border-radius: 20px; transition: width 0.8s ease-in-out; }
        .percent-text { font-size: 13px; font-weight: 900; min-width: 45px; }

        /* Status Pills */
        .badge { padding: 5px 12px; border-radius: 10px; font-size: 11px; font-weight: 800; }
        .badge-p { background: #dcfce7; color: #15803d; }
        .badge-a { background: #fee2e2; color: #b91c1c; }
        .badge-l { background: #fef3c7; color: #a16207; }

        .btn-print { background: var(--slate-900); color: white; border: none; padding: 12px 25px; border-radius: 14px; font-weight: 800; cursor: pointer; transition: 0.3s; }
        .btn-print:hover { background: var(--primary); }

        @media print { .no-print { display: none; } body { padding: 0; background: white; } .report-box { border: none; box-shadow: none; } }
    </style>
</head>
<body>

<div class="container">
    <div class="top-nav">
        <div>
            <h1>Attendance <span style="color:var(--primary)">Analytics</span></h1>
            <p style="font-weight:700; color:#64748b; margin:5px 0 0 0;">Kitere Primary School • <?php echo $month_name; ?></p>
        </div>
        <button class="btn-print no-print" onclick="window.print()">Export Report (PDF)</button>
    </div>

    <div class="stats-overview">
        <div class="s-card"><small>Avg. Consistency</small><div>92.4%</div></div>
        <div class="s-card"><small>Total Work Days</small><div><?php echo $working_days; ?></div></div>
        <div class="s-card"><small>Staff on Leave</small><div style="color:#a16207">2</div></div>
    </div>

    <div class="report-box">
        <table>
            <thead>
                <tr>
                    <th>Teacher Name</th>
                    <th>P</th>
                    <th>A</th>
                    <th>L</th>
                    <th style="width: 250px;">Consistency Rate</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($reports as $row): 
                    $percent = round(($row['present'] / $working_days) * 100);
                    $color = ($percent >= 90) ? '#10b981' : (($percent >= 75) ? '#f59e0b' : '#ef4444');
                ?>
                <tr>
                    <td>
                        <div style="font-weight: 900; letter-spacing: -0.3px;"><?php echo strtoupper($row['name']); ?></div>
                        <div style="font-size: 11px; color:#94a3b8;"><?php echo $row['id']; ?> • <?php echo $row['role']; ?></div>
                    </td>
                    <td><span class="badge badge-p"><?php echo $row['present']; ?></span></td>
                    <td><span class="badge badge-a"><?php echo $row['absent']; ?></span></td>
                    <td><span class="badge badge-l"><?php echo $row['leave']; ?></span></td>
                    <td>
                        <div class="progress-wrapper">
                            <div class="bar-bg">
                                <div class="bar-fill" style="width: <?php echo $percent; ?>%; background: <?php echo $color; ?>;"></div>
                            </div>
                            <span class="percent-text" style="color: <?php echo $color; ?>;"><?php echo $percent; ?>%</span>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>