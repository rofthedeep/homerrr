<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo resourcePath('/js/app-min.js'); ?>"></script>

<script type="text/javascript">
    var App = {};
    jQuery(document).ready(function() {
        App = new Env.Application(
                {
                    resourcePath: "<?php echo resourcePath(); ?>",
                    applicationUrl: "<?php echo applicationUrl(); ?>",
                    globalModals: ['#basicModal', '#largeModal'],
                    loadModules: false
                });
        App.run();
    });
</script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->