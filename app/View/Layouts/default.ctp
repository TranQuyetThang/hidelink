<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
        if(!isset($title)){
            echo 'Trang chủ';
        }else{
            echo $title;
        }
        ?>
    </title>
    <?php
    echo $this->Html->css('bootstrap.min');
    echo $this->fetch('css');

    echo $this->Html->script('jquery-1.11.1.min');
    echo $this->Html->script('bootstrap.min');
    ?>
    <?php echo $this->fetch('script'); ?>
    <script type='text/javascript'>
        var BASE_URL = '<?php echo Router::url("/", true); ?>'
    </script>

</head>
<body>

<?php echo $this->fetch('content'); ?>

<?php
//if (Configure::read('debug') == 2) {
//    echo $this->element('sql_dump');
//}
//?>
</body>
</html>