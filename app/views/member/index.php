<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Member
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL ?>/member/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari member.." name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Member</h3>
            <ul class="list-group">
                <?php foreach ($data["mbr"] as $mbr): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
    <?= $mbr["nama"] ?>
    <div>
        <a href="<?= BASEURL ?>/member/hapus/<?= $mbr["id"] ?>" class="btn
        btn-danger me-1" onclick="return confirm('yakin?');">Hapus</a>
        <a href="<?= BASEURL ?>/member/ubah/<?= $mbr["id"] ?>" class="btn
        btn-warning me-1 tampilModalUbah" data-bs-toggle="modal"
        data-bs-target="#formModal" data-id="<?= $mbr["id"] ?>">Ubah</a>
        <a href="<?= BASEURL ?>/member/detail/<?= $mbr["id"] ?>" class="btn btn-primary">Detail</a>
    </div>
</li>

                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/member/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                    </div>

                    <div class="form-group">
                        <label for="skil">Skill</label>
                        <select class="form-control" id="skil" name="skil">
                            <option selected>Pilih bahasa pemrograman</option>
                            <option value="php">PHP</option>
                            <option value="python">PYTHON</option>
                            <option value="nodejs">NODEJS</option>
                            <option value="java">JAVA</option>
                            <option value="javascript">JAVASCRIPT</option>
                            <option value="c#">C#</option>
                            <option value="c++">C++</option>
                            <option value="smali">SMALI</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>