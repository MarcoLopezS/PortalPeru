@extends('layouts.frontend')

@section('contenido_body')

    <!-- Main -->
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="noticias gnSlider gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="flex-container-noticias">
                            <div class="flexslider loading">
                                <ul class="slides">
                                    @foreach($post_1 as $item)
                                    {{--*/
                                    $nota_titulo = $item->titulo;
                                    $nota_url = route('home.noticia', [$item->id, $item->slug_url]);
                                    $nota_imagen = "upload/".$item->imagen_carpeta."750x445/".$item->imagen;
                                    /*--}}
                                    <li>
                                        <div class="item-wrap">
                                            <a href="{{ $nota_url }}">
                                                <img src="{{ $nota_imagen }}" alt="image">
                                                <p class="item" data-bottomtext="0">{{ $nota_titulo }}</p>
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.gnSlider -->

                    <div class="popular-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="gn-line"></div>
                        <div class="section-title">
                            <h4><a href="#">Popular Posts</a></h4>
                        </div>
                        <div class="content-left">
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/8.jpg" alt="img"></a>
                                </div>
                                <div class="cat">
                                    <a href="">Mustreads</a>
                                </div>
                                <h3><a href="#">If you wanted to get rich</a></h3>
                                <p class="excerpt-entry">I think your best bet would be to start or join a startup. That's been a reliable way to get rich for hundreds of years.The word "startup" dates from the 1960s, but what happens in one is very similar.</p>
                                <div class="post-meta">
                                    <span class="author">By <a href="#">John Doe</a></span>
                                    <div class="activity">
                                        <span class="views">345</span><span class="comment"><a href="#">15</a></span>
                                    </div>
                                </div>
                            </article><!--  /.post -->
                        </div><!-- /.content-left -->
                        <div class="content-right">
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/2.jpg" alt="img"></a>
                                </div>
                                <div class="content">
                                    <h3><a href="#">Lots of people get rich knowing nothing more than that.</a></h3>
                                    <span class="date">7:00 am on Feb 28</span>
                                </div>
                            </article><!--  /.post -->
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/2.jpg" alt="img"></a>
                                </div>
                                <div class="content">
                                    <h3><a href="#">Lots of people get rich knowing nothing more than that.</a></h3>
                                    <span class="date">7:00 am on Feb 28</span>
                                </div>
                            </article><!--  /.post -->
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/2.jpg" alt="img"></a>
                                </div>
                                <div class="content">
                                    <h3><a href="#">Lots of people get rich knowing nothing more than that.</a></h3>
                                    <span class="date">7:00 am on Feb 28</span>
                                </div>
                            </article><!--  /.post -->
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/2.jpg" alt="img"></a>
                                </div>
                                <div class="content">
                                    <h3><a href="#">Lots of people get rich knowing nothing more than that.</a></h3>
                                    <span class="date">7:00 am on Feb 28</span>
                                </div>
                            </article><!--  /.post -->
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/2.jpg" alt="img"></a>
                                </div>
                                <div class="content">
                                    <h3><a href="#">Lots of people get rich knowing nothing more than that.</a></h3>
                                    <span class="date">7:00 am on Feb 28</span>
                                </div>
                            </article><!--  /.post -->
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/2.jpg" alt="img"></a>
                                </div>
                                <div class="content">
                                    <h3><a href="#">Lots of people get rich knowing nothing more than that.</a></h3>
                                    <span class="date">7:00 am on Feb 28</span>
                                </div>
                            </article><!--  /.post -->
                        </div><!-- /.content-right -->
                    </div><!-- /.popular-posts -->

                    <div class="featured-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="gn-line"></div>
                        <div class="section-title">
                            <h4><a href="#">Featured Posts</a></h4>
                        </div>
                        <div class="content-left">
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/9.jpg" alt="img"></a>
                                </div>
                                <div class="cat">
                                    <a href="">Mustreads</a>
                                </div>
                                <h3><a href="#">If you wanted to get rich, how would you do it?</a></h3>
                                <p class="excerpt-entry">I think your best bet would be to start or join a startup. That's been a reliable way to get rich for hundreds of years.The word "startup" dates from the 1960s, but what happens in one is very similar.</p>
                                <div class="post-meta">
                                    <span class="author">By <a href="#">Paul Graham</a></span>
                                    <div class="activity">
                                        <span class="views">345</span><span class="comment"><a href="#">15</a></span>
                                    </div>
                                </div>
                            </article><!--  /.post -->
                        </div><!-- /.content-left -->
                        <div class="content-right">
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/4.jpg" alt="img"></a>
                                </div>
                                <div class="cat">
                                    <a href="">Tech</a>
                                </div>
                                <h3><a href="#">Startups usually involve technology, so much so that the phrase "high-tech startup" is almost redundant.</a></h3>
                                <div class="activity">
                                    <span class="views">12</span><span class="comment"><a href="#">15</a></span>
                                </div>
                            </article><!--  /.post -->
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/4.jpg" alt="img"></a>
                                </div>
                                <div class="cat">
                                    <a href="">Social media</a>
                                </div>
                                <h3><a href="#">Startups usually involve technology, so much so that the phrase "high-tech startup" is almost redundant.</a></h3>
                                <div class="activity">
                                    <span class="views">12</span><span class="comment"><a href="#">15</a></span>
                                </div>
                            </article><!--  /.post -->
                        </div><!-- /.content-right -->
                    </div><!-- /.featured-posts -->

                    <div class="editors-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="gn-line"></div>
                        <div class="section-title">
                            <h4><a href="#">Editors Picks</a></h4>
                        </div>
                        <div class="post-wrap">
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/3.jpg" alt="img"></a>
                                </div>
                                <div class="content">
                                    <div class="cat">
                                        <a href="">Mustreads</a>
                                    </div>
                                    <h3><a href="#">If you wanted to get rich, how would you do it?</a></h3>
                                    <p class="excerpt-entry">Economically, you can think of a startup as a way to compress your whole working life into a few years.</p>
                                    <div class="post-meta">
                                        <span class="author">By <a href="#">Anna Chapman</a></span>
                                        <span class="time"> - 16 hours ago</span>
                                    </div>
                                </div>
                            </article><!--  /.post -->
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/3.jpg" alt="img"></a>
                                </div>
                                <div class="content">
                                    <div class="cat">
                                        <a href="">Mustreads</a>
                                    </div>
                                    <h3><a href="#">If you wanted to get rich, how would you do it?</a></h3>
                                    <p class="excerpt-entry">Instead of working at a low intensity for forty years, you work as hard as you possibly can for four.</p>
                                    <div class="post-meta">
                                        <span class="author">By <a href="#">John Doe</a></span>
                                        <span class="time"> - 16 hours ago</span>
                                    </div>
                                </div>
                            </article><!--  /.post -->
                            <article class="post">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/3.jpg" alt="img"></a>
                                </div>
                                <div class="content">
                                    <div class="cat">
                                        <a href="">Mustreads</a>
                                    </div>
                                    <h3><a href="#">If you wanted to get rich, how would you do it?</a></h3>
                                    <p class="excerpt-entry">I think your best bet would be to start or join a startup. </p>
                                    <div class="post-meta">
                                        <span class="author">By <a href="#">Mike Tyson</a></span>
                                        <span class="time"> - 16 hours ago</span>
                                    </div>
                                </div>
                            </article><!--  /.post -->
                        </div><!-- /.post-wrap -->
                    </div><!-- /.editors-posts -->

                </div><!-- /.col-md-8 -->

                @include('frontend.partials.sidebar')

                <div class="col-md-12">
                    <div class="miraperu gnSlider gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="flex-container-miraperu">
                            <div class="flexslider loading">
                                <ul class="slides">

                                    @foreach($galeria as $item)
                                    {{--*/
                                    $nota_titulo = $item->titulo;
                                    $nota_foto = $item->descripcion;
                                    $nota_url = route('home.noticia', [$item->id, $item->slug_url]);
                                    $nota_imagen = "upload/".$item->imagen_carpeta."1132x670/".$item->imagen;
                                    /*--}}
                                    <li>
                                        <div class="item-wrap">
                                            <img src="{{ $nota_imagen }}" alt="image">
                                            <p class="item" data-bottomtext="0">{{ $nota_titulo }} <br> Foto: {{ $nota_foto }}</p>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div><!-- /.gnSlider -->
                </div><!-- /.col-md-12 -->

                <div class="col-md-12">
                    <div class="trending-posts">
                        <div class="gn-line"></div>
                        <div class="section-title">
                            <h4><a href="#">Trending</a></h4>
                        </div>
                        <div class="one-fourth gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                            <article class="post first">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/5.jpg" alt="img"></a>
                                </div>
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">This pays especially well in technology, where you earn a premium for working fast.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">Here is a brief sketch of the economic proposition.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">Startups are not magic.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">Like all back-of-the-envelope calculations, this one has a lot of wiggle room.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">Imagine the stress of working for the Post Office for fifty years.</a></h3>
                            </article><!--  /.post -->
                        </div>
                        <div class="one-fourth gn-animation" data-animation="fadeInUp" data-animation-delay="0.2s" data-animation-offset="75%">
                            <article class="post first">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/5.jpg" alt="img"></a>
                                </div>
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">Lots of people get rich knowing nothing more than that.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">If you're a good hacker in your mid twenties, you can get a job paying about $80,000 per year.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">They don't change the laws of wealth creation.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">I wouldn't try to defend the actual numbers. But I stand by the structure of the calculation.</a></h3>
                            </article><!--  /.post -->
                        </div>
                        <div class="one-fourth gn-animation" data-animation="fadeInUp" data-animation-delay="0.4s" data-animation-offset="75%">
                            <article class="post first">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/5.jpg" alt="img"></a>
                                </div>
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">I think your best bet would be to start or join a startup.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">You could probably work twice as many hours as a corporate employee.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">Imagine the stress of working for the Post Office for fifty years. In a startup you compress all this stress into three or four years.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">This pays especially well in technology, where you earn a premium for working fast.</a></h3>
                            </article><!--  /.post -->
                        </div>
                        <div class="one-fourth last gn-animation" data-animation="fadeInUp" data-animation-delay="0.6s" data-animation-offset="75%">
                            <article class="post first">
                                <div class="thumb">
                                    <a href="#"><img src="images/thumbs/5.jpg" alt="img"></a>
                                </div>
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">That's been a reliable way to get rich for hundreds of years.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">Like all back-of-the-envelope calculations, this one has a lot of wiggle room.</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">Three million? How do I get to be a billionaire, like Bill Gates?</a></h3>
                            </article><!--  /.post -->
                            <article class="post">
                                <span class="date">October 6, 2013</span>
                                <h3><a href="#">If $3 million a year seems high to some people, it will seem low to others.</a></h3>
                            </article><!--  /.post -->
                        </div>
                    </div><!-- /.trending-posts -->
                </div><!-- /.col-md-12 -->

                <div class="col-md-8">
                    <div class="social-media-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="gn-line"></div>
                        <div class="section-title">
                            <h4><a href="#">Social Media</a></h4>
                        </div>
                        <article class="post">
                            <div class="thumb">
                                <a href="#"><img src="images/thumbs/6.jpg" alt="img"></a>
                            </div>
                            <div class="content">
                                <div class="cat">
                                    <a href="#">Mustreads</a>
                                </div>
                                <h3><a href="#">If you wanted to get rich.</a></h3>
                                <p class="excerpt-entry">I think your best bet would be to start or join a startup. That's been a reliable way to get rich for hundreds of years.</p>
                                <div class="activity">
                                    <span class="views">345</span><span class="comment"><a href="#">15</a></span>
                                </div>
                            </div>
                        </article><!--  /.post -->
                        <article class="post">
                            <div class="thumb">
                                <a href="#"><img src="images/thumbs/6.jpg" alt="img"></a>
                            </div>
                            <div class="content">
                                <div class="cat">
                                    <a href="#">Mustreads</a>
                                </div>
                                <h3><a href="#">Startups are not magic.</a></h3>
                                <p class="excerpt-entry">That's been a reliable way to get rich for hundreds of years.The word "startup" dates from the 1960s, but what happens in one is very similar.</p>
                                <div class="activity">
                                    <span class="views">345</span><span class="comment"><a href="#">15</a></span>
                                </div>
                            </div>
                        </article><!--  /.post -->
                        <article class="post">
                            <div class="thumb">
                                <a href="#"><img src="images/thumbs/6.jpg" alt="img"></a>
                            </div>
                            <div class="content">
                                <div class="cat">
                                    <a href="#">Mustreads</a>
                                </div>
                                <h3><a href="#">They don't change the laws of wealth creation.</a></h3>
                                <p class="excerpt-entry">That's been a reliable way to get rich for hundreds of years.The word "startup" dates from the 1960s.</p>
                                <div class="activity">
                                    <span class="views">345</span><span class="comment"><a href="#">15</a></span>
                                </div>
                            </div>
                        </article><!--  /.post -->
                    </div><!-- /.social-media-posts -->
                </div><!-- /.col-md-8 -->

                <div class="col-md-4">
                    <div class="highlights-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="gn-line"></div>
                        <div class="section-title">
                            <h4><a href="#">Highlights</a></h4>
                        </div>
                        <article class="post">
                            <div class="thumb">
                                <a href="#"><img src="images/thumbs/7.jpg" alt="img"></a>
                            </div>
                            <div class="cat">
                                <a href="">Social media</a>
                            </div>
                            <h3><a href="#">Like all back-of-the-envelope calculations, this one has a lot of wiggle room.</a></h3>
                            <div class="activity">
                                <span class="views">12</span><span class="comment"><a href="#">0</a></span>
                            </div>
                        </article><!--  /.post -->
                        <article class="post last">
                            <div class="thumb">
                                <a href="#"><img src="images/thumbs/7.jpg" alt="img"></a>
                            </div>
                            <div class="cat">
                                <a href="">Social media</a>
                            </div>
                            <h3><a href="#">I'm not claiming the multiplier is precisely 36, but it is certainly more than 10...</a></h3>
                            <div class="activity">
                                <span class="views">12</span><span class="comment"><a href="#">0</a></span>
                            </div>
                        </article><!--  /.post -->
                        <article class="post">
                            <div class="thumb">
                                <a href="#"><img src="images/thumbs/7.jpg" alt="img"></a>
                            </div>
                            <div class="cat">
                                <a href="">Social media</a>
                            </div>
                            <h3><a href="#">Like all back-of-the-envelope calculations, this one has a lot of wiggle room.</a></h3>
                            <div class="activity">
                                <span class="views">12</span><span class="comment"><a href="#">0</a></span>
                            </div>
                        </article><!--  /.post -->
                        <article class="post margin-b0 last">
                            <div class="thumb">
                                <a href="#"><img src="images/thumbs/7.jpg" alt="img"></a>
                            </div>
                            <div class="cat">
                                <a href="">Social media</a>
                            </div>
                            <h3><a href="#">I'm not claiming the multiplier is precisely 36, but it is certainly more than 10...</a></h3>
                            <div class="activity">
                                <span class="views">12</span><span class="comment"><a href="#">0</a></span>
                            </div>
                        </article><!--  /.post -->
                    </div><!-- /.highlights-posts -->
                </div><!-- /.col-md-4 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@stop