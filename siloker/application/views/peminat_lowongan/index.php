<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger role"="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= form_error('prodi', '<div class = "alert alert-danger role" ="alert">', '</div>') ?>
            <?= form_error('lowongan', '<div class = "alert alert-danger role" ="alert">', '</div>') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalPeminat">Add New Peminat Lowongan</a>

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alasan</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Lowongan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($peminat_lowongan as $pl) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $pl['nim'] ?></td>
                            <td><?= $pl['nama'] ?></td>
                            <td><?= $pl['alasan'] ?></td>
                            <td><?= $pl['prodi'] ?></td>
                            <td><?= $pl['deskripsi_pekerjaan'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/peminat_lowongan/edit/') . $pl['id']; ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('admin/peminat_lowongan/delete_peminat/') . $pl['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="ModalPeminat" tabindex="-1" aria-labelledby="ModalPeminatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalPeminatLabel">Add New Peminat Lowongan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/peminat_lowongan/add'); ?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nim" placeholder="NIM" name="nim">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" placeholder="Name" name="nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alasan" placeholder="Alasan" name="alasan">
                    </div>
                    <div class="form-group">
                        <select name="prodi_id" id="prodi_id" class="form-control">
                            <option>Prodi </option>
                            <?php foreach ($prodi as $p) : ?>
                                <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="lowongan_id" id="lowongan_id" class="form-control">
                            <option>Lowongan</option>
                            <?php foreach ($lowongan as $l) : ?>
                                <option value="<?= $l['id']; ?>"><?= $l['deskripsi_pekerjaan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('.tombol-hapus').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "You will delete this data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
</script>