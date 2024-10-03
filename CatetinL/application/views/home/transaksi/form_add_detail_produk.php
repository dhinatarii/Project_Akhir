<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 0;">
    <section class="content-header">
        <div class="container-fluid;">
            <div class="row mb-4;" style="justify-content: left; text-align:left; margin-left: 40px; margin-top:20px">
                <div class="col-sm-6;">
                    <h1 style="font-weight: bold; font-size:22px; font-family:arial">Form Tambah Detail Transaksi</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid;" style="max-width: 600px; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24); border-radius: 15px; margin-left:40px; margin-top:20px">
            <form class="form-horizontal" style="background-color: #FAFAFA; border-radius:20px; padding: 30px;" method="post" action="<?php echo site_url('detailtransaksi/save_dt'); ?>">
                <input type="hidden" name="idTransaksi" value="<?php echo $ID_TRANSAKSI; ?>">
                    <div class="control-group" >
                        <select class="form-control" name="produk">
                            <?php foreach ($produk as $val) { ?>
                                <option value="<?php echo $val->ID_PRODUK; ?>"><?php echo $val->NAMA_PRODUK; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                <div class="card-footer d-flex justify-content-end mt-3" style="background-color: #FAFAFA;">
                    <button type="submit" class="btn btn-info mr-2" style="background-color: #595A59; width:30%; border-radius: 15px;">Simpan</button>
                    <div>
                        <a href="<?php echo site_url('detailtransaksi/index/'. $ID_TRANSAKSI); ?>" class="btn btn-info" style="background-color: #FAFAFA; width:120%; color:black; border-radius: 15px;">Batal</a>
                    </div>  
                </div>
            </form>
        </div>
    </section>
</div>