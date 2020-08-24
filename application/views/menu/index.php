<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
                <div class="col-lg-6">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                        <?= $this->session->flashdata('message'); ?>
                        <a href="http://" class="btn btn-primary mb-3 newMenu" data-toggle="modal" data-target="#exampleModal"> Add New Menu</a>
                        <table class="table table-hover">
                                <thead>
                                        <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Menu</th>
                                                <th scope="col">Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($menu as $m) : ?>
                                                <tr>
                                                        <th scope="row"><?= $i; ?></th>
                                                        <td><?= $m['menu']; ?></td>
                                                        <td>
                                                                <a class="badge badge-success editMenu" data-toggle="modal" data-target="#exampleModal" data-id="<?= $m['id']; ?>" href="http://">edit</a>
                                                                <a class="badge badge-danger" href="<?= base_url('menu/delete/') . $m['id']; ?>" onclick="return confirm('Are you sure for delete?');">delete</a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form action="<?= base_url('menu'); ?>" method="POST">
                                <div class="modal-body">
                                        <input type="hidden" id="id" class="id" name="id">
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="menu" name="menu" placeholder="menu name">
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