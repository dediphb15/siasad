<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Report Grafik </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Event</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- PIE CHART -->
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Pie Chart</h3>

        <div class="card-tools">
           <button type="button" class="btn btn-tool" onclick="printDiv();">
            <i class="fas fa-print"></i>
          </button>
          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button> -->
        </div>
      </div>
      <div class="card-body">

        <div id="print">
        <div class="row">
          <div class="col-sm-7">
             <canvas id="pieChart" style="min-height: 500px; height:500px; max-height: 500px; max-width: 100%;"></canvas>
          </div>
          <div class="col-sm-5">
            <p class="text-center">
              <strong>Detail</strong>
            </p>

            <div class="progress-group">
              SMA/SMK MA
              <span class="float-right"><b><?php echo $jumlah_sma ?></b>/<?php echo $jumlah ?></span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-primary" style="width: <?php echo $sma.'%' ?>"></div>
              </div>
            </div>

            <div class="progress-group">
              Kuliah
              <span class="float-right"><b><?php echo $jumlah_kuliah ?></b>/<?php echo $jumlah ?></span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-danger" style="width: <?php echo $kuliah.'%' ?>"></div>
              </div>
            </div>

            <div class="progress-group">
              <span class="progress-text">Bekerja</span>
              <span class="float-right"><b><?php echo $jumlah_bekerja ?></b>/<?php echo $jumlah ?></span>
              <div class="progress progress-sm">
                <div class="progress-bar bg-success" style="width: <?php echo $bekerja.'%' ?>"></div>
              </div>
            </div>

          </div>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>SMA/SMK MA</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sekolah as $value) {?>
            <tr>
              <td  width="50%"> <?php echo $value->sma ?></td>
              <td><?php echo $value->jumlah ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th >Kuliah</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kampus as $value) {?>
            <tr>
              <td  width="50%"><?php echo $value->nama_kampus ?></td>
              <td><?php echo $value->jumlah ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama Perusahaan</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tmp_kerja as $value) {?>
            <tr>
              <td width="50%"><?php echo $value->nama_perusahaan ?></td>
              <td><?php echo $value->jumlah ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
</div>

<script src="<?php echo  base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
<script src="<?php echo  base_url()?>assets/print.js"></script>

<script type="text/javascript">
   function printDiv() {  
    // var dataUrl = document.getElementById('print').toDataURL(); //attempt to save base64 string to server using this var  
    // var windowContent = '<!DOCTYPE html>';
    // windowContent += '<html>'
    // windowContent += '<head><title>Print canvas</title></head>';
    // windowContent += '<body align="center">'
    // windowContent += '<img src="' + dataUrl + '" width="100%" height="100%">';
    // windowContent += '</body>';
    // windowContent += '</html>';
    // var printWin = window.open('','','width=800,height=800');
    // printWin.document.open();
    // printWin.document.write(windowContent);
    // printWin.document.close();
    // printWin.focus();
    // printWin.print();
    // printWin.close();
    // printJS('print', 'html')
     window.open('<?php echo base_url()?>dashboard/print', "_newtab" );
}
  //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'SMA/K MA',
          'KULIAH',
          'BEKERJA',
      ],
      datasets: [
        {
          data: [
          <?php 
                echo $sma. "," .$kuliah. ",".$bekerja;
              ?>
          ],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
        }
      ]
    }
 
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive: true,
      plugins: {
        labels: {
          render: 'percentage',
          fontColor: ['white', 'white', 'white'],
          precision: 2
        }
      }
    }
    
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

</script>