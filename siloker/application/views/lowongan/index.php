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
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalLowongan">Add New Lowongan </a>

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Dekripsi Lowongan</th>
                        <th scope="col">Expired Date</th>
                        <th scope="col">Mitra</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($lowongan as $l) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $l['deskripsi_pekerjaan'] ?></td>
                            <td><?= $l['tanggal_akhir'] ?></td>
                            <td><?= $l['nama'] ?></td>
                            <td><?= $l['email'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/lowongan/edit/') . $l['id']; ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('admin/lowongan/delete_ahli/') . $l['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
<div class="modal fade" id="ModalLowongan" tabindex="-1" aria-labelledby="ModalLowonganLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLowonganLabel">Add New Keahlian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/lowongan/addNow'); ?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan" placeholder="Deskripsi Pekerjaan">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal_akhir" placeholder="Tanggal Akhir" name="tanggal_akhir">
                    </div>
                    <div class="form-group">
                        <select name="mitra_id" id="mitra_id" class="form-control">
                            <option>select menu</option>

                            <?php foreach ($mitra as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
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
            text: "You Will deleted this data!",
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