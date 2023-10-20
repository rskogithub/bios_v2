<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Tk Kemandirian BLU Read</h2>
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
	    <tr><td>Pendapatan PNBP (BLU)</td><td><?php echo $pndptn_pnbp_blu; ?></td></tr>
	    <tr><td>Belanja operasional (RM + BLU)</td><td><?php echo $blnj_oprsnl_rm_blu; ?></td></tr>
	    <tr><td>Belanja Modal (RM + BLU)</td><td><?php echo $blnj_modal_rm_blu; ?></td></tr>
	    <tr><td>Tk Kemandirian Blu</td><td><?php echo $tk_kemandirian_blu; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rasio_mandiri_blu') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>