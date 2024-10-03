<div class="content-wrapper" style="background: linear-gradient(280deg, rgba(181, 203, 153, 0.50) 0%, rgba(223.94, 240.79, 202.48, 0.50) 100%); padding: 0;">
    <section class="content-header">
        <div class="container-fluid;">
            <div class="row mb-4;" style="justify-content: left; text-align:left; margin-left: 40px; margin-top:20px">
                <div class="col-sm-6;">
                    <h1 style="font-weight: bold; font-size:22px; font-family:arial">Ganti Password Admin</h1>
                    <p style="margin-top: 8px;">Amankan akun Anda dengan kombinasi password yang baik</p>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid;" style="max-width: 500px; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24); border-radius: 15px; margin-left:40px; margin-top:20px">
            <form class="" style="background-color: #FAFAFA; border-radius:20px; padding: 30px;" method="post" action="<?php echo site_url('adminpanel/save_ubah_pass'); ?>" autocomplete="off">
                <div class="control-group">
                    <input type="password" class="form-control rounded" id="passlama" name="passlama" placeholder="Password Lama" required="required" data-validation-required-message="Please enter your category ID" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="password" class="form-control rounded" id="passbaru" name="passbaru" placeholder="Password Baru" required="required" data-validation-required-message="Please enter your category ID" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="password" class="form-control rounded" id="konfirpassbaru" name="konfirpassbaru" placeholder="Konfirmasi Password Baru" required="required" data-validation-required-message="Please enter your category ID" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="card-footer d-flex justify-content-end mt-3" style="background-color: #FAFAFA;">
                    <button type="submit" class="btn btn-info  mr-2" style="background-color: #595A59; width:40%; border-radius: 15px;">Simpan</button>
                    <button type="submit" class="btn btn-info" style="background-color: #FAFAFA; width:30%; color:black; border-radius: 15px;">Batal</button>
                </div>
            </form>
        </div>
    </section>
</div>