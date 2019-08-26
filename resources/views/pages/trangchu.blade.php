@extends('layout.index')

@section('content')

<!-- mian-content -->
<div class="main-content" id="home">
    <!-- banner-w3layouts -->
    <section class="banner-w3layouts">
        <div class="container">
            <div class="row banner-w3layouts-grids">
                <div class="col-lg-6 banner-w3layouts-info">
                    <h2 data-aos="fade-up">Welcome to
                    </h2>
                    <h3 class="mb-3" data-aos="fade-up">Exam Online</h3>
                    <!-- <p class="mb-4" data-aos="fade-up"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla mollis dapibus nunc, ut rhoncus turpis sodales quis. Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullamcorper dui turpis.</p> -->
                    <!-- <a href="single.html" class="btn">Read More</a> -->
                </div>
                <div class="col-lg-6 banner-w3layouts-image">
                    <div class="effect-w3">
                        <img src="images/sanBK2.jpg" alt="" class="img-fluid image2">
                        <img src="images/sanBK2.jpg" alt="" class="img-fluid image3">
                        <img src="images/sanBK2.jpg" alt="" class="img-fluid image4">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- //banner-w3layouts -->
</div>

<section class="portfolio-flyer pt-5 pb-5" id="gallery">
    <div class="container py-lg-5">
        <h3 class="tittle text-uppercase text-center my-lg-5 my-3"><span class="sub-tittle"> Ảnh nổi bật </span>Đại học Bách khoa Hà Nội</h3>
        <div class="row mt-lg-4 mt-3">
            <ul class="nav nav-pills mt-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="showall-tab" data-toggle="pill" href="#showall" role="tab" aria-controls="showall" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="categorys-tab" data-toggle="pill" href="#categorys" role="tab" aria-controls="categorys" aria-selected="false">Tab 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Tab2-Image-tab" data-toggle="pill" href="#Tab2-Image" role="tab" aria-controls="Tab2-Image" aria-selected="false">Tab 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Tab3-Image-tab" data-toggle="pill" href="#Tab3-Image" role="tab" aria-controls="Tab3-Image" aria-selected="false">Tab 3</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter5" data-image="images/bk01.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk01.jpg" alt="Slog" />
                        </a>
                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter6" data-image="images/n1.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk02.jpg" alt="Slog" />
                        </a>
                    </div>
                    <div class="portfolio lost" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter7" data-image="images/n3.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk03.jpg" alt="Slog" />
                        </a>
                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter8" data-image="images/n4.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk04.jpg" alt="Slog" />
                        </a>
                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter9" data-image="images/n9.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk09.jpg" alt="Slog" />
                        </a>

                    </div>
                    <div class="portfolio lost" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter10" data-image="images/n5.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk05.jpg" alt="Slog" />
                        </a>
                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter11" data-image="images/g7s.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk07.jpg" alt="Slog" />
                        </a>

                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter12" data-image="images/n8.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk08.jpg" alt="Slog" />
                        </a>

                    </div>
                    <div class="portfolio lost" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter13" data-image="images/n6.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk06.jpg" alt="Slog" />
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade" id="categorys" role="tabpanel" aria-labelledby="categorys-tab">
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter6" data-image="images/n1.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk02.jpg" alt="Slog" />
                        </a>

                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter7" data-image="images/n3.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk03.jpg" alt="Slog" />
                        </a>

                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter8" data-image="images/n4.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk04.jpg" alt="Slog" />
                        </a>

                    </div>
                </div>
                <div class="tab-pane fade" id="Tab3-Image" role="tabpanel" aria-labelledby="Tab3-Image-tab">
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter9" data-image="images/n9.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk09.jpg" alt="Slog" />
                        </a>

                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter11" data-image="images/g7s.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk07.jpg" alt="Slog" />
                        </a>
                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter12" data-image="images/n8.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk08.jpg" alt="Slog" />
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade" id="Tab2-Image" role="tabpanel" aria-labelledby="Tab2-Image-tab">
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter9" data-image="images/n9.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk09.jpg" alt="Slog" />
                        </a>

                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter6" data-image="images/n1.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk02.jpg" alt="Slog" />
                        </a>

                    </div>
                    <div class="portfolio" data-aos="zoom-in">
                        <a class="thumbnail" href="#" data-toggle="modal" data-target="#exampleModalCenter7" data-image="images/n3.jpg" data-target="#image-gallery">
                            <img class="categoryd-img img-fluid" src="images/bk03.jpg" alt="Slog" />
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
<!-- //portfolio -->
<!--/model-->
<div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/bk01.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/bk02.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter7" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/bk03.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter8" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/bk04.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter9" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/bk09.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter10" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/bk05.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter11" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/bk07.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter12" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/bk08.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter13" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/bk06.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<!--//model-->

