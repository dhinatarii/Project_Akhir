<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 0;">
    <section class="content-header">
        <div class="container-fluid;">
            <div class="row mb-4;" style="justify-content: left; text-align:left; margin-left: 40px; margin-top:20px">
                <div class="col-sm-6;">
                    <h1 style="font-weight: bold; font-size:22px; font-family:arial">Form Ubah Produk</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid;" style="max-width: 700px; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24); border-radius: 15px; margin-left:40px; margin-top:20px">
            <form class="form-horizontal" style="background-color: #FAFAFA; border-radius:20px; padding: 30px;" method="post" action="<?php echo site_url('produk/save_edit'); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="control-group">
                            <input type="hidden" name="id" value="<?php echo $produk->ID_PRODUK; ?>">
                            <select class="form-control rounded" name="kategori">
                                <?php foreach ($kategori as $val) { ?>
                                    <option value="<?php echo $val->ID_KATEGORI; ?>"><?php echo $val->NAMA_KATEGORI; ?></option>
                                <?php } ?>
                            </select>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="idProduk" name="idProduk" value="<?php echo $produk->ID_PRODUK; ?>" placeholder="ID Produk" required="required" data-validation-required-message="Please enter your product ID" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="namaProduk" name="namaProduk" value="<?php echo $produk->NAMA_PRODUK; ?>" placeholder="Nama Produk" required="required" data-validation-required-message="Please enter your product name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="file" class="form-control" id="gambar" name="gambar" value="<?php echo $produk->GAMBAR; ?>" placeholder="Gambar Produk" required="required" data-validation-required-message="Please enter your product photo" />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="control-group">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $produk->HARGA_PRODUK; ?>" placeholder="Harga Produk" required="required" data-validation-required-message="Please enter your product price" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Produk" required="required" data-validation-required-message="Please enter your product description" rows="5"> <?php echo $produk->DESKRIPSI; ?></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end mt-3" style="background-color: #FAFAFA;">
                    <button type="submit" class="btn btn-info mr-2" style="background-color: #595A59; width:30%; border-radius: 15px;">Simpan</button>
                    <div>
                        <a href="<?php echo site_url('produk'); ?>" class="btn btn-info" style="background-color: #FAFAFA; width:120%; color:black; border-radius: 15px;">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>