<div class="row">
    <div class="col-12">
        <?php if (session()->getFlashdata('pesan')) { ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php } ?>

        <table class="table table-bordered" id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat Lokasi</th>
                    <th>Coordinate</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($lokasi as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nama_lokasi'] ?></td>
                        <td><?= $value['alamat_lokasi'] ?></td>
                        <td><?= $value['latitude'] ?>, <?= $value['longitude'] ?></td>
                        <td><img src="<?= base_url('foto/' . $value['foto_lokasi']) ?>" alt="" width="100"></td>
                        <td>
                            <a href="<?= base_url('lokasi/editLokasi/' . $value['id_lokasi']) ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url('lokasi/deleteData/' . $value['id_lokasi']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>