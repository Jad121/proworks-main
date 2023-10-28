// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ct = document.getElementById("PieChart");
fetch('/getPostsByCategory')
  .then(response => response.json())
  .then(data => {
    var labels = data.map(item => item.category);
    var counts = data.map(item => item.count);

    var myPieChart = new Chart(ct, {
      type: 'doughnut',
      data: {
        labels: labels,
        datasets: [{
          data: counts,
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#75d87f','#75c47c','#72d46d','#65c42c'],
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#375d6d'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  })
  .catch(error => {
    console.error(error);
  });
