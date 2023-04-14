<section class="section">
    <div class="section-header">

        <h1><?= $title; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        </div>

    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jml Air</h4>
                        </div>
                        <div class="card-body">
                            <h4 id="jml_air"><?= ($nilai) ? $nilai->jml_air : '0'; ?></h4>

                            <div class="h6 mb-1 font-weight-bold text-danger" id="statusair"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jml Pakan</h4>
                        </div>
                        <div class="card-body">
                            <h4 id="jml_pakan"><?= ($nilai) ? $nilai->jml_pakan : '0'; ?></h4>
                            <div class="h6 mb-1 font-weight-bold text-danger" id="statuspakan"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Suhu</h4>
                        </div>
                        <div class="card-body">
                            <h4 id="suhu"><?= ($nilai) ? $nilai->suhu : '0'; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kelembapan</h4>
                        </div>
                        <div class="card-body">
                            <h4 id="kelembapan"><?= ($nilai) ? $nilai->kelembapan : '0'; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div id="grafik"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/highcharts/exporting.js"></script>
<script src="<?php echo base_url() ?>assets/highcharts/export-data.js"></script>
<script src="<?php echo base_url() ?>assets/highcharts/accessibility.js"></script>

<script>
    var chart;
    var total = 0,
        waktu = [];

    function tampil_grafik() {
        $.ajax({
            url: '<?php echo base_url('admin/get_realtime') ?>',
            dataType: 'json',
            success: function(result) {
                if (result.count > total) {
                    total = result.count;
                    var data_akhir = result.data;
                    var suhu = Number(data_akhir.suhu);
                    var kelembapan = Number(data_akhir.kelembapan);

                    var konfersi = new Date(Date.parse(data_akhir.date));
                    var waktu2 = konfersi.getHours() + ":" + konfersi.getMinutes() + ":" + konfersi
                        .getSeconds();
                    waktu.push(waktu2);

                    chart.series[0].addPoint([data_akhir.waktu, suhu], true, false);
                    chart.series[1].addPoint([data_akhir.waktu, kelembapan], true, false);
                    chart.xAxis[0].setCategories(waktu);
                }

                setTimeout(tampil_grafik, 2000);
            }
        });
    }

    function tampil() {
        var low = "Habis";
        var medium = "Sedang";
        var high = "Penuh";

        $.ajax({
            url: "<?= base_url('admin/get_realtime') ?>",
            dataType: 'json',
            success: function(result) {

                if (result.data.jml_pakan < 20 || result.data.jml_air < 20) {
                    $('#statuspakan').text(low);
                    $('#statusair').text(low);
                } else if (result.data.jml_pakan < 40 || result.data.jml_air < 40) {
                    $('#statuspakan').text(medium);
                    $('#statusair').text(medium);
                } else {
                    $('#statuspakan').text(high);
                    $('#statusair').text(high);
                }

                $('#jml_pakan').text(result.data.jml_pakan + ' cm');
                $('#jml_air').text(result.data.jml_air + ' cm');
                $('#suhu').text(result.data.suhu);
                $('#kelembapan').text(result.data.kelembapan);

                setTimeout(tampil, 2000);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {

        chart = Highcharts.chart('grafik', {
            chart: {
                events: {
                    load: tampil_grafik
                }
            },
            title: {
                text: 'Grafik Suhu dan Kelembapan'
            },
            xAxis: {
                title: {
                    text: 'Waktu'
                },
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Ketinggian'
                }
            },
            series: [{
                name: "Suhu",
                data: []
            }, {
                name: "Kelembapan",
                data: []
            }]
        });

        tampil();
    });
</script>