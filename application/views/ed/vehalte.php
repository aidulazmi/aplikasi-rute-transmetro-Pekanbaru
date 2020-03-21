    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DATA HALTE</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                    
                            <h2 class="card-inside-title">MASUKKAN DATA HALTE</h2>
                            <div class="row clearfix">
                             <?php foreach($user as $u){ ?>
<?php echo form_open_multipart('c_halte/update');?>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                       
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="kd_halte" readonly value="<?php echo $u->kd_halte ?>" placeholder="Username" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nama_halte" value="<?php echo $u->nama_halte ?>" placeholder="Nama Halte" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="alamat_halte" value="<?php echo $u->alamat_halte ?>" placeholder="Alamat Halte" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="form-line">
                                           <select class="form-control show-tick" name="nama_koridor">
                                           <option> <?=$u->nama_koridor;?> </option>
                                           <option>-------Silahkan Pilih Koridor-------</option>
                                                <?php                                
                                                   foreach ($dd_bidang as $row) {  
                                                      echo "<option value='".$row->nama_koridor."'>".$row->nama_koridor."</option>";
                                                }
                                                       echo"
                                            </select>"
                                                ?>

                                    </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="userfile"><br>
                                            <img src="<?php echo base_url()?>uploads/<?php echo $u->foto ?>" width="90" alt="" name="userfile">
                                            <input type="hidden" name="userfile" value="<?php echo $u->kd_halte ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="latitute" value="<?php echo $u->latitute ?>" placeholder="Latitute" id="latitude" />
                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="longtitude" value="<?php echo $u->longtitude ?>"  placeholder="Longtitude" id="longitude" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                             <select class="form-control show-tick" name="keterangan">
                                                 <option> <?=$u->keterangan;?> </option>
                                                 <option value="">-- Please select --</option>
                                                 <option value="transit">Transit </option>
                                                 <option value="notransit">Tidak Transit</option>
                                             </select>
                                    </div>
                                    </div>
 <!-------------------------------------------------------------------PETA-------------------------------------->
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                            $this->load->view('admin/halte');
                                            ?>
                                    </div>
                                        </div>  
<!------------------------------------------------------------------ ------------------------------------------>
                                    </div>

                            <button type="submit" name="simpan" value="upload" class="btn bg-orange waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>Simpan</span>
                            </button>

                            <button type="submit" class="btn bg-orange waves-effect" id="clearmap">
                                    <i class="material-icons">delete</i>
                                    <span>Hapus Marker</span>
                            </button>
                            </div>
<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>

     <script type="text/javascript">
      $(document).ready(function() {
          $.uploadPreview({
              input_field: "#image-upload",
              preview_box: "#image-preview",
              label_field: "#image-label"
          });
      });
    </script>