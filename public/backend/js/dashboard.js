(function($) {
  'use strict';
  $(function() {
    if ($("#earning-report-chart").length) {
      var earningReportData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [{
          label: '# of Votes',
          data: [17, 85, 32, 25, 12, 33],
          backgroundColor: [
            'rgba(7, 102, 198, 1)',
            'rgba(0, 178, 151, 1)',
            'rgba(7, 102, 198, 1)',
            'rgba(0, 178, 151, 1)',
            'rgba(7, 102, 198, 1)',
            'rgba(0, 178, 151, 1)',
          ],
          borderWidth: 0
        }]
      };
      var earningReportOptions = {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          xAxes: [{
            gridLines: {
              color: '#f3f6f9'
            },
            ticks: {
              display: false,
              min: 0,
              max: 100,
              stepSize: 20
            }
          }],
          yAxes: [{
            gridLines: {
              color: '#f3f6f9'             
            },
            ticks: {
              display: true,
              min: 0,
              max: 100,
              stepSize: 50
            }
          }]
        },
        legend: {
          display: false
        },
        elements: {
          point: {
            radius: 0
          }
        },
        layout: {
          padding: {
            top: 0,
            bottom: 0
          }
        },
    
      };
      var earningReportChartCanvas = $("#earning-report-chart").get(0).getContext("2d");
      // This will get the first returned node in the jQuery collection.
      var barChart = new Chart(earningReportChartCanvas, {
        type: 'horizontalBar',
        data: earningReportData,
        options: earningReportOptions
      });
    }
  });
})(jQuery);
