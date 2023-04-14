<div class="card card-primary">

    <form method="post" action="<?= base_url('auth/proses'); ?>" id="form-login">
        <div class="card-body">
            <div class="text-center">
                <img src="<?= base_url('assets/img/phb-logo.png'); ?>" class="img-fluid" width="100" alt="">
                <h4 class="mt-2"><?= $title; ?></h4>
            </div>
            <div class="row">
                <div class="form-group col-md">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Login
                </button>
            </div>
        </div>
    </form>
</div>