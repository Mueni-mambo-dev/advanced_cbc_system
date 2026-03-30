<?php
$conn = new mysqli("localhost", "root", "", "your_db_name");
if($conn->connect_error) die("DB Connection failed: " . $conn->connect_error);

if(isset($_POST['submit'])){
    $student_ids = $_POST['student_ids'];
    $term = $_POST['term'];
    $year = $_POST['year'];

    // Subjects
    $subjects = ['Math','English','Science','Social Studies','Kiswahili'];

    $chart_data = [];

    foreach($student_ids as $sid){
        $query = $conn->query("SELECT * FROM grades WHERE student_id=$sid AND term='$term' AND year='$year'");
        $student = $query->fetch_assoc();
        $nameQuery = $conn->query("SELECT name FROM students WHERE id=$sid");
        $student_name = $nameQuery->fetch_assoc()['name'];

        $grades = [];
        foreach($subjects as $sub){
            $grades[] = $student[$sub] ?? 0; // default 0 if no grade
        }

        $chart_data[] = [
            'name' => $student_name,
            'grades' => $grades
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Performance Chart</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #eef2f7;
        padding: 30px;
    }
    h2 {
        text-align: center;
        color: #003366;
        margin-bottom: 40px;
    }
    .chart-container {
        width: 900px;
        margin: auto;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
</style>
</head>
<body>

<h2>Performance Comparison Chart - <?php echo $term.' '.$year; ?></h2>

<div class="chart-container">
    <canvas id="performanceChart"></canvas>
</div>

<script>
const ctx = document.getElementById('performanceChart').getContext('2d');

const data = {
    labels: <?php echo json_encode($subjects); ?>,
    datasets: [
        <?php foreach($chart_data as $cd){ ?>
        {
            label: "<?php echo $cd['name']; ?>",
            data: <?php echo json_encode($cd['grades']); ?>,
            borderWidth: 2,
            fill: false,
            tension: 0.1
        },
        <?php } ?>
    ]
};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Student Performance Comparison',
                font: {
                    size: 20
                }
            },
            legend: {
                position: 'top',
            },
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        }
    },
};

const performanceChart = new Chart(ctx, config);
</script>

</body>
</html>