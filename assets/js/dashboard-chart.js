$( document ).ready(function() {


 new Chartist.Line('#myChart', {
      labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
      series: [
        [5, 12, 8, 14, 10, 16, 13]
      ]
    }, {
      fullWidth: true,
      low: 0,
      showPoint: true,
      chartPadding: {
        right: 40
      }
    });


  });