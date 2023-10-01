<div>
  <canvas id="myChart1"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
  //const ctx = document.getElementById('myChart');
  const ctx1 = document.getElementById('myChart1').getContext('2d');
  const labels = @json($labels); // Convert PHP array to JavaScript array
  const data = @json($data);

  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Number of orders',
        data:data,
        backgroundColor: ['#B1A2CA'],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</div>

