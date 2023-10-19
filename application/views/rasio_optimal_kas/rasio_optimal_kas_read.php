<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Rasio Optimalisasi Kas Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <!-- <tr><td>Kode</td><td><?php echo $kode; ?></td></tr> -->
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Pdptn Bunga Atas Pnglolan Kas</td><td><?php echo $pdptn_bunga_atas_pnglolan_kas; ?></td></tr>
	    <tr><td>Saldo Rekening Pnglolaan Kas</td><td><?php echo $saldo_rekening_pnglolaan_kas; ?></td></tr>
	    <tr><td>Saldo Rekening Oprsnl</td><td><?php echo $saldo_rekening_oprsnl; ?></td></tr>
	    <tr><td>Rasio Optimal Kas</td><td><?php echo $rasio_optimal_kas; ?></td></tr>
	    <!-- <tr><td>F8</td><td><?php echo $f8; ?></td></tr>
	    <tr><td>F9</td><td><?php echo $f9; ?></td></tr> -->
	    <tr><td></td><td><a href="<?php echo site_url('rasio_optimal_kas') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>