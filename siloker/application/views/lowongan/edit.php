<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('admin/lowongan/process_edit'); ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $lowongan['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi_pekerjaan" class="col-sm-2 col-form-label">Deskripsi pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan" value="<?= $lowongan['deskripsi_pekerjaan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_akhir" class="col-sm-2 col-form-label">tanggal_akhir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="<?= $lowongan['tanggal_akhir']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Mitra usaha</label>
                <div class="col-sm-10">
                    <select name="mitra_id" id="mitra_id" class="form-control">
                        <option value="<?= $lowongan['mitra_id']; ?>">select menu</option>

                        <?php foreach ($mitra as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('mitra_id', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $lowongan['email']; ?>">
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->