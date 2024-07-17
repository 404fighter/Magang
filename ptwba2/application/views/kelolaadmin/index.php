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
                            <h4 class="card-title">Data Admin</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                                <i class="fa fa-plus"></i>
                                Tambah Admin
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="adminTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($admins as $admin) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $admin['nama']; ?></td>
                                        <td><?= $admin['email']; ?></td>
                                        <td><?= $admin['role']; ?></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm btn-edit-admin" data-id="<?= $admin['id']; ?>" data-nama="<?= $admin['nama']; ?>" data-email="<?= $admin['email']; ?>" data-role="<?= $admin['role']; ?>"><i class="far fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm btn-delete-admin" data-id="<?= $admin['id']; ?>"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Add Admin Modal -->
                        <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Tambah</span>
                                            <span class="fw-light">Admin</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form-add-admin" method="post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama</label>
                                                        <input id="addNama" name="nama" type="text" class="form-control" value="<?= set_value('nama'); ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input id="addEmail" name="email" type="email" class="form-control" value="<?= set_value('email'); ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pe-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Password</label>
                                                        <input id="password1" name="password1" type="password" class="form-control"  />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pe-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Konfirmasi Password</label>
                                                        <input id="password2" name="password2" type="password" class="form-control"  />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Role</label>
                                                        <select id="role" name="role" class="form-control">
                                                            <?php foreach ($roles as $role) : ?>
                                                                <option value="<?= $role->id ?>"><?= $role->role ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-primary" id="btn-add-admin">Tambah</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Admin Modal -->
                        <div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Edit</span>
                                            <span class="fw-light">Admin</span>
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form-edit-admin" method="post">
                                            <input type="hidden" id="editId" name="id">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama</label>
                                                        <input id="editNama" name="nama" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input id="editEmail" name="email" type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Password</label>
                                                        <input id="editPassword" name="password" type="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Role</label>
                                                        <select id="editRole" name="role" class="form-control">
                                                            <?php foreach ($roles as $role) : ?>
                                                                <option value="<?= $role->id ?>"><?= $role->role; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-primary" id="btn-edit-admin">Simpan Perubahan</button>
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
