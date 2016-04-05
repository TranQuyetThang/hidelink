<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            <?php echo $this->Session->read('User')['username']; ?>
        </li>

        <li>
            <a href="<?php echo $this->Html->url(array("controller" => "links", "action" => "index", "admin" => true))?>">Links</a>
        </li>

        <li>
            <a href="<?php echo $this->Html->url(array("controller" => "ips", "action" => "index", "admin" => true))?>">Ips</a>
        </li>

        <li>
            <a href="<?php echo $this->Html->url(array("controller" => "domains", "action" => "index", "admin" => true))?>">Domains</a>
        </li>

        <li>
            <a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "register", "admin" => true))?>">Đăng ký</a>
        </li>

        <li>
            <a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "resetPass", "admin" => true))?>">Đổi mật khẩu</a>
        </li>

        <li>
            <a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "logout", "admin" => false))?>">Đăng xuất</a>
        </li>
    </ul>
</nav>
<!-- /#sidebar-wrapper -->