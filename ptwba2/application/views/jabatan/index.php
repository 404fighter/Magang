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
                            <h4 class="card-title">Data Jabatan</h4>
                            <?php if ($this->session->userdata('role_id') != 3): ?>
                                <button
                                    class="btn btn-primary btn-round ms-auto"
                                    data-bs-toggle="modal"
                                    data-bs-target="#addJabatanModal"
                                >
                                    <i class="fa fa-plus"></i>
                                    Tambah Jabatan
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table
                            id="jabatanTable"
                            class="display table table-striped table-hover"
                        >
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <?php if ($this->session->userdata('role_id') != 3): ?>
                                <th>Aksi</th>
                                <?php endif; ?>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($jabatan as $jab) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $jab['jabatan']; ?></td>
                                    <?php if ($this->session->userdata('role_id') != 3): ?>
                                    <td>
                                            <button class="btn btn-warning btn-sm btn-edit-jabatan" data-id="<?= $jab['id'] ?>" data-jabatan="<?= $jab['jabatan'] ?>" data-bs-toggle="modal" data-bs-target="#editJabatanModal"><i class="far fa-edit"></i></button>

                                            <button class="btn btn-danger btn-sm btn-delete-jabatan" data-id="<?= $jab['id'] ?>"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>

                        <!-- Add Jabatan Modal -->
                        <div class="modal fade" id="addJabatanModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Tambah</span>
                                            <span class="fw-light">Jabatan</span>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="addForm" action="<?= base_url('jabatan/add') ?>" method="post">
                                            <div class="mb-3">
                                                <label for="jabatan" class="form-label">Jabatan</label>
                                                <input type="text" class="form-control" id="EditJabatan" name="jabatan" required>
                                                <?= form_error('jabatan', '<small class="text-danger ps-2">', '</small>'); ?>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Jabatan Modal -->
                        <div class="modal fade" id="editJabatanModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Edit</span>
                                            <span class="fw-light">Jabatan</span>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editForm" action="<?= base_url('jabatan/edit') ?>" method="post">
                                            <input type="hidden" id="editId" name="id">
                                            <div class="mb-3">
                                                <label for="editJabatan" class="form-label">Jabatan</label>
                                                <input type="text" class="form-control" id="editJabatan" name="jabatan" required>
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

