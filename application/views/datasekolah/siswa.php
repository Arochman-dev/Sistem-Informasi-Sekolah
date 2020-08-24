<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
                <div class="col-lg-6">
                        <?= form_error('datasekolah', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                        <?= $this->session->flashdata('message'); ?>
                        <a href="http://" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"> Add New Data siswa</a>
                        <table class="table table-hover">
                                <table class="table table-hover">
                                        <thead>
                                                <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Level Kelas</th>
                                                        <th scope="col">Action</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($class as $cls) : ?>
                                                        <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $cls['level_class']; ?></td>
                                                                <td>
                                                                        <a class="badge badge-primary" href="<?= base_url('datasekolah/detail/') . $cls['id']; ?>">detail</a>

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
                                <h5 class="modal-title" id="exampleModalLabel">Add New Data Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form action="<?= base_url('datasekolah/siswa'); ?>" method="POST">
                                <div class="modal-body">
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
                                                <select name="kelas" id="level" class="form-control">
                                                        <option value="">Select kelas</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                        <option value="E">E</option>

                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <select name="kelas_id" id="level kelas" class="form-control">
                                                        <option value="">Select level kelas</option>
                                                        <option value=1>XII</option>
                                                        <option value=2>XIII</option>
                                                        <option value=3>IX</option>
                                                </select>
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
<!-- Button trigger modal -->