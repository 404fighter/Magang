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
                            <h4 class="card-title">Data Karyawan</h4>
                            <?php if ($this->session->userdata('role_id') != 3) : ?>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addKaryawanModal">
                                    <i class="fa fa-plus"></i>
                                    Tambah Karyawan
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="karyawanTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Karyawan</th>
                                        <th style="text-align: center;">No Telp</th>
                                        <th style="text-align: center;">Alamat</th>
                                        <th style="text-align: center;">Status Kawin</th>
                                        <th style="text-align: center;">Status Gada</th>
                                        <?php if ($this->session->userdata('role_id') != 3) : ?>
                                            <th style="width: 150px; text-align: center;">Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($karyawan as $k) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $k->nama_karyawan; ?></td>
                                            <td><?= $k->no_telp; ?></td>
                                            <td><?= $k->alamat; ?></td>
                                            <td style="text-align: center;"><?= $k->status_kawin; ?></td>
                                            <td style="text-align: center;"><?= $k->gada; ?></td>
                                            <?php if ($this->session->userdata('role_id') != 3) : ?>
                                                <td style="width: 150px; text-align: center;">
                                                    <button class="btn btn-success btn-sm btn-view-karyawan" data-id="<?= $k->id; ?>" data-nama="<?= $k->nama_karyawan; ?>"><i class="far fa-eye"></i></button>
                                                    <button class="btn btn-warning btn-sm btn-edit-karyawan" data-id="<?= $k->id; ?>" data-nama_karyawan="<?= htmlspecialchars($k->nama_karyawan); ?>" data-ttl="<?= htmlspecialchars($k->ttl); ?>" data-no_telp="<?= htmlspecialchars($k->no_telp); ?>" data-alamat="<?= htmlspecialchars($k->alamat); ?>" data-email="<?= htmlspecialchars($k->email); ?>" data-nama_ibu="<?= htmlspecialchars($k->nama_ibu); ?>" data-tinggi_badan="<?= htmlspecialchars($k->tinggi_badan); ?>" data-berat_badan="<?= htmlspecialchars($k->berat_badan); ?>" data-no_kk="<?= htmlspecialchars($k->no_kk); ?>" data-no_ktp="<?= htmlspecialchars($k->no_ktp); ?>" data-id_agama="<?= $k->id_agama; ?>" data-id_jenis_kelamin="<?= $k->id_jenis_kelamin; ?>" data-id_pendidikan="<?= $k->id_pendidikan; ?>" data-id_kawin="<?= $k->id_kawin; ?>" data-id_gada="<?= $k->id_gada; ?>">
                                                        <i class="far fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm btn-delete-karyawan" data-id="<?= $k->id; ?>"><i class="far fa-trash-alt"></i></button>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- View Karyawan Modal -->
                        <div class="modal fade" id="viewKaryawanModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">View Detail</span>
                                            <span class="fw-light">Karyawan</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form-view-karyawan" method="post">
                                            <input type="hidden" id="viewId" name="id">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Karyawan</label>
                                                        <input id="viewNamaKaryawan" name="nama_karyawan" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>TTL</label>
                                                        <input id="viewTtl" name="ttl" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No Telp</label>
                                                        <input id="viewNoTelp" name="no_telp" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Alamat</label>
                                                        <input id="viewAlamat" name="alamat" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input id="viewEmail" name="email" type="email" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Ibu</label>
                                                        <input id="viewNamaIbu" name="nama_ibu" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Tinggi Badan</label>
                                                        <input id="viewTinggiBadan" name="tinggi_badan" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Berat Badan</label>
                                                        <input id="viewBeratBadan" name="berat_badan" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No Kartu Keluarga</label>
                                                        <input id="viewNoKk" name="no_kk" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No KTP</label>
                                                        <input id="viewNoKtp" name="no_ktp" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Agama</label>
                                                        <input id="viewAgama" name="id_agama" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Jenis Kelamin</label>
                                                        <input id="viewJenisKelamin" name="id_jenis_kelamin" type="text" class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Pendidikan</label>
                                                        <input id="viewPendidikan" name="id_pendidikan" type="text" class="form-control" disabled>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Status Kawin</label>
                                                        <input id="viewKawin" name="id_kawin" type="text" class="form-control" disabled>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Status Gada</label>
                                                        <input id="viewGada" name="id_gada" type="text" class="form-control" disabled>
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add Karyawan Modal -->
                        <div class="modal fade" id="addKaryawanModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Tambah</span>
                                            <span class="fw-light">Karyawan</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form-add-karyawan" method="post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Karyawan</label>
                                                        <input id="addNamaKaryawan" name="nama_karyawan" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>TTL</label>
                                                        <input id="addTtl" name="ttl" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No Telp</label>
                                                        <input id="addNoTelp" name="no_telp" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Alamat</label>
                                                        <input id="addAlamat" name="alamat" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input id="addEmail" name="email" type="email" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Ibu</label>
                                                        <input id="addNamaIbu" name="nama_ibu" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Tinggi Badan</label>
                                                        <input id="addTinggiBadan" name="tinggi_badan" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Berat Badan</label>
                                                        <input id="addBeratBadan" name="berat_badan" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No Kartu Keluarga</label>
                                                        <input id="addNoKk" name="no_kk" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No KTP</label>
                                                        <input id="addNoKtp" name="no_ktp" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Agama</label>
                                                        <select id="editAgama" name="id_agama" class="form-control">
                                                            <?php foreach ($agama as $ag) : ?>
                                                                <option value="<?= $ag->id ?>"><?= $ag->ket_agama; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Jenis Kelamin</label>
                                                        <select id="editJenisKelamin" name="id_jenis_kelamin" class="form-control">
                                                            <?php foreach ($jenis_kelamin as $jk) : ?>
                                                                <option value="<?= $jk->id ?>"><?= $jk->keterangan_jk; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Pendidikan</label>
                                                        <select id="editPendidikan" name="id_pendidikan" class="form-control">
                                                            <?php foreach ($pendidikan as $p) : ?>
                                                                <option value="<?= $p->id ?>"><?= $p->pendidikan; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Status Kawin</label>
                                                        <select id="editKawin" name="id_kawin" class="form-control">
                                                            <?php foreach ($kawin as $k) : ?>
                                                                <option value="<?= $k->id ?>"><?= $k->keterangan_kw; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Status Gada</label>
                                                        <select id="editGada" name="id_gada" class="form-control">
                                                            <?php foreach ($gada as $g) : ?>
                                                                <option value="<?= $g->id ?>"><?= $g->keterangan_gd ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-primary" id="btn-add-karyawan">Tambah</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Karyawan Modal -->
                        <div class="modal fade" id="editKaryawanModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Edit</span>
                                            <span class="fw-light">Karyawan</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form-edit-karyawan" method="post">
                                            <input type="hidden" id="editId" name="id">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Karyawan</label>
                                                        <input id="editNamaKaryawan" name="nama_karyawan" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>TTL</label>
                                                        <input id="editTtl" name="ttl" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No Telp</label>
                                                        <input id="editNoTelp" name="no_telp" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Alamat</label>
                                                        <input id="editAlamat" name="alamat" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input id="editEmail" name="email" type="email" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama Ibu</label>
                                                        <input id="editNamaIbu" name="nama_ibu" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Tinggi Badan</label>
                                                        <input id="editTinggiBadan" name="tinggi_badan" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Berat Badan</label>
                                                        <input id="editBeratBadan" name="berat_badan" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No Kartu Keluarga</label>
                                                        <input id="editNoKk" name="no_kk" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>No KTP</label>
                                                        <input id="editNoKtp" name="no_ktp" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Agama</label>
                                                        <select id="editAgama" name="id_agama" class="form-control">
                                                            <?php foreach ($agama as $agama) : ?>
                                                                <option value="<?= $agama->id ?>"><?= $agama->ket_agama; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Jenis Kelamin</label>
                                                        <select id="editJenisKelamin" name="id_jenis_kelamin" class="form-control">
                                                            <?php foreach ($jenis_kelamin as $jk) : ?>
                                                                <option value="<?= $jk->id ?>"><?= $jk->keterangan_jk ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Pendidikan</label>
                                                        <select id="editPendidikan" name="id_pendidikan" class="form-control">
                                                            <?php foreach ($pendidikan as $pd) : ?>
                                                                <option value="<?= $pd->id ?>"><?= $pd->pendidikan ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Status Kawin</label>
                                                        <select id="editKawin" name="id_kawin" class="form-control">
                                                            <?php foreach ($kawin as $kw) : ?>
                                                                <option value="<?= $kw->id ?>"><?= $kw->keterangan_kw ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Status Gada</label>
                                                        <select id="editGada" name="id_gada" class="form-control">
                                                            <?php foreach ($gada as $gd) : ?>
                                                                <option value="<?= $gd->id ?>"><?= $gd->keterangan_gd ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-primary" id="btn-edit-karyawan">Simpan Perubahan</button>
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
</div>

