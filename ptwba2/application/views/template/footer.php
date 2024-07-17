</div>

<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Core JS Files -->
<script src="<?= base_url('assets/js/core/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/core/bootstrap.min.js'); ?>"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js'); ?>"></script>

<!-- Chart JS -->
<script src="<?= base_url('assets/js/plugin/chart.js/chart.min.js'); ?>"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js'); ?>"></script>

<!-- Chart Circle -->
<script src="<?= base_url('assets/js/plugin/chart-circle/circles.min.js'); ?>"></script>

<!-- Datatables -->
<script src="<?= base_url('assets/js/plugin/datatables/datatables.min.js'); ?>"></script>

<!-- Bootstrap Notify -->
<script src="<?= base_url('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js'); ?>"></script>

<!-- Sweet Alert -->
<script src="<?= base_url('assets/js/plugin/sweetalert/sweetalert.min.js'); ?>"></script>

<!-- Kaiadmin JS -->
<script src="<?= base_url('assets/js/kaiadmin.min.js'); ?>"></script>

<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {

        <?php if ($this->session->flashdata('success')) : ?>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '<?= $this->session->flashdata("success") ?>',
                showConfirmButton: false,
                timer: 1500
            });
        <?php endif; ?>

        //$('#changePasswordModal').modal('show');

        // Initialize DataTable Admin
        $('#adminTable').DataTable();

        // Add Admin
        $('#btn-add-admin').click(function() {
            var formData = $('#form-add-admin').serialize();

            $.ajax({
                url: '<?= base_url('kelolaadmin/add_admin'); ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        $('#addAdminModal').modal('hide');
                        Swal.fire('Success', res.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', res.message, 'error');
                    }
                }
            });
        });

        // Edit Admin
        $('.btn-edit-admin').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var email = $(this).data('email');
            var role = $(this).data('role');
            var status = $(this).data('status');

            $('#editId').val(id);
            $('#editNama').val(nama);
            $('#editEmail').val(email);
            $('#editRole').val(role);
            $('#editStatus').val(status);

            $('#editAdminModal').modal('show');
        });

        $('#btn-edit-admin').click(function() {
            var formData = $('#form-edit-admin').serialize();

            $.ajax({
                url: '<?= base_url('kelolaadmin/edit_admin'); ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        $('#editAdminModal').modal('hide');
                        Swal.fire('Success', res.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', res.message, 'error');
                    }
                }
            });
        });

        // Delete Admin
        $('.btn-delete-admin').click(function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Anda yakin?',
                text: "Data akan dihapus dari database!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('kelolaadmin/delete_admin'); ?>',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                Swal.fire('Deleted!', res.message, 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error', res.message, 'error');
                            }
                        }
                    });
                }
            });
        });

        // Inisialisasi DataTable Jabatan
        $('#jabatanTable').DataTable();

        // Edit Jabatan
        $('.btn-edit-jabatan').on('click', function() {
            const id = $(this).data('id');
            const jabatan = $(this).data('jabatan');
            $('#editId').val(id);
            $('#editJabatan').val(jabatan);
            $('#editModal').modal('show');
        });

        // Delete Jabatan
        $('.btn-delete-jabatan').click(function() {
            var id = $(this).data('id');

            console.log("ID: " + id);

            Swal.fire({
                title: 'Anda yakin?',
                text: "Data akan dihapus dari database!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('jabatan/delete'); ?>',
                        method: 'POST',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire('Deleted!', response.message, 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error', response.message, 'error');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error(textStatus, errorThrown);
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data!', 'error');
                        }
                    });
                }
            });
        });

        // Inisialisasi DataTable Lokasi
        $('#lokasiTable').DataTable();

        // Edit Lokasi
        $('.btn-edit-lokasi').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const alamat = $(this).data('alamat');
            $('#editId').val(id);
            $('#editNamaLokasi').val(nama);
            $('#editAlamatLokasi').val(alamat);
        });

        // Delete Lokasi
        $('.btn-delete-lokasi').on('click', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Anda yakin?',
                text: "Data akan dihapus dari database!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('lokasi/delete'); ?>',
                        method: 'POST',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire('Deleted!', response.message, 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error', response.message, 'error');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error(textStatus, errorThrown);
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data!', 'error');
                        }
                    });
                }
            });
        });

        // Initialize DataTable Karyawan
        $('#karyawanTable').DataTable();

        // View Detail Karyawan
        $('.btn-view-karyawan').click(function() {
            var id = $(this).data('id');

            $.ajax({
                url: '<?php echo base_url('karyawan/get_karyawan_by_id/'); ?>' + id,
                type: 'GET',
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status == 'success') {
                        $('#viewNamaKaryawan').val(data.karyawan.nama_karyawan);
                        $('#viewTtl').val(data.karyawan.ttl);
                        $('#viewNoTelp').val(data.karyawan.no_telp);
                        $('#viewAlamat').val(data.karyawan.alamat);
                        $('#viewEmail').val(data.karyawan.email);
                        $('#viewNamaIbu').val(data.karyawan.nama_ibu);
                        $('#viewTinggiBadan').val(data.karyawan.tinggi_badan);
                        $('#viewBeratBadan').val(data.karyawan.berat_badan);
                        $('#viewNoKk').val(data.karyawan.no_kk);
                        $('#viewNoKtp').val(data.karyawan.no_ktp);
                        $('#viewAgama').val(data.karyawan.ket_agama);
                        $('#viewJenisKelamin').val(data.karyawan.keterangan_jk);
                        $('#viewPendidikan').val(data.karyawan.pendidikan);
                        $('#viewKawin').val(data.karyawan.keterangan_kw);
                        $('#viewGada').val(data.karyawan.keterangan_gd);

                        $('#viewKaryawanModal').modal('show');
                    } else {
                        Swal.fire('Error', data.message, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error: ' + error);
                    Swal.fire('Error', 'Terjadi kesalahan saat mengambil data.', 'error');
                }
            });
        });

        // Add Karyawan
        $('#btn-add-karyawan').on('click', function(e) {
            e.preventDefault();
            var formData = $('#form-add-karyawan').serialize();
            $.ajax({
                url: '<?= base_url('karyawan/add_karyawan'); ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        $('#addKaryawanModal').modal('hide');
                        Swal.fire('Success', res.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', res.message, 'error');
                    }
                }
            });
        });

        // Edit Karyawan
        $('.btn-edit-karyawan').click(function() {
            var id = $(this).data('id');
            var nama_karyawan = $(this).data('nama_karyawan');
            var ttl = $(this).data('ttl');
            var no_telp = $(this).data('no_telp');
            var alamat = $(this).data('alamat');
            var email = $(this).data('email');
            var nama_ibu = $(this).data('nama_ibu');
            var tinggi_badan = $(this).data('tinggi_badan');
            var berat_badan = $(this).data('berat_badan');
            var no_kk = $(this).data('no_kk');
            var no_ktp = $(this).data('no_ktp');
            var id_agama = $(this).data('ket_agama');
            var id_jenis_kelamin = $(this).data('keterangan_jk');
            var id_pendidikan = $(this).data('pendidikan');
            var id_kawin = $(this).data('keterangan_kw');
            var id_gada = $(this).data('keterangan_gd');

            // Set input form values
            $('#editId').val(id);
            $('#editNamaKaryawan').val(nama_karyawan);
            $('#editTtl').val(ttl);
            $('#editNoTelp').val(no_telp);
            $('#editAlamat').val(alamat);
            $('#editEmail').val(email);
            $('#editNamaIbu').val(nama_ibu);
            $('#editTinggiBadan').val(tinggi_badan);
            $('#editBeratBadan').val(berat_badan);
            $('#editNoKk').val(no_kk);
            $('#editNoKtp').val(no_ktp);
            $('#editAgama').val(id_agama);
            $('#editJenisKelamin').val(id_jenis_kelamin);
            $('#editPendidikan').val(id_pendidikan);
            $('#editKawin').val(id_kawin);
            $('#editGada').val(id_gada);

            $('#editKaryawanModal').modal('show');
        });

        $('#btn-edit-karyawan').click(function() {
            var formData = $('#form-edit-karyawan').serialize();

            $.ajax({
                url: '<?= base_url('karyawan/edit_karyawan'); ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        $('#editKaryawanModal').modal('hide');
                        Swal.fire('Success', res.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', res.message, 'error');
                    }
                }
            });
        });

        // Delete Karyawan
        $('.btn-delete-karyawan').click(function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Anda yakin?',
                text: "Data akan dihapus dari database!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('karyawan/delete_karyawan'); ?>',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                Swal.fire('Deleted!', res.message, 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error', res.message, 'error');
                            }
                        }
                    });
                }
            });
        });

        var tabelPenempatan = $('#penempatanTable').DataTable();

        $('#filterLokasiPen').on('change', function() {
            var lokasi = $(this).val();
            tabelPenempatan.column(1).search(lokasi).draw();
        });

        $('#filterStatusPen').on('change', function() {
            var status = $(this).val() === '' ? '' : ($(this).val() == 1 ? 'Aktif' : 'Nonaktif');
            tabelPenempatan.column(8).search(status).draw();
        });

        // Add Penempatan
        $('#btn-add-penempatan').on('click', function(e) {
            e.preventDefault();
            var formData = $('#form-add-penempatan').serialize();
            console.log('Form data:', formData);
            $.ajax({
                url: '<?= base_url('penempatan/add_penempatan'); ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        $('#addPenempatanModal').modal('hide');
                        Swal.fire('Success', res.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', res.message, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error); // Log kesalahan AJAX
                }
            });
        });

        // Edit Penempatan
        $('.btn-edit-penempatan').click(function() {
            var id = $(this).data('id');

            $.ajax({
                url: '<?= base_url('penempatan/get_penempatan/'); ?>' + id,
                type: 'GET',
                success: function(response) {
                    var penempatan = JSON.parse(response);

                    $('#editId').val(penempatan.id);
                    $('#editNamaLokasi').val(penempatan.id_lokasi);
                    $('#editNamaKaryawan').val(penempatan.id_karyawan);
                    $('#editJabatan').val(penempatan.id_jabatan);
                    $('#editNik').val(penempatan.nik);
                    $('#editTmt').val(penempatan.tmt);
                    $('#editMulai').val(penempatan.tgl_mulai);
                    $('#editSelesai').val(penempatan.tgl_selesai);
                    $('#editStatus').val(penempatan.status_penempatan);

                    $('#editPenempatanModal').modal('show');
                }
            });
        });

        $('#btn-edit-penempatan').click(function() {
            var formData = $('#form-edit-penempatan').serialize();

            $.ajax({
                url: '<?= base_url('penempatan/edit_penempatan'); ?>',
                type: 'POST',
                data: formData,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        $('#editPenempatanModal').modal('hide');
                        Swal.fire('Success', res.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', res.message, 'error');
                    }
                }
            });
        });

        // Delete Penempatan
        $('.btn-delete-penempatan').click(function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Anda yakin?',
                text: "Data akan dihapus dari database!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('penempatan/delete_penempatan'); ?>',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                Swal.fire('Deleted!', res.message, 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error', res.message, 'error');
                            }
                        }
                    });
                }
            });
        });

        $('#eksporTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'excelHtml5', 'print'
            ]
        });

        var tabelEkspor = $('#eksporTable').DataTable();

        $('#filterLokasi').on('change', function() {
            var lokasi = $(this).val();
            tabelEkspor.column(1).search(lokasi).draw();
        });

    });

</script>
</body>

</html>