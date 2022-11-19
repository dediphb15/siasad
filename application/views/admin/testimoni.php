<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Testimoni</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Testimoni</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <!-- <h3 class="card-title">Title</h3> -->
        <div class="card-tools">
          <?php if($this->session->userdata('jabatan') == "Admin" ) {?>
            <button class="btn btn-default btn-tool" onclick="add();"><i class="fa fa-plus"></i> Tambah</button>
            <?php } ?>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pengirim Testimoni</th>
                <th>Testimoni</th>
                <th>Tanggal Publish</th>
                 <?php if($this->session->userdata('jabatan') == "Admin" ) {?>
                <th>Option</th>
              <?php } ?>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  <div class="modal fade" id="defaultadd" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="defaultModalLabel"><span id="title">Tambah Testimoni</span></h4>
        </div>
        <div class="modal-body">
          <form id="form" enctype="multipart/form-data">
            <div class="form-group" style="display: none;">
              <label for="exampleInputEmail1">Judul *</label>
              <input type="text" class="form-control" name="judul" id="judul" placeholder="Enter Judul">
              <input type="hidden" name="id" id="id" value="0">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Testimoni *</label>
              <textarea name="deskripsi" id="summernote" rows="10" required="required">
              </textarea>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
   $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
   {
    return {
     "iStart": oSettings._iDisplayStart,
     "iEnd": oSettings.fnDisplayEnd(),
     "iLength": oSettings._iDisplayLength,
     "iTotal": oSettings.fnRecordsTotal(),
     "iFilteredTotal": oSettings.fnRecordsDisplay(),
     "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
     "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
   };
 };

 var t = $("#datatable").dataTable({
  initComplete: function() {
   var api = this.api();
   $('#mytable_filter input')
   .off('.DT')
   .on('keyup.DT', function(e) {
    if (e.keyCode == 13) {
     api.search(this.value).draw();
   }
 });
 },
 oLanguage: {
   sProcessing: "loading..."
 },
 processing: true,
 serverSide: true,
      // lengthChange: false,
      // destroy: true,
      // searching: false 
      ajax: {"url": "admin/testimoni/tampil_gallery", "type": "POST"},
      columns: [
      {
        "data": "id"
        // "orderable": false
      },
      {"data": "nama"},
      {"data": "deskripsi"},
      {"data": "date"},
       <?php if($this->session->userdata('jabatan') == "Admin" ) { ?>
      {"data": "id",
      render:function(data, type, row){
       var id = row['id'];
       return ' <button class="btn btn-success btn-xs" onclick="setuju('+id+')">Publish</button> <button class="btn btn-warning btn-xs" onclick="getdatabyid('+id+')"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs" onclick="hapus('+id+')"><i class="fa fa-trash"></i></button>';
     }
   }
  <?php } ?>
   ],
   order: [[1, 'asc']],
   rowCallback: function(row, data, iDisplayIndex) {
     var info = this.fnPagingInfo();
     var page = info.iPage;
     var length = info.iLength;
     var index = page * length + (iDisplayIndex + 1);
     $('td:eq(0)', row).html(index);
   }

 });
});
  function add(){
    $('#defaultadd').modal('show');
    $('#title').html('Tambah testimoni');
  }
    $(document).on('submit', '#form', function(event){
    event.preventDefault();
    // console.log($(this).serialize())
    var id = document.getElementById('id').value;
    if(id == 0){
     urldata = "<?php echo base_url()?>tambah-gallery"
   }else{
     urldata = "<?php echo base_url()?>update-gallery"
   }
   var form = $("#form").closest("form");
  var formData = new FormData(form[0]);

   var pesan = $('#summernote').val();
 if(pesan != ""){
   $.ajax({
    url : urldata,
    type: "POST",
    data: formData,
    contentType: false,       
    cache: false,             
    processData:false,
    dataType : "JSON",
    success: function(response) {
      if(response.error){
        swal("Gagal", response.massage, "error");
      }else{
        swal({title: "Berhasil", text: response.massage, type: "success"},
          function(){ 
            location.reload(true);
          });
      }
    }
  })
 }else{
   swal({title: "Peringatan!", text: "Testimoni masih kosong", type: "warning"},
            function(){ 
              // location.reload(true);
            });
 }
 })
  function getdatabyid(id){
    document.getElementById('id').value = id;
    $('#title').html('Ubah Gallery');
    $.ajax({
      url : "<?php echo base_url()?>admin/testimoni/get_gallery",
      type: "POST",
      data: {id:id},
      dataType : "JSON",
      success: function(data) {
        console.log(data)
        for (var i=0; i < data.length; i++) {
          document.getElementById('judul').value = data[i].judul;
          // document.getElementById('summernote').value = data[i].deskripsi;
          $('#summernote').summernote('code',data[i].deskripsi)
          
        }
        $('#defaultadd').modal('show');
      }
    })
  }
  function hapus(id){
    swal({
      title: 'Kamu yakin ?',
      text: 'Hapus permanent ?',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
     $.ajax({
      url : "<?php echo base_url()?>hapus-gallery",
      type: "POST",
      data: {id:id},
      dataType : "JSON",
      success: function(response) {
        if(response.error){
          swal("Gagal", response.massage, "error");
        }else{
          swal({title: "Berhasil", text: response.massage, type: "success"},
            function(){ 
              location.reload(true);
            });
        }
      }
    })
   });
  }
   function setuju(id){
    swal({
      title: 'Kamu yakin ?',
      text: 'Anda menyetukui ini untuk tampil di public ?',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
     $.ajax({
      url : "<?php echo base_url()?>admin/testimoni/setuju",
      type: "POST",
      data: {id:id},
      dataType : "JSON",
      success: function(response) {
        if(response.error){
          swal("Gagal", response.massage, "error");
        }else{
          swal({title: "Berhasil", text: response.massage, type: "success"},
            function(){ 
              location.reload(true);
            });
        }
      }
    })
   });
  }
</script>