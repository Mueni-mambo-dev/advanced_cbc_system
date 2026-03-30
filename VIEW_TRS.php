<?php
// include 'db_connect.php'; 

// Mock data for Kitere Primary Faculty
$teachers = [
    ['id' => 'TSC/4421', 'name' => 'Stephen Omondi', 'role' => 'Head Teacher', 'dept' => 'Administration', 'phone' => '0712 345 678', 'initials' => 'SO'],
    ['id' => 'TSC/8892', 'name' => 'Mary Atieno', 'role' => 'Deputy Head', 'dept' => 'Languages', 'phone' => '0722 987 654', 'initials' => 'MA'],
    ['id' => 'TSC/3310', 'name' => 'John Kamau', 'role' => 'Senior Teacher', 'dept' => 'Science', 'phone' => '0733 111 222', 'initials' => 'JK'],
    ['id' => 'TSC/5567', 'name' => 'Grace Wambui', 'role' => 'Assistant Teacher', 'dept' => 'Humanities', 'phone' => '0700 444 555', 'initials' => 'GW'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitere Pro | Faculty Hub</title>
    <style>
        :root { --primary: #7c3aed; --bg: #f5f3ff; --text: #1e1b4b; }
        body { font-family: 'Inter', system-ui, sans-serif; background-color: var(--bg); color: var(--text); margin: 0; padding: 40px; }
        .container { max-width: 1200px; margin: 0 auto; }
        
        .header-flex { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
        .header-flex h1 { font-size: 2.2rem; font-weight: 900; letter-spacing: -1.5px; margin: 0; }

        /* Advanced Search Bar */
        .search-wrapper { position: relative; margin-bottom: 30px; }
        .search-bar { width: 100%; padding: 18px 25px 18px 55px; border-radius: 20px; border: 2px solid #ddd6fe; background: white; font-size: 16px; font-weight: 600; outline: none; transition: 0.3s; box-sizing: border-box; }
        .search-bar:focus { border-color: var(--primary); box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.1); }
        .search-icon { position: absolute; left: 20px; top: 50%; transform: translateY(-50%); opacity: 0.4; }

        /* Teacher Grid Layout */
        .tr-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px; }
        .tr-card { background: white; border-radius: 24px; padding: 30px; border: 1px solid #ddd6fe; transition: 0.3s; position: relative; overflow: hidden; }
        .tr-card:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px rgba(124, 58, 237, 0.1); border-color: var(--primary); }
        
        /* Avatar Style */
        .tr-avatar { width: 60px; height: 60px; background: var(--primary); color: white; border-radius: 18px; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.2rem; margin-bottom: 20px; }
        
        .tr-name { font-size: 1.1rem; font-weight: 800; text-transform: uppercase; margin: 0; }
        .tr-role { font-size: 13px; color: #6d28d9; font-weight: 700; margin-top: 4px; }
        
        .tr-meta { margin-top: 20px; padding-top: 20px; border-top: 1px dashed #ddd6fe; display: flex; flex-direction: column; gap: 8px; }
        .meta-item { font-size: 12px; font-weight: 600; color: #64748b; display: flex; align-items: center; gap: 8px; }

        .btn-view { display: block; width: 100%; text-align: center; background: #f5f3ff; color: var(--primary); padding: 12px; border-radius: 12px; text-decoration: none; font-weight: 800; font-size: 12px; margin-top: 20px; transition: 0.2s; }
        .btn-view:hover { background: var(--primary); color: white; }

        @media print { .no-print { display: none; } }
    </style>
</head>
<body>

    <div class="container">
        <div class="header-flex">
            <div>
                <h1>Faculty <span style="color:var(--primary)">Directory</span></h1>
                <p style="font-weight: 700; color: #6d28d9; margin-top: 5px;">Kitere Primary School Staff Registry</p>
            </div>
            <a href="add_teacher.html" class="no-print" style="background:var(--text); color:white; padding:12px 24px; border-radius:14px; text-decoration:none; font-weight:800; font-size:14px;">+ Register Staff</a>
        </div>

        <div class="search-wrapper">
            <svg class="search-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" id="trSearch" class="search-bar" placeholder="Search by name, department, or TSC ID..." onkeyup="filterTrs()">
        </div>

        <div class="tr-grid" id="trGrid">
            <?php foreach($teachers as $tr): ?>
            <div class="tr-card">
                <div class="tr-avatar"><?php echo $tr['initials']; ?></div>
                <h3 class="tr-name"><?php echo $tr['name']; ?></h3>
                <div class="tr-role"><?php echo $tr['role']; ?></div>
                
                <div class="tr-meta">
                    <div class="meta-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        ID: <?php echo $tr['id']; ?>
                    </div>
                    <div class="meta-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                        DEPT: <?php echo $tr['dept']; ?>
                    </div>
                </div>

                <a href="teacher_profile.php?id=<?php echo $tr['id']; ?>" class="btn-view">VIEW PROFILE</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        function filterTrs() {
            let input = document.getElementById("trSearch").value.toUpperCase();
            let cards = document.getElementsByClassName("tr-card");
            for (let i = 0; i < cards.size; i++) {
                let text = cards[i].innerText || cards[i].textContent;
                cards[i].style.display = text.toUpperCase().indexOf(input) > -1 ? "" : "none";
            }
        }
    </script>
</body>
</html>