<!-- / Footer -->
<script src="<?php echo base_url(); ?>assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/popper/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/hammer/hammer.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/vendor/libs/i18n/i18n.js"></script> -->
<script src="<?php echo base_url(); ?>assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js/menu.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/%40form-validation/popular.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/%40form-validation/auto-focus.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages-auth.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script>
    $(document).ready(function() {
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            endDate: new Date(),
            autoclose: true,
            todayHighlight: true
        });

        $('.select2').select2({
            width: '100%',
            theme: 'bootstrap-5'
        });
    });
</script>
</body>

</html>