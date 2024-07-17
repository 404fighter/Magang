<div class="container">
            <div class="page-inner">
                <div class="page-header">
                <h4 class="page-title"><?= isset($title) ? $title : 'Default Title'; ?></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                    </li>
                    <li class="separator">
                    <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                    <a href="#">Pages</a>
                    </li>
                    <li class="separator">
                    <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                    <a href="#">Starter Page</a>
                    </li>
                </ul>
                </div>

                <!-- Cards Section -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card text-bg-primary">
                            <div class="card-header fs-6">Jumlah Karyawan</div>
                                <div class="card-body">
                                    <h4 class="card-text text-center">
                                        <?= $jumlah_karyawan; ?>
                                    </h4>
                                </div>
                                <div class="card-footer bg-transparent border-success d-flex justify-content-between align-items-center">
                                    Detail Karyawan<i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card text-bg-warning">
                            <div class="card-header fs-5">Jumlah Jabatan</div>
                            <div class="card-body">
                                <h4 class="card-text text-center">
                                    <?= $jumlah_jabatan; ?> <!-- Ganti dengan variabel jumlah jabatan -->
                                </h4>
                            </div>
                            <div class="card-footer bg-transparent border-success d-flex justify-content-between align-items-center">
                                Detail Jabatan<i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card text-bg-success">
                            <div class="card-header fs-5">Jumlah Lokasi</div>
                            <div class="card-body">
                                <h4 class="card-text text-center">
                                    <?= $jumlah_lokasi; ?> <!-- Ganti dengan variabel jumlah lokasi -->
                                </h4>
                            </div>
                            <div class="card-footer bg-transparent border-success d-flex justify-content-between align-items-center">
                                Detail Lokasi<i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Line Chart</div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                <canvas id="lineChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data Penempatan</h4>
                                    <!-- <a class="btn btn-primary btn-round ms-auto" href="<? base_url('penempatan'); ?>">
                                        Detail Penempatan
                                    </a> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="penempatanTable" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Lokasi</th>
                                                <th>Nama Karyawan</th>
                                                <th>Jabatan</th>
                                                <th>N.I.K</th>
                                                <th>TMT</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($penempatan as $pt) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $pt->nama_lokasi; ?></td>
                                                <td><?= $pt->nama_karyawan; ?></td>
                                                <td><?= $pt->jabatan; ?></td>
                                                <td><?= $pt->nik; ?></td>
                                                <td><?= $pt->tmt; ?></td>
                                                <td><?= $pt->status_penempatan == 1 ? 'Aktif' : 'Nonaktif'; ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

          </div>
    </div>
</div>