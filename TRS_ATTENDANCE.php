<?php
// Kitere Pro - Teacher Attendance Logic
$current_date = date('l, jS F Y');
$staff_list = [
    ['id' => 'TR/001', 'name' => 'Stephen Omondi', 'role' => 'Head Teacher', 'initials' => 'SO'],
    ['id' => 'TR/002', 'name' => 'Mary Atieno', 'role' => 'Deputy Head', 'initials' => 'MA'],
    ['id' => 'TR/003', 'name' => 'John Kamau', 'role' => 'Senior Teacher', 'initials' => 'JK'],
    ['id' => 'TR/004', 'name' => 'Grace Wambui', 'role' => 'Assistant Teacher', 'initials' => 'GW'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitere Pro | Modern Attendance</title>
    <style>
        :root { --primary: #0891b2; --bg: #f0f9ff; --slate-900: #0f172a; }
        body { font-family: 'Inter', system-ui, sans-serif; background-color: var(--bg); color: var(--slate-900); margin: 0; padding: 40px; }
        .container { max-width: 900px; margin: 0 auto; }
        
        .header-section { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 40px; }
        .header-section h1 { font-size: 2.2rem; font-weight: 900; letter-spacing: -1.5px; margin: 0; }
        .date-badge { background: white; padding: 10px 20px; border-radius: 12px; font-weight: 800; font-size: 13px; color: var(--primary); border: 1px solid #bae6fd; }

        /* Search Bar Styling */
        .search-container { position: relative; margin-bottom: 30px; }
        .search-input { width: 100%; padding: 18px 25px 18px 55px; border-radius: 20px; border: 2px solid #bae6fd; background: white; font-size: 15px; font-weight: 600; outline: none; transition: 0.3s; box-sizing: border-box; }
        .search-input:focus { border-color: var(--primary); box-shadow: 0 0 0 4px rgba(8, 145, 178, 0.1); }
        .search-icon { position: absolute; left: 20px; top: 50%; transform: translateY(-50%); opacity: 0.5; }

        /* Attendance Cards */
        .att-card { background: white; border-radius: 24px; padding: 20px; margin-bottom: 15px; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; transition: 0.2s; }
        .att-card:hover { border-color: var(--primary); transform: translateX(5px); }
        
        .staff-info { display: flex; align-items: center; gap: 15px; }
        .avatar { width: 48px; height: 48px; background: #e0f2fe; color: var(--primary); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 14px; }
        .staff-details b { display: block; font-size: 15px; text-transform: uppercase; letter-spacing: 0.5px; }
        .staff-details span { font-size: 12px; color: #64748b; font-weight: 600; }

        /* Modern Toggle Selectors */
        .status-picker { display: flex; background: #f1f5f9; padding: 5px; border-radius: 15px; gap: 5px; }
        .status-picker input { display: none; }
        .status-picker label { padding: 8px 16px; border-radius: 10px; font-size: 11px; font-weight: 900; cursor: pointer; transition: 0.2s; color: #94a3b8; }
        
        .p-btn:checked + label { background: #dcfce7; color: #166534; }
        .a-btn:checked + label { background: #fee2e2; color: #991b1b; }
        .l-btn:checked + label { background: #fef3c7; color: #92400e; }

        .btn-submit { display: block; width: 100%; background: var(--slate-900); color: white; padding: 20px; border-radius: 18px; border: none; font-weight: 900; text-transform: uppercase; letter-spacing: 2px; cursor: pointer; margin-top: 30px; transition: 0.3s; }
        .btn-submit:hover { background: var(--primary); transform: scale(1.01); }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <div>
            <h1>Staff <span style="color:var(--primary)">Roll Call</span></h1>
            <p style="font-weight:700; color:#64748b; margin: 5px 0 0 0;">Kitere Pro Attendance Terminal</p>
        </div>
        <div class="date-badge"><?php echo $current_date; ?></div>
    </div>

    <div class="search-container">
        <svg class="search-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        <input type="text" id="staffFilter" class="search-input" placeholder="Search teacher by name or ID..." onkeyup="filterStaff()">
    </div>

    <form action="save_attendance.php" method="POST">
        <div id="staffList">
            <?php foreach($staff_list as $tr): ?>
            <div class="att-card">
                <div class="staff-info">
                    <div class="avatar"><?php echo $tr['initials']; ?></div>
                    <div class="staff-details">
                        <b><?php echo $tr['name']; ?></b>
                        <span><?php echo $tr['id']; ?> • <?php echo $tr['role']; ?></span>
                    </div>
                </div>
                
                <div class="status-picker">
                    <input type="radio" name="status[<?php echo $tr['id']; ?>]" value="Present" id="p-<?php echo $tr['id']; ?>" class="p-btn" checked>
                    <label for="p-<?php echo $tr['id']; ?>">PRESENT</label>

                    <input type="radio" name="status[<?php echo $tr['id']; ?>]" value="Absent" id="a-<?php echo $tr['id']; ?>" class="a-btn">
                    <label for="a-<?php echo $tr['id']; ?>">ABSENT</label>

                    <input type="radio" name="status[<?php echo $tr['id']; ?>]" value="Leave" id="l-<?php echo $tr['id']; ?>" class="l-btn">
                    <label for="l-<?php echo $tr['id']; ?>">LEAVE</label>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn-submit">Save Daily Log</button>
    </form>
</div>

<script>
    function filterStaff() {
        let input = document.getElementById("staffFilter").value.toUpperCase();
        let cards = document.getElementsByClassName("att-card");
        for (let i = 0; i < cards.length; i++) {
            let text = cards[i].innerText || cards[i].textContent;
            cards[i].style.display = text.toUpperCase().indexOf(input) > -1 ? "" : "none";
        }
    }
</script>

</body>
</html>