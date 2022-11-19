<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
                    <!-- <th>Nip</th> -->
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Status</th>
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
              <h4 class="modal-title" id="defaultModalLabel"><span id="title">Tambah User</span></h4>
            </div>
            <div class="modal-body">
              <form id="form" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value="0">
                <div class="row">
                  <div class="col-sm-6" id="nip2">
                   <div class="form-group row">
                    <label class="control-label col-sm-5" for="first-name">Nip <span class="required">*</span>
                    </label>
                    <div class="col-sm-7">
                      <input type="text" name="nip" id="nip" required="required" class="form-control input-xs">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 form-group">
                 <div class="form-group row">
                  <label class="control-label col-sm-5" for="first-name">Nama Lengkap <span class="required">*</span>
                  </label>
                  <div class="col-sm-7">
                    <input type="text" name="nama" id="nama" required="required" onkeypress="return event.charCode < 48 || event.charCode > 57" class="form-control input-xs">
                  </div>
                </div>
              </div>
              <div class="col-sm-6 form-group">
               <div class="form-group row">
                <label class="control-label col-sm-5" for="first-name">Tempat Lahir <span class="required">*</span>
                </label>
                <div class="col-sm-7">
                  <input type="text" id="tmp_lahir" name="tmp_lahir" required="required" class="form-control input-xs">
                </div>
              </div>
            </div>
            <div class="col-sm-6 form-group">
              <div class="form-group row">
                <label class="control-label col-sm-5" for="first-name">Tanggal Lahir <span class="required">*</span>
                </label>
                <div class="col-sm-7">
                  <input type="date" id="tgl_lahir" name="tgl_lahir" required="required" class="form-control input-xs">
                </div>
              </div>
            </div>
            <div class="col-sm-6 form-group">
              <div class="form-group row">
                <label class="control-label col-sm-5 " for="first-name">Alamat <span class="required">*</span>
                </label>
                <div class="col-sm-7">
                  <textarea type="text" id="alamat" name="alamat" required="required" class="form-control  input-xs"></textarea>
                </div>
              </div>
            </div>
            <div class="col-sm-6 form-group">
              <div class="form-group row">
                <label class="control-label col-sm-5" for="first-name">Jenis Kelamin <span class="required">*</span>
                </label>
                <div class="col-sm-7">
                  <label>
                    <input type="radio" name="jk" id="laki-laki" value="L" id="optionsRadios2" > Laki-laki
                  </label>
                  <label>
                    <input type="radio" name="jk" id="perempuan" value="P" id="optionsRadios2"> Perempuan
                  </label>
                </div>
              </div>
            </div>
            <div class="col-sm-6 form-group">
              <div class="form-group row">
                <label class="control-label col-sm-5" for="first-name">Telp <span class="required">*</span>
                </label>
                <div class="col-sm-7">
                  <input type="text" id="telp" name="telp" required="required" minlength="12" class="form-controlinput-xs" placeholder="62878******">
                </div>
              </div>
            </div>
            <div class="col-sm-6 form-group">
              <div class="form-group row">
                <label class="control-label col-sm-5" for="first-name">Email <span class="required">*</span>
                </label>
                <div class="col-sm-7">
                  <input type="email" id="email" name="email" required="required" class="form-control input-xs">
                </div>
              </div>
            </div>
            <div class="col-sm-6 form-group">
              <div class="form-group row">
                <label class="control-label col-sm-5">Jabatan <span class="required">*</span></label>
                <div class="col-sm-7">
                  <select name="jabatan" id="jabatan" class="select2_group form-control input-xs" required="required">
                    <option value=""> - pilih jabatan- </option>
                    <?php
                    foreach ($jabatan as$value) { ?>
                      <option value="<?php echo $value->jabatan ?>"> <?php echo $value->jabatan ?> </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-6 form-group">
              <div class="form-group row">
                <label class="control-label col-sm-5" for="first-name">Pendidikan <span class="required">*</span>
                </label>
                <div class="col-sm-7">
                  <select id="pendidikan" name="pendidikan" class="select2_group form-control col-md-7 col-xs-12 input-xs" required="required">
                    <option value=""> - pilih - </option>
                    <option value="SMA"> SMA </option>
                    <option value="S1"> S1 </option>
                    <option value="S2"> S2 </option>
                    <option value="S3"> S3 </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-6 form-group">
              <div class="form-group row">
                <label class="control-label col-sm-5" for="first-name">Foto <span class="required">*</span>
                </label>
                <div class="col-sm-7">
                  <input type="file" id="foto" name="foto">
                </div>
              </div>
            </div>
            <div class="col-sm-6 form-group">
              <div class="form-group row">
                <label class="control-label col-sm-5" for="first-name">Status<span class="required">*</span>
                </label>
                <div class="col-sm-7">
                  <select id="status" name="status" class="select2_group form-control input-xs" required="required">
                    <option value=""> - pilih - </option>
                    <option value="aktif"> Aktif </option>
                    <option value="tidak aktif"> Tidak aktif </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-6 form-group">
              <div class="form-group row">
                <label class="control-label col-sm-5" for="first-name">Password<span class="required">*</span>
                </label>
                <div class="col-sm-7">
                  <input type="password" id="password" name="password" required="required" class="form-control input-xs">
                </div>
              </div>
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
      ajax: {"url": "tampil-karyawan", "type": "POST"},
      columns: [
      {
        "data": "id"
        // "orderable": false
      },
      // {"data": "nip"},
      {"data": "nama"},
      {"data": "telp"},
      {"data": "email"},
      {"data": "jabatan"},
      {"data": "status"},
       <?php if($this->session->userdata('jabatan') == "Admin" ) {?>
      {"data": "id",
      render:function(data, type, row){
      //  var nip = row['nip'];
       var id = row['id'];
       return '<button class="btn btn-warning btn-xs" onclick="getdatabyid('+id+')"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs" onclick="hapus('+id+')"><i class="fa fa-trash"></i></button>';
     }
   }
<?php  }?>
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
    var s = document.getElementById('nip2').classList;
    s.remove('hidden');

    $('#defaultadd').modal('show');
    $('#title').html('Tambah User');
  }
  $(document).on('submit', '#form', function(event){
    event.preventDefault();
    // console.log($(this).serialize())
    var id = document.getElementById('id').value;
    if(id == 0){
     urldata = "<?php echo base_url()?>tambah-pegawai"
   }else{
     urldata = "<?php echo base_url()?>update-pegawai"
   }
   

   $.ajax({
    url : urldata,
    type: "POST",
    data: $(this).serialize(),
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
 })
  function hapus(id){
    swal({
      title: 'Kamu yakin ?',
      text: 'Hapus permanent ?',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
     $.ajax({
      url : "<?php echo base_url()?>hapus-pegawai",
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
  function getdatabyid(id){
    document.getElementById('id').value = id;
    var s = document.getElementById('nip2').classList;
    s.add('hidden');
    $('#title').html('Ubah User');
    $.ajax({
      url : "<?php echo base_url()?>get-pegawai",
      type: "POST",
      data: {id:id},
      dataType : "JSON",
      success: function(data) {
        console.log(data)
        for (var i=0; i < data.length; i++) {
          document.getElementById('nip').value = data[i].nip;
          document.getElementById('nama').value = data[i].nama;
          document.getElementById('tmp_lahir').value = data[i].tmp_lahir;
          document.getElementById('tgl_lahir').value = data[i].tgl_lahir;
          document.getElementById('alamat').value = data[i].alamat;
          if(data[i].jk == 'L'){
            document.getElementById('laki-laki').checked = true;
          }else{
            document.getElementById('perempuan').checked = true;
          }
          
          document.getElementById('email').value = data[i].email;
          document.getElementById('telp').value = data[i].telp;
          document.getElementById('jabatan').value = data[i].jabatan;
          document.getElementById('status').value = data[i].status;
          document.getElementById('pendidikan').value = data[i].pendidikan;
        }
        $('#defaultadd').modal('show');
      }
    })
  }
</script>
