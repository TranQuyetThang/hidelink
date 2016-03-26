<style type="text/css">
body {
    position: relative;
    overflow-x: hidden;
}
body,
html { height: 100%;}
.nav .open > a,
.nav .open > a:hover,
.nav .open > a:focus {background-color: transparent;}

/*-------------------------------*/
/*           Wrappers            */
/*-------------------------------*/

#wrapper {
    padding-left: 0;
    height: 100%;
    width: 100%;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 220px;
}

#sidebar-wrapper {
    z-index: 1000;
    left: 220px;
    width: 0;
    height: 100%;
    margin-left: -220px;
    overflow-y: auto;
    overflow-x: hidden;
    background: #1a1a1a;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#sidebar-wrapper::-webkit-scrollbar {
    display: none;
}

#wrapper.toggled #sidebar-wrapper {
    width: 220px;
}

#page-content-wrapper {
    width: 100%;
    padding-top: 70px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -220px;
}

/*-------------------------------*/
/*     Sidebar nav styles        */
/*-------------------------------*/

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 220px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    position: relative;
    line-height: 20px;
    display: inline-block;
    width: 100%;
}

.sidebar-nav li:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    height: 100%;
    width: 3px;
    background-color: #1c1c1c;
    -webkit-transition: width .2s ease-in;
    -moz-transition:  width .2s ease-in;
    -ms-transition:  width .2s ease-in;
    transition: width .2s ease-in;

}
.sidebar-nav li:first-child a {
    color: #fff;
    background-color: #1a1a1a;
}
.sidebar-nav li:nth-child(2):before {
    background-color: #ec1b5a;
}
.sidebar-nav li:nth-child(3):before {
    background-color: #79aefe;
}
.sidebar-nav li:nth-child(4):before {
    background-color: #314190;
}
.sidebar-nav li:nth-child(5):before {
    background-color: #279636;
}
.sidebar-nav li:nth-child(6):before {
    background-color: #7d5d81;
}
.sidebar-nav li:nth-child(7):before {
    background-color: #ead24c;
}
.sidebar-nav li:nth-child(8):before {
    background-color: #2d2366;
}
.sidebar-nav li:nth-child(9):before {
    background-color: #35acdf;
}
.sidebar-nav li:hover:before,
.sidebar-nav li.open:hover:before {
    width: 100%;
    -webkit-transition: width .2s ease-in;
    -moz-transition:  width .2s ease-in;
    -ms-transition:  width .2s ease-in;
    transition: width .2s ease-in;

}

.sidebar-nav li a {
    display: block;
    color: #ddd;
    text-decoration: none;
    padding: 10px 15px 10px 30px;
}

.sidebar-nav li a:hover,
.sidebar-nav li a:active,
.sidebar-nav li a:focus,
.sidebar-nav li.open a:hover,
.sidebar-nav li.open a:active,
.sidebar-nav li.open a:focus{
    color: #fff;
    text-decoration: none;
    background-color: transparent;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 20px;
    line-height: 44px;
}
.sidebar-nav .dropdown-menu {
    position: relative;
    width: 100%;
    padding: 0;
    margin: 0;
    border-radius: 0;
    border: none;
    background-color: #222;
    box-shadow: none;
}

/*-------------------------------*/
/*       Hamburger-Cross         */
/*-------------------------------*/

.hamburger {
    position: fixed;
    top: 20px;
    z-index: 999;
    display: block;
    width: 32px;
    height: 32px;
    margin-left: 15px;
    background: transparent;
    border: none;
}
.hamburger:hover,
.hamburger:focus,
.hamburger:active {
    outline: none;
}
.hamburger.is-closed:before {
    content: '';
    display: block;
    width: 100px;
    font-size: 14px;
    color: #fff;
    line-height: 32px;
    text-align: center;
    opacity: 0;
    -webkit-transform: translate3d(0,0,0);
    -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed:hover:before {
    opacity: 1;
    display: block;
    -webkit-transform: translate3d(-100px,0,0);
    -webkit-transition: all .35s ease-in-out;
}

.hamburger.is-closed .hamb-top,
.hamburger.is-closed .hamb-middle,
.hamburger.is-closed .hamb-bottom,
.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-middle,
.hamburger.is-open .hamb-bottom {
    position: absolute;
    left: 0;
    height: 4px;
    width: 100%;
}
.hamburger.is-closed .hamb-top,
.hamburger.is-closed .hamb-middle,
.hamburger.is-closed .hamb-bottom {
    background-color: #1a1a1a;
}
.hamburger.is-closed .hamb-top {
    top: 5px;
    -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed .hamb-middle {
    top: 50%;
    margin-top: -2px;
}
.hamburger.is-closed .hamb-bottom {
    bottom: 5px;
    -webkit-transition: all .35s ease-in-out;
}

.hamburger.is-closed:hover .hamb-top {
    top: 0;
    -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed:hover .hamb-bottom {
    bottom: 0;
    -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-middle,
.hamburger.is-open .hamb-bottom {
    background-color: #1a1a1a;
}
.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-bottom {
    top: 50%;
    margin-top: -2px;
}
.hamburger.is-open .hamb-top {
    -webkit-transform: rotate(45deg);
    -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
}
.hamburger.is-open .hamb-middle { display: none; }
.hamburger.is-open .hamb-bottom {
    -webkit-transform: rotate(-45deg);
    -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
}
.hamburger.is-open:before {
    content: '';
    display: block;
    width: 100px;
    font-size: 14px;
    color: #fff;
    line-height: 32px;
    text-align: center;
    opacity: 0;
    -webkit-transform: translate3d(0,0,0);
    -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-open:hover:before {
    opacity: 1;
    display: block;
    -webkit-transform: translate3d(-100px,0,0);
    -webkit-transition: all .35s ease-in-out;
}

/*-------------------------------*/
/*            Overlay            */
/*-------------------------------*/

.overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(250,250,250,.8);
    z-index: 1;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}


form {
    margin-top: 5%;
}

form header {
    margin: 0 0 20px 0;
    width: 50%;
}
form header div {
    font-size: 90%;
    color: #999;
}
form header h2 {
    margin: 0 0 5px 0;

}
form > div {
    clear: both;
    overflow: hidden;
    padding: 1px;
    margin: 0 0 10px 0;
}
form > div > fieldset > div > div {
    margin: 0 0 5px 0;
}
form > div > label,
legend {
    width: 25%;
    float: left;
    padding-right: 10px;
}
form > div > div,
form > div > fieldset > div {
    width: 75%;
    /*float: right;*/
}
form > div > fieldset label {
    font-size: 90%;
}
fieldset {
    border: 0;
    padding: 0;
}

input[type=text],
input[type=email],
input[type=url],
input[type=password],
textarea {
    width: 100%;
    border-top: 1px solid #ccc;
    border-left: 1px solid #ccc;
    border-right: 1px solid #eee;
    border-bottom: 1px solid #eee;
}
input[type=text],
input[type=email],
input[type=url],
input[type=password] {
    width: 50%;
}
input[type=text]:focus,
input[type=email]:focus,
input[type=url]:focus,
input[type=password]:focus,
textarea:focus {
    outline: 0;
    border-color: #4697e4;
}

@media (max-width: 600px) {
    form > div {
        margin: 0 0 15px 0;
    }
    form > div > label,
    legend {
        width: 100%;
        float: none;
        margin: 0 0 5px 0;
    }
    form > div > div,
    form > div > fieldset > div {
        width: 100%;
        float: none;
    }
    input[type=text],
    input[type=email],
    input[type=url],
    input[type=password],
    textarea,
    {
        width: 100%;
    }
}
@media (min-width: 1200px) {
    form > div > label,
    legend {
        text-align: right;
    }
}
td, th {
    text-align: center; /* center checkbox horizontally */
    vertical-align: middle; /* center checkbox vertically */
}
.scores label {
    white-space: nowrap;
}
</style>

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
                                <button class="btn btn-primary" type="submit" form="form1" value="Submit">Sumit</button>
                                <button type="button" class="btn btn-default">Làm lại</button>
                                <button type="button" class="btn btn-default">Danh sách</button>
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
                                <label for="exampleInputEmail1">Loại <span style="color: red">*</span>:</label>
                                <?php
                                echo $this->Form->input('Link.type',array(
                                    'placeholder' => '',
                                    'type'  => 'text',
                                    'class' =>'form-control',
                                    'label' =>false,
                                    'div'   => false
                                ));
                                ?>
                                <p style="margin-left: 220px;">Nếu là bài viết bình thường thì là <span style="color: red">POST</span>. Nếu là ảnh thì <span style="color: red">PICTURE</span></p>
                            </div>

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
                                <textarea name="data[Link][description]" class="form-control" rows="8" cols="4" tabindex="4" style="width: 50%;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên miền <span style="color: red"></span>:</label>
                                <?php
                                echo $this->Form->input('Link.domain', array(
                                    'label' => false,
                                    'empty' => "Empty",
                                    'options' => array(
                                        'url1' => 'url 1',
                                        'url2' => 'url 2',
                                        'url3' => 'url 3',
                                        'url4' => 'url 4'
                                    ),
                                    'style' =>'width: 50%;height: 30px;',
                                    'div'   => false
                                ));
                                ?>
                                <p style="margin-left: 220px;">Tên miền này sử dụng cho bài</p>
                            </div>

                            <?php if (!empty($this->data['Link']['id'])) { ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">URL <span style="color: red">*</span>:</label>
                                <?php
                                echo $this->Form->input('Link.url', array(
                                    'placeholder' => '',
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'label' => false,
                                    'div' => false,
                                    'readonly' => 'readonly'
                                ));
                                ?>
                                <p style="margin-left: 220px;">Là đường dẫn cần chuyển hướng tới</p>
                            </div>
                            <?php } ?>

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
                            <?php
                            echo $this->Form->input('danh sách',
                                array(
                                    'type' => 'button',
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