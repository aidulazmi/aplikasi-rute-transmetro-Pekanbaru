    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DATA KORIDOR</h2>
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
                    
                            <h2 class="card-inside-title">MASUKKAN DATA KORIDOR</h2>
                            <div class="row clearfix">
 <form action="<?php  echo site_url('c_koridor/simpan') ?>" method="POST"> 
                                <div class="col-sm-12">
                                    <div class="form-group">
                                       
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nama_koridor" placeholder="Nama Koridor" />
                                        </div>
                                    </div>

                                        <div class="form-group">
                                       
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="Tujuan" placeholder="Tujuan" />
                                        </div>
                                    </div>

                                    <select class="form-control show-tick" name="keterangan">
                                        <option value="">-- Please select --</option>
                                   <option value="aktif">Aktif </option>
                            <option value="taktif">Tidak Aktif</option>
                                    </select>
                                </div>
                              <button type="submit" name="simpan" class="btn bg-orange waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>Simpan</span>
                                </button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>