<!-- testimonials -->
<div class="testimonials py-md-5 py-5">
    <div class="container py-xl-5 py-lg-3">
        <h3 class="tittle text-uppercase text-center mb-lg-5 mb-3"><span class="sub-tittle">Danh ngôn</span> Người nổi tiếng</h3>
        <div id="carouselExampleIndicators" class="carousel slide pb-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-lg-6 testimonials_grid" data-aos="fade-up">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i>  Dù chỉ nắm vững một kiến thức nào đó, cũng đều có ích cho trí óc, nó sẽ ném đi những thứ vô dụng nhưng giữ lại những thứ có ích.
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/Leonardo.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                                        <h5 class="mb-2">Leonardo da Vinci</h5>
                                        <p>(1452-1519)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 testimonials_grid mt-lg-0 mt-4" data-aos="fade-up">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i> Nam libero tempore, Lo buồn của học giả là hiếu thắng, lo buồn của nhà âm nhạc là ảo tưởng, lo buồn của quan hầu là giảo hoạt, lo buồn của người đàn bà là soi mói, lo buồn của người đang yêu là tập hợp của tất cả những thứ ấy.
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/Shakespeare.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid  mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                                        <h5 class="mb-2">William Shakespeare </h5>
                                        <p>(1564-1616)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6 testimonials_grid" data-aos="fade-up">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i> Trí tuệ trực giác là một năng khiếu thiêng liêng và trí tuệ thuần lý là đầy tớ trung thành. Chúng ta đã tạo ra một xã hội chỉ tôn kính tên đầy tớ mà quên mất đi cái năng khiếu.
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/Einstein.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid  mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                                        <h5 class="mb-2">Albert Einstein </h5>
                                        <p>(1879-1955)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 testimonials_grid mt-lg-0 mt-4" data-aos="fade-up">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i> Tôi không quan tâm có trở thành người giàu nhất khi nằm xuống hay không… Lên giường mỗi tối và nói chúng ta đã làm được thứ gì đó tuyệt vời… đó mới là điều có ý nghĩa với tôi.
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/jobs.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid  mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                                        <h5 class="mb-2">Steve Jobs  </h5>
                                        <p>(1955-2011)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6 testimonials_grid">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i> Thế giới đã phải chịu tổn thất rất lớn. Không phải vì sự tàn ác của những người xấu, mà là vì sự im lặng của những người tốt.
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/napo.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid  mt-xl-3 mt-lg-2 mt-md-4  mt-2">
                                        <h5 class="mb-2">Napoléon Bonaparte </h5>
                                        <p> (1769-1821)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 testimonials_grid mt-lg-0 mt-4" data-aos="fade-up">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i> Cũng như sự thay đổi theo chu kỳ từ trước đến nay của các mùa, cuộc sống có cái ấm áp dễ chịu của những mùa hè và cái rét buốt của những mùa đông.
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/martin.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                                        <h5 class="mb-2">Martin Luther King</h5>
                                        <p>(1929 – 1968)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //testimonials -->



<section class="banner-w3layouts-bottom py-lg-5 py-4">
    <div class="container">
        <div class="inner-sec-wthree py-lg-5 py-4 speak">
            <h3 class="tittle text-uppercase text-center my-lg-5 my-3"><span class="sub-tittle">Team</span> Avenger</h3>
            <div class="row mt-lg-5 mt-4">
                <div class="col-md-4 team-gd text-center" data-aos="fade-right">
                    <div class="team-img mb-4">
                        <img src="images/dat1.jpg" class="img-fluid rounded-circle" alt="user-image">
                    </div>
                    <div class="team-info">
                        <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Designer</span> Lê Hữu Đạt</h3>
                        <!-- <p>Lorem Ipsum has been the industry's standard since the 1500s.</p> -->
                        <ul class="social_section_1info mt-md-4 mt-3">
                            <li class="mb-2 facebook"><a href="https://www.facebook.com/meogarfield2312"><i class="fa fa-facebook mr-1"></i>facebook</a></li>
                            <li class="google"><a style="color: white;"><i class="fa fa-google-plus mr-1"></i>google</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 team-gd second text-center">
                    <div class="team-img mb-4">
                        <img src="images/linhka.jpg" class="img-fluid rounded-circle" alt="user-image">
                    </div>
                    <div class="team-info">
                        <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Designer</span> Lê Nguyễn Quang Linh</h3>
                        <!-- <p>Lorem Ipsum has been the industry's standard since the 1500s.</p> -->
                        <ul class="social_section_1info mt-md-4 mt-3">
                            <li class="mb-2 facebook"><a href="https://www.facebook.com/BKGam"><i class="fa fa-facebook mr-1"></i>facebook</a></li>
                            <li class="google"><a style="color: white;"><i class="fa fa-google-plus mr-1"></i>google</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 team-gd text-center" data-aos="fade-left">
                    <div class="team-img mb-4">
                        <img src="images/quang.jpg" class="img-fluid rounded-circle" alt="user-image">
                    </div>
                    <div class="team-info">
                        <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Designer</span> Nguyễn Đình Quang</h3>
                        <!-- <p>Lorem Ipsum has been the industry's standard since the 1500s.</p> -->
                        <ul class="social_section_1info mt-md-4 mt-3">
                            <li class="mb-2 facebook"><a href="https://www.facebook.com/quangla.furiaroja"><i class="fa fa-facebook mr-1"></i>facebook</a></li>
                            <li class="google"><a style="color: white;"><i class="fa fa-google-plus mr-1"></i>google</a></li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

@endsection