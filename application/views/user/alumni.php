     <section class="page-banner-area page-about">
        <div class="overlay"></div>
        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-12 col-12 text-center">
                    <div class="page-banner-content">
                        <h1 class="display-4 font-weight-bold">Data Alumni</h1>
                        <p>Data alumni SMP AL IRSYAD KOTA TEGAL</p>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
    
    <section class="section" id="section-testimonial">
        <div class="container t-2">
            <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Angkatan</th>
                <th>Tahun Lulus</th>
                <th>Alamat</th>
                <th>Foto</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        </div>
        
    </section>
    
    <!-- Main jQuery -->
    <script src="<?php echo  base_url()?>assets/user/plugins/jquery/jquery.min.js"></script>
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
      ajax: {"url": "welcome/tampil_alumni", "type": "POST"},
      columns: [
      {
        "data": "id"
        // "orderable": false
      },
      {"data": "nama"},
      {"data": "jns_kelamin",
      render:function(data, type, row){
          var jns_kelamin = row['jns_kelamin'];
          if(jns_kelamin == "p"){
            return 'Perempuan';
          }else{
            return 'Laki-laki'
          }
      }

    },
      {"data": "angkatan"},
      {"data": "tahun_lulus"},
      {"data": "alamat"},
      {"data": "foto", 
      render:function(data, type, row){
          return '<img src="<?php echo base_url()?>assets/profile/'+row['foto']+'" width="50px" height="50px">';
      }}

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
</script>