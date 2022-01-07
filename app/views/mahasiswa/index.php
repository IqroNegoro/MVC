<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php
            Flasher::flash();
            ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <form action="<?= BASEURL ?>mahasiswa/cari" method="POST">
            <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="cari mahasiswa" name="keyword" id="keyword" autocomplete="off">
  <button class="btn btn-outline-primary" type="submit" id="cari">Cari</button>
</div>
            </form>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data
            </button>
        </div>

    <div class="row">
        <div class="col-6">
            <h3> Daftar mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($data["mhs"] as $mhs) : ?>
                    <li class="list-group-item"><?= $mhs["nama"] ?>
                    <a href="<?= BASEURL ?>/mahasiswa/hapus/<?= $mhs["id"] ?>" class="badge bg-danger float-end mx-2" onclick="return confirm('yakin?')">Hapus</a>
                    <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs["id"] ?>" class="badge bg-primary float-end mx-2">Detail</a>
                    <a href="<?= BASEURL ?>/mahasiswa/edit/<?= $mhs["id"] ?>" class="badge bg-success float-end mx-2 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs["id"] ?>">Edit</a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah data mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>mahasiswa/tambah" method="post">
                <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nrp" class="form-label">nrp</label>
                        <input type="number" class="form-control" id="nrp" name="nrp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan"> Jurusan </label>
                        <select name="jurusan" id="jurusan" class="form-control">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Planologi">Teknik Planologi</option>
                            <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah data</button>
            </div>
            </form>
        </div>
    </div>
</div>