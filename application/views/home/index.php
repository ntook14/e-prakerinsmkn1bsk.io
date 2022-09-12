<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://webthemez.com" />
    <!-- css -->
    <link href="<?= base_url(); ?>/assets/home/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/home/css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/home/css/jcarousel.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/home/css/flexslider.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/home/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/home/css/style.css" rel="stylesheet" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <!-- start header -->
        <header>
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" tex href="<?= base_url('/home/index'); ?>">
                            <h2>E-prakerin <br>
                                SMKN 1 Batusangkar
                            </h2>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?= base_url('home/index'); ?>">Home</a></li>
                            <li><a href="<?= base_url('home/about'); ?>">Apa Itu Prakerin? </a></li>
                            <li><a href="<?= base_url('home/siswa'); ?>">Siswa</a></li>
                            <li><a href="<?= base_url('home/pembimbing'); ?>">Pembimbing</a></li>
                            <li><a href="<?= base_url('home/perusahaan'); ?>">Tempat Prakerin</a></li>
                            <li><a href="<?= base_url('home/contact'); ?>">Contact</a></li>
                            <li><a href="<?= base_url('auth'); ?>">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
        <section id="featured">

            <!-- Slider -->
            <div id="main-slider" class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="<?= base_url(); ?>/assets/home/img/slides/smk1.jpg" alt="" />
                        <div class="flex-caption">
                            <div class="item_introtext">
                                <strong>SMKN 1 Batusangkar</strong>
                                <p>Bisnis Dan Menagement</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="<?= base_url(); ?>/assets/home/img/slides/smk2.jpg" alt="" />
                        <div class="flex-caption">
                            <div class="item_introtext">
                                <strong>SMKN 1 Batusangkar</strong>
                                <p>Bisnis Dan Menagement</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="<?= base_url(); ?>/assets/home/img/slides/smk3.jpg" alt="" />
                        <div class="flex-caption">
                            <div class="item_introtext">
                                <strong>SMKN 1 Batusangkar</strong>
                                <p>Bisnis Dan Menagement</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- end slider -->

        </section>
        <section class="callaction">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="aligncenter">
                            <h1 class="aligncenter">Selamat Datang Di Website E-Prakerin SMKN 1 Batusangkar</h1><span class="clear spacer_responsive_hide_mobile " style="height:13px;display:block;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">


            <div class="container">
                <div class="row">
                    <div class="skill-home">
                        <div class="skill-home-solid clearfix">
                            <div class="col-md-3 text-center">
                                <span class="icons c1"><i class="fa fa-trophy"></i></span>
                                <div class="box-area">
                                    <h3 class=" text-center">Penjelasan Prakerin<br><a href="<?= base_url('/home/about'); ?>">Read More</a></h3>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <span class="icons c2"><i class="fa fa-picture-o"></i></span>
                                <div class="box-area">
                                    <h3 class=" text-center">Informasi kuota Yang di<br><a href="<?= base_url('/home/info_kuota'); ?>">Read More</a></h3>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <span class="icons c3"><i class="fa fa-desktop"></i></span>
                                <div class="box-area">
                                    <h3 class=" text-center">Alur Proses Prakerin<br><a href="<?= base_url('/home/alur'); ?>">Read More</a></h3>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <span class="icons c4"><i class="fa fa-globe"></i></span>
                                <div class="box-area">
                                    <h3 class=" text-center">Jurusan Yang Tersedia<br><a href="<?= base_url('/home/jurusan_tersedia'); ?>">Read More</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <div class="testimonial-area">

        </div>
        </section>
        <footer>
            <div class="container-fluid footer_section text-center">
                <p>
                    &copy; <?= date('Y'); ?> All Rights Reserved By SMKN 1 Batusangkar
                </p>

            </div>
        </footer>
    </div>
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url(); ?>/assets/home/js/jquery.js"></script>
    <script src="<?= base_url(); ?>/assets/home/js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url(); ?>/assets/home/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/home/js/jquery.fancybox.pack.js"></script>
    <script src="<?= base_url(); ?>/assets/home/js/jquery.fancybox-media.js"></script>
    <script src="<?= base_url(); ?>/assets/home/js/portfolio/jquery.quicksand.js"></script>
    <script src="<?= base_url(); ?>/assets/home/js/portfolio/setting.js"></script>
    <script src="<?= base_url(); ?>/assets/home/js/jquery.flexslider.js"></script>
    <script src="<?= base_url(); ?>/assets/home/js/animate.js"></script>
    <script src="<?= base_url(); ?>/assets/home/js/custom.js"></script>
    <script src="<?= base_url(); ?>/assets/home/js/owl-carousel/owl.carousel.js"></script>
</body>

</html>