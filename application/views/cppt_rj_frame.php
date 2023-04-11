<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr bg-primary-700">
                <h2>DATA PASIEN</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <?php
                        $this->db->where('noreg', $this->uri->segment(3));
                        $data = $this->db->get('zx_v_pendaftaran')->row();
                        ?>
                        <div class="col-md-1">
                            <?php if (!empty($data->photo)) {
                                echo '<img src="' . base_url() . 'assets/foto_profil/default_pp.jpg" class="rounded shadow-2 img-thumbnail" data-toggle="modal" data-target="#default-example-modal" />';
                            } else {
                                echo '<img src="' . base_url() . 'assets/foto_profil/default_pp.jpg" class="rounded shadow-2 img-thumbnail" data-toggle="modal" data-target="#default-example-modal" />';
                            }
                            ?>
                            <!-- 
                            <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                Foto Profile Pasien
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center frame-wrap">
                                                <img src="<?php echo base_url() ?>assets/smartadmin/img/demo/avatars/avatar-admin-lg.png" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-4">
                            <table class="table table-clean">
                                <tr>
                                    <td>No. MR</td>
                                    <td>: <?php echo $data->nomr; ?></td>
                                </tr>
                                <tr>
                                    <td>NAMA</td>
                                    <td>: <?php echo $data->nm_pasien; ?></td>
                                </tr>
                                <tr>
                                    <td>No. Registrasi</td>
                                    <td>: <?php echo $data->noreg; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-clean">
                                <tr>
                                    <td>Tgl Lahir</td>
                                    <td>: <?php echo tanggal($data->tanggal_lahir); ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?php echo $data->kelamin; ?></td>
                                </tr>
                                <tr>
                                    <td>Pembayaran</td>
                                    <td>: <?php echo $data->nama_bayar; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-clean">
                                <tr>
                                    <td>Dokter</td>
                                    <td>: <?php echo $data->nm_dokter; ?></td>
                                </tr>
                                <tr>
                                    <td>Poliklinik</td>
                                    <td>: <?php echo $data->nama_poli_sub; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kunjungan</td>
                                    <td>: <?php echo $data->jenis_klinik ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-12">
        <div class="alert border border-primary bg-transparent text-primary" role="alert">
            <div class="text-center">
                <?php
                if ($this->session->userdata('id_user_level') == 3) {
                    echo '<a href="#" class="btn btn-sm btn-info m-1">Input Biaya</a>';
                    echo '<a href="' . base_url() . 'pendaftaran/skp/' . $this->uri->segment(3) . '" class="btn btn-sm btn-info m-1">Cetak SKP</a>';
                    echo '<a href="' . base_url() . 'pendaftaran/label/' . $this->uri->segment(3) . '" class="btn btn-sm btn-info m-1">Cetak Label</a>';
                } else {
                    // cari level user
                    $id_user_level = $this->session->userdata('id_user_level');
                    $sql_menu = "SELECT * FROM zx_tbl_menu WHERE id_menu in(select id_menu from zx_tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu=0 and is_aktif='y' and group_menu='cppt_rj' order by title ASC";

                    $main_menu = $this->db->query($sql_menu)->result();
                    if ($data->jenis_klinik == 'KLINIK') {
                        foreach ($main_menu as $menu) {
                            // chek is have sub menu
                            $this->db->where('is_main_menu', $menu->id_menu);
                            $this->db->where('group_menu', 'cppt_rj');
                            $this->db->where('is_aktif', 'y');
                            $this->db->order_by('title', 'ASC');
                            $submenu = $this->db->get('zx_tbl_menu');
                            if ($submenu->num_rows() > 0) {
                                // display sub menu
                                echo '
                                <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . strtoupper($menu->title) . '</button>
                                <div class="dropdown-menu">';
                                foreach ($submenu->result() as $sub) {
                                    $url = site_url($sub->url . '/update/' . $this->uri->segment(3));
                                    echo '<a class="dropdown-item" href="' . $url . '">' . strtoupper($sub->title) . '</a>';
                                }
                                echo '</div>
                            </div>';
                            } else {
                                // display main menu
                                $url = site_url($menu->url . '/update/' . $this->uri->segment(3));
                                echo '<a href="' . $url . '" class="btn btn-sm btn-info m-1">' . strtoupper($menu->title) . '</a>';
                            }
                        }
                    } else {
                        $this->db->where_in('url', ['Rajal_rad', 'Obat_resep', 'Rajal_lab', 'Rajal_tindakan']);
                        $this->db->where('is_aktif', 'y');
                        $this->db->order_by('title', 'ASC');
                        $main_menu = $this->db->get('zx_tbl_menu')->result();
                        foreach ($main_menu as $menu) {

                            // display main menu
                            $url = site_url($menu->url . '/update/' . $this->uri->segment(3));
                            echo '<a href="' . $url . '" class="btn btn-sm btn-info m-1">' . strtoupper($menu->title) . '</a>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

</div>