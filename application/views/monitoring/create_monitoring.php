<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-tasks"></i> Tambah Data Monitoring</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Masukkan Data Monitoring</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <?php
                        $announce = $this->session->flashdata('announce');
                        if (!empty($announce)) {
                            if ($announce == 'Berhasil menyimpan data') {
                                echo '
                                        <div class="alert alert-success">
                                        ' . $announce . '
                                        </div>
                                    ';
                            } else {
                                echo '
                                        <div class="alert alert-danger">
                                        ' . $announce . '
                                        </div>
                                    ';
                            }
                        }
                        ?>
                        <form method="post" action="<?php echo base_url() ?>monitoring/submit" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pegawai</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="full_name" class="form-control col-md-3 col-sm-3 col-xs-12">
                                    <option value="" >Pilih Nama Pegawai</option>
                                    <?php foreach ($user as $usr) : ?>
                                        <option value="<?php echo $usr->FULLNAME?>"><?php echo $usr->FULLNAME?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="tanggal" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pekerjaan</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="nama_pekerjaan" class="form-control col-md-3 col-sm-3 col-xs-12">
                                    <option value="" >Pilih Nama Pekerjaan</option>
                                    
                                    <?php foreach ($penugasan as $pngsn) : ?>
                                        <option value="<?php echo $pngsn->NAMA_PEKERJAAN ?>"><?php echo $pngsn->NAMA_PEKERJAAN ?></option>
                                    <?php endforeach; ?>
                                
                                </select>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Uraian Kegitan
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="uraian_kegiatan" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Durasi (Jam)
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="integer" name="durasi" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Progres(%)
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="integer" name="progres" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Catatan
                                </label>    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" name="catatan" class="form-control col-md-7 col-xs-12" rows="3" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kendala
                                </label>    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" name="kendala" class="form-control col-md-7 col-xs-12" rows="3" ></textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="<?php echo base_url() ?>monitoring">Kembali</a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>