<script>
    $(document).ready(function() {
        // Handle View Button
        // $('.btn-view-karyawan').on('click', function() {
        //     var id = $(this).data('id');
        //     $.ajax({
        //         url: '<?= base_url("karyawan/get_karyawan_by_id/") ?>' + id,
        //         method: 'GET',
        //         dataType: 'json',
        //         success: function(data) {
        //             // Populate modal fields with data
        //             $('#viewKaryawanModal .modal-body').html(
        //                 '<p>Nama Karyawan: ' + data.nama_karyawan + '</p>' +
        //                 '<p>TTL: ' + data.ttl + '</p>' +
        //                 '<p>No Telp: ' + data.no_telp + '</p>' +
        //                 '<p>Alamat: ' + data.alamat + '</p>' +
        //                 '<p>Email: ' + data.email + '</p>' +
        //                 '<p>Nama Ibu: ' + data.nama_ibu + '</p>' +
        //                 '<p>Tinggi Badan: ' + data.tinggi_badan + '</p>' +
        //                 '<p>Berat Badan: ' + data.berat_badan + '</p>' +
        //                 '<p>No KK: ' + data.no_kk + '</p>' +
        //                 '<p>No KTP: ' + data.no_ktp + '</p>' +
        //                 '<p>Agama: ' + data.agama + '</p>' +
        //                 '<p>Jenis Kelamin: ' + data.jenis_kelamin + '</p>'
        //                 '<p>Jenis Kelamin: ' + data.pendidikan + '</p>'
        //                 '<p>Jenis Kelamin: ' + data.status_kawin + '</p>'
        //                 '<p>Jenis Kelamin: ' + data.gada + '</p>'
        //             );
        //             $('#viewKaryawanModal').modal('show');
        //         }
        //     });
        // });

        // // Handle Edit Button
        // $('.editButton').on('click', function() {
        //     var id = $(this).data('id');
        //     $.ajax({
        //         url: '<?= base_url("karyawan/get_karyawan_by_id/") ?>' + id,
        //         method: 'GET',
        //         dataType: 'json',
        //         success: function(data) {
        //             // Populate form fields with data
        //             $('#editForm [name="nama_karyawan"]').val(data.nama_karyawan);
        //             $('#editForm [name="ttl"]').val(data.ttl);
        //             $('#editForm [name="no_telp"]').val(data.no_telp);
        //             $('#editForm [name="alamat"]').val(data.alamat);
        //             $('#editForm [name="email"]').val(data.email);
        //             $('#editForm [name="nama_ibu"]').val(data.nama_ibu);
        //             $('#editForm [name="tinggi_badan"]').val(data.tinggi_badan);
        //             $('#editForm [name="berat_badan"]').val(data.berat_badan);
        //             $('#editForm [name="no_kk"]').val(data.no_kk);
        //             $('#editForm [name="no_ktp"]').val(data.no_ktp);
        //             $('#editForm [name="id_agama"]').val(data.id_agama).trigger('change');
        //             $('#editForm [name="id_jenis_kelamin"]').val(data.id_jenis_kelamin).trigger('change');
        //             $('#editForm [name="id_pendidikan"]').val(data.id_pendidikan).trigger('change');
        //             $('#editForm [name="id_kawin"]').val(data.id_kawin).trigger('change');
        //             $('#editForm [name="id_gada"]').val(data.id_gada).trigger('change');
        //             $('#editModal').modal('show');
        //         }
        //     });
        // });

        // // Handle Delete Button
        // $('.deleteButton').on('click', function() {
        //     if (confirm('Are you sure you want to delete this karyawan?')) {
        //         var id = $(this).data('id');
        //         $.ajax({
        //             url: '<?= base_url("karyawan/delete_karyawan/") ?>' + id,
        //             method: 'POST',
        //             data: { id: id },
        //             success: function(response) {
        //                 var result = JSON.parse(response);
        //                 if (result.status == 'success') {
        //                     alert(result.message);
        //                     location.reload();
        //                 } else {
        //                     alert(result.message);
        //                 }
        //             }
        //         });
        //     }
        // });

    });
</script>