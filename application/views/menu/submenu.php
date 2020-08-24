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
                        <a href="http://" class="btn btn-primary mb-3 newSubMenu" data-toggle="modal" data-target="#exampleModal "> Add New Submenu</a>
                        <table class="table table-hover">
                                <thead>
                                        <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Menu</th>
                                                <th scope="col">Url</th>
                                                <th scope="col">Icon</th>
                                                <th scope="col">Active</th>
                                                <th scope="col">Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($subMenu as $sm) : ?>
                                                <tr>
                                                        <th scope="row"><?= $i; ?></th>
                                                        <td><?= $sm['title']; ?></td>
                                                        <td><?= $sm['menu']; ?></td>
                                                        <td><?= $sm['url']; ?></td>
                                                        <td><?= $sm['icon']; ?></td>
                                                        <td><?= $sm['is_active']; ?></td>
                                                        <td>
                                                                <a class="badge badge-success editSubMenu" data-toggle="modal" data-target="#exampleModal" href="http://" data-id="<?= $sm['id']; ?>">edit</a>
                                                                <a class="badge badge-danger" href="<?= base_url('menu/delsubmenu/') . $sm['id']; ?>" onclick="return confirm('Are you sure for delete?');">delete</a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add New Sub Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                                <div class="modal-body">
                                        <input type="hidden" id="id" name="id" class="">
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                                        </div>
                                        <div class="form-group">
                                                <select name="menu_id" id="menu_id" class="form-control">
                                                        <option value="">Select New Submenu</option>
                                                        <?php foreach ($menu as $m) : ?>
                                                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                                        <?php endforeach; ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                                        </div>
                                        <div class="form-group">
                                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                                        </div>
                                        <div class="form-group">
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                                        <label class="is_active" for="is_active">
                                                                Active?
                                                        </label>
                                                </div>
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