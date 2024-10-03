<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 0;">
    <section class="content-header">
        <div class="container-fluid;">
            <div class="row mb-4;" style="justify-content: left; text-align:left; margin-left: 40px; margin-top:20px">
                <div class="col-sm-6;">
                    <h1 style="font-weight: bold; font-size:22px; font-family:arial">Form Ubah Customer</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
    <div class="container-fluid;" style="max-width: 700px; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24); border-radius: 15px; margin-left:40px; margin-top:20px">
        <form class="form-horizontal" style="background-color: #FAFAFA; border-radius:20px; padding: 30px;" method="post" action="<?php echo site_url('customer/save_edit'); ?>">
        <input type="hidden" name="id" value="<?php echo $penyewa->ID_PENYEWA; ?>">
            <div class="row">
                <div class="col-md-6">
                <div class="control-group">
                    <input type="text" class="form-control rounded" id="name" name="idCus" placeholder="ID Customer" required="required" data-validation-required-message="Please enter your customer ID" value="<?php echo $penyewa->ID_PENYEWA; ?>" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control" id="name" name="namaCus" placeholder="Nama Customer" required="required" data-validation-required-message="Please enter your customer name" value="<?php echo $penyewa->NAMA_PENYEWA; ?>" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control" id="name" name="jenkel" placeholder="Jenis Kelamin" required="required" data-validation-required-message="Please enter your gender" value="<?php echo $penyewa->JENIS_KELAMIN; ?>" />
                    <p class="help-block text-danger"></p>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="control-group">
                    <input type="text" class="form-control" id="name" name="nohp" placeholder="No HP" required="required" data-validation-required-message="Please enter your phone number" value="<?php echo $penyewa->NO_TELP_PENYEWA; ?>" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <textarea type="text" class="form-control" id="emfail" name="alamat" placeholder="Alamat" required="required" data-validation-required-message="Please enter your address" rows="3"><?php echo $penyewa->ALAMAT_PENYEWA; ?></textarea>
                    <p class="help-block text-danger"></p>
                </div>       
            </div>
        </div>
            <div class="card-footer d-flex justify-content-end mt-3" style="background-color: #FAFAFA;">
                <button type="submit" class="btn btn-info mr-2" style="background-color: #595A59; width:30%; border-radius: 15px;">Simpan</button>
                <div>
                    <a href="<?php echo site_url('customer'); ?>" class="btn btn-info" style="background-color: #FAFAFA; width:120%; color:black; border-radius: 15px;">Batal</a>
                </div>  
            </div>
        </form>
    </div>
    </section>
</div>
