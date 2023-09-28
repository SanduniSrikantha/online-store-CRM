<!DOCTYPE html>
<html>
<head>
    <title>Your Chart Page</title>
    <!-- Include the Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Your HTML code for the chart container -->
    <div>
        <canvas id="myChart2"></canvas>
    </div>

    <!-- Your JavaScript code for creating the chart -->
    <script>
        const ctx2 = document.getElementById('myChart2');

        const userSegmentationData = <?php echo json_encode($userSegmentation); ?>;

        let dailyCount = 0;
        let weeklyCount = 0;
        let monthlyCount = 0;
        let inactiveCount = 0;

        userSegmentationData.forEach(user => {
            switch (user.login_segment) {
                case 'Daily':
                    dailyCount++;
                    break;
                case 'Weekly':
                weeklyCount++;
                    break;
                case 'Monthly':
                    monthlyCount++;
                    break;
                case 'Inactive':
                    inactiveCount++;
                    break;
            }
        });

        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Daily', 'Weekly', 'Monthly', 'Inactive'],
                datasets: [{
                    label: '# of Users',
                    data: [dailyCount, weeklyCount, monthlyCount, inactiveCount],
                    backgroundColor:[
                        'rgba(255,99,132,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(255,206,86,0.2)',
                        'rgba(153,102,255,1)',

                    
                    ],
                    borderWidth: 1
                }]
            },
            options: {

            }
        });
    </script>
</body>
</html>
