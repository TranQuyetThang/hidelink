<div id="wrapper">
    <div style="color: green; display: block;"><center><?php echo $this->Session->flash(); ?></center></div>
    <div class="overlay"></div>
    <!-- Sidebar -->
    <?php echo $this->element('nav-admin'); ?>

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
                        <?php
                            echo $this->Session->Flash('error');
                        ?>
                        <div>
                            <div>
                                <?php
                                echo $this->Form->input(
                                    'username',
                                    array(
                                        'label' => false,
                                        'placeholder' => $this->Session->read('User')['username'],
                                        'tabindex' => '1',
                                        'class' => 'form-control',
                                        'required'=>false,
                                        'errorMessage' => false,
                                        'disabled' => true
                                    )
                                );
                                ?>
                            </div>
                        </div>

                        <div>
                            <div>
                                <?php
                                echo $this->Form->input(
                                    'password',
                                    array(
                                        'label' => false,
                                        'id' => 'password',
                                        'placeholder' => 'Password cũ',
                                        'tabindex' => '1',
                                        'class' => 'form-control',
                                        'required'=>false,
                                        'errorMessage' => false
                                    )
                                );
                                ?>
                            </div>
                        </div>
                        <div>
                            <div>
                                <?php
                                    echo $this->Form->input(
                                        'password_new',
                                        array(
                                            'label' => false,
                                            'id' => 'password',
                                            'placeholder' => 'Mật khẩu mới',
                                            'tabindex' => '1',
                                            'class' => 'form-control',
                                            'type'=>'password',
                                            'required'=>false,
                                            'errorMessage' => false
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                        <div>
                            <div>
                                <?php
                                echo $this->Form->input(
                                    'repassword_new',
                                    array(
                                        'label' => false,
                                        'id' => 'repassword',
                                        'placeholder' => 'Nhập lại mật khẩu',
                                        'tabindex' => '1',
                                        'class' => 'form-control',
                                        'type'=>'password',
                                        'autocomplete'=>'off',
                                        'required'=>false,
                                        'errorMessage' => false
                                    )
                                );
                                ?>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input id="saveForm" class="btn btn-primary" type="submit" value="Đổi pass">
                            </div>
                        </div>

                    </form>
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