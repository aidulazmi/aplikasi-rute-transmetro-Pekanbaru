
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DATA SUPIR
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                             <a href="<?php echo site_url('c_supir/input_supir')?>">
                            <button type="button" class="btn bg-orange waves-effect">
                                    <i class="material-icons">input</i>
                                    <span>TAMBAH DATA SUPIR</span>
                                </button>
                                </a>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                          <th>Username</th>
                          <th>Nama Lengkap</th>
                          <th>Koridor</th>
                          <th>Plat Nomor</th>
                          <th>Alamat</th>
                          <th>No Hp</th>
                          <th>Foto</th>
                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                          <th>Username</th>
                          <th>Nama Lengkap</th>
                          <th>Koridor</th>
                          <th>Plat Nomor</th>
                          <th>Alamat</th>
                          <th>No Hp</th>
                          <th>Foto</th>
                                <th>Action</th>

                                        </tr>
                                        
                                    </tfoot>
                                     <?php foreach($user as $u){ ?>
                        <tr>
                          <td><?php echo $u->Username ?></td>
                          <td><?php echo $u->nm_lengkap ?></td>
                          <td><?php echo $u->nama_koridor ?></td>
                          <td><?php echo $u->platn ?></td>
                          <td><?php echo $u->alamat ?></td>
                          <td><?php echo $u->no_hp ?></td>
                         <td ><img width="50px" height="50px" src='<?=base_url()?>uploads/supir/<?=$u->foto;?>'></td>
                          <td class="text-right">
                         <?php echo anchor('c_supir/edit/'.$u->id_driver,' <i class="material-icons">edit</i>'); ?>
                         <?php echo anchor('c_supir/hapus/'.$u->id_driver,' <i class="material-icons">delete</i>'); ?>
                          </td>
                        </tr>
                         <?php } ?>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?=base_url();?>/assets2/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url();?>/assets2/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?=base_url();?>/assets2/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?=base_url();?>/assets2/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url();?>/assets2/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?=base_url();?>/assets2/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?=base_url();?>/assets2/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?=base_url();?>/assets2/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?=base_url();?>/assets2/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?=base_url();?>/assets2/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?=base_url();?>/assets2/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?=base_url();?>/assets2/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?=base_url();?>/assets2/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?=base_url();?>/assets2/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url();?>/assets2/js/admin.js"></script>
    <script src="<?=base_url();?>/assets2/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="<?=base_url();?>/assets2/js/demo.js"></script>