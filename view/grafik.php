<?php 
  require('head.php'); hel('Grafik');
?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-6">
          <div class="card-header">
            <h3 class="card-title">Statistik Jumlah Surat Pemanggilan Ortu</h3>
          </div>
          <div class="chart-responsive">
            <canvas id="pieChartOne" height="250"></canvas>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6">
          <div class="card-header">
            <h3 class="card-title">Statistik Jumlah Surat Pindah Sekolah</h3>
          </div>
          <div class="chart-responsive">
            <canvas id="pieChartTwo" height="250"></canvas>
          </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  </div>
  <!-- /.content-wrapper -->
<?php require('foot.php'); require('graph.php'); ?>