<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('admin/keahlian/process_edit'); ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $lowongan_keahlian['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Keahlian</label>
                <div class="col-sm-10">
                    <select name="keahlian_id" id="keahlian_id" class="form-control">
                        <option value="<?= $lowongan_keahlian['keahlian_id']; ?>">select menu</option>

                        <?php foreach ($keahlian as $k) : ?>
                            <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('keahlian_id', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Lowongan</label>
                <div class="col-sm-10">
                    <select name="lowongan_id" id="lowongan_id" class="form-control">
                        <option value="<?= $lowongan_keahlian['lowongan_id']; ?>">select menu</option>

                        <?php foreach ($lowongan as $lk) : ?>
                            <option value="<?= $lk['id']; ?>"><?= $lk['email']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('lowongan_id', '<small class="text-danger pl-3">', '</small>') ?>
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