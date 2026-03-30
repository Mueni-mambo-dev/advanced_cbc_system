<?php
/**
 * Kitere Pro - School Management System
 * Core Dashboard Logic
 */

// 1. System Configuration
$school_name = "Kitere Primary School";
$admin_name = "Administrator"; // This would typically come from $_SESSION['user']
$current_time = date('H');

// 2. Dynamic Greeting Logic
if ($current_time < 12) {
    $greeting = "Good Morning";
} elseif ($current_time < 17) {
    $greeting = "Good Afternoon";
} else {
    $greeting = "Good Evening";
}

// 3. Mock Data (Replace these with SQL Queries)
// Example: $total_students = $conn->query("SELECT COUNT(*) FROM learners")->fetch_column();
$total_students = 482;
$attendance_rate = 94.2;
$fee_target = 2500000;
$fee_collected = 1700000;
$collection_percent = ($fee_collected / $fee_target) * 100;

// 4. Navigation Structure
$modules = [
    ['title' => 'Enter Marks', 'link' => 'enter_marks.php', 'icon' => '✍️', 'desc' => 'Submit CBC assessment scores.'],
    ['title' => 'View Marks',  'link' => 'view_marks.php',  'icon' => '📊', 'desc' => 'Analyze termly performance.'],
    ['title' => 'Rankings',    'link' => 'rankings.php',    'icon' => '🏆', 'desc' => 'Generate official merit lists.'],
    ['title' => 'Registry',    'link' => 'student_profile.php', 'icon' => '👤', 'desc' => 'Manage learner biodata.'],
    ['title' => 'Fees',        'link' => 'fees.php',        'icon' => '💰', 'desc' => 'Track payments and arrears.'],
    ['title' => 'Timetable',   'link' => 'timetable.php',   'icon' => '📅', 'desc' => 'Review class schedules.'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitere Pro | Dashboard</title>
    <style>
        :root {
            --primary: #4f46e5;
            --slate-50: #f8fafc;
            --slate-200: #e2e8f0;
            --slate-700: #334155;
            --slate-900: #0f172a;
            --white: #ffffff;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--slate-50);
            color: var(--slate-900);
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Navigation */
        .sidebar {
            width: 260px;
            background-color: var(--slate-900);
            color: var(--white);
            display: flex;
            flex-direction: column;
            padding: 30px 20px;
            position: fixed;
            height: 100vh;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 50px;
            padding-left: 10px;
        }

        .logo-square {
            width: 35px;
            height: 35px;
            background: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #94a3b8;
            text-decoration: none;
            font-weight: 600;
            border-radius: 12px;
            transition: 0.2s;
            margin-bottom: 5px;
        }

        .nav-link:hover, .nav-link.active {
            background-color: var(--primary);
            color: var(--white);
        }

        /* Main Viewport */
        .main {
            margin-left: 260px;
            flex: 1;
            padding: 40px 50px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .greeting h1 { font-size: 1.8rem; font-weight: 900; margin: 0; letter-spacing: -1px; }
        .greeting p { color: var(--slate-700); font-weight: 600; margin: 5px 0 0 0; }

        /* KPI Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 50px;
        }

        .stat-card {
            background: var(--white);
            padding: 25px;
            border-radius: 24px;
            border: 1px solid var(--slate-200);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }

        .stat-card label { font-size: 11px; font-weight: 800; color: #64748b; text-transform: uppercase; }
        .stat-card .val { font-size: 2rem; font-weight: 900; display: block; margin: 10px 0; }

        /* Progress Bar for Fees */
        .progress-bg { height: 8px; background: var(--slate-200); border-radius: 10px; overflow: hidden; }
        .progress-fill { height: 100%; background: var(--primary); border-radius: 10px; }

        /* Module Grid */
        .module-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .module-card {
            background: var(--white);
            padding: 25px;
            border-radius: 20px;
            border: 1px solid var(--slate-200);
            text-decoration: none;
            color: var(--slate-900);
            transition: 0.3s;
        }

        .module-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.1);
        }

        .icon-box {
            width: 45px;
            height: 45px;
            background: var(--slate-50);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="logo-area">
            <div class="logo-square">K</div>
            <span style="font-weight:900; font-size:1.2rem;">KITERE PRO</span>
        </div>
        
        <nav>
            <a href="dashboard.php" class="nav-link active">Dashboard</a>
            <a href="student_profile.php" class="nav-link">Learner Registry</a>
            <a href="fees.php" class="nav-link">Finance Hub</a>
            <a href="rankings.php" class="nav-link">Merit Lists</a>
        </nav>
    </aside>

    <main class="main">
        <header class="header">
            <div class="greeting">
                <h1><?php echo $greeting; ?>, <?php echo $admin_name; ?></h1>
                <p><?php echo date('l, jS F Y'); ?> • <?php echo $school_name; ?></p>
            </div>
            <div style="font-weight:800; color:var(--primary); font-size:12px;">SYSTEM v2.6 ACTIVE</div>
        </header>

        <section class="stats-grid">
            <div class="stat-card">
                <label>Total Enrollment</label>
                <span class="val"><?php echo number_format($total_students); ?></span>
                <span style="font-size:12px; color:#10b981; font-weight:700;">Learners Verified</span>
            </div>
            <div class="stat-card">
                <label>Daily Attendance</label>
                <span class="val"><?php echo $attendance_rate; ?>%</span>
                <span style="font-size:12px; color:var(--primary); font-weight:700;">Above Regional Avg</span>
            </div>
            <div class="stat-card">
                <label>Fee Collection (<?php echo round($collection_percent); ?>%)</label>
                <span class="val">Ksh <?php echo number_format($fee_collected / 1000, 1); ?>M</span>
                <div class="progress-bg">
                    <div class="progress-fill" style="width: <?php echo $collection_percent; ?>%"></div>
                </div>
            </div>
        </section>

        <h2 style="font-size: 1.2rem; font-weight: 900; margin-bottom: 25px;">Management Modules</h2>
        
        <section class="module-grid">
            <?php foreach($modules as $m): ?>
            <a href="<?php echo $m['link']; ?>" class="module-card">
                <div class="icon-box"><?php echo $m['icon']; ?></div>
                <div style="font-weight:900; margin-bottom:5px;"><?php echo $m['title']; ?></div>
                <div style="font-size:12px; color:#64748b;"><?php echo $m['desc']; ?></div>
            </a>
            <?php endforeach; ?>
        </section>
    </main>

</body>
</html>