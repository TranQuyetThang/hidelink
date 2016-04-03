<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            Home
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
            <a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "logout", "admin" => false))?>">Đăng xuất</a>
        </li>
    </ul>
</nav>
<!-- /#sidebar-wrapper -->