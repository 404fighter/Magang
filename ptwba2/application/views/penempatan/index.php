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
                            <h4 class="card-title">Data Penempatan</h4>
                            <?php if ($this->session->userdata('role_id') != 3) : ?>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addPenempatanModal">
                                    <i class="fa fa-plus"></i>
                                    Tambah Penempatan
                                </button>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div class="me-2">
                                <select id="filterLokasiPen" class="form-select">
                                    <option value="">Pilih Lokasi</option>
                                    <?php foreach ($lokasi as $lk) : ?>
                                    <option value="<?= $lk->nama_lokasi ?>"><?= $lk->nama_lokasi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <select id="filterStatusPen" class="form-select">
                                    <option value="">Pilih Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                        </div>
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
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Selesai</th>
                                        <th>Status</th>
                                        <?php if ($this->session->userdata('role_id') != 3) : ?>
                                            <th>Aksi</th>
                                        <?php endif; ?>
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
                                            <td><?= $pt->tgl_mulai; ?></td>
                                            <td><?= $pt->tgl_selesai; ?></td>
                                            <td><?= $pt->status_penempatan == 0 ? 'Nonaktif' : 'Aktif'; ?></td>
                                            <?php if ($this->session->userdata('role_id') != 3) : ?>
                                                <td>
                                                    <button class="btn btn-warning btn-sm btn-edit-penempatan" data-id="<?= $pt->id; ?>" data-nama_lokasi="<?= $pt->nama_lokasi; ?>" data-nama_karyawan="<?= $pt->nama_karyawan; ?>" data-jabatan="<?= $pt->jabatan; ?>" data-nik="<?= $pt->nik; ?>" data-tmt="<?= $pt->tmt; ?>" data-tgl_mulai="<?= $pt->tgl_mulai; ?>" data-tgl_selesai="<?= $pt->tgl_selesai; ?>" data-status="<?= $pt->status_penempatan; ?>">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm btn-delete-penempatan" data-id="<?= $pt->id; ?>"><i class="far fa-trash-alt"></i></button>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Add Penempatan Modal -->
                        <div class="modal fade" id="addPenempatanModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Tambah</span>
                                            <span class="fw-light">Penempatan</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form-add-penempatan" method="post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Lokasi</label>
                                                        <select id="addNamaLokasi" name="id_lokasi" class="form-control">
                                                            <?php foreach ($lokasi as $lk) : ?>
                                                                <option value="<?= $lk->id ?>"><?= $lk->nama_lokasi ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Karyawan</label>
                                                        <select id="addNamaKaryawan" name="id_karyawan" class="form-control">
                                                            <?php foreach ($cek_karyawan as $ky) : ?>
                                                                <option value="<?= $ky->id ?>"><?= $ky->nama_karyawan ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Jabatan</label>
                                                        <select id="addJabatan" name="id_jabatan" class="form-control">
                                                            <?php foreach ($jabatan as $jb) : ?>
                                                                <option value="<?= $jb->id ?>"><?= $jb->jabatan ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>NIK</label>
                                                        <input id="addNik" name="nik" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>TMT</label>
                                                        <input id="addTmt" name="tmt" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Tgl Mulai</label>
                                                        <input id="addMulai" name="tgl_mulai" type="date" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Tgl Selesai</label>
                                                        <input id="addSelesai" name="tgl_selesai" type="date" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Status Penempatan</label>
                                                        <select id="addStatus" name="status_penempatan" class="form-control">
                                                            <option value="1">Aktif</option>
                                                            <option value="0">Nonaktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-primary" id="btn-add-penempatan">Tambah</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Penempatan Modal -->
                        <div class="modal fade" id="editPenempatanModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Edit</span>
                                            <span class="fw-light">Penempatan</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form-edit-penempatan" method="post">
                                            <input type="hidden" id="editId" name="id">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Lokasi</label>
                                                        <select id="editNamaLokasi" name="id_lokasi" class="form-control">
                                                            <?php foreach ($lokasi as $lk) : ?>
                                                                <option value="<?= $lk->id ?>"><?= $lk->nama_lokasi; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Karyawan</label>
                                                        <select id="editNamaKaryawan" name="id_karyawan" class="form-control">
                                                            <?php foreach ($karyawan as $ky) : ?>
                                                                <option value="<?= $ky->id ?>"><?= $ky->nama_karyawan ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Jabatan</label>
                                                        <select id="editJabatan" name="id_jabatan" class="form-control">
                                                            <?php foreach ($jabatan as $jb) : ?>
                                                                <option value="<?= $jb->id ?>"><?= $jb->jabatan ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>NIK</label>
                                                        <input id="editNik" name="nik" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>TMT</label>
                                                        <input id="editTmt" name="tmt" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Status Penempatan</label>
                                                        <select id="editStatus" name="status_penempatan" class="form-control">
                                                            <option value="1">Aktif</option>
                                                            <option value="0">Nonaktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Tgl Mulai</label>
                                                        <input id="editMulai" name="tgl_mulai" type="date" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Tgl Selesai</label>
                                                        <input id="editSelesai" name="tgl_selesai" type="date" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-primary" id="btn-edit-penempatan">Simpan Perubahan</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>