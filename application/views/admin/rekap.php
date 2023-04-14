<section class="section">
    <div class="section-header">
        <h1><?= $title; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('admin'); ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><?= $title; ?></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('rekap/delete'); ?>" id="form-delete" method="post">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-danger" id="btn-delete">DELETE</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="check-all"></th>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Jml Pakan</th>
                                            <th>Jml Air</th>
                                            <th>Suhu</th>
                                            <th>Kelembapan</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($nilai as $data) : ?>
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="id[]" value="<?= $data->id; ?>"></td>
                                                <td class="text-center"><?= $i++; ?></td>
                                                <td><?= $data->jml_pakan; ?></td>
                                                <td><?= $data->jml_air; ?></td>
                                                <td><?= $data->suhu; ?></td>
                                                <td><?= $data->kelembapan; ?></td>
                                                <td><?= $data->date; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>