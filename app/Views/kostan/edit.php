<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>
<?php helper("form"); ?>
<div class="container mb-4">
    <div class="row mt-2">
        <div class="col-lg-4">
            <h2>Data Kostan Tembalang</h2>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <form class="d-flex" action="" method="get">
                    <div class="input-group me-2 w-75 col-5">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        <input type="search" class="form-control" placeholder="Cari Nama Kostan ..." aria-describedby="basic-addon1" name="keyword">
                    </div>
                    <select class="form-select me-2 col-md" aria-label="Default select example" name="jumlah">
                        <?php for ($x = 1; $x <= 15; $x++) : ?>
                            <option value="<?= $x ?>"><?= $x ?> Data</option>
                        <?php endfor; ?>
                    </select>
                    <button class="btn btn-primary px-3" type="submit"><i class="fas fa-chevron-right"></i></button>
                </form>
            </div>
        </div>
        <?php if (session()->getFlashdata("success")) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata("success") ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata("failed")) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="'mb-0">
                    <?php foreach (session()->getFlashdata("failed")
                        as $errrr) : ?>
                        <li><?= $errrr ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
    <div class="row mt-2">
        <div class="col-lg-3 rounded bg-grey p-3">
            <h3>Tambah Kostan</h3>
            <form action="/update/<?= $tabel['id'] ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kostan</label>
                    <input class="form-control" id="nama" name="nama" placeholder="Nama . . ." value="<?= $tabel['nama'] ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Kostan</label>
                    <input class="form-control" id="alamat" name="alamat" placeholder="Alamat . . ." value="<?= $tabel['alamat'] ?>">
                </div>
                <div class="mb-3">
                    <label for="jenis">Fitur Kostan</label>
                    <?php $arrayfitur = explode(",", $tabel['fitur']); ?>
                    <div class="form-check ms-2 mt-1 border-top">
                        <input class="form-check-input" type="checkbox" value="ac" name="fitur[]" <?php if (
                            in_array("ac", $arrayfitur)
                        ) {
                            echo "checked";
                        } ?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            AC
                        </label>
                    </div>
                    <div class="form-check ms-2 mt-1 border-top">
                        <input class="form-check-input" type="checkbox" value="kmdalam" name="fitur[]" <?php if (
                            in_array("kmdalam", $arrayfitur)
                        ) {
                            echo "checked";
                        } ?>>
                        <label class="form-check-label" for="flexCheckChecked">
                            Kamar Mandi Dalam
                        </label>
                    </div>
                    <div class="form-check ms-2 mt-1 border-top">
                        <input class="form-check-input" type="checkbox" value="listrik" name="fitur[]"<?php if (
                            in_array("listrik", $arrayfitur)
                        ) {
                            echo "checked";
                        } ?>>
                        <label class="form-check-label" for="flexCheckChecked">
                            Include Listrik
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="banyak_kamar" class="form-label">Banyak Kamar</label>
                        <input class="form-control" id="banyak_kamar" name="banyak_kamar" placeholder="Banyak Kamar . . ." value="<?= $tabel['banyak_kamar'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="sisa_kamar" class="form-label">Sisa Kamar</label>
                        <input class="form-control" id="sisa_kamar" name="sisa_kamar" placeholder="Sisa Kamar . . ." value="<?= $tabel['sisa_kamar'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input class="form-control" id="harga" name="harga" placeholder="Harga . . ." value="<?= $tabel['harga'] ?>">
                    </div>
                </div>
                <div class="modal fade" id="edit">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Edit Data Kostan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Data Kostan akan diubah secara permanen! tetap melanjutkan?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#edit">Submit</button>
                <button type="reset" class="btn btn-outline-dark float-end me-2">Clear</button>
            </form>
        </div>
        <div class="col-lg-9">
            <table class="table table-bordered">
                <thead class="bg-grey">
                    <tr>
                        <th rowspan="2" class="text-center align-middle" scope="col">No</th>
                        <th rowspan="2" class="text-center align-middle" scope="col">Nama Kosan</th>
                        <th rowspan="4" class="text-center align-middle" scope="col">Alamat</th>
                        <th colspan="3" class="text-center align-middle" scope="col">Fitur Kosan</th>
                        <th rowspan="2" class="text-center align-middle" scope="col">Kamar Tersedia</th>
                        <th rowspan="2" class="text-center align-middle" scope="col">Harga</th>
                        <th rowspan="2" class="text-center align-middle" scope="col"><i class="fas fa-tools"></i></th>
                    </tr>
                    <tr>
                        <th class="text-center align-middle">AC</th>
                        <th class="text-center align-middle">KM Dalam</th>
                        <th class="text-center align-middle">Include Listrik</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1 + 4 * ($currentPage - 1); ?>
                    <?php foreach ($isitabel as $i) : ?>
                        <?php
                        if ($i["fitur"]) {
                            $arrayjenis = explode(",", $i["fitur"]);
                        } else {
                            $arrayjenis = [];
                        } ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $num++ ?></th>
                            <td><?= $i["nama"] ?></td>
                            <td><?= $i["alamat"]  ?></td>
                            <td class="text-center"><?php if (
                                                        in_array("ac", $arrayjenis)
                                                    ) : ?>
                                    <i class="fas fa-check"></i>
                                <?php else : ?>
                                    <i class="fas fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td class="text-center"><?php if (
                                                        in_array("kmdalam", $arrayjenis)
                                                    ) : ?>
                                    <i class="fas fa-check"></i>
                                <?php else : ?>
                                    <i class="fas fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td class="text-center"><?php if (
                                                        in_array("listrik", $arrayjenis)
                                                    ) : ?>
                                    <i class="fas fa-check"></i>
                                <?php else : ?>
                                    <i class="fas fa-times"></i>
                                <?php endif; ?>
                            </td>
                            <td><?= $i["sisa_kamar"]  ?> / <?= $i["banyak_kamar"]  ?></td>
                            <td><?= $i["harga"]  ?></td>
                            <td>
                                <a href="/edit/<?= $i["id"] ?>" type="button" class="btn btn-warning no-rounded rounded-start" role="button"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-danger no-rounded rounded-end" data-bs-toggle="modal" data-bs-target="#delete<?= $i["id"] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <div class="modal fade" id="delete<?= $i["id"] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Kostan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Kostan akan dihapus secara permanen! tetap melanjutkan?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali
                                        </button>
                                        <form action="/delete/<?= $i["id"] ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links("isitabel", "my_pager") ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>