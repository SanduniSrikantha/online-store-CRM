<div>
  <canvas id="myChart4"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx4 = document.getElementById('myChart4');
  const salesData = @json(['% Paid by Cash', '% Paid by Card']);
  const salesValues = @json([$percentagePaidByCash, $percentagePaidByCard]);
  const totalSales = @json($totalSales); // Get total sales from your PHP variable

  new Chart(ctx4, {
    type: 'doughnut',
    data: {
      labels: salesData,
      datasets: [{
        data: salesValues,
        backgroundColor: ['#FF5733', '#3387FF'], // You can change these colors as needed
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        display: true,
        position: 'bottom'
      },
      plugins: {
        title: {
          display: true,
          text: `Total Sales: $${totalSales}`, // Display the total sales as a title
          position: 'top',
          fontSize: 16,
          padding: {
            top: 10,
            bottom: 10
          }
        }
      }
    }
  });
</script>
