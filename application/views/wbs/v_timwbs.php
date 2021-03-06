<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-calendar"></i> Tim Kerja (WBS)</h1>
        </div>
    </div>
    <!-- <?php if ($this->session->userdata('role') == 'superadmin') { ?>
        <a href="<?php echo base_url() ?>wbs/createtim?id=<?php echo $WbsList->WEB_CODE ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Tim  WBS</a>
    <?php } 
        else if ($this->session->userdata('role') == 'admin') { ?>
            <a href="<?php echo base_url() ?>wbs/createtim?id=<?php echo $WbsList->WEB_CODE ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Tim WBS</a>
    <?php } ?>   -->
    <?php if ($this->session->userdata('role') == 'superadmin') { ?>
        <a href="<?php echo base_url() ?>wbs/createtim" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Tim  WBS</a>
    <?php } 
        else if ($this->session->userdata('role') == 'admin') { ?>
            <a href="<?php echo base_url() ?>wbs/createtim" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Tim WBS</a>
    <?php } ?>  
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data <small>Tim WBS</small></h2>
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
                                    <th>Nama </th>
                                    <th>WEB CODE </th>
                                    <?php if ($this->session->userdata('role') == 'superadmin') : ?>
                                    <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($list as $TimWbsList) : ?>
                                    <tr>
                                    <td><?php echo $no ?></td>
                                        <td><?php echo $TimWbsList->FULL_NAME?></td>
                                        <td><?php echo $TimWbsList->WEB_CODE ?></td>
                                        <?php if ($this->session->userdata('role') == 'superadmin') : ?>
                                            <td width="11%">
                                                <a href="<?php echo base_url() ?>timwbs/update?id=<?php echo $TimWbsList->ID_TIM ?>" class="btn btn-info btn-xs">
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
                window.location.href = "<?php echo base_url() ?>timwbs/delete?rcgn=<?php echo $TimWbsList->ID_TIM?>";
            });
    }
</script>