<div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Brand
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array("action" => "index"))?>">Đăng nhập</a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array("action" => "register"))?>">Đăng ký</a>
            </li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php
                        echo $this->Form->create('User');
                    ?>
                        <header>
                            <h2>Example Responsive Form</h2>
                            <div>This form breaks at 600px and goes from a left-label form to a top-label form. At above 1200px, the labels align right.</div>
                        </header>
                    <?php if(isset($login_error)){ ?>
                        <div style="color: red;">
                            Sai tên đăng nhập hoặc mật khẩu
                        </div>
                    <?php } ?>
                    <?php if(isset($login_success)){ ?>
                        <div style="color: cornflowerblue;">
                            Bạn đã đăng nhập thành công
                        </div>
                    <?php } ?>
                        <div>
                            <?php
                                echo $this->Form->input(
                                    'username',
                                    array(
                                        'label' => false,
                                        'id' => 'Field1',
                                        'placeholder' => 'Tên đăng nhập',
                                        'tabindex' => '1',
                                        'class' => 'form-control',
                                    )
                                );
                            ?>
                        </div>

                        <div>
                            <?php
                                echo $this->Form->input(
                                    'password',
                                    array(
                                        'label' => false,
                                        'id' => 'password',
                                        'placeholder' => 'Mật khẩu',
                                        'autocomplete' => 'off',
                                        'class' => 'form-control',
                                        'type'  => 'password'
                                    )
                                );
                            ?>
                        </div>
                        <div>
                            <div>
                                <input id="saveForm" class="btn btn-primary" type="submit" value="Đăng nhập">
                            </div>
                        </div>

                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<script type="text/javascript">
    $(document).ready(function () {
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function () {
            hamburger_cross();
        });

        function hamburger_cross() {

            if (isClosed == true) {
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }
        }

        $('[data-toggle="offcanvas"]').click(function () {
            $('#wrapper').toggleClass('toggled');
        });
    });
</script>