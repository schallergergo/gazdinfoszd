// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var token = $('meta[name="csrf-token"]').attr('content');

           var request= $.ajax({

            headers: {'X-CSRF-TOKEN': token},
              url: '/monthlyfinance/incomepiechart',
              type: 'get',

           });
           request.done(function(data){
            res = JSON.parse(data);

// Pie Chart Example
var ctx = document.getElementById("expensePieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels:   res.labels,
    datasets: [{
      data: res.amounts,
      backgroundColor: res.color,
      hoverBackgroundColor: res.hover,
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


});