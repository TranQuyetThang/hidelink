<?php
$this->start('css');
echo $this->Html->css('add');
$this->end();
?>
<div id="wrapper">
    <div class="overlay"></div>
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
<!--                    <div class="msg-sys">Đã fix lại link</div>-->
                </div>
            </div>
            <div class="row" align="center">
                <div class="col-xs-12 col-sm-6 col-md-10">
                    <div class="table-responsive">
                        <div>
                            <div style="float: left;">
                                <h3></h3>
                            </div>
                            <div style="float: right;">
                                <a href="<?php echo $this->Html->url(array('action' => 'index')) ?>"><button type="button" class="btn btn-default">Danh sách</button></a>
                            </div>
                        </div>
                        <div>
                            <?php
                            echo $this->Form->create('Domain',
                                array(
                                    'type' => 'file',
                                    'url' => Router::url(null, true),
                                    'id' => 'article-form'

                                ));
                            ?>
                            <?php
                            if (!empty($this->data['Domain']['id'])) {
                                echo $this->Form->input('id');
                            }
                            ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Domain <span style="color: red">*</span>:</label>
                                <?php
                                echo $this->Form->input('Domain.domain',array(
                                    'placeholder' => '',
                                    'type'  => 'text',
                                    'class' =>'form-control',
                                    'label' =>false,
                                    'div'   => false
                                ));
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status :</label>
                                <div class="scores">
                                    <?php
                                    echo $this->Form->input('Domain.status', array(
                                        'label' => '',
                                        'legend'=> false,
                                        'fieldset' => false,
                                        'div'   => false,
                                        'type' => 'radio',
                                        'options' => array('0'=>'không', '1'=>'có'),
                                        'default' => true
                                    ));
                                    ?>
                                </div>
                            </div>


                            <?php
                            echo $this->Form->submit('Submit',
                                array(
                                'class' => 'btn btn-primary',
                                'label' => false,
                                'div' => false
                            ));
                            ?>

                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
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
        $('').resetForm();
    });
</script>