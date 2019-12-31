<footer class="container text-center">
  <p id="footer-link">Copyright &copy; <a href="<?= base_url() ?>index.php/home/index">Madrasah Ibtidaiyah Cahaya</a> 2017. All Right Reserved.</p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#cari').autocomplete({
        source: "<?php echo site_url('search'); ?>"
      });
    });
</script>

<script type="text/javascript" src="<?= base_url()?>assets/js/index.js"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/js/nav-active.js"></script>





</body>
</html> 