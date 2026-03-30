<?php
// include 'db_connect.php'; 

// Mock data for the Kitere Pro Faculty Registry
$teachers = [
    ['id' => 'TR/001', 'name' => 'Stephen Omondi', 'role' => 'Head Teacher', 'subject' => 'Mathematics', 'status' => 'On Duty'],
    ['id' => 'TR/002', 'name' => 'Mary Atieno', 'role' => 'Deputy Head', 'subject' => 'English', 'status' => 'On Duty'],
    ['id' => 'TR/003', 'name' => 'John Kamau', 'role' => 'Senior Teacher', 'subject' => 'Science', 'status' => 'On Leave'],
    ['id' => 'TR/004', 'name' => 'Grace Wambui', 'role' => 'Assistant Teacher', 'subject' => 'Kiswahili', 'status' => 'On Duty'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitere Pro | Faculty Directory</title>
    <style>
        :root { --primary: #8b5cf6; --slate-900: #0f172a; --slate-50: #f8fafc; }
        body { font-family: system-ui, sans-serif; background: var(--slate-50); margin: 0; padding: 20px; color: var(--slate-900); }
        .container { max-width: 1100px; margin: 0 auto; }
        
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .btn-add { background: var(--slate-900); color: white; padding: 12px 24px; border-radius: 12px; text-decoration: none; font-weight: 800; font-size: 13px; }

        /* Search Bar */
        .search-container { background: white; border: 1px solid #e2e8f0; border-radius: 15px; padding: 12px 20px; display: flex; align-items: center; gap: 12px; margin-bottom: 25px; }
        .search-container input { border: none; outline: none; width: 100%; font-weight: 600; font-size: 15px; }

        /* Staff Table */
        .card { background: white; border-radius: 25px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { background: #f1f5f9; padding: 18px 20px; font-size: 11px; font-weight: 800; text-transform: uppercase; color: #64748b; }
        td { padding: 18px 20px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 600; }
        
        .status-pill { padding: 4px 10px; border-radius: 8px; font-size: 10px; font-weight: 900; text-transform: uppercase; }
        .on-duty { background: #dcfce7; color: #166534; }
        .on-leave { background: #fef3c7; color: #92400e; }

        .actions a { color: var(--primary); text-decoration: none; margin-right: 15px; font-size: 12px; font-weight: 800; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1 style="margin: 0; font-weight: 900; letter-spacing: -1.5px;">Faculty <span style="color:var(--primary)">Directory</span></h1>
                <p style="color: #64748b; font-weight: 600; margin: 5px 0 0 0;">Kitere Primary School Staffing</p>
            </div>
            <a href="add_teacher.html" class="btn-add">+ Recruit Staff</a>
        </div>

        <div class="search-container">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" id="staffSearch" placeholder="Search by name, role, or ID..." onkeyup="filterStaff()">
        </div>

        <div class="card">
            <table id="staffTable">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Learning Area</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($teachers as $row): ?>
                    <tr>
                        <td style="color:var(--primary)"><?php echo $row['id']; ?></td>
                        <td><?php echo strtoupper($row['name']); ?></td>
                        <td style="color:#64748b;"><?php echo $row['role']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td>
                            <span class="status-pill <?php echo str_replace(' ', '-', strtolower($row['status'])); ?>">
                                <?php echo $row['status']; ?>
                            </span>
                        </td>
                        <td class="actions">
                            <a href="teacher_profile.php?id=<?php echo $row['id']; ?>">PROFILE</a>
                            <a href="#" style="color:#64748b;">EDIT</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function filterStaff() {
            let input = document.getElementById("staffSearch").value.toUpperCase();
            let tr = document.getElementById("staffTable").getElementsByTagName("tr");
            for (let i = 1; i < tr.length; i++) {
                let text = tr[i].textContent || tr[i].innerText;
                tr[i].style.display = text.toUpperCase().indexOf(input) > -1 ? "" : "none";
            }
        }
    </script>
</body>
</html>