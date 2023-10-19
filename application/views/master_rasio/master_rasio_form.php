<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA MASTER_RASIO</h2>
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
	    <tr><td width='200'>Tanggal</td><td><input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>"    /></td></tr>
	    <tr><td width='200'>Kode</td><td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>"    /></td></tr>
	    <tr><td width='200'>Indikator</td><td><input type="text" class="form-control" name="indikator" id="indikator" placeholder="Indikator" value="<?php echo $indikator; ?>"    /></td></tr>
	    <tr><td width='200'>Rasio</td><td><input type="text" class="form-control" name="rasio" id="rasio" placeholder="Rasio" value="<?php echo $rasio; ?>"    /></td></tr>
	    <tr><td width='200'>Data</td><td><input type="text" class="form-control" name="data" id="data" placeholder="Data" value="<?php echo $data; ?>"    /></td></tr>
	    <tr><td width='200'>Rumus</td><td><input type="text" class="form-control" name="rumus" id="rumus" placeholder="Rumus" value="<?php echo $rumus; ?>"    /></td></tr>
	    <tr><td width='200'>Target</td><td><input type="text" class="form-control" name="target" id="target" placeholder="Target" value="<?php echo $target; ?>"    /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('master_rasio') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
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