<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">User Table</h5>
                <button class="btn btn-success btn-sm rounded-pill shadow-sm px-3" 
                        data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class="bi bi-person-plus-fill me-1"></i> Tambah
                </button>
            </div>

            <div class="table-responsive">
                <table id="userTable" class="table table-striped table-bordered align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>NIM</th>
                            <th>Major</th>
                            <th>Study Program</th>
                            <th style="width: 150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($result)) {}
            ?>
            <tr>
                <?php
                        $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
                        while ($row = mysqli_fetch_assoc($result)) {
                            $json = json_encode($row, JSON_UNESCAPED_UNICODE);
                            $jsonEsc = htmlspecialchars($json, ENT_QUOTES, 'UTF-8');
                        ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= htmlspecialchars($row['username']); ?></td>
                            <td><?= htmlspecialchars($row['name']); ?></td>
                            <td><?= htmlspecialchars($row['nim']); ?></td>
                            <td><?= htmlspecialchars($row['jurusan']); ?></td>
                            <td><?= htmlspecialchars($row['prodi']); ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm me-1"
                                        data-user='<?= $jsonEsc ?>'
                                        onclick="openEditModal(this)">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-danger btn-sm"
                                        onclick="confirmDelete(<?= (int)$row['id']; ?>)">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" action="content/create.php">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="create-password" class="form-control" required>
                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="create-password">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Prodi</label>
                        <input type="text" name="prodi" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="edit-form" method="post" action="content/edit.php">
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" id="edit-username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password (kosongkan jika tidak diubah)</label>
                        <div class="input-group">
                            <input type="password" name="password" id="edit-password" class="form-control">
                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="edit-password">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" id="edit-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" id="edit-nim" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" id="edit-jurusan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Prodi</label>
                        <input type="text" name="prodi" id="edit-prodi" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
   <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.js"></script>
  <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable({
            "order": [[0, "desc"]],
        });
    });

    function openEditModal(btn) {
        const raw = btn.getAttribute('data-user');
        try {
            const user = JSON.parse(raw);
            $('#edit-id').val(user.id || '');
            $('#edit-username').val(user.username || '');
            $('#edit-password').val('');
            $('#edit-name').val(user.name || '');
            $('#edit-nim').val(user.nim || '');
            $('#edit-jurusan').val(user.jurusan || '');
            $('#edit-prodi').val(user.prodi || '');
            new bootstrap.Modal(document.getElementById('editModal')).show();
        } catch (err) {
            Swal.fire('Error', 'Gagal memproses data user.', 'error');
        }
    }

    function confirmDelete(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "Data akan dihapus permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "content/delete.php?id=" + encodeURIComponent(id);
            }
        });
    }

    // Toggle Show/Hide Password
    document.querySelectorAll(".toggle-password").forEach(btn => {
        btn.addEventListener("click", function() {
            const targetId = this.getAttribute("data-target");
            const input = document.getElementById(targetId);
            const icon = this.querySelector("i");

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            } else {
                input.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            }
        });
    });

    // SweetAlert untuk notifikasi sukses
    const urlParams = new URLSearchParams(window.location.search);
    const updated = urlParams.get('updated');
    const deleted = urlParams.get('deleted');
    const created = urlParams.get('created');

    if (created === 'true') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data berhasil ditambahkan.',
            showConfirmButton: false,
            timer: 2500
        });
        setTimeout(() => { history.replaceState(null, '', 'index.php?menu=table'); }, 1500);
    }

    if (updated === 'true') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data berhasil diperbarui.',
            showConfirmButton: false,
            timer: 1500
        });
        setTimeout(() => { history.replaceState(null, '', 'index.php?menu=table'); }, 1500);
    }
    
    if (deleted === 'true') {
        Swal.fire({
            icon: 'success',
            title: 'Dihapus!',
            text: 'Data berhasil dihapus.',
            showConfirmButton: false,
            timer: 1500
        });
        setTimeout(() => { history.replaceState(null, '', 'index.php?menu=table'); }, 1500);
    }
</script>
<style>
/* Styling tambahan */
.dataTables_info {
    float: left;
    padding-top: .5rem;
}
.dataTables_paginate {
    float: right;
    padding-top: .25rem;
}
.dataTables_length, .dataTables_filter {
    margin-bottom: 1rem;
}
</style>
</body>
</html>