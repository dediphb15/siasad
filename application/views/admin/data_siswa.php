
<?php

$v = "?";

if ($this->input->post('angkatan_cari')) {
    $v .= "angkatan=" . $this->input->post('angkatan_cari');
}
if ($this->input->post('angkatan_cari')) {
    $v .= "&tahun_lulus=" . $this->input->post('tahun_lulus_cari');
}

?>

<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Alumni</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Alumni</li>
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
            <button class="btn bg-green" onclick="print();">Print</button> <button type="button" class="btn btn-success" style="color: #fff;" onclick="tableToExcel('mydata', 'W3C Example Table')" id="a">Export</button>
        </div>
      </div>

      <div class="card-body">
        Cari Berdasarkan 
        <form action="<?php base_url()?>data-siswa" method="POST">
          <div class="row">
            <div class="col-2">
              <!-- <input type="text" name="angkatan_cari" class="form-control" placeholder="Angkatan contoh: 2018"  value="<?php echo $angkatan ?>"> -->
              <select name="angkatan_cari" class="form-control" id="tahun">
                <!-- <option value="<?php echo $angkatan ?>"><?php echo $angkatan ?></option> -->
                <?php
                // $tg_awal= date('Y')-10;
                // $tgl_akhir= date('Y')+3;
                // echo '<option value="">Pilih Angkatan</option>';
                // for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
                // {
                //   echo "
                //   <option value='$i'";
                //   if($angkatan==$i){echo "selected";}
                //   echo">$i</option>";
                // }
                  foreach ($angkatan as $value) {
                    echo '<option value="'.$value->angkatan.'">'.$value->angkatan.'</option>';
                  }
                ?>
              </select>
            </div>
            <div class="col-2">
               <!-- <input type="text" name="tahun_lulus_cari" class="form-control" placeholder="Tahun Lulus contoh: 2022" value="<?php echo $tahun_lulus ?>">  -->
               <select  name="tahun_lulus_cari" class="form-control" id="tahun">
                <!-- <option value="<?php echo $tahun_lulus ?>"><?php echo $tahun_lulus ?></option> -->
                <?php
                // $tg_awal= date('Y')-10;
                // $tgl_akhir= date('Y')+3;

                // echo '<option value="">Pilih Tahun Lulus</option>';
                // for ($i=$tgl_akhir; $i>=$tg_awal; $i--)
                // {
                //   echo "
                //   <option value='$i'";
                //   if($tahun_lulus==$i){echo "selected";}
                //   echo">$i</option>";
                  foreach ($tahun as $value) {
                    echo '<option value="'.$value->tahun_lulus.'">'.$value->tahun_lulus.'</option>';
                  }
                // }
                ?>
              </select>
            </div>
            <div class="col-3">
               <button type="submit" class="btn btn-primary">Cari</button> <a href="<?php base_url()?>data-siswa" class="btn btn-danger">Reset</a>
            </div>
          </div>
        </form>
        <br>
         
         
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Angkatan</th>
                <th>Tahun Lulus</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th class="no_print">Option</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>

          <table id="mydata" class="table table-striped table-bordered hidden">
            <thead>
              <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama Lengkap</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Asal Sekolah</th>
                <th>Alamat</th>
                <th>Nama Orang Tua</th>
                <th>Pekerjaan Orang Tua</th>

                <th>Alamat Orang Tua</th>
                <th>Telp Orang Tua</th>
                <th>Nama Wali</th>
                <th>Pekerjaan Wali</th>
                <th>Alamat Wali</th>
                <th>Telp Wali</th>
                <th>Hubungan Wali</th>
                <th>Angkatan</th>
                <th>Tahun Lulus</th>
                <th>Email</th>

                <th>SMA/SMK MA</th>
                <th>Tahun Masuk</th>
                <th>Tahun Lulus</th>
                <th>Nama Perguruan Tinggi</th>
                <th>Jenjang Pendidikan</th>
                <th>Jurusan</th>
                <th>Tahun Masuk</th>
                <th>Tahun Lulus</th>
                <th>Nama Perusahaan</th>
                <th>Posisi</th>

                <th>Alamat Perusahaan</th>
                <th>Foto</th>

              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($data as $value) { ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $value->nis?></td>
                  <td><?php echo $value->nama?></td>
                  <td><?php echo $value->tempat?>, <?php echo $value->tgl_lahir?></td>
                  <td><?php echo $value->jns_kelamin?></td>
                  <td><?php echo $value->agama?></td>
                  <td><?php echo $value->sekolah_asal?></td>
                  <td><?php echo $value->alamat?></td>
                  <td><?php echo $value->nama_ortu?></td>
                  <td><?php echo $value->pekerjaan_ortu?></td>
                  <td><?php echo $value->alamat_ortu?></td>

                  <td><?php echo $value->telp_ortu?></td>
                  <td><?php echo $value->nama_wali?></td>
                  <td><?php echo $value->pekerjaan_wali?></td>
                  <td><?php echo $value->alamat_wali?></td>
                  <td><?php echo $value->telp_wali?></td>
                  <td><?php echo $value->hubungan_wali?></td>
                  <td><?php echo $value->angkatan?></td>
                  <td><?php echo $value->tahun_lulus?></td>
                  <td><?php echo $value->email?></td>
                  <td><?php echo $value->sma?></td>

                  <td><?php echo $value->thn_masuk_sma?></td>
                  <td><?php echo $value->thn_lulus_sma?></td>
                  <td><?php echo $value->nama_kampus?></td>
                  <td><?php echo $value->jenjang_pendidikan?></td>
                  <td><?php echo $value->jurusan_kampus?></td>
                  <td><?php echo $value->thn_masuk_kampus?></td>
                  <td><?php echo $value->thn_lulus_kampus?></td>
                  <td><?php echo $value->nama_perusahaan?></td>
                  <td><?php echo $value->posisi?></td>
                  <td><?php echo $value->alamat_perusahaan?></td>
                  <td><a href="<?php echo base_url()?>assets/profile/<?php echo $value->foto?>"><?php echo $value->foto?></a></td>

                </tr>
              <?php } ?>
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
              <h4 class="modal-title" id="defaultModalLabel"><span id="title">Tambah Alumni</span></h4>
            </div>
            <div class="modal-body">
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
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Informasi Orang Tua dan Wali</a>
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
                                  <input type="text" name="nis" id="nis" required="required" class="form-control ">
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
                                <div class="col-sm-4">
                                  <input type="radio" name="jk" id="laki-laki" value="L" required="required" class="form-check-input"> Laki-laki
                                </div>
                                <div class="col-sm-4">
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
                                  <input type="email" id="email" name="email" class="form-control  input-xs">
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
                              <input type="text" name="telp_ortu" id="telp_ortu" required="required" class="form-control ">
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
                              <input type="text" name="telp_wali" id="telp_wali" required="required" class="form-control ">
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
                                  <input type="text" name="tahun_lulus1" id="tahun_lulus1" maxlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 13"  class="form-control ">
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
                              <input type="text" name="jenjang_pendidikan" id="jenjang_pendidikan" class="form-control ">
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
                              <input type="text" name="alamat_perusahaan" id="alamat_perusahaan"  class="form-control ">
                            </div>
                          </div>
                         </div>
                         <div class="tab-pane fade" id="custom-tabs-three-foto" role="tabpanel" aria-labelledby="custom-tabs-three-foto-tab">
                          <div class="col-md-6">
                            <div class="form-group email">
                             <label class="control-label"><b>Foto</b></label>
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
                <div class="form-group" id="s">
                  <div class="col-md-12 col-sm-12 col-xs-12 ">
                    <?php if($this->session->userdata('jabatan') == "Admin" ) {?>
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  <?php } ?>
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
    var tableToExcel = (function() {
      var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
        , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
      return function(table, name) {
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
        window.location.href = uri + base64(format(template, ctx))
      }
  })()
