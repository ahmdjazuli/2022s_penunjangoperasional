<?php 
  $grafik = mysqli_query($kon, "SELECT MONTH(waktu) as bulan, COUNT(waktu) as total FROM surat_panggilan GROUP BY bulan");
  $total = []; $bulan = [];
  while($j=mysqli_fetch_array($grafik)){
    $total[] = (float)$j['total'];
    $bulan[] = (string)bulan('20-'.$j['bulan'].'-2022');
  } 

  $grafik2 = mysqli_query($kon, "SELECT MONTH(tgl) as bulan, COUNT(tgl) as total FROM surat_pindah GROUP BY bulan");
  $total2 = []; $bulan2 = [];
  while($j=mysqli_fetch_array($grafik2)){
    $total2[] = (float)$j['total'];
    $bulan2[] = (string)bulan('20-'.$j['bulan'].'-2022');
  } 
?>
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<script>
$(function () {
  'use strict'
    var pieChartCanvas = $('#pieChartOne').get(0).getContext('2d')
    var pieData        = {
      labels: <?= json_encode($bulan); ?>,
      datasets: [
        {
          data: <?= json_encode($total); ?>,
          backgroundColor : ['#343a40','#28a745','#dc3545'],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: true
      }
    }
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
});

$(function () {
  'use strict'
    var pieChartCanvas = $('#pieChartTwo').get(0).getContext('2d')
    var pieData        = {
      labels: <?= json_encode($bulan2); ?>,
      datasets: [
        {
          data: <?= json_encode($total2); ?>,
          backgroundColor : ['#343a40','#28a745','#dc3545'],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: true
      }
    }
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })
});

</script>