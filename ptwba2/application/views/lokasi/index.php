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
                            <h4 class="card-title"><?= $title; ?></h4>
                            <?php if ($this->session->userdata('role_id') != 3): ?>
                            <button
                                class="btn btn-primary btn-round ms-auto"
                                data-bs-toggle="modal"
                                data-bs-target="#addLokasiModal"
                            >
                                <i class="fa fa-plus"></i>
                                Tambah Lokasi
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table
                            id="lokasiTable"
                            class="display table table-striped table-hover"
                        >
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lokasi</th>
                                <th>Alamat Lokasi</th>
                                <?php if ($this->session->userdata('role_id') != 3): ?>
                                <th>Aksi</th>
                                <?php endif; ?>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($lokasi as $l) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $l['nama_lokasi']; ?></td>
                                    <td><?= $l['alamat_lokasi']; ?></td>
                                    <?php if ($this->session->userdata('role_id') != 3): ?>
                                    <td>
                                        <button class="btn btn-warning btn-sm btn-edit-lokasi" data-id="<?= $l['id'] ?>" data-nama="<?= $l['nama_lokasi'] ?>" data-alamat="<?= $l['alamat_lokasi'] ?>" data-bs-toggle="modal" data-bs-target="#editLokasiModal"><i class="far fa-edit"></i></button>
                                        <a data-id="<?= $l['id'] ?>" class="btn btn-danger btn-sm btn-delete-lokasi"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>

                        <!-- Add Lokasi Modal -->
                        <div class="modal fade" id="addLokasiModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Lokasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="addForm" action="<?= base_url('lokasi/add') ?>" method="post">
                                            <div class="mb-3">
                                                <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                                                <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required>
                                                <?= form_error('nama_lokasi', '<small class="text-danger ps-2">', '</small>'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat_lokasi" class="form-label">Alamat Lokasi</label>
                                                <input type="text" class="form-control" id="alamat_lokasi" name="alamat_lokasi" required>
                                                <?= form_error('alamat_lokasi', '<small class="text-danger ps-2">', '</small>'); ?>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Lokasi Modal -->
                        <div class="modal fade" id="editLokasiModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Lokasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editForm" action="<?= base_url('lokasi/edit') ?>" method="post">
                                            <input type="hidden" id="editId" name="id">
                                            <div class="mb-3">
                                                <label for="editNamaLokasi" class="form-label">Nama Lokasi</label>
                                                <input type="text" class="form-control" id="editNamaLokasi" name="nama_lokasi" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editAlamatLokasi" class="form-label">Alamat Lokasi</label>
                                                <input type="text" class="form-control" id="editAlamatLokasi" name="alamat_lokasi" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
