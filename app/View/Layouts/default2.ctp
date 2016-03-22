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
        echo $this->Html->css('style');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->script('jquery-1.11.1.min');
        echo $this->Html->script('bootstrap.min');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <?php echo $this->fetch('content'); ?>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
