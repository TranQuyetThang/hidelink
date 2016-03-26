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
    echo '<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">';
    echo $this->fetch('css');
    ?>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
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