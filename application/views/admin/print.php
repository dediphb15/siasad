<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo  base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo  base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo  base_url()?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo  base_url()?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo  base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo  base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo  base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo  base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo  base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style type="text/css">
    .progress-bar {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      -ms-flex-pack: center;
      justify-content: center;
      overflow: hidden;
      color: #fff;
      text-align: center;
      white-space: nowrap;
      background-color: #007bff;
      transition: width .6s ease;
    }

    .bg-success {
      background-color: #28a745!important;
    }
    .bg-success {
      background-color: #28a745!important;
    }
    .bg-danger {
      background-color: #dc3545!important;
    }
    .bg-primary {
      background-color: #007bff!important;
    }
    .progress {
      display: -ms-flexbox;
      display: flex;
      height: 1rem;
      overflow: hidden;
      line-height: 0;
      font-size: .75rem;
      background-color: #e9ecef;
      border-radius: 0.25rem;
      box-shadow: inset 0 0.1rem 0.1rem rgb(0 0 0 / 10%);
    }
    .progress-group {
      margin-bottom: 0.5rem;
    }
    .progress-sm {
      height: 10px;
    }
    @media print {
      html, body {
        width: auto;
        height: auto !important;
        
      }
      .progress-group {
        margin-bottom: 0.5rem;
      }
      .progress-sm {
        height: 10px;
      }
      .progress-bar {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        -ms-flex-pack: center;
        justify-content: center;
        overflow: hidden;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        background-color: #007bff;
        transition: width .6s ease;
      }

      .bg-success {
        background-color: #28a745!important;
      }
      .bg-success {
        background-color: #28a745!important;
      }
      .bg-danger {
        background-color: #dc3545!important;
      }
      .bg-primary {
        background-color: #007bff!important;
      }
      .progress {
        display: -ms-flexbox;
        display: flex;
        height: 1rem;
        overflow: hidden;
        line-height: 0;
        font-size: .75rem;
        background-color: #e9ecef;
        border-radius: 0.25rem;
        box-shadow: inset 0 0.1rem 0.1rem rgb(0 0 0 / 10%);
      }
      
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content">

      <!-- Main content -->
      <section class="content">
       <!-- PIE CHART -->
       <div class="card">

        <div class="card-body">

          <div id="print">
            <div class="row">
              <div class="col-sm-8">
                <canvas id="pieChart" style="min-height: 400px; height:400px;position: relative;"></canvas>
              </div>
              <div class="col-sm-4">
               <table class="table table-bordered">
                <tr>
                  <td>SMA/SMK MA</td>
                  <td><?php echo $jumlah_sma ?>/<?php echo $jumlah ?></td>
                </tr>
                <tr>
                  <td>Kuliah</td>
                  <td><?php echo $jumlah_kuliah ?>/<?php echo $jumlah ?></td>
                </tr>
                <tr>
                  <td>Bekerja</td>
                  <td><?php echo $jumlah_bekerja ?>/<?php echo $jumlah ?></td>
                </tr>
              </table>

            </div>
          </div>
          <br/>
          <br/>
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
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo  base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo  base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo  base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo  base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo  base_url()?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo  base_url()?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo  base_url()?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo  base_url()?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo  base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo  base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?php echo  base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo  base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo  base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo  base_url()?>assets//plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo  base_url()?>assets//plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo  base_url()?>assets//plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo  base_url()?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo  base_url()?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo  base_url()?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo  base_url()?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo  base_url()?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo  base_url()?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?php echo  base_url()?>assets/chatbox.js"></script>

<script src="<?php echo base_url()?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="<?php base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="<?php base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="<?php echo  base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo  base_url()?>assets/dist/js/adminlte.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
<script type="text/javascript">

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
    setTimeout(function() {
      window.print();
    }, 1000);
  </script>
</body>
</html>
