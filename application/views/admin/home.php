
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_pin</i>
                        </div>
                        <div class="content">
                            <div class="text">Supir</div>
                            <?php
                                $jumlah = $this->db->query("SELECT count(*) as jumlah_data FROM driver")->result();
                                foreach ($jumlah as $jow) {

                                  
                                     echo "<div class='number count-to' data-from='0' data-to='$jow->jumlah_data' data-speed='15' data-fresh-interval='20'></div>";
                                }
                                ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Koridor</div>
                            <?php
                                $jumlah = $this->db->query("SELECT count(*) as jumlah_data FROM tb_rute")->result();
                                foreach ($jumlah as $jow) {

                                  
                                     echo "<div class='number count-to' data-from='0' data-to='$jow->jumlah_data' data-speed='15' data-fresh-interval='20'></div>";
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">directions_bus</i>
                        </div>
                        <div class="content">
                            <div class="text">Halte</div>
                            <?php
                                $jumlah = $this->db->query("SELECT count(*) as jumlah_data FROM halte")->result();
                                foreach ($jumlah as $jow) {

                                  
                                     echo "<div class='number count-to' data-from='0' data-to='$jow->jumlah_data' data-speed='15' data-fresh-interval='20'></div>";
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

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
                            </h2>
                            </a>
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
                          <td class="text-right">
                         <?php echo anchor('c_halte/edit/'.$u->kd_halte,' <i class="material-icons">edit</i>'); ?>
                         <?php echo anchor('c_halte/hapus/'.$u->kd_halte,' <i class="material-icons">delete</i>'); ?>
                         
                          </td>
                        </tr>
                         <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>