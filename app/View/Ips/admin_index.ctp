<?php
$this->start('css');
echo $this->Html->css('admin');
$this->end();
?>
<div id="wrapper">
    <div class="overlay"></div>
    <div style="color: green; display: block;"><center><?php echo $this->Session->flash(); ?></center></div>
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
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="margin-top: 50px; max-width: 1000px;">
                            <div>
                                <div style="float: left;">Quản lý Ip</div>
                                <div style="float: right;">
                                    <a href='<?php echo $this->Html->url(array("action" => "add"))?>'><button type="button" class="btn btn-success">Thêm Ip</button></a>
                                    <?php echo $this->Html->link('deleteAll', array('action' => 'deleteAll'), array('class' => 'btn btn-success'),__('Are you sure you want to delete all ?')); ?>
                                </div>
                            </div>
                            <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 30%;">Ip</th>
                                <th style="width: 10%;">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($ips as $ip): ?>
                            <tr>
                                <td style="width: 5%;"><?php echo $ip['Ip']['id']; ?></td>
                                <td style="width: 30%;"><?php echo $ip['Ip']['ip']; ?></td>
                                <td>
                                    <?php echo $this->Html->link('Edit', array('action' => 'edit', $ip['Ip']['id']), array('class' => 'btn btn-mini')); ?>/<?php echo $this->Html->link('Delete', array('action' => 'delete', $ip['Ip']['id']), array('class' => 'btn btn-mini'),__('Are you sure you want to delete # %s?', $ip['Ip']['id'])); ?>
                                </td style="width: 10%;">
                                
                            </tr>
                            <?php endforeach; ?>
                            <!-- phân trang -->
                            <tr>
                                <td colspan="8">
                                    <?php
                                    $hasPages = ($this->params['paging']['Ip']['pageCount'] > 1);
                                    if ($hasPages) :
                                        ?>
                                        <div class="paging">
                                            <?php
                                            echo $this->Paginator->prev('< previous', array(), null, array('tag'=>'span','class' => 'prev disabled'));
                                            echo $this->Paginator->numbers(array('separator' => '','tag'=>'span'));
                                            echo $this->Paginator->next('next >', array(), null, array('tag'=>'span','class' => 'next disabled'));
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
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
</div>