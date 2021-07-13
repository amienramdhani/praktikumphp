<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('admin/mitra/process_edit'); ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $mitra['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $mitra['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $mitra['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Kontak</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $mitra['kontak']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telpon" name="telpon" value="<?= $mitra['telpon']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $mitra['email']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Website</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="web" name="web" value="<?= $mitra['web']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Bidang usaha</label>
                <div class="col-sm-10">
                    <select name="bidang_usaha_id" id="bidang_usaha_id" class="form-control">
                        <option value="<?= $mitra['bidang_usaha_id']; ?>">select menu</option>

                        <?php foreach ($bidang_usaha as $bu) : ?>
                            <option value="<?= $bu['id']; ?>"><?= $bu['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('bidang_usaha_id', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Sektor usaha</label>
                <div class="col-sm-10">
                    <select name="sektor_usaha_id" id="sektor_usaha_id" class="form-control">
                        <option value="<?= $mitra['sektor_usaha_id']; ?>">select menu</option>

                        <?php foreach ($sektor_usaha as $su) : ?>
                            <option value="<?= $su['id']; ?>"><?= $su['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('sektor_usaha_id', '<small class="text-danger pl-3">', '</small>') ?>
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