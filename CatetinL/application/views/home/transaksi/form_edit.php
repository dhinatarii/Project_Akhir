<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 0;">
    <section class="content-header">
        <div class="container-fluid;">
            <div class="row mb-4;" style="justify-content: left; text-align:left; margin-left: 40px; margin-top:20px">
                <div class="col-sm-6;">
                    <h1 style="font-weight: bold; font-size:22px; font-family:arial">Form Ubah Transaksi</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid;" style="max-width: 600px; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24); border-radius: 15px; margin-left:40px; margin-top:20px">
            <form class="form-horizontal" style="background-color: #FAFAFA; border-radius:20px; padding: 30px;" method="post" action="<?php echo site_url('transaksi/save_edit'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="idPenyewa" value="<?php echo $transaksi->ID_PENYEWA; ?>">
            <input type="hidden" name="id" value="<?php echo $transaksi->ID_TRANSAKSI; ?>">
                <div class="control-group" >
                <input type="text" class="form-control" id="name" name="idTrans" value="<?php echo $transaksi->ID_TRANSAKSI; ?>" placeholder="ID Transaksi" required="required" data-validation-required-message="Please enter your transaction ID" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                <option value="">Tanggal Pinjam</option>
                <input type="date" class="form-control" id="name" name="tglPinjam" value="<?php echo $transaksi->TANGGAL_PEMINJAMAN; ?>" placeholder="Tanggal Pinjam" required="required" data-validation-required-message="Please enter your borrowing date" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                <option value="">Tanggal Kembali</option>
                <input type="date" class="form-control" id="emfail" name="tglDefaultKembali" value="<?php echo $transaksi->TANGGAL_HARUS_KEMBALI; ?>" placeholder="Tanggal Kembali" required="required" data-validation-required-message="Please enter your return date" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                <input type="text" class="form-control" id="name" name="jaminan" value="<?php echo $transaksi->JAMINAN; ?>" placeholder="Jaminan" required="required" data-validation-required-message="Please enter your guarantee" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="card-footer d-flex justify-content-end mt-3" style="background-color: #FAFAFA;">
                <button type="submit" class="btn btn-info mr-2" style="background-color: #595A59; width:30%; border-radius: 15px;">Simpan</button>
                <div>
                    <a href="<?php echo site_url('transaksi/index/'.$transaksi->ID_PENYEWA); ?>" class="btn btn-info" style="background-color: #FAFAFA; width:120%; color:black; border-radius: 15px;">Batal</a>
                </div>  
            </div>
            </form>
        </div>
    </section>
</div>