<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('admin/peminat_lowongan/process_edit'); ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $peminat_lowongan['id']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= $peminat_lowongan['nim']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $peminat_lowongan['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alasan" name="alasan" value="<?= $peminat_lowongan['alasan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Prodi</label>
                <div class="col-sm-10">
                    <select name="prodi_id" id="prodi_id" class="form-control">
                        <option value="<?= $peminat_lowongan['prodi_id']; ?>">select menu</option>

                        <?php foreach ($prodi as $p) : ?>
                            <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Lowongan</label>
                <div class="col-sm-10">
                    <select name="lowongan_id" id="lowongan_id" class="form-control">
                        <option value="<?= $peminat_lowongan['lowongan_id']; ?>">select menu</option>

                        <?php foreach ($lowongan as $l) : ?>
                            <option value="<?= $l['id']; ?>"><?= $l['deskripsi_pekerjaan']; ?></option>
                        <?php endforeach; ?>
                    </select>
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