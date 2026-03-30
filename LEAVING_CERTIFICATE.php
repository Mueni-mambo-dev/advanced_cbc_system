<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strtoupper($_POST['student_name']);
    $adm = strtoupper($_POST['adm_no']);
    $exit_date = date('d F, Y', strtotime($_POST['exit_date']));
    $activities = $_POST['activities'];
    $remarks = $_POST['remarks'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate - <?php echo $name; ?></title>
    <style>
        body { background: #525659; display: flex; justify-content: center; padding: 50px 0; margin: 0; }
        
        /* Certificate Page Styling */
        .certificate {
            width: 800px;
            height: 1050px;
            background: white;
            padding: 60px;
            box-sizing: border-box;
            position: relative;
            border: 20px solid #1e293b; /* Outer Border */
            outline: 5px solid #94a3b8; /* Inner Border */
            outline-offset: -15px;
            text-align: center;
            font-family: "Times New Roman", Times, serif;
        }

        .header h2 { font-size: 28px; margin-bottom: 5px; text-transform: uppercase; }
        .header h3 { font-size: 18px; color: #475569; margin-top: 0; letter-spacing: 2px; }
        
        .seal { margin: 30px 0; color: #1e293b; }
        
        .title { font-size: 45px; font-weight: bold; color: #1e293b; margin: 40px 0; text-transform: uppercase; border-bottom: 2px solid #1e293b; display: inline-block; padding: 0 30px; }
        
        .content { text-align: left; font-size: 18px; line-height: 2; margin-top: 40px; }
        .field { border-bottom: 1px solid #000; font-weight: bold; padding: 0 10px; }
        
        .footer { margin-top: 80px; display: flex; justify-content: space-between; align-items: flex-end; }
        .sign-block { text-align: center; width: 200px; }
        .sign-line { border-top: 1px solid #000; margin-top: 50px; padding-top: 10px; font-weight: bold; font-size: 14px; text-transform: uppercase; }

        @media print {
            body { background: white; padding: 0; }
            .btn-print { display: none; }
        }

        .btn-print { position: fixed; top: 20px; right: 20px; background: #10b981; color: white; border: none; padding: 15px 30px; border-radius: 10px; font-weight: 900; cursor: pointer; box-shadow: 0 10px 15px rgba(0,0,0,0.2); }
    </style>
</head>
<body>

    <button class="btn-print" onclick="window.print()">PRINT CERTIFICATE</button>

    <div class="certificate">
        <div class="header">
            <div class="seal">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 2v20M2 12h20"></path>
                    <path d="M12 12l8-8M12 12l-8 8M12 12l8 8M12 12l-8-8"></path>
                </svg>
            </div>
            <h2>Kitere Primary School</h2>
            <h3>P.O. BOX 123, KITERE - KENYA</h3>
        </div>

        <div class="title">School Leaving Certificate</div>

        <div class="content">
            This is to certify that <span class="field"><?php echo $name; ?></span> 
            Admission Number <span class="field"><?php echo $adm; ?></span> has 
            this day <span class="field"><?php echo $exit_date; ?></span> completed the 
            prescribed course of instruction at this institution.
            <br><br>
            <b>Co-curricular Activities:</b><br>
            <span class="field" style="display:block; min-height:40px;"><?php echo $activities; ?></span>
            <br>
            <b>Headteacher's Remarks:</b><br>
            <span class="field" style="display:block; min-height:60px;"><?php echo $remarks; ?></span>
        </div>

        <div class="footer">
            <div class="sign-block">
                <div class="sign-line">School Official Stamp</div>
            </div>
            <div class="sign-block">
                <div class="sign-line">Headteacher's Signature</div>
            </div>
        </div>
        
        <p style="margin-top: 50px; font-size: 12px; color: #94a3b8;">Issued by Kitere Pro Management System 2026</p>
    </div>

</body>
</html>
<?php } ?>