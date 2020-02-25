<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="text-right">
        <a href="<?= base_url('admin/cetaklabel'); ?>" onclick="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak Label</a>
    </div>

    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4 mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Skripsi Belum Dilabel</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NPM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Prodi</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col" style="width: 13%">Pembimbing 1</th>
                                    <th scope="col" style="width: 13%">Pembimbing 2</th>
                                    <th scope="col" style="width: 10%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($skripsi_label as $sl) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $sl['npm']; ?></td>
                                        <td><?= $sl['nama']; ?></td>
                                        <td><?= $sl['judul']; ?></td>
                                        <td align="center"><?= $sl['jumlah']; ?></td>
                                        <td><?= $sl['prodi']; ?></td>
                                        <td><?= $sl['tahun']; ?></td>
                                        <td><?= $sl['pembimbing_1']; ?></td>
                                        <td><?= $sl['pembimbing_2']; ?></td>
                                        <td align="center">
                                            <a href="" class="badge badge-success edit">edit</a>
                                            <a href="<?= base_url('admin/hapusdata/') ?><?= $sl['id']; ?>" class="badge badge-danger hapus">hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newRoleMenuModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah Skripsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/skripsi_psik'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="npm" name="npm" placeholder="NPM">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                    </div>
                    <div class="form-group">
                        <select name="prodi" id="prodi" class="form-control">
                            <option value="">--- Pilih Prodi ---</option>
                            <option value="PSIK">PSIK</option>
                            <option value="Kesmas">Kesmas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pembimbing1" name="pembimbing1" placeholder="Pembimbing 1">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pembimbing2" name="pembimbing2" placeholder="Pembimbing 2">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>