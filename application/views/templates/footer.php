<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
                <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Arochman <?= date('Y'); ?></span>
                </div>
        </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                </div>
        </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
        $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $('.form-check-input').on('click', function() {
                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');

                $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                                menuId: menuId,
                                roleId: roleId
                        },
                        success: function() {
                                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                });
        })

        $('.tampilModalUbah').on('click', function() {
                const id = $(this).data('id');

                $.ajax({
                        url: '<?= base_url('datasekolah/getUbah'); ?>',
                        data: {
                                id: id
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {
                                $('#nama').val(data.nama);
                                $('#nisn').val(data.nisn);
                                $('#gender').val(data.gender);
                                $('#kelas').val(data.kelas);
                                $('#id').val(data.id);
                                $('#kelas_id').val(data.kelas_id)

                        }

                });
        });

        $('.tambahData').on('click', function() {
                $('#exampleModalLabel').html('Add New Data Staff');
                $('.modal-footer button[type=submit]').html('Add');
        });

        $('.modalUbahStaff').on('click', function() {

                $('#exampleModalLabel').html('Edit Data Staff');
                $('.modal-footer button[type=submit]').html('Edit');
                $('.modal-content form').attr('action', '<?= base_url('datasekolah/ubahStaff'); ?>');

                const id = $(this).data('id');
                $.ajax({
                        url: '<?= base_url('datasekolah/getUbahStaff'); ?>',
                        data: {
                                id: id
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {
                                $('#nama').val(data.nama);
                                $('#np').val(data.np);
                                $('#gender').val(data.gender);
                                $('#alamat').val(data.alamat);
                                $('#bidang').val(data.bidang);
                                $('#id').val(data.id);
                        }

                });
        });
        $('.tambahGuru').on('click', function() {
                $('#exampleModalLabel').html('Add New Data Guru');
                $('.modal-footer button[type=submit]').html('Add');
        });

        $('.modalUbahGuru').on('click', function() {

                $('#exampleModalLabel').html('Edit Data Guru');
                $('.modal-footer button[type=submit]').html('Edit');
                $('.modal-content form').attr('action', '<?= base_url('datasekolah/ubahGuru'); ?>');

                const id = $(this).data('id');
                $.ajax({
                        url: '<?= base_url('datasekolah/getUbahGuru'); ?>',
                        data: {
                                id: id
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {

                                $('#id').val(data.id);
                                $('#nama').val(data.name);
                                $('#nip').val(data.nip);
                                $('#gender').val(data.gender);
                                $('#alamat').val(data.alamat);
                                $('#mapel').val(data.mapel);

                        }

                });
        });

        $('.newSubMenu').on('click', function() {
                $('#exampleModalLabel').html('Add New Submenu');
                $('.modal-footer button[type=submit]').html('Add');
        });

        $('.editSubMenu').on('click', function() {

                $('#exampleModalLabel').html('Edit Sub Menu');
                $('.modal-footer button[type=submit]').html('Edit');
                $('.modal-content form').attr('action', '<?= base_url('menu/ubahsubMenu'); ?>');

                const id = $(this).data('id');
                $.ajax({
                        url: '<?= base_url('menu/getUbahSubMenu'); ?>',
                        data: {
                                id: id
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {

                                $('#id').val(data.id);
                                $('#title').val(data.title);
                                $('#menu_id').val(data.menu_id);
                                $('#url').val(data.url);
                                $('#icon').val(data.icon);
                                $('#is_active').val(data.is_active);

                        }

                });
        });

        $('.newMenu').on('click', function() {
                $('#exampleModalLabel').html('Add New Menu');
                $('.modal-footer button[type=submit]').html('Add');
        });

        $('.editMenu').on('click', function() {

                $('#exampleModalLabel').html('Edit Menu');
                $('.modal-footer button[type=submit]').html('Edit');
                $('.modal-content form').attr('action', '<?= base_url('menu/ubahMenu'); ?>');

                const id = $(this).data('id');
                $.ajax({
                        url: '<?= base_url('menu/getUbahMenu'); ?>',
                        data: {
                                id: id
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {

                                $('#id').val(data.id);
                                $('#menu').val(data.menu);


                        }

                });
        });
</script>

</body>

</html>