    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DATA SUPIR</h2>
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
                    
                            <h2 class="card-inside-title">MASUKKAN DATA SUPIR</h2>
                            <div class="row clearfix">
                             <?php foreach($user as $u){ ?>
<?php echo form_open_multipart('c_supir/update');?>
                                <div class="col-sm-12">

                                    <div class="form-group">
                                       
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="id_driver" readonly value="<?php echo $u->id_driver ?>" placeholder="Username" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="Username" value="<?php echo $u->Username ?>" placeholder="Username" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password" value="<?php echo $u->password ?>" placeholder="Password" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="email" value="<?php echo $u->email ?>" placeholder="Email" />
                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nm_lengkap" value="<?php echo $u->nm_lengkap ?>" placeholder="Nama Lengkap" />
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
                                            <input type="text" class="form-control" name="alamat" value="<?php echo $u->alamat ?>" placeholder="Alamat" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="no_hp" value="<?php echo $u->no_hp ?>" placeholder="No. HP" />
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="platn" value="<?php echo $u->platn ?>" placeholder="Plat Nomor" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="userfile"><br>
                                            <img src="<?php echo base_url()?>uploads/supir/<?php echo $u->foto ?>" width="90" alt="" name="userfile">
                                            <input type="hidden" name="userfile" value="<?php echo $u->id_driver ?>">
                                        </div>
                                    </div>


                                    </div>
                             <button type="submit" name="simpan" value="upload" class="btn bg-orange waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>Simpan</span>
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