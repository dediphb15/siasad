
  <footer class="main-footer">
    <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div> -->
     <input type="hidden" name="id_session" id="id_session" value="<?php echo $this->session->userdata('id') == "" ? rand(0000000000,9999999999) : $this->session->userdata('id'); ?>">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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
<script src="<?php base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo  base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo  base_url()?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php base_url()?>assets/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php base_url()?>assets/dist/js/pages/dashboard.js"></script> -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
 
  <script type="text/javascript">

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('d7ba73c0cdae705ec5b7', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      // alert(JSON.stringify(data));

          document.getElementById('xyz').play();
      getchat();
    });


  $(document).on('click', '#fab_send', function(e){
    e.preventDefault();
    var id = $('#id_session').val();
    var pesan = $('#chatSend').val();
    console.log(pesan)
    $.ajax({
      url : '<?php echo base_url()?>send-message',
      type: 'POST',
      data: {pesan:pesan},
      dataType : "JSON",
      success:function(response){
        if(response.error){
          swal("Gagal", response.massage, "error");
        }else{
          $('#id_session').val(response.id);
          getchat();
        }
      }
    })
  })
   adduser();
  function adduser(){
     var id = $('#id_session').val();
     console.log(id);
     $.ajax({
      url : '<?php echo base_url()?>add-user',
      type: 'POST',
      data: {id:id},
      dataType : "JSON",
      success:function(response){
        if(response.error){
          swal("Gagal", response.massage, "error");
        }else{
          $('#id_session').val(response.id);
          getchat();
        }
      }
    })
  }
getchat();
  function getchat(){
    $.ajax({
       url : '<?php echo base_url()?>dashboard/baca',
       type: 'GET',
       dataType : "JSON",
       success:function(data){
          console.log(data)
          $('#count-baca').html(data);
       }
    })
  }

</script>


<script type="text/javascript">
  $(document).ready(function(){
      $('#summernote').summernote({
        height: "300px",
        callbacks: {
              onImageUpload: function(image) {
                  uploadImage(image[0]);
              },
              onMediaDelete : function(target) {
                  deleteImage(target[0].src);
              },
        }
      }).on("summernote.enter", function(we, e) {  
      $(this).summernote('pasteHTML', '<br>&zwnj;');  
      e.preventDefault();  
    });

      function uploadImage(image) {
          var data = new FormData();
          data.append("image", image);
          $.ajax({
              url: "<?php echo site_url('admin/testimoni/upload_image')?>",
              cache: false,
              contentType: false,
              processData: false,
              data: data,
              type: "POST",
              success: function(url) {
            $('#summernote').summernote("insertImage", url);
              },
              error: function(data) {
                  console.log(data);
              }
          });
      }

      function deleteImage(src) {
          $.ajax({
              data: {src : src},
              type: "POST",
              url: "<?php echo site_url('admin/testimoni/delete_image')?>",
              cache: false,
              success: function(response) {
                  console.log(response);
              }
          });
      }

    });
</script>
</body>
</html>