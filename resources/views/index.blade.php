@extends('app')

@section('content')

<section id="main-slider" class="carousel">
    <div class="carousel-inner">
        <div class="item active">
            <div class="container">
                <div class="carousel-content">
                    <h1>Título h1</h1>

                    <p class="lead">Parágrafo 'lead'<br>Segunda linha paragrafo</p>
                </div>
            </div>
        </div>
        <!--/.item-->
        <div class="item">
            <div class="container">
                <div class="carousel-content">
                    <h1>2º Título h1</h1>

                    <p class="lead">Outro parágrafo 'lead'<br>Outra segunda linha paragrafo</p>
                </div>
            </div>
        </div>
        <!--/.item-->
    </div>
    <!--/.carousel-inner-->
    <a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
    <a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
</section>
<!--/#main-slider-->

<section id="menu1">
    <div class="container">
        <div class="box first">
            <div class="center gap">
                <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac<br>turpis
                    egestas. Vestibulum tortor quam, feugiat vitae.</p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>Primeiro box h4</h4>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>
                <!--/.col-md-4-->
                <div class="col-md-4 col-sm-6">
                    <div class="center">
                        <i class="icon-android icon-md icon-color2"></i>
                        <h4>Segundo box h4</h4>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>
                <!--/.col-md-4-->
                <div class="col-md-4 col-sm-6">
                    <div class="center">
                        <i class="icon-windows icon-md icon-color3"></i>
                        <h4>Terceiro box h4</h4>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>
                <!--/.col-md-4-->
                <div class="col-md-4 col-sm-6">
                    <div class="center">
                        <i class="icon-html5 icon-md icon-color4"></i>
                        <h4>Quarto box h4</h4>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>
                <!--/.col-md-4-->
                <div class="col-md-4 col-sm-6">
                    <div class="center">
                        <i class="icon-css3 icon-md icon-color5"></i>
                        <h4>Quinto box h4</h4>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>
                <!--/.col-md-4-->
                <div class="col-md-4 col-sm-6">
                    <div class="center">
                        <i class="icon-thumbs-up icon-md icon-color6"></i>
                        <h4>Sexto box h4</h4>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>
                <!--/.col-md-4-->
            </div>
            <!--/.row-->
        </div>
        <!--/.box-->
    </div>
    <!--/.container-->
</section>
<!--/#menu1-->

@stop