</script>
<script type="text/javascript">
   function print() {
   newWin= window.open("");

    var divToPrint=document.getElementById("datatable");
    newWin.document.write('<html><head><title></title>');
      newWin.document.write('<link href="<?php echo base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"><link rel="stylesheet" href="<?php echo  base_url()?>assets/dist/css/adminlte.min.css">');
      newWin.document.write('<style>.table{width: 100%;margin-bottom: 1rem;color: #212529;background-color: transparent;border-collapse: collapse;}.table-bordered {border: 1px solid #dee2e6;}.table-bordered th {border: 1px solid #dee2e6;}.table-bordered td, .table-bordered th {border: 1px solid #dee2e6;}.no_print{display:none;}</style>');
     newWin.document.write('</head><body >');
     newWin.document.write(divToPrint.outerHTML);
     newWin.document.write('</body></html>');
   
   newWin.print();
   // newWin.close();
  }
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
      ajax: {"url": "<?php echo base_url('tampil-siswa'. $v)?>", "type": "POST"},
      columns: [
      {
        "data": "id"
        // "orderable": false
      },
      {"data": "nis"},
      {"data": "nama"},
      {"data": "jns_kelamin",
      render:function(data, type, row){
          var jns_kelamin = row['jns_kelamin'];
          if(jns_kelamin == "P"){
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
      }},
      <?php if($this->session->userdata('jabatan') == "Admin" ) {?>
        {"data": "nis",
        render:function(data, type, row){
         var nip = row['nip'];
         var id = row['id'];
         return '<button class="btn btn-success btn-xs " onclick="getdatabyid2('+id+')">Lihat</button> <button class="btn btn-danger btn-xs" onclick="hapus('+id+')"><i class="fa fa-trash"></i></button>';
       }
     }
    <?php }else{ ?>
       {"data": "nis",
        render:function(data, type, row){
         var nip = row['nip'];
         var id = row['id'];
         return '<button class="btn btn-success btn-xs " onclick="getdatabyid2('+id+')">Lihat</button>';
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
    $('#title').html('Tambah Informasi Alumni');
  }
  $(document).on('submit', '#form', function(event){
    event.preventDefault();
    // console.log($(this).serialize())
    var id = document.getElementById('id').value;
    if(id == 0){
     urldata = "<?php echo base_url()?>tambah-siswa"
   }else{
     urldata = "<?php echo base_url()?>update-siswa"
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
  function getdatabyid(id){
    document.getElementById('id').value = id;
   
    var s = document.getElementById('s').classList;
    s.remove('hidden');
  document.getElementById('nis').disabled = false;
          document.getElementById('nama_lengkap').disabled = false;
          document.getElementById('tempat').disabled = false;
          document.getElementById('tgl_lahir').disabled = false;
          document.getElementById('alamat').disabled = false;
          document.getElementById('agama').disabled = false;
          document.getElementById('asal_sekolah').disabled = false;
         
            // document.getElementById('laki-laki').disabled = false;
            // document.getElementById('perempuan').disabled = false;
          
          // document.getElementById('kelas').disabled = false;
        
          var z = document.getElementById('imgInp2').classList;
           z.remove('hidden');

          document.getElementById('nama_ortu').disabled = false;
          document.getElementById('pekerjaan_ortu').disabled = false;
          document.getElementById('telp_ortu').disabled = false;
          document.getElementById('alamat_ortu').disabled = false;

          document.getElementById('nama_wali').disabled = false;
          document.getElementById('pekerjaan_wali').disabled =false;
          document.getElementById('telp_wali').disabled = false;
          document.getElementById('alamat_wali').disabled = false;
          document.getElementById('hub_wali').disabled = false;
          document.getElementById('angkatan').disabled = false;
          document.getElementById('tahun_lulus').disabled = false;

          document.getElementById('sma').disabled = false;
          document.getElementById('tahun_masuk1').disabled = false;
          document.getElementById('tahun_lulus1').disabled = false;
          document.getElementById('nama_perguruan').disabled = false;
          document.getElementById('program_studi').disabled = false;
          document.getElementById('jenjang_pendidikan').disabled = false;
          document.getElementById('tahun_masuk2').disabled = false;
          document.getElementById('tahun_lulus2').disabled = false;
          document.getElementById('pekerjaan').disabled = false;
          document.getElementById('posisi').disabled = false;
          document.getElementById('alamat_perusahaan').disabled = false;
           $('#title').html('Ubah Informasi Alumni');
    $.ajax({
      url : "<?php echo base_url()?>get-siswa",
      type: "POST",
      data: {id:id},
      dataType : "JSON",
      success: function(data) {
        console.log(data)

    var link = "<?php echo base_url()?>assets/profile/";
    var link2 = "<?php echo base_url()?>assets/profile/default.jpg";
        for (var i=0; i < data.length; i++) {
          document.getElementById('nis').value = data[i].nis;
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


        }
        $('#defaultadd').modal('show');
      }
    })
  }
  function getdatabyid2(id){
    document.getElementById('id').value = id;
    // var s = document.getElementById('s').classList;
    // s.add('hidden');


    //       document.getElementById('nis').disabled = true;
    //       document.getElementById('nama_lengkap').disabled = true;
    //       document.getElementById('tempat').disabled = true;
    //       document.getElementById('tgl_lahir').disabled = true;
    //       document.getElementById('alamat').disabled = true;
    //       document.getElementById('agama').disabled = true;
    //       document.getElementById('asal_sekolah').disabled = true;
         
    //         // document.getElementById('laki-laki').disabled = true;
    //         // document.getElementById('perempuan').disabled = true;
          
    //       document.getElementById('kelas').disabled = true;
        
    //       var z = document.getElementById('imgInp2').classList;
    //        z.add('hidden');

    //       document.getElementById('nama_ortu').disabled = true;
    //       document.getElementById('pekerjaan_ortu').disabled = true;
    //       document.getElementById('telp_ortu').disabled = true;
    //       document.getElementById('alamat_ortu').disabled = true;

    //       document.getElementById('nama_wali').disabled = true;
    //       document.getElementById('pekerjaan_wali').disabled = true;
    //       document.getElementById('telp_wali').disabled = true;
    //       document.getElementById('alamat_wali').disabled = true;
    //       document.getElementById('hub_wali').disabled = true;
    //       document.getElementById('angkatan').disabled = true;
    //       document.getElementById('tahun_lulus').disabled = true;

    //       document.getElementById('sma').disabled = true;
    //       document.getElementById('tahun_masuk1').disabled = true;
    //       document.getElementById('tahun_lulus1').disabled = true;
    //       document.getElementById('nama_perguruan').disabled = true;
    //       document.getElementById('program_studi').disabled = true;
    //       document.getElementById('jenjang_pendidikan').disabled = true;
    //       document.getElementById('tahun_masuk2').disabled = true;
    //       document.getElementById('tahun_lulus2').disabled = true;
    //       document.getElementById('pekerjaan').disabled = true;
    //       document.getElementById('posisi').disabled = true;
    //       document.getElementById('alamat_perusahaan').disabled = true;
   
    $('#title').html('Detail Informasi Alumni');
    $.ajax({
      url : "<?php echo base_url()?>get-siswa",
      type: "POST",
      data: {id:id},
      dataType : "JSON",
      success: function(data) {
        console.log(data)

    var link = "<?php echo base_url()?>assets/profile/";
    var link2 = "<?php echo base_url()?>assets/profile/default.jpg";
        for (var i=0; i < data.length; i++) {
          document.getElementById('nis').value = data[i].nis;
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
        $('#defaultadd').modal('show');
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
