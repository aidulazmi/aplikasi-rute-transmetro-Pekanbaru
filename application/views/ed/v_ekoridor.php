    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>UBAH DATA KORIDOR</h2>
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
                    
                            <h2 class="card-inside-title">UBAH DATA KORIDOR</h2>
                            <div class="row clearfix">
                            <?php foreach($user as $u){ ?>
 <form action="<?php echo site_url('c_koridor/update')?>" method="POST"> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <div class="form-line">
                                            <input type="text" class="form-control" name="id_rute" readonly value="<?php echo $u->id_rute ?>" />
                                        </div>

                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nama_koridor" value="<?php echo $u->nama_koridor ?>" placeholder="Nama Koridor" />
                                        </div>

                                        <div class="form-line">
                                            <input type="text" class="form-control" name="Tujuan" value="<?php echo $u->Tujuan ?>" placeholder="Tujuan" />
                                        </div>
                                    </div>
                                    <select class="form-control show-tick" name="keterangan">

                                        <option> <?=$u->keterangan;?> </option>
                            <option>--------</option>
                            <option value="aktif">Aktif </option>
                            <option value="taktif">Tidak Aktif</option>
                                    </select>
                                </div>
                              <button type="submit" value="simpan"  class="btn bg-orange waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>SAVE</span>
                                </button>
                            </div>
                            </form>
                             <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>