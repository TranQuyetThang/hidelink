<?php
    $this->start('css');
    echo $this->Html->css('admin');
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
                <div class="col-xs-12 col-sm-6 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="margin-top: 50px;">
                            <div>
                                <div style="float: left;">Quản lý link</div>
                                <div style="float: right;">
                                    <a href='<?php echo $this->Html->url(array("action" => "add"))?>'><button type="button" class="btn btn-success">Thêm link</button></a>
                                </div>
                            </div>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>PIC</th>
                                <th>Description / Link</th>
                                <th>View</th>
                                <th style="width: 8%;">
                                    Status
                                </th>
                                <th style="width: 6%;">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($links as $link): ?>
                            <tr>
                                <td><?php echo $link['Link']['id']; ?></td>
                                <td>
                                <?php echo $link['Link']['title']; ?>
                                </td>
                                <td><a href="<?php echo $link['Link']['pic']; ?>"><img src="<?php echo $link['Link']['pic']; ?>" style="width: 240px;height: 160px;"></a></td>
                                <td><?php echo $link['Link']['description']; ?> <br/> <span style="padding: 2px 20px;"><a href="<?php echo $link['Link']['domain'].'/hlink/slug/'.$link['Link']['slug'] ?>" target="_blank" ><?php echo $link['Link']['domain'].'/hlink/slug/'.$link['Link']['slug'] ?></a></span></td>
                                <td><?php echo $link['Link']['total_view']; ?></td>
                                <td>
                                    <?php
                                    if (empty($link['Link']['status'])) {
                                        echo $this->Html->link('On', array( 'action' => 'publish', $link['Link']['id'], 'admin' => true), array('class' => 'btn btn-mini', 'style' => 'width: 49px'));
                                    } else {
                                        echo $this->Html->link('Off', array('action' => 'unpublish', $link['Link']['id']), array('class' => 'btn btn-mini', 'escape' => false));
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link('Edit', array('action' => 'edit', $link['Link']['id']), array('class' => 'btn btn-mini')); ?>/<?php echo $this->Html->link('Delete', array('action' => 'delete', $link['Link']['id']), array('class' => 'btn btn-mini'),__('Are you sure you want to delete # %s?', $link['Link']['id'])); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <!-- phân trang -->
                            <tr>
                                <td colspan="8">
                                    <?php
                                    $hasPages = ($this->params['paging']['Link']['pageCount'] > 1);
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