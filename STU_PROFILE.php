<?php
// Kitere Pro - Student Profile Logic
// In production, you would use: $id = $_GET['id']; and fetch from MySQL
$student = [
    'adm_no'    => 'KPS/2026/0402',
    'name'      => 'Benjamin Okoth',
    'grade'     => 'Grade 4 East',
    'house'     => 'Chui (Green)',
    'dob'       => '12th May 2015',
    'gender'    => 'Male',
    'status'    => 'Active',
    'performance' => 'Exceeding Expectations (EE)',
    'attendance'  => '98%',
    'guardian'  => 'Samuel Okoth',
    'contact'   => '+254 712 345 678',
    'residence' => 'Kitere, Rongo',
];

// Helper for initial avatar
$initial = substr($student['name'], 0, 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitere Pro | <?php echo $student['name']; ?></title>
    <style>
        /* Modern CSS Reset & Variable Definitions */
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --success: #10b981;
            --slate-50: #f8fafc;
            --slate-200: #e2e8f0;
            --slate-600: #475569;
            --slate-900: #0f172a;
            --shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--slate-50);
            color: var(--slate-900);
            margin: 0;
            padding: 40px 20px;
            line-height: 1.5;
        }

        .container { max-width: 1000px; margin: 0 auto; }

        /* Navigation Header */
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .back-btn {
            text-decoration: none;
            color: var(--slate-600);
            font-weight: 800;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .print-btn {
            background: var(--slate-900);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s;
        }

        .print-btn:hover { background: var(--primary); }

        /* Profile Card Structure */
        .profile-card {
            background: white;
            border-radius: 32px;
            border: 1px solid var(--slate-200);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .profile-banner {
            height: 140px;
            background: linear-gradient(135deg, var(--primary) 0%, #7c3aed 100%);
            position: relative;
        }

        .profile-avatar {
            width: 130px;
            height: 130px;
            background: white;
            border: 6px solid white;
            border-radius: 35px;
            position: absolute;
            bottom: -65px;
            left: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: 900;
            color: var(--primary);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }

        .profile-content {
            padding: 80px 50px 50px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 50px;
        }

        /* Identity Section */
        .identity h1 {
            font-size: 2.2rem;
            font-weight: 900;
            margin: 0;
            letter-spacing: -1.5px;
        }

        .status-badge {
            display: inline-block;
            margin-top: 8px;
            padding: 4px 12px;
            background: #dcfce7;
            color: #15803d;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
        }

        /* Data Grids */
        .section-label {
            display: block;
            font-size: 11px;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin: 35px 0 15px;
            border-bottom: 1px solid var(--slate-200);
            padding-bottom: 8px;
        }

        .data-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .data-item label {
            display: block;
            font-size: 12px;
            color: var(--slate-600);
            font-weight: 600;
            margin-bottom: 4px;
        }

        .data-item span {
            font-size: 15px;
            font-weight: 800;
        }

        /* Sidebar stats */
        .stats-panel {
            background: var(--slate-50);
            padding: 30px;
            border-radius: 24px;
            border: 1px solid var(--slate-200);
        }

        .stat-box { margin-bottom: 25px; }
        .stat-box:last-child { margin-bottom: 0; }
        .stat-box label { font-size: 10px; font-weight: 900; color: #64748b; text-transform: uppercase; }
        .stat-box p { font-size: 1.1rem; font-weight: 900; margin: 5px 0 0; color: var(--primary); }

        /* Print Settings */
        @media print {
            .no-print { display: none; }
            body { padding: 0; background: white; }
            .profile-card { border: none; box-shadow: none; }
            .profile-banner { -webkit-print-color-adjust: exact; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="top-nav no-print">
        <a href="students.php" class="back-btn">← Learners List</a>
        <button class="print-btn" onclick="window.print()">Print Report</button>
    </div>

    <div class="profile-card">
        <div class="profile-banner">
            <div class="profile-avatar"><?php echo $initial; ?></div>
        </div>

        <div class="profile-content">
            <div class="main-details">
                <div class="identity">
                    <h1><?php echo strtoupper($student['name']); ?></h1>
                    <span class="status-badge"><?php echo $student['status']; ?> Learner</span>
                </div>

                <span class="section-label">Bio Data</span>
                <div class="data-grid">
                    <div class="data-item"><label>Admission No</label><span><?php echo $student['adm_no']; ?></span></div>
                    <div class="data-item"><label>Current Grade</label><span><?php echo $student['grade']; ?></span></div>
                    <div class="data-item"><label>Date of Birth</label><span><?php echo $student['dob']; ?></span></div>
                    <div class="data-item"><label>Gender</label><span><?php echo $student['gender']; ?></span></div>
                    <div class="data-item"><label>School House</label><span><?php echo $student['house']; ?></span></div>
                </div>

                <span class="section-label">Guardian Information</span>
                <div class="data-grid">
                    <div class="data-item"><label>Parent Name</label><span><?php echo $student['guardian']; ?></span></div>
                    <div class="data-item"><label>Primary Contact</label><span><?php echo $student['contact']; ?></span></div>
                    <div class="data-item" style="grid-column: span 2;"><label>Residential Area</label><span><?php echo $student['residence']; ?></span></div>
                </div>
            </div>

            <div class="sidebar">
                <div class="stats-panel">
                    <div class="stat-box">
                        <label>CBC Standing</label>
                        <p><?php echo $student['performance']; ?></p>
                    </div>
                    <div class="stat-box">
                        <label>Attendance Rate</label>
                        <p style="color: var(--success);"><?php echo $student['attendance']; ?></p>
                    </div>
                    <div class="stat-box">
                        <label>Term 1 Fee Status</label>
                        <p style="color: #b45309;">Ksh 2,500 Balance</p>
                    </div>
                </div>

                <div style="margin-top: 30px; padding: 20px; background: #fffbeb; border-radius: 18px; border: 1px solid #fef3c7;">
                    <label style="font-size: 10px; font-weight: 900; color: #b45309; text-transform: uppercase;">Teacher's Remark</label>
                    <p style="font-size: 13px; font-weight: 600; color: #92400e; margin: 5px 0 0;">Student is highly disciplined and active in Mathematics club.</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>