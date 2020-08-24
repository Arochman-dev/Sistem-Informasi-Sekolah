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

                        <table class="table table-hover">
                                <thead>
                                        <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Nisn</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($siswa as $sw) : ?>
                                                <tr>
                                                        <th scope="row"><?= $i; ?></th>
                                                        <td><?= $sw['nama']; ?></td>
                                                        <td><?= $sw['nisn']; ?></td>
                                                        <td><?= $sw['gender']; ?></td>
                                                        <td><?= $sw['kelas']; ?></td>
                                                        <td>
                                                                <a class="badge badge-success tampilModalUbah" data-toggle="modal" data-target="#exampleModal" href=" " data-id="<?= $sw['id']; ?>">edit</a>
                                                                <a class="badge badge-danger delSiswa" href="<?= base_url('datasekolah/delSiswa/') . $sw['id']; ?>" data-id="<?= $sw['kelas_id']; ?>" onclick="return confirm('Are you sure for delete?');">delete</a>
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
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>

                        <div class="modal-body">
                                <form action="<?= base_url('datasekolah/ubah'); ?>" method="POST">
                                        <input type="hidden" name="id" id="id">
                                        <input type="hidden" name="kelas_id" id="kelas_id">
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                                        </div>

                                        <div class="form-group">
                                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Nisn">
                                        </div>
                                        <div class="form-group">
                                                <select name="gender" id="gender" class="form-control">
                                                        <option value="">Select Gender</option>
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <select name="kelas" id="kelas" class="form-control">
                                                        <option value="">Select kelas</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                        <option value="E">E</option>

                                                </select>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>
</div>
<!-- Button trigger modal -->