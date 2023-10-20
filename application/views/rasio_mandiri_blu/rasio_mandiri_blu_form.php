<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA TK KEMANDIRIAN BLU</h2>
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
	    <!-- <tr><td width='200'>Kode</td><td><input type="number" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>"    /></td></tr> -->
        <td><input type="number" class="form-control" name="kode" id="kode" placeholder="Kode" value="16"    hidden/></td></tr>
	    <tr><td width='200'>Tanggal</td><td><input type="date" class="form-control"  id="example-date" name="tanggal" id="datepicker-1" placeholder="Tanggal" value="<?php echo $tanggal; ?>" required   /></td></tr>
	    <tr><td width='200'>Pendapatan PNBP (BLU)</td><td><input type="text" class="form-control" name="pndptn_pnbp_blu" id="pndptn_pnbp_blu" placeholder="Pndptn Pnbp Blu" value="<?php echo $pndptn_pnbp_blu; ?>"    /></td></tr>
	    <tr><td width='200'>Belanja operasional (RM + BLU)</td><td><input type="text" class="form-control" name="blnj_oprsnl_rm_blu" id="blnj_oprsnl_rm_blu" placeholder="Blnj Oprsnl Rm Blu" value="<?php echo $blnj_oprsnl_rm_blu; ?>"    /></td></tr>
	    <tr><td width='200'>Belanja Modal (RM + BLU)</td><td><input type="text" class="form-control" name="blnj_modal_rm_blu" id="blnj_modal_rm_blu" placeholder="Blnj Modal Rm Blu" value="<?php echo $blnj_modal_rm_blu; ?>"    /></td></tr>
	    <tr><td width='200'>Tk Kemandirian BLU</td><td><input type="text" class="form-control" name="tk_kemandirian_blu" id="tk_kemandirian_blu" placeholder="Tk Kemandirian Blu" value="<?php echo $tk_kemandirian_blu; ?>"    /></td></tr>
	    <tr><td></td><td><input type="hidden" name="no_id" value="<?php echo $no_id; ?>" />
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
	    <a href="<?php echo site_url('rasio_mandiri_blu') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#pndptn_pnbp_blu, #blnj_oprsnl_rm_blu, #blnj_modal_rm_blu").keyup(function() {
            var pndptn_pnbp_blu  = $("#pndptn_pnbp_blu").val();
            var blnj_oprsnl_rm_blu = $("#blnj_oprsnl_rm_blu").val();
            var blnj_modal_rm_blu = $("#blnj_modal_rm_blu").val();
            var tk_kemandirian_blu = ( parseInt(pndptn_pnbp_blu) / ((parseInt(blnj_modal_rm_blu)+(parseInt(blnj_oprsnl_rm_blu)))))*100 ;
           // var rasio_lancar = (parseInt(aktiva_lancar)/parseInt(kewajiban_lancar))/1 ;
            $("#tk_kemandirian_blu").val (tk_kemandirian_blu);
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