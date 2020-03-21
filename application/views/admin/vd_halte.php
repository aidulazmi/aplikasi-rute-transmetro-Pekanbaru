
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    DATA HALTE
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                             <a href="<?php echo site_url('c_halte/tambah_halte')?>">
                            <button type="button" class="btn bg-orange waves-effect">
                                    <i class="material-icons">input</i>
                                    <span>TAMBAH DATA HALTE</span>
                                </button>
                                </a>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                           <th>Nama Halte</th>
                          <th>Alamat Halte</th>  
                          <th>Latitude</th>
                          <th>Longtitude</th>
                          <th>Nama Koridor</th>
                          <th>Foto Halte</th>
                          <th>Keterangan</th>
                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Halte</th>
                          <th>Alamat Halte</th>  
                          <th>Latitude</th>
                          <th>Longtitude</th>
                          <th>Nama Koridor</th>
                          <th>Foto Halte</th>
                          <th>Keterangan</th>
                          <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($user as $u){ ?>
                        <tr>
                          <td><?php echo $u->nama_halte ?></td>
                          <td><?php echo $u->alamat_halte ?></td>  
                          <td><?php echo $u->latitute ?> </td>
                          <td><?php echo $u->longtitude ?></td>
                          <td><?php echo $u->nama_koridor ?></td>
                         <td ><img width="50px" height="50px" src='<?=base_url()?>uploads/<?=$u->foto;?>'></td>
                        <td><?php echo $u->keterangan ?></td>
                          <td class="text-right">
                         <?php echo anchor('c_halte/edit/'.$u->kd_halte,' <i class="material-icons">edit</i>'); ?>
                         <?php echo anchor('c_halte/hapus/'.$u->kd_halte,' <i class="material-icons">delete</i>'); ?>
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