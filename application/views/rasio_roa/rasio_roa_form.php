<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA IMBALAN ATAS ASET (ROA)</h2>
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
	    <!-- <tr><td width='200'>Kode</td><td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>"    /></td></tr> -->
        <td><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="14"   hidden /></td></tr>
	    <tr><td width='200'>Tanggal</td><td><input type="date" class="form-control"  id="example-date" name="tanggal" id="datepicker-1" placeholder="Tanggal" value="<?php echo $tanggal; ?>"   required /></td></tr>
	    <tr><td width='200'>Roa Surplus Defisit</td><td><input type="text" class="form-control" name="roa_surplus_defisit" id="roa_surplus_defisit" placeholder="Roa Surplus Defisit" value="<?php echo $roa_surplus_defisit; ?>"    /></td></tr>
	    <tr><td width='200'>Roa Tot Aset</td><td><input type="text" class="form-control" name="roa_tot_aset" id="roa_tot_aset" placeholder="Roa Tot Aset" value="<?php echo $roa_tot_aset; ?>"    /></td></tr>
	    <tr><td width='200'>Total Roa</td><td><input type="text" class="form-control" name="total_roa" id="total_roa" placeholder="Total Roa" value="<?php echo $total_roa; ?>"    /></td></tr>
	    <tr><td></td><td><input type="hidden" name="no_id" value="<?php echo $no_id; ?>" />
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
	    <a href="<?php echo site_url('rasio_roa') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#roa_surplus_defisit, #roa_tot_aset").keyup(function() {
            var roa_surplus_defisit  = $("#roa_surplus_defisit").val();
            var roa_tot_aset = $("#roa_tot_aset").val();
            var total_roa = (parseInt(roa_surplus_defisit) / parseInt(roa_tot_aset))*100 ;
           // var rasio_lancar = (parseInt(aktiva_lancar)/parseInt(kewajiban_lancar))/1 ;
            $("#total_roa").val (total_roa);
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