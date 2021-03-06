<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-calendar"></i> Proyek</h1>
        </div>
    </div>
    <?php if ($this->session->userdata('role') == 'superadmin') { ?>
        <a href="<?php echo base_url() ?>wbs/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Proyek</a>
        <?php } 
        else if ($this->session->userdata('role') == 'admin') { ?>
            <a href="<?php echo base_url() ?>wbs/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Proyek</a>
            <?php } ?>  
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data <small>WBS</small></h2>
                    <a href="<?php echo base_url() ?>wbs/panggil_fpdf" class="btn btn-danger pull-right"><i class="fa fa-file"></i> PDF Proyek</a>
                    <a href="<?php echo base_url() ?>wbs/panggil_excel" class="btn btn-success pull-right"><i class="fa fa-file"></i> Excel Proyek</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- Notif -->
                    <?php $announce = $this->session->userdata('announce') ?>
                    <?php if (!empty($announce)) : ?>
                        <?php if ($announce == 'Berhasil menyimpan data') : ?>
                            <div class="alert alert-success fade in"><?php echo $announce; ?></div>
                        <?php else : ?>
                            <div class="alert alert-danger fade in"><?php echo $announce; ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <!-- Data -->
                    <?php if ($total == 0) : ?>
                        <div class="alert alert-danger">Tidak ada data</div>
                    <?php else : ?>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>WEB CODE </th>
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Durasi (Jam)</th>
                                    <th>PIC</th>
                                    <th>Uraian Kegiatan</th>
                                    <?php if ($this->session->userdata('role') == 'superadmin') : ?>
                                    <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($list as $WbsList) : ?>
                                    <tr>
                                    <td><?php echo $no ?></td>
                                        <td><?php echo $WbsList->NAMA_PEKERJAAN ?></td>
                                        <td><?php echo $WbsList->WEB_CODE ?></td>
                                        <td><?php echo $WbsList->TGL_AWAL  ?></td>
                                        <td><?php echo $WbsList->TGL_AKHIR ?></td>
                                        <td><?php echo $WbsList->DURASI	 ?></td>
                                        <td><?php echo $WbsList->PIC ?></td>
                                        <td><?php echo $WbsList->URAIAN_KEGIATAN ?></td>
                                        <?php if ($this->session->userdata('role') == 'superadmin') : ?>
                                            <td width="11%">
                                                <a href="<?php echo base_url() ?>wbs/tim?id=<?php echo $WbsList->WEB_CODE ?>" class="btn btn-warning btn-xs">
                                                    <i class="fa fa-user"></i>
                                                </a>
                                                <a href="<?php echo base_url() ?>wbs/update?id=<?php echo $WbsList->WEB_CODE ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger btn-xs" onclick="sweets()">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function sweets() {
        swal({
                title: "Apakah anda yakin ingin menghapus data ?",
                text: "Data tidak bisa di kembalikan",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Delete",
                closeOnConfirm: false
            },
            function() {
                window.location.href = "<?php echo base_url() ?>wbs/delete?rcgn=<?php echo $WbsList->WEB_CODE?>";
            });
    }
</script>