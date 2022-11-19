    <section class="page-banner-area page-about">
        <div class="overlay"></div>
        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-12 col-12 text-center">
                    <div class="page-banner-content">
                        <h1 class="display-4 font-weight-bold">Kontak</h1>
                        <!-- <p>informasi mengenai kegiatan yang akan di selenggarakan oleh alumni</p> -->
                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
    <section class="section" id="single-project">
        <div class="container">
            <div class="row justify-content-center">
                <?php 
                foreach ($data as $value) { ?>
                    <?php echo nl2br($value->deskripsi) ?>;
                <?php } ?>
            </div>
        </div>
    </section>