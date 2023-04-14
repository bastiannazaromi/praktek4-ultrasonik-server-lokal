<section class="section">
    <div class="section-header">

        <h1><?= $title; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        </div>

    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading">Setting waktu dan suhu</h4>
                    <hr>
                    <p class="mb-0">Format waktu H:i 24 Jam contoh 19:30</p>
                    <p class="mb-0">Kondisi suhu hanya diisi angka!</p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('setting/change_setting'); ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?= $data->id; ?>" name="id">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Jadwal</label>
                                    <input type="text" class="form-control" name="jadwal" value="<?= $data->jadwal; ?>" placeholder="12:00">
                                </div>
                                <div class="form-group">
                                    <label>Kondisi Suhu</label>
                                    <input type="text" class="form-control" name="kondisi_suhu" value="<?= $data->kondisi_suhu; ?>" placeholder="30">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>