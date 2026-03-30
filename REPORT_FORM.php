<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // In a live system, you would fetch these from your DB based on $_POST['student_id']
    $name = "BENJAMIN OKOTH";
    $adm = "KPS/2026/042";
    $grade = "Grade 4 East";
    $attendance = "64 / 66 Days";

    $subjects = [
        ['area' => 'Mathematics', 'level' => 'EE', 'remarks' => 'Exceptional ability in numerical logic.'],
        ['area' => 'English Language', 'level' => 'ME', 'remarks' => 'Good command of grammar and creative writing.'],
        ['area' => 'Kiswahili', 'level' => 'ME', 'remarks' => 'Anatambua msamiati wa kimsingi vyema.'],
        ['area' => 'Science & Tech', 'level' => 'EE', 'remarks' => 'Very active in environmental projects.'],
        ['area' => 'Creative Arts', 'level' => 'AE', 'remarks' => 'Developing skills in color mixing.'],
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report Card - <?php echo $adm; ?></title>
    <style>
        body { background: #cbd5e1; margin: 0; padding: 20px; font-family: "Times New Roman", Times, serif; }
        .report-sheet { background: white; width: 210mm; min-height: 297mm; margin: 0 auto; padding: 20mm; box-sizing: border-box; box-shadow: 0 0 20px rgba(0,0,0,0.2); position: relative; }
        
        .header { text-align: center; border-bottom: 3px double #000; padding-bottom: 15px; margin-bottom: 20px; }
        .school-name { font-size: 26px; font-weight: bold; text-transform: uppercase; margin: 0; }
        
        .student-info { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; font-size: 14px; }
        .info-box { border: 1px solid #000; padding: 10px; }

        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 10px; text-align: left; font-size: 13px; }
        th { background: #f1f5f9; text-transform: uppercase; }

        .cbc-key { font-size: 11px; margin-top: 20px; border: 1px solid #000; padding: 10px; }
        .footer { margin-top: 40px; display: grid; grid-template-columns: 1fr 1fr; gap: 50px; }
        .sign-area { border-top: 1px solid #000; text-align: center; padding-top: 5px; font-size: 12px; font-weight: bold; }

        @media print {
            body { background: white; padding: 0; }
            .report-sheet { box-shadow: none; margin: 0; width: 100%; }
            .no-print { display: none; }
        }
        .no-print { position: fixed; top: 20px; right: 20px; background: #1e293b; color: white; border: none; padding: 12px 24px; border-radius: 8px; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>

    <button class="no-print" onclick="window.print()">PRINT REPORT CARD</button>

    <div class="report-sheet">
        <div class="header">
            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="1.5" style="margin-bottom:10px;"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
            <div class="school-name">Kitere Primary School</div>
            <div style="font-size: 14px; font-weight: bold;">Learner's Terminal Assessment Report</div>
            <div style="font-size: 12px;">P.O. BOX 123, KITERE | Academic Year 2026</div>
        </div>

        <div class="student-info">
            <div class="info-box">
                <b>NAME:</b> <?php echo $name; ?><br>
                <b>ADM NO:</b> <?php echo $adm; ?>
            </div>
            <div class="info-box">
                <b>GRADE:</b> <?php echo $grade; ?><br>
                <b>ATTENDANCE:</b> <?php echo $attendance; ?>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 30%;">Learning Area</th>
                    <th style="width: 15%;">Level</th>
                    <th>Teacher's Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($subjects as $s): ?>
                <tr>
                    <td><b><?php echo $s['area']; ?></b></td>
                    <td style="text-align:center;"><b><?php echo $s['level']; ?></b></td>
                    <td><?php echo $s['remarks']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div style="margin-bottom: 20px;">
            <b>Headteacher's General Remarks:</b>
            <div style="border-bottom: 1px dashed #000; padding: 10px 0;">
                A very disciplined and hardworking learner. Keep up the excellent spirit.
            </div>
        </div>

        <div class="cbc-key">
            <b>PERFORMANCE KEY:</b><br>
            <b>EE:</b> Exceeding Expectation | <b>ME:</b> Meeting Expectation | 
            <b>AE:</b> Approaching Expectation | <b>BE:</b> Below Expectation
        </div>

        <div class="footer">
            <div class="sign-area">Class Teacher's Signature</div>
            <div class="sign-area">Headteacher's Signature & Stamp</div>
        </div>
    </div>

</body>
</html>
<?php } ?>