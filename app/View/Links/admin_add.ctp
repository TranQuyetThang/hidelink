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
                            echo $this->Form->create('Link',
                                array(
                                    'type' => 'file',
                                    'url' => Router::url(null, true),
                                    'id' => 'article-form'

                                ));
                            ?>
                            <?php
                            if (!empty($this->data['Link']['id'])) {
                                echo $this->Form->input('id');
                            }
                            ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề <span style="color: red">*</span>:</label>
                                <?php
                                echo $this->Form->input('Link.title',array(
                                    'placeholder' => '',
                                    'type'  => 'text',
                                    'class' =>'form-control',
                                    'label' =>false,
                                    'div'   => false
                                ));
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh <span style="color: red"></span>:</label>
                                <?php
                                echo $this->Form->input('Link.pic',array(
                                    'placeholder' => '',
                                    'type'  => 'text',
                                    'class' =>'form-control',
                                    'label' =>false,
                                    'div'   => false
                                ));
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Miêu tả <span style="color: red"></span>:</label>
                                <?php  
                                echo $this->Form->input('Link.description', array(
                                    'placeholder' => '',
                                    'type' => 'textarea',
                                    'class' => 'form-control half-w',
                                    'label' => false,
                                    'div' => false,'rows' => '5', 'cols' => '5'
                                ));
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên miền <span style="color: red"></span>:</label>
                                <?php
                                $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
                                echo $this->Form->input('Link.domain', array(
                                    'label' => false,
                                    // 'empty' => "Empty",
                                    'options' => array(
                                        $protocol.$_SERVER['SERVER_NAME'] => $protocol.$_SERVER['SERVER_NAME'],
                                    ),
                                    'style' =>'width: 50%;height: 30px;',
                                    'div'   => false
                                ));
                                ?>
                                <p style="margin-left: 220px;">Tên miền này sử dụng cho bài</p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">URL <span style="color: red">*</span>:</label>
                                <?php
                                echo $this->Form->input('Link.url', array(
                                    'placeholder' => '',
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'label' => false,
                                    'div' => false,
                                    // 'readonly' => 'readonly'
                                ));
                                ?>
                                <p style="margin-left: 220px;">Là đường dẫn cần chuyển hướng tới</p>
                            </div>
        
                            <?php
                                if (!empty($this->data['Link']['slug'])) 
                                { 
                                    echo $this->Form->hidden('Link.slug');
                                }
                                if (!empty($this->data['Link']['total_view'])) 
                                { 
                                    echo $this->Form->hidden('Link.total_view');
                                }
                            ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status <span style="color: red">*</span>:</label>
                                <div class="scores">
                                    <?php
                                    echo $this->Form->input('Link.status', array(
                                        'label' => '',
                                        'legend'=> false,
                                        'fieldset' => false,
                                        'div'   => false,
                                        'type' => 'radio',
                                        'options' => array('0'=>'không', '1'=>'có'),
                                    ));
                                    ?>
                                </div>
                            </div>


                            <?php
                            echo $this->Form->submit('Post bài',
                                array(
                                'class' => 'btn btn-primary',
                                'label' => false,
                                'div' => false
                            ));
                            ?>
<!--                            <button type="button" class="btn btn-default">Làm lại</button>-->
<!--                            <button type="button" class="btn btn-default">Danh sách</button>-->

                            <?php echo $this->Form->end(); ?>

                            <form action="#">


                            </form>

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