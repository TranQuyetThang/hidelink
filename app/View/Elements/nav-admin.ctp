<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Brand
            </a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "logout", "admin" => false))?>">Đăng xuất</a>
        </li>
    </ul>
</nav>
<!-- /#sidebar-wrapper -->