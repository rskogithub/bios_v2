<?php $this->load->view('template/header-front.php'); ?>

<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/statistics/c3/c3.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="subheader">
        <h1 class="subheader-title text-center">
            <i class='subheader-icon fal fa-window'></i> BILLING ONLINE RAWAT INAP
            <small>
                Sistem ini untuk memudahkan Pasien atau Keluarga Pasien dalam mengecek Tagihan atau Biaya selama Pasien dirawat
            </small>
        </h1>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="alert alert-primary alert-dismissible">
                <h3 class="text-center mb-3">VERIFIKASI PASIEN</h3>
                <form method="post" action="<?php echo site_url('frontend/cari'); ?>">
                    <div class="row justify-content-md-center">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="input-group-lg-size">No. Medical Record (NOMR)</label>
                                <div class="input-group input-group-lg">
                                    <input id="input-group-lg-size" type="text" name="nomr" class="form-control" aria-describedby="input-group-lg-size">
                                </div>
                                <span class="help-block">Contoh Penulisan : 103455 (6 digit)</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="input-group-lg-size">Tanggal Lahir Pasien</label>
                                <div class="input-group input-group-lg">
                                    <input id="input-group-lg-size" type="text" name="tgl_lhr" placeholder="" data-inputmask="'mask': '99/99/9999'" class="form-control" aria-describedby="input-group-lg-size">
                                </div>
                                <span class="help-block">Penulisan Tanggal : Hari/Bulan/Tahun</span>
                            </div>
                        </div>
                        <div class="col-md-8 mt-2">
                            <button type="submit" class="btn btn-block btn-lg btn-primary">Proses Billing</button>
                        </div>
                </form>
            </div>
        </div>
        <div class="col-xl-12">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <!-- <div class="col-xl-12">
            <div id="panel-10" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Donut <span class="fw-300"><i>Chart</i></span>
                    </h2>
                </div>
            </div>
        </div> -->
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/inputmask/inputmask.bundle.js"></script>
<script>
    $(document).ready(function() {
        $(":input").inputmask();
    });
</script>
<?php $this->load->view('template/footer-front.php'); ?>