<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA T_KES_SDM_TENAGA_BIDAN</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

<table class='table table-striped'>
	    <tr><td width='200'>Tgl Transaksi</td><td><input type="text" class="form-control" name="tgl_transaksi" id="tgl_transaksi" placeholder="Tgl Transaksi" value="<?php echo $tgl_transaksi; ?>"    /></td></tr>
	    <tr><td width='200'>Pns</td><td><input type="number" class="form-control" name="pns" id="pns" placeholder="Pns" value="<?php echo $pns; ?>"    /></td></tr>
	    <tr><td width='200'>Pppk</td><td><input type="number" class="form-control" name="pppk" id="pppk" placeholder="Pppk" value="<?php echo $pppk; ?>"    /></td></tr>
	    <tr><td width='200'>Anggota</td><td><input type="number" class="form-control" name="anggota" id="anggota" placeholder="Anggota" value="<?php echo $anggota; ?>"    /></td></tr>
	    <tr><td width='200'>Non Pns Tetap</td><td><input type="number" class="form-control" name="non_pns_tetap" id="non_pns_tetap" placeholder="Non Pns Tetap" value="<?php echo $non_pns_tetap; ?>"    /></td></tr>
	    <tr><td width='200'>Kontrak</td><td><input type="number" class="form-control" name="kontrak" id="kontrak" placeholder="Kontrak" value="<?php echo $kontrak; ?>"    /></td></tr>
	    <tr><td width='200'>Message</td><td><input type="text" class="form-control" name="message" id="message" placeholder="Message" value="<?php echo $message; ?>"    /></td></tr>
	    <tr><td width='200'>User</td><td><input type="text" class="form-control" name="user" id="user" placeholder="User" value="<?php echo $user; ?>"    /></td></tr>
	    <tr><td width='200'>Create Date</td><td><input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>"    /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_kes_sdm_tenaga_bidan') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>