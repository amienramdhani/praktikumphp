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
            <?= form_error('bidang', '<div class = "alert alert-danger role" ="alert">', '</div>') ?>
            <?= form_error('sektor', '<div class = "alert alert-danger role" ="alert">', '</div>') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ModalMitra">Add New Mitra</a>

            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kontak</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Bidang Usaha</th>
                        <th scope="col">Sektor Usaha</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($mitra as $m) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $m['nama'] ?></td>
                            <td><?= $m['alamat'] ?></td>
                            <td><?= $m['kontak'] ?></td>
                            <td><?= $m['telpon'] ?></td>
                            <td><?= $m['email'] ?></td>
                            <td><?= $m['web'] ?></td>
                            <td><?= $m['Bidang_usaha'] ?></td>
                            <td><?= $m['Sektor_usaha'] ?></td>

                            <td>
                                <a href="<?= base_url('admin/mitra/edit/') . $m['id']; ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('admin/mitra/delete_mitra/') . $m['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
<div class="modal fade" id="ModalMitra" tabindex="-1" aria-labelledby="ModalMitraLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalMitraLabel">Add New Mitra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/mitra/add'); ?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" placeholder="Name" name="nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" placeholder="Address" name="alamat">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kontak" placeholder="Contact" name="kontak">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="telpon" placeholder="Phone" name="telpon" min="0">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" min="0">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="web" placeholder="Website" name="web" min="0">
                    </div>
                    <div class="form-group">
                        <select name="bidang_usaha_id" id="bidang_usaha_id" class="form-control">
                            <option>Bidang Usaha</option>
                            <?php foreach ($bidang_usaha as $bu) : ?>
                                <option value="<?= $bu['id']; ?>"><?= $bu['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <select name="sektor_usaha_id" id="sektor_usaha_id" class="form-control">
                            <option>Sektor Usaha</option>
                            <?php foreach ($sektor_usaha as $su) : ?>
                                <option value="<?= $su['id']; ?>"><?= $su['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('sektor_usaha_id', '<small class="text-danger pl-3">', '</small>') ?>
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