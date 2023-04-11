<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>T_kes_sdm_tenaga_bidan Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Tgl Transaksi</td><td><?php echo $tgl_transaksi; ?></td></tr>
	    <tr><td>Pns</td><td><?php echo $pns; ?></td></tr>
	    <tr><td>Pppk</td><td><?php echo $pppk; ?></td></tr>
	    <tr><td>Anggota</td><td><?php echo $anggota; ?></td></tr>
	    <tr><td>Non Pns Tetap</td><td><?php echo $non_pns_tetap; ?></td></tr>
	    <tr><td>Kontrak</td><td><?php echo $kontrak; ?></td></tr>
	    <tr><td>Message</td><td><?php echo $message; ?></td></tr>
	    <tr><td>User</td><td><?php echo $user; ?></td></tr>
	    <tr><td>Create Date</td><td><?php echo $create_date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_kes_sdm_tenaga_bidan') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>