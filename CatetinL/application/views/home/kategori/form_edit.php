<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 0;">
    <section class="content-header">
        <div class="container-fluid;">
            <div class="row mb-4;" style="justify-content: left; text-align:left; margin-left: 40px; margin-top:20px">
                <div class="col-sm-6;">
                    <h1 style="font-weight: bold; font-size:22px; font-family:arial">Form Ubah Kategori</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid" >
            <div class="row" style="justify-content: left; text-align:left; margin-left: 25px; margin-top:20px">
                <div class="col-md-6" >
                        <form class="form-horizontal"  style="background-color: #FAFAFA; max-width: 500px; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);border-radius:20px; padding: 20px;" method="post" action="<?php echo site_url('kategori/save_edit');?>">
                        <input style="background-color: #FFF2D8;" type="hidden" name="id" value="<?php echo $kategori->ID_KATEGORI; ?>">
                        <div class="card-body">
                            <div class="form-group-row">
                                <div class="col-sm-12">
                                <input type="text" class="form-control rounded" id="emfail" name="idKat" placeholder="ID Kategori" value="<?php echo $kategori->ID_KATEGORI; ?>"
                                    required="required" data-validation-required-message="Please enter your category ID" />
                                <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-group-row">
                                <div class="col-sm-12">
                                <input type="text" class="form-control rounded" id="emfail" name="namaKat" placeholder="Nama Kategori" value="<?php echo $kategori->NAMA_KATEGORI; ?>"
                                    required="required" data-validation-required-message="Please enter your category name" />
                                <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end mt-3" style="background-color: #FAFAFA;">
                        <button type="submit" class="btn btn-info  mr-2" style="background-color: #595A59; width:40%; border-radius: 15px;">Simpan</button>
                            <div>
                                <a href="<?php echo site_url('kategori');?>" class="btn btn-info" style="background-color: #FAFAFA; width:120%; color:black; border-radius: 15px;">Batal</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>