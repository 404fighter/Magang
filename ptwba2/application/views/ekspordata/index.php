<div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Ekspor Data Penempatan Aktif</h4>
                                    <div class="ms-auto">
                                        <select id="filterLokasi" class="form-select">
                                            <option value="">Pilih Lokasi</option>
                                            <?php foreach ($lokasi as $lk) : ?>
                                            <option value="<?= $lk->nama_lokasi ?>"><?= $lk->nama_lokasi ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="eksporTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Lokasi</th>
                                                <th>Nama Karyawan</th>
                                                <th>Jabatan</th>
                                                <th>NIK</th>
                                                <th>TMT</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Gada</th>
                                                <th>TTL</th>
                                                <th>No Telepon</th>
                                                <th>Alamat</th>
                                                <th>No KK</th>
                                                <th>No KTP</th>
                                                <th>Status Kawin</th>
                                                <th>Nama Ibu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data_penempatan)): ?>
                                            <?php foreach ($data_penempatan as $pt): ?>
                                                <tr>
                                                    <td><?= $pt->id ?></td>
                                                    <td><?= $pt->nama_lokasi ?></td>
                                                    <td><?= $pt->nama_karyawan ?></td>
                                                    <td><?= $pt->jabatan ?></td>
                                                    <td><?= $pt->nik ?></td>
                                                    <td><?= $pt->tmt ?></td>
                                                    <td><?= $pt->tgl_mulai ?></td>
                                                    <td><?= $pt->tgl_selesai ?></td>
                                                    <td><?= $pt->gada ?></td>
                                                    <td><?= $pt->ttl ?></td>
                                                    <td><?= $pt->no_telp ?></td>
                                                    <td><?= $pt->alamat ?></td>
                                                    <td><?= $pt->no_kk ?></td>
                                                    <td><?= $pt->no_ktp ?></td>
                                                    <td><?= $pt->status_kawin ?></td>
                                                    <td><?= $pt->nama_ibu ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="16">No data available</td>
                                                </tr>
                                            <?php endif; ?>
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