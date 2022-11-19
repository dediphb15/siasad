     <section class="page-banner-area page-about">
        <div class="overlay"></div>
        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-12 col-12 text-center">
                    <div class="page-banner-content">
                        <h1 class="display-4 font-weight-bold">Testimoni</h1>
                        <p>Ulasan dari alumni SMP AL IRSYAD KOTA TEGAL</p>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
    
    <section class="section" id="section-testimonial">
        <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-12 col-sm-12 col-md-12">

               <div class="row">
                <?php
                if(count($data) > 0){
                    foreach ($data as $value) { ?>
                        <div class="col-lg-6">
                            <div class="test-inner ">
                             <div class="test-author-thumb d-flex">
                                 <img src="<?php echo base_url()?>assets/profile/<?php echo $value->foto ?>" alt="Testimonial author" class="img-fluid">
                                 <div class="test-author-info">
                                     <h4><?php echo $value->nama?></h4>
                                     <h6>Angkatan : <?php echo $value->angkatan ?></h6>
                                 </div>
                             </div>
                             <?php echo $value->deskripsi?>

                             <i class="fa fa-quote-right"></i>
                         </div>
                     </div>
                 <?php } } else{ ?>
                    <div class="col-md-8 col-lg-6 text-center">
                        <div class="section-heading">
                            <!-- Heading -->
                            <h2 class="section-title">
                                Tidak Ada Testimoni
                            </h2>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</section>