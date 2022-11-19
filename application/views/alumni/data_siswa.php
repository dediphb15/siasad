
<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil Anda</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profil Anda</li>
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
        <h3 class="card-title"><?php echo $this->session->userdata('nama') ?></h3>

        <div class="card-tools">
          <!-- <button class="btn btn-default btn-tool" onclick="add();"><i class="fa fa-plus"></i> Tambah</button> -->
        </div>
      </div>
      <div class="card-body">
         <form id="form" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <!-- <div class="col-md-12">
                    <div class="form-group row">
                      <label class="control-label col-sm-3" for="first-name">Kelas <span class="required">*</span>
                      </label>
                      <div class="col-sm-9">
                        <input type="text" name="kelas" id="kelas" required="required" class="form-control ">
                      </div>
                      <input type="hidden" id="id" name="id" value="0">
                    </div>
                  </div> -->
                  <div class="col-12 col-sm-12">
                    <div class="card card-primary card-outline card-tabs">
                      <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Informasi Alumni</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Informasi Orang Tua & Wali</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-a-tab" data-toggle="pill" href="#custom-tabs-a" role="tab" aria-controls="custom-tabs-a" aria-selected="false">Informasi Pendidikan Menengah Atas</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-b-tab" data-toggle="pill" href="#custom-tabs-b" role="tab" aria-controls="custom-tabs-b" aria-selected="false">Informasi Pendidikan Tinggi</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-c-tab" data-toggle="pill" href="#custom-tabs-c" role="tab" aria-controls="custom-tabs-c" aria-selected="false">Informasi Pekerjaan</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-foto-tab" data-toggle="pill" href="#custom-tabs-three-foto" role="tab" aria-controls="custom-tabs-three-foto" aria-selected="false">Foto Alumni</a>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                          <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                            <div class="col-md-12">
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Nis <span class="required">*</span>
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" name="nis" id="nis" required="required" maxlength="10" class="form-control ">
                                </div>
                                <input type="hidden" id="id" name="id" value="0">
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Nama Lengkap <span class="required">*</span>
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" name="nama" id="nama_lengkap" required="required" class="form-control ">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Tempat, Tanggal Lahir <span class="required">*</span>
                                </label>
                                <div class="col-sm-4">
                                  <input type="text" name="tempat" id="tempat" required="required" class="form-control ">
                                </div>
                                <div class="col-sm-5">
                                  <input type="date" name="tgl_lahir" id="tgl_lahir" required="required" class="form-control ">
                                </div>
                                 </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-4" for="first-name">Jenis Kelamin <span class="required">*</span>
                                </label>
                                <div class="col-sm-2">
                                  <input type="radio" name="jk" id="laki-laki" value="L" required="required" class="form-check-input"> Laki-laki
                                </div>
                                <div class="col-sm-2">
                                  <input type="radio" name="jk" id="perempuan" value="P" required="required" class="form-check-input"> Perempuan
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Agama <span class="required">*</span>
                                </label>
                                <div class="col-sm-9">
                                  <!-- <input type="text" name="agama" id="agama" required="required" class="form-control "> -->
                                  <select name="agama" id="agama" required="required" class="form-control ">
                                    <option value="">-Pilih Agama-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Asal Sekolah
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" name="asal_sekolah" id="asal_sekolah" required="required" class="form-control ">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Angkatan
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" name="angkatan" id="angkatan" maxlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 13" required="required" class="form-control ">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Tahun Lulus
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" name="tahun_lulus" id="tahun_lulus" maxlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 13" required="required" class="form-control ">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Alamat<span class="required">*</span>
                                </label>
                                <div class="col-sm-9">
                                  <textarea type="text" id="alamat" name="alamat" required="required" class="form-control  input-xs"></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Email<span class="required">*</span>
                                </label>
                                <div class="col-sm-9">
                                  <input type="email" id="email" name="email" required="required" class="form-control  input-xs">
                                </div>
                              </div>
                            </div>
                         </div>
                         <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Nama Orang Tua <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="nama_ortu" id="nama_ortu" required="required" class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Pekerjaan <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="pekerjaan_ortu" id="pekerjaan_ortu" required="required" class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Telp <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="telp_ortu" id="telp_ortu" required="required" maxlength="14" class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Alamat<span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                              <textarea type="text" id="alamat_ortu" name="alamat_ortu" required="required" class="form-control  input-xs"></textarea>
                            </div>
                          </div>
                        
                           <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Nama Wali <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="nama_wali" id="nama_wali" required="required" class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Hubungan keluarga dengan wali <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="hub_wali" id="hub_wali" required="required" class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Pekerjaan Wali<span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="pekerjaan_wali" id="pekerjaan_wali" required="required" class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Telp Wali<span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="telp_wali" id="telp_wali" required="required" maxlength="14" class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Alamat Wali<span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                              <textarea type="text" id="alamat_wali" name="alamat_wali" required="required" class="form-control  input-xs"></textarea>
                            </div>
                          </div>
                         </div>
                         <div class="tab-pane fade" id="custom-tabs-a" role="tabpanel" aria-labelledby="custom-tabs-a-tab">
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">SMA/K, MA
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" name="sma" id="sma"  class="form-control ">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Tahun Masuk
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" name="tahun_masuk1" id="tahun_masuk1" maxlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 13"  class="form-control ">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3" for="first-name">Tahun Lulus
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" name="tahun_lulus1" id="tahun_lulus1" maxlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 13" class="form-control ">
                                </div>
                              </div>
                         </div>
                         <div class="tab-pane fade" id="custom-tabs-b" role="tabpanel" aria-labelledby="custom-tabs-b-tab">
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Nama Perguruan Tinggi
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="nama_perguruan" id="nama_perguruan"  class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Program Studi
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="program_studi" id="program_studi"  class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Jenjang Pendidikan
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="jenjang_pendidikan" id="jenjang_pendidikan"  class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Tahun Masuk
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="tahun_masuk2" id="tahun_masuk2" maxlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 13"  class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Tahun Lulus
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="tahun_lulus2" id="tahun_lulus2" maxlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 13"  class="form-control ">
                            </div>
                          </div>
                         </div>
                         <div class="tab-pane fade" id="custom-tabs-c" role="tabpanel" aria-labelledby="custom-tabs-c-tab">
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Nama Perusahaan
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="pekerjaan" id="pekerjaan"  class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Posisi
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="posisi" id="posisi"  class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3" for="first-name">Alamat Perusahaan
                            </label>
                            <div class="col-sm-9">
                              <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control ">
                            </div>
                          </div>
                         </div>
                         <div class="tab-pane fade" id="custom-tabs-three-foto" role="tabpanel" aria-labelledby="custom-tabs-three-foto-tab">
                          <div class="col-md-6">
                            <div class="form-group email">
                             <label class="control-label"><b>Gambar</b></label>
                             <input class="form-control" id="imgInp2" name="photo" type="file">
                             <input class="form-control" id="imgInp1" name="photo2" type="hidden">
                           </div>
                           <div class="form-group email">
                            <img id="blah2" src="<?php echo base_url() ?>assets/profile/default.jpg" width="100">
                           </div>
                         </div>
                       </div>
                       </div>
                     </div>
                     <!-- /.card -->
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
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

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
      ajax: {"url": "tampil-siswa", "type": "POST"},
      columns: [
      {
        "data": "id"
        // "orderable": false
      },
      {"data": "nis"},
      {"data": "nama_lengkap"},
      {"data": "kelas"},
      {"data": "angkatan"},
      {"data": "tahun_lulus"},
      {"data": "alamat"},
      {"data": "foto", 
      render:function(data, type, row){
          return '<img src="<?php echo base_url()?>assets/profile/'+row['foto']+'" width="50px" height="50px">';
      }},
   //    {"data": "nis",
   //    render:function(data, type, row){
   //     var nip = row['nip'];
   //     var id = row['id'];
   //     return '<button class="btn btn-warning btn-xs" onclick="getdatabyid('+id+')"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-xs" onclick="hapus('+id+')"><i class="fa fa-trash"></i></button>';
   //   }
   // }

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
    $('#title').html('Tambah Informasi Alumni');
  }
  $(document).on('submit', '#form', function(event){
    event.preventDefault();
    // console.log($(this).serialize())
    var id = document.getElementById('id').value;
    if(id == 0){
     urldata = "<?php echo base_url()?>tambah-siswa"
   }else{
     urldata = "<?php echo base_url()?>alumni/siswa/ubah_siswa"
   }
   var form = $("#form").closest("form");
  var formData = new FormData(form[0]);

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
      url : "<?php echo base_url()?>hapus-siswa",
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
  getdatabyid();
  function getdatabyid(){
    $.ajax({
      url : "<?php echo base_url()?>Alumni/siswa/get_siswa",
      type: "GET",
      dataType : "JSON",
      success: function(data) {
        console.log(data)

    var link = "<?php echo base_url()?>assets/profile/";
    var link2 = "<?php echo base_url()?>assets/profile/default.jpg";
        for (var i=0; i < data.length; i++) {
          document.getElementById('nis').value = data[i].nis;
          document.getElementById('id').value = data[i].id;
          document.getElementById('nama_lengkap').value = data[i].nama;
          document.getElementById('tempat').value = data[i].tempat;
          document.getElementById('tgl_lahir').value = data[i].tgl_lahir;
          document.getElementById('alamat').value = data[i].alamat;
          document.getElementById('agama').value = data[i].agama;
          document.getElementById('asal_sekolah').value = data[i].sekolah_asal;
          if(data[i].jns_kelamin == 'L'){
            document.getElementById('laki-laki').checked = true;
          }else{
            document.getElementById('perempuan').checked = true;
          }
          
          // document.getElementById('kelas').value = data[i].kelas;
          if(data[i].foto != ""){
            document.getElementById('blah2').src = link+data[i].foto;
          }else{
            document.getElementById('blah2').src = link2;
          }
          document.getElementById('imgInp1').value = data[i].foto;

          document.getElementById('nama_ortu').value = data[i].nama_ortu;
          document.getElementById('pekerjaan_ortu').value = data[i].pekerjaan_ortu;
          document.getElementById('telp_ortu').value = data[i].telp_ortu;
          document.getElementById('alamat_ortu').value = data[i].alamat_ortu;

          document.getElementById('nama_wali').value = data[i].nama_wali;
          document.getElementById('pekerjaan_wali').value = data[i].pekerjaan_wali;
          document.getElementById('telp_wali').value = data[i].telp_wali;
          document.getElementById('alamat_wali').value = data[i].alamat_wali;
          document.getElementById('hub_wali').value = data[i].hubungan_wali;
          document.getElementById('angkatan').value = data[i].angkatan;
          document.getElementById('tahun_lulus').value = data[i].tahun_lulus;


          document.getElementById('sma').value = data[i].sma;
          document.getElementById('tahun_masuk1').value = data[i].thn_masuk_sma;
          document.getElementById('tahun_lulus1').value = data[i].thn_lulus_sma;
          document.getElementById('nama_perguruan').value = data[i].nama_kampus;
          document.getElementById('program_studi').value = data[i].jurusan_kampus;
          document.getElementById('jenjang_pendidikan').value = data[i].jenjang_pendidikan;
          document.getElementById('tahun_masuk2').value = data[i].thn_masuk_kampus;
          document.getElementById('tahun_lulus2').value = data[i].thn_lulus_kampus;
          document.getElementById('pekerjaan').value = data[i].nama_perusahaan;
          document.getElementById('posisi').value = data[i].posisi;
          document.getElementById('alamat_perusahaan').value = data[i].alamat_perusahaan;
          document.getElementById('email').value = data[i].email;


        }
        // $('#defaultadd').modal('show');
      }
    })
  }
  $(document).on('change', '#imgInp2', function() {
      readURL(this);
   });
  function readURL(input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function(e) {
            $('#blah2').attr('src', e.target.result);
         }
         reader.readAsDataURL(input.files[0]);
      }
   }
</script>
