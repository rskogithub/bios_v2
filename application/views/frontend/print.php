<?php $this->load->view('template/header-front.php'); ?>
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/notifications/toastr/toastr.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="container">

        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="alert border border-info bg-transparent text-info text-center mb-1 fw-500" role="alert">
                    Halaman ini akan kembali ke halaman awal dalam <strong><span id="seconds">60</span> detik.</strong>
                </div>
            </div>
            <div class="col-sm-6">
                <a href="#" class="btn btn-block btn-primary" data-action="app-print" title="Print page">
                    <i class="fal fa-print"></i> PRINT
                </a>
            </div>
            <div class="col-sm-6">
                <a href="<?php echo base_url() ?>frontend" class="btn btn-block btn-info" id="linkButton">
                    <i class="fal fa-print"></i> KEMBALI
                </a>
            </div>
        </div>
        <div data-size="A4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center mb-5">
                        <h2 class="keep-print-font fw-500 mb-0 text-primary flex-1 position-relative">
                            Rumah Sakit Ketergantungan Obat Jakarta
                            <small class="text-muted mb-0 fs-xs">
                                Jl. Lapangan Tembak No.75 Cibubur Jakarta Timur 13720
                            </small>
                            <!-- barcode demo only -->
                            <!-- <h3>No. Antrian Poli : <strong><?php //echo $no_antrian
                                                                ?></strong></h3> -->
                        </h2>
                    </div>
                    <h3 class="text-center fw-300 display-6 fw-500 color-primary-600 keep-print-font pt-1 l-h-n mb-3">
                        RINCIAN BIAYA PERAWATAN PASIEN
                    </h3>
                    <!-- <div class="text-dark fw-700 h1 mb-g keep-print-font">
                        # 1
                    </div> -->
                </div>
            </div>
            <?php
            // foreach ($pasien as $row) {
            //     $no_reg = $row->id_admission;
            //     $nomr = $row->nomr;
            //     $nama = $row->namapasien;
            //     $tgl_lhr = tgl_indo($row->tgllahir);
            // }
            ?>
            <div class="row">
                <div class="col-sm-5 d-flex">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>
                                <tr>
                                    <td>
                                        No. Registrasi
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?php echo $no_reg ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        No. Medical Record
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?php echo $nomr ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-2 ml-sm-auto"></div>
                <div class="col-sm-5 ml-sm-auto">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>
                                <tr>
                                    <td>
                                        Nama
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?php echo $nama ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal Lahir
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?php echo $tgl_lhr ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-5">

                <div class="col-sm-12">
                    <div class="table-responsive">

                        <?php
                        $this->db->select('a.*,b.nama_bayar,c.nama_kamar');
                        $this->db->from('zx_t_periode_rawat a');
                        $this->db->join('zx_t_periode_rawat_bill aa', 'a.id_order=aa.id_order', 'left');
                        $this->db->join('zx_m_bayar b', 'a.kode_bayar=b.kode_bayar', 'left');
                        $this->db->join('zx_m_kamar c', 'a.kode_kamar=c.kode_kamar', 'left');
                        $this->db->where('aa.kode_bayar', 'PRBD');
                        $this->db->where('a.id_reg', $no_reg);
                        $this->db->group_by('a.id_order');
                        $this->db->order_by('a.periode', 'ASC');
                        $query = $this->db->get();
                        $num = $query->num_rows();
                        if ($num > 0) {
                            foreach ($query->result() as $dt) {
                        ?>
                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center">Periode Ke : <?php echo $dt->periode ?></th>
                                        <th class="text-center">Tanggal : <?php echo tgl_indo($dt->tgl_start) ?> s/d <?php echo tgl_indo($dt->tgl_end) ?></th>
                                        <th class="text-center">Kamar : <?php echo $dt->nama_kamar ?></th>
                                        <th class="text-center">Jaminan : <?php echo $dt->nama_bayar ?></th>
                                    </tr>
                                </table>
                                <?php
                                $this->db->where('kode_bayar', 'PRBD');
                                $this->db->where('id_order', $dt->id_order);
                                $this->db->order_by('create_date', 'ASC');
                                $qbill = $this->db->get('zx_v_periode_rawat_bill');
                                $num = $qbill->num_rows();
                                if ($num > 0) { ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>Tindakan</th>
                                            <th class="text-right">Tarif</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                        foreach ($qbill->result() as $dtbill) { ?>

                                            <tr>
                                                <td class="text-center"><?php echo $no ?></td>
                                                <td><?php echo $dtbill->nama_tindakan ?></td>
                                                <td class="text-right"><?php echo formatRP($dtbill->tarif) ?></td>
                                                <td class="text-center"><?php echo $dtbill->qty ?></td>
                                                <td class="text-right"><?php echo formatRP($dtbill->ttl) ?></td>
                                            </tr>
                                        <?php $no++;
                                        }
                                        ?>
                                    </table>
                                <?php } else {
                                } ?>
                        <?php }
                        } ?>
                    </div>

                </div>
            </div>
            <div class="row">
                <?php
                $this->db->select('sum(ttl) as total');
                $this->db->where('kode_bayar', 'PRBD');
                $this->db->where('id_reg', $no_reg);
                $qbill = $this->db->get('zx_v_periode_rawat_bill');
                foreach ($qbill->result() as $dtbill) {
                    $total = $dtbill->total;
                }
                $this->db->select('sum(nominal) as total');
                $this->db->where('id_reg', $no_reg);
                $this->db->where('aktif', '0');
                $depositx = $this->db->get('zx_t_deposit');
                foreach ($depositx->result() as $dpx) {
                    $ttl_dp = $dpx->total;
                }
                ?>
                <div class="col-sm-8">
                    <div class="alert alert-secondary" role="alert">
                        <strong>Terbilang :</strong> <?php echo terbilang($total - $ttl_dp) ?> rupiah.
                    </div>
                </div>
                <div class="col-sm-4 ml-sm-auto">
                    <table class="table table-clean">
                        <tbody>
                            <tr>
                                <td class="text-left">
                                    <strong>Total Biaya</strong>
                                </td>
                                <td class="text-right"><?php echo formatRP($total) ?></td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                    <strong>Total Deposit</strong>
                                </td>
                                <td class="text-right"><?php echo formatRP($ttl_dp) ?></td>
                            </tr>
                            <tr class="table-scale-border-top border-left-0 border-right-0 border-bottom-0">
                                <td class="text-left keep-print-font">
                                    <h4 class="m-0 fw-700 h2 keep-print-font color-primary-700">Total</h4>
                                </td>
                                <td class="text-right keep-print-font">
                                    <h4 class="m-0 fw-700 h2 keep-print-font"><?php echo formatRP($total - $ttl_dp) ?></h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/notifications/toastr/toastr.js"></script>

<script type="text/javascript">
    var seconds = 60; // seconds for HTML
    var foo; // variable for clearInterval() function

    function redirect() {
        document.location.href = '<?php echo base_url(); ?>frontend';
    }

    function updateSecs() {
        document.getElementById("seconds").innerHTML = seconds;
        seconds--;
        if (seconds == -1) {
            clearInterval(foo);
            redirect();
        }
    }

    function countdownTimer() {
        foo = setInterval(function() {
            updateSecs()
        }, 1000);
    }

    countdownTimer();
</script>

<?php $this->load->view('template/footer-front.php'); ?>