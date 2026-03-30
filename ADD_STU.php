<?php
// include 'db_connect.php'; 

// Mock data for the Kitere Pro Student Registry
$students = [
    ['adm' => 'KPS/2026/001', 'name' => 'Benjamin Okoth', 'grade' => 'Grade 4', 'stream' => 'East', 'status' => 'Active'],
    ['adm' => 'KPS/2026/002', 'name' => 'Mercy Achieng', 'grade' => 'Grade 6', 'stream' => 'West', 'status' => 'Active'],
    ['adm' => 'KPS/2026/003', 'name' => 'John Musyoka', 'grade' => 'Grade 5', 'stream' => 'East', 'status' => 'Inactive'],
    ['adm' => 'KPS/2026/004', 'name' => 'Sarah Wanjiku', 'grade' => 'Grade 4', 'stream' => 'North', 'status' => 'Active'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitere Pro | Student Registry</title>
    <style>
        :root { --primary: #4f46e5; --slate-900: #0f172a; --slate-50: #f8fafc; }
        body { font-family: system-ui, sans-serif; background: var(--slate-50); margin: 0; padding: 20px; color: var(--slate-900); }
        .container { max-width: 1100px; margin: 0 auto; }
        
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .btn-add { background: var(--slate-900); color: white; padding: 12px 24px; border-radius: 12px; text-decoration: none; font-weight: 800; font-size: 13px; }

        /* Search Bar */
        .search-container { background: white; border: 1px solid #e2e8f0; border-radius: 15px; padding: 12px 20px; display: flex; align-items: center; gap: 12px; margin-bottom: 25px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .search-container input { border: none; outline: none; width: 100%; font-weight: 600; font-size: 15px; }

        /* Table */
        .card { background: white; border-radius: 25px; border: 1px solid #e2e8f0; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { background: #f1f5f9; padding: 18px 20px; font-size: 11px; font-weight: 800; text-transform: uppercase; color: #64748b; }
        td { padding: 18px 20px; border-bottom: 1px solid #f1f5f9; font-size: 14px; font-weight: 600; }
        
        .status-tag { padding: 4px 10px; border-radius: 8px; font-size: 10px; font-weight: 900; text-transform: uppercase; }
        .active { background: #dcfce7; color: #166534; }
        .inactive { background: #fee2e2; color: #991b1b; }

        .actions a { color: var(--primary); text-decoration: none; margin-right: 15px; font-size: 12px; font-weight: 800; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1 style="margin: 0; font-weight: 900; letter-spacing: -1.5px;">Student <span style="color:var(--primary)">Directory</span></h1>
                <p style="color: #64748b; font-weight: 600; margin: 5px 0 0 0;">Managing 2026 Enrollment</p>
            </div>
            <a href="add_student.html" class="btn-add">+ Register New Learner</a>
        </div>

        <div class="search-container">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" id="studentSearch" placeholder="Find by name or ADM number..." onkeyup="searchTable()">
        </div>

        <div class="card">
            <table id="studentTable">
                <thead>
                    <tr>
                        <th>ADM No</th>
                        <th>Full Name</th>
                        <th>Grade</th>
                        <th>Stream</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $row): ?>
                    <tr>
                        <td style="color:var(--primary)"><?php echo $row['adm']; ?></td>
                        <td><?php echo strtoupper($row['name']); ?></td>
                        <td><?php echo $row['grade']; ?></td>
                        <td><?php echo $row['stream']; ?></td>
                        <td>
                            <span class="status-tag <?php echo strtolower($row['status']); ?>">
                                <?php echo $row['status']; ?>
                            </span>
                        </td>
                        <td class="actions">
                            <a href="student_profile.php?id=<?php echo $row['adm']; ?>">VIEW</a>
                            <a href="edit_student.php?id=<?php echo $row['adm']; ?>" style="color:#64748b;">EDIT</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function searchTable() {
            let input = document.getElementById("studentSearch").value.toUpperCase();
            let tr = document.getElementById("studentTable").getElementsByTagName("tr");
            for (let i = 1; i < tr.length; i++) {
                let text = tr[i].textContent || tr[i].innerText;
                tr[i].style.display = text.toUpperCase().indexOf(input) > -1 ? "" : "none";
            }
        }
    </script>
</body>
</html>