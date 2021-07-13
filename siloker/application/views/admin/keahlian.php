<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger role"="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= form_error('keahlian', '<div class = "alert alert-danger role" ="alert">', '</div>') ?>
            <?= form_error('lowongan', '<div class = "alert alert-danger role" ="alert">', '</div>') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalKeahlian">Add New Lowongan Keahlian</a>

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Keahlian</th>
                        <th scope="col">Lowongan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($lowongan_keahlian as $lk) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $lk['nama'] ?></td>
                            <td><?= $lk['email'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/keahlian/edit/') . $lk['id']; ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('admin/keahlian/delete_keahlian/') . $lk['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
<div class="modal fade" id="ModalKeahlian" tabindex="-1" aria-labelledby="ModalKeahlianLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalKeahlianLabel">Add New Lowongan Keahlian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/keahlian/add'); ?>" method="POST">
                    <div class="form-group">
                        <select name="keahlian_id" id="keahlian_id" class="form-control">
                            <option>select menu</option>

                            <?php foreach ($keahlian as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="lowongan_id" id="lowongan_id" class="form-control">

                            <option>select menu</option>

                            <?php foreach ($lowongan as $lk) : ?>
                                <option value="<?= $lk['id']; ?>"><?= $lk['email']; ?></option>
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
            text: "You won't be able to revert this!",
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