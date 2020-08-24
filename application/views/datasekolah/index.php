<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
                <div class="col">
                        <?php if (validation_errors()) : ?>
                                <div class="alert alert-warning" role="alert">
                                        <?= validation_errors(); ?>
                                </div>
                        <?php endif; ?>
                        <?= $this->session->flashdata('message'); ?>
                        <a href="http://" class="btn btn-primary mb-3 tambahGuru" data-toggle="modal" data-target="#exampleModal"> Add New Data</a>
                        <table class="table table-hover">
                                <thead>
                                        <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Nip</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Mapel</th>
                                                <th scope="col">Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($guru as $g) : ?>
                                                <tr>
                                                        <th scope="row"><?= $i; ?></th>
                                                        <td><?= $g['name']; ?></td>
                                                        <td><?= $g['nip']; ?></td>
                                                        <td><?= $g['gender']; ?></td>
                                                        <td><?= $g['alamat']; ?></td>
                                                        <td><?= $g['mapel']; ?></td>
                                                        <td>
                                                                <a class="badge badge-success modalUbahGuru" data-toggle="modal" data-id="<?= $g['id']; ?>" data-target="#exampleModal" href="">edit</a>
                                                                <a class=" badge badge-danger" href="<?= base_url('datasekolah/delGuru/') . $g['id']; ?>" onclick="return confirm('Are you sure for delete?');">delete</a>
                                                        </td>
                                                </tr>
                                                <?php $i++; ?>
                                        <?php endforeach; ?>

                                </tbody>
                        </table>
                </div>
        </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Data Guru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form action="<?= base_url('datasekolah'); ?>" method="POST">
                                <div class="modal-body">
                                        <input type="hidden" class="id" id="id" name="id">
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                                        </div>

                                        <div class="form-group">
                                                <input type="text" class="form-control" id="nip" name="nip" placeholder="Nip">
                                        </div>
                                        <div class="form-group">
                                                <select name="gender" id="gender" class="form-control">
                                                        <option value="">Select Gender</option>
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
                                        </div>
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="mapel" name="mapel" placeholder="Mata pelajaran">
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