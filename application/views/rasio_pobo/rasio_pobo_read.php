<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Rasio Pobo Read</h2>
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
	    <tr><td>Total Pendapatan</td><td><?php echo $pobo_total_pendapatan; ?></td></tr>
	    <tr><td>Pendapatan Apbn</td><td><?php echo $pobo_pendapatan_apbn; ?></td></tr>
	    <tr><td>Total Beban</td><td><?php echo $pobo_total_beban; ?></td></tr>
	    <tr><td>Beban Susut Amor</td><td><?php echo $pobo_beban_susut_amor; ?></td></tr>
	    <tr><td>Rasio Pobo</td><td><?php echo $rasio_pobo; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rasio_pobo') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>