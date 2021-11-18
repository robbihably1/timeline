<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-desktop"></i> Monitoring</h1>
        </div>
    </div>
    <?php if ($this->session->userdata('role') == 'superadmin') { ?>
        <a href="<?php echo base_url() ?>monitoring/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Monitoring</a>
        <?php } 
        else if ($this->session->userdata('role') == 'admin') { ?>
            <a href="<?php echo base_url() ?>monitoring/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Monitoring</a>
            <?php } ?>  
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data <small>Monitoring</small></h2>
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
                                    <th>Nama Pegawai </th>
                                    <th>Tanggal</th>
                                    <th>Nama Pekerjaan</th>
                                    <!-- <th>Uraian Kegiatan</th> -->
                                    <th>Durasi</th>
                                    <th>Progres</th>
                                    <th>Catatan</th>
                                    <th>Kendala</th>
                                    <?php if ($this->session->userdata('role') == 'superadmin') : ?>
                                    <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($list as $monitoringList) : ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $monitoringList->FULL_NAME  ?></td>
                                        <td><?php echo $monitoringList->TANGGAL  ?></td>
                                        <td><?php echo $monitoringList->NAMA_PEKERJAAN ?></td>
                                        <!-- <td><?php echo $monitoringList->URAIAN_KEGIATAN ?></td> -->
                                        <td><?php echo $monitoringList->DURASI ?></td>
                                        <td><?php echo $monitoringList->PROGRES ?></td>
                                        <td><?php echo $monitoringList->CATATAN ?></td>
                                        <td><?php echo $monitoringList->KENDALA ?></td>
                                        <?php if ($this->session->userdata('role') == 'superadmin') { ?>
                                            <td width="6%">
                                                <a href="<?php echo base_url() ?>monitoring/update?id=<?php echo $monitoringList->NO_MONITORING ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger btn-xs" onclick="sweets()">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        <?php }else if ($this->session->userdata('role') == 'admin') { ?>
                                            <td width="6%">
                                                <a href="<?php echo base_url() ?>monitoring/update?id=<?php echo $monitoringList->NO_MONITORING ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger btn-xs" onclick="sweets()">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        <?php } ?>
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
                window.location.href = "<?php echo base_url() ?>penugasan/delete?rcgn=<?php echo $monitoringList->ID_TUGAS ?>";
            });
    }
</script>