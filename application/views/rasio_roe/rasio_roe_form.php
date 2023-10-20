<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA IMBALAN ATAS EKUITAS (ROE)</h2>
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
	    <!-- <tr><td width='200'>Kode</td><td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>"  readonly  /></td></tr> -->
       <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="15"  hidden  /></td></tr>
	    <tr><td width='200'>Tanggal</td><td><input type="date" class="form-control"  id="example-date" name="tanggal" id="datepicker-1" placeholder="Tanggal" value="<?php echo $tanggal; ?>" required   /></td></tr>
	    <tr><td width='200'>Roe Surplus Defisit</td><td><input type="text" class="form-control" name="roe_surplus_defisit" id="roe_surplus_defisit" placeholder="Roe Surplus Defisit" value="<?php echo $roe_surplus_defisit; ?>"    /></td></tr>
	    <tr><td width='200'>Roe Tot Ekuitas</td><td><input type="text" class="form-control" name="roe_tot_ekuitas" id="roe_tot_ekuitas" placeholder="Roe Tot Ekuitas" value="<?php echo $roe_tot_ekuitas; ?>"    /></td></tr>
	    <tr><td width='200'>Total Rasio Roe</td><td><input type="text" class="form-control" name="total_roe" id="total_roe" placeholder="Total Roe" value="<?php echo $total_roe; ?>"    /></td></tr>
	    <tr><td></td><td><input type="hidden" name="no_id" value="<?php echo $no_id; ?>" />
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
	    <a href="<?php echo site_url('rasio_roe') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#roe_surplus_defisit, #roe_tot_ekuitas").keyup(function() {
        var roe_surplus_defisit  = $("#roe_surplus_defisit").val();
        var roe_tot_ekuitas = $("#roe_tot_ekuitas").val();
        var total_roe = (parseInt(roe_surplus_defisit) / parseInt(roe_tot_ekuitas))*100 ;
       // var rasio_lancar = (parseInt(aktiva_lancar)/parseInt(kewajiban_lancar))/1 ;
        $("#total_roe").val (total_roe);
    });
});
</script>
 </div>
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