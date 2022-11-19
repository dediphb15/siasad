     <section class="page-banner-area page-about">
        <div class="overlay"></div>
        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-12 col-12 text-center">
                    <div class="page-banner-content">
                        <h1 class="display-4 font-weight-bold">Informasi Kegiatan</h1>
                        <p>informasi mengenai kegiatan yang akan di selenggarakan oleh alumni</p>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
    <section class="section" id="blog">
        <div class="container">

            <div class="row justify-content-center">
                <?php
                if(count($data) > 0){
                foreach ($data as $value) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-box">
                        <div class="single-blog">
                            <div class="blog-content">
                                    <h3 class="card-title"><?php echo $value->judul ?></h3>
                                <p><?php echo $value->deskripsi ?></p>
                                 <h6><?php echo $value->date ?></h6>
                                <a href="<?php echo base_url()?><?php echo $value->slug?>" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } else{ ?>
                <div class="col-md-8 col-lg-6 text-center">
                    <div class="section-heading">
                        <!-- Heading -->
                        <h2 class="section-title">
                            Tidak Ada Informasi Kegiatan
                        </h2>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>