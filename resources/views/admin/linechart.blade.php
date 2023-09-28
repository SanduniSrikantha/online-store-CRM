<div>
    <canvas id="myChart3"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div style="width: 60%; margin: 0 auto;">
    <canvas id="myChart3"></canvas>
</div>

<script>
    const ctx3 = document.getElementById('myChart3').getContext('2d');
    const months = @json($revenuePerMonth->pluck('month')); // Extract months from revenuePerMonth
    const revenue = @json($revenuePerMonth->pluck('revenue')); // Extract revenue from revenuePerMonth

    new Chart(ctx3, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Sales per Month',
                data: revenue,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
</script>
