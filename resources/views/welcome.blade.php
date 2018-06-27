
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheer" href="./public/css/style.css">

@extends('layouts.app')
   @section('content')
   <section style="height: 100%">
        <section id="carousel" class="col-12" style="margin-bottom:5%;height:50%;width:110%">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/images/maestria_finanzas.jpg" alt="Los Angeles" width="100%" height="100%">
                        <div class="carousel-caption" style="color:black">
                            <h3>Gestión</h3>
                            <p>Gestiona tus clientes y proveedores</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/images/maestria_finanzas2.png" alt="Chicago" width="100%"height="100%">
                        <div class="carousel-caption" style="color:black">
                            <h3>Facturación</h3>
                            <p>Gestiona la facturación de tu empresa</p>
                        </div>
                    </div>
                    <div class="carousel-item" >
                        <img src="/images/maestria_finanzas3.jpg" alt="New York" width="100%" height="100%">
                        <div class="carousel-caption" style="color:black">
                            <h3>Contabilidad</h3>
                            <p>Controla la contabilidad de tu empresa</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </section>
        <section id="servicios" class="offset-sm-1 offset-md-1 offset-lg-1 offset-xl-1 col-10 card" style="margin-bottom:5%;border:1px solid;padding: 3%;border-radius: 1.5rem;">
            <div class="marketing">

                <!-- Three columns of text below the carousel -->
                <div class="row">
                        <div class="col-12 card-header" style="text-align:center;margin-bottom:2%">
                                <h1 style="font-size:2.2em">Nuestros Servicios</h1>
                            </div>
                    <div class="col-lg-4">
                        <i class="fa fa-address-book fa-5x logo" style="margin-bottom: 5%;color:#3aaadc" aria-hidden="true"></i>
                        <h1 style="font-size:1.9em;margin-bottom:3%">Clientes</h1>
                        <p style="color:grey">Damos un servicio completo para la gestión de proveedores, productos y clientes.</p>
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <i class="fa fa-university fa-5x logo" aria-hidden="true" style="margin-bottom: 5%;color:#3aaadc"></i>
                        <h2 style="font-size:1.9em;margin-bottom:3%">Facturación</h2>
                        <p style="color:grey">Podrás tener un control de la facturación de tu empresa de una forma sencilla.</p>
                    </div>
                    <!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <i class="fa fa-money fa-5x logo" style="margin-bottom: 5%;color:#3aaadc" aria-hidden="true"></i>
                        <h2 style="font-size:1.9em;margin-bottom:3%">Resultados</h2>
                        <p style="color:grey">Visualizarás los beneficios económicos de tu facturación.</p>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <!-- /.row -->
        </section>
        <section id="quienes" class="offset-sm-1 offset-md-1 offset-lg-1 offset-xl-1 col-10 card" style="margin-bottom:5%;border:1px solid;padding: 3%;border-radius: 1.5rem;">
            <div class="row">
                <div class="col-12 card-header" style="text-align:center;margin-bottom:2%">
                    <h1 style="font-size:2.2em">¿Quienes somos?</h1>
                </div>
                <div class="col-12" style="text-align: justify">
                    Gestion S.L. nació hace más de 3 años por la necesidad de un sector de la sociedad de gestionar sus finanzas.
                    Durante estos años hemos intentado mejorar nuestros productos atendiendo a las necesidades de nuestros clientes.
                    Nuestra empresa respeta las metodologías de desarrollo ágil. 
                </div>
            </div>
        </section>
        <section id="empleados" class="offset-sm-1 offset-md-1 offset-lg-1 offset-xl-1 col-10 card" style="margin-bottom:5%;border:1px solid;padding: 3%;border-radius: 1.5rem;">
            <div class="row">
                <div class="col-12 card-header" style="text-align:center;margin-bottom:2%">
                    <h1 style="font-size:2.2em">Nuestro Equipo</h1>
                </div>
                <div class="col-12" style="text-align: justify;">
                    <p>En estos años hemos podido contar con una serie de profesionales que han permitido realizar un desarrollo del software 
                    ideal para las necesidades de nuestros clientes.
                    </p>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-3">
                    <div class="card">
                        <img class="card-img-top" src="/images/user1.jpg">
                        <div class="card-block">
                            <figure class="profile">
                                <img src="/images/user1.jpg" class="profile-avatar" alt="">
                            </figure>
                            <h6 class="card-title mt-3" style="font-size:50%">Antonio Muñoz</h6>
                            <div class="meta" style="font-size:45%">
                                <a>Ingeniero de Informatica</a>
                            </div>
                            <div class="card-text" style="font-size:40%">
                                    Antonio esta trabajando con nosotros desde hace mucho tiempo y tiene un gran rendimiento.
                            </div>
                        </div>
                        <div class="card-footer" style="font-size:40%">
                            <small>Director de desarrollo</small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-3">
                    <div class="card">
                        <img class="card-img-top" src="/images/user2.jpg">
                        <div class="card-block">
                            <figure class="profile">
                                <img src="/images/user2.jpg" class="profile-avatar" alt="">
                            </figure>
                            <h4 class="card-title mt-3" style="font-size:55%">Pedro Alarcon</h4>
                            <div class="meta" style="font-size:45%">
                                <a>Licenciado Económicas</a>
                            </div>
                            <div class="card-text" style="font-size:40%">
                                    Pedro esta trabajando con nosotros desde hace mucho tiempo y tiene un gran rendimiento.
                            </div>
                        </div>
                        <div class="card-footer" style="font-size:40%">
                            <small>Consultor</small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-3">
                    <div class="card">
                        <img class="card-img-top" src="/images/user3.jpg">
                        <div class="card-block">
                            <figure class="profile">
                                <img src="/images/user3.jpg" class="profile-avatar" alt="">
                            </figure>
                            <h4 class="card-title mt-3" style="font-size:50%">Dolores Alcantara</h4>
                            <div class="meta" style="font-size:45%">
                                <a>Técnico desarrollo web</a>
                            </div>
                            <div class="card-text" style="font-size:40%">
                                Dolores esta trabajando con nosotros desde hace mucho tiempo y tiene un gran rendimiento.
                            </div>
                        </div>
                        <div class="card-footer" style="font-size:40%">
                            <small>Técnico de desarrollo</small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-3">
                    <div class="card">
                        <img class="card-img-top" src="/images/user4.jpg">
                        <div class="card-block">
                            <figure class="profile">
                                <img src="/images/user4.jpg" class="profile-avatar" alt="">
                            </figure>
                            <h4 class="card-title mt-3" style="font-size:50%">Daniel Reina</h4>
                            <div class="meta" style="font-size:45%">
                                <a>Técnico desarrollo web</a>
                            </div>
                            <div class="card-text" style="font-size:40%">
                                    Reina esta trabajando con nosotros desde hace mucho tiempo y tiene un gran rendimiento.
                            </div>
                        </div>
                        <div class="card-footer" style="font-size:40%">
                            <small>Técnico de desarrollo</small>
                        </div>
                    </div>
                </div>
            </div>

       
        </section>
        <section id="misionvisionvalores" class="offset-sm-1 offset-md-1 offset-lg-1 offset-xl-1 col-10 card" style="margin-bottom:5%;border:1px solid;padding: 3%;border-radius: 1.5rem;">
                <div class="row">
                        <div class="card-header col-12" style="text-align: center;margin-bottom:2%">
                                <h1 style="font-size:2.2em">Misión, Visión y Valores</h1>
                            </div>
                            <div class="col-12" style="text-align:justify;">
                                <p>Todas las empresas deben tener claro su futuro y aporte a la sociedad, para nosotros
                                    es importante que nuestros clientes puedan saber nuestra misión,vision y valores dentro de la sociedad.
                                </p>
                            </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-4">
                            <div class="card">
                                    <img src="/images/mision.png" width="50%" height="20%" style="padding: 5%;margin:0 auto">
                                <div class="card-block">
                                    <h4 class="card-header mt-3">Misión</h4>
                                    <div class="card-text" style="font-size:45%;color:grey">
                                            Gestión S.L. intenta ofrecer la mejor experiencia de informática personal a estudiantes, educadores, profesionales creativos y consumidores de todo el mundo a través de sus innovadoras soluciones de hardware, software e Internet. 

                                            Ser una empresa de concursos y sorteos de excelencia competitiva mundialmente, por sus productos de alta calidad y confiabilidad.</div>
                                    </div>
                                </div>
                            </div>
                   
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-4">
                            <div class="card">
                                    <img src="/images/vision.png" width="50%" height="20%" style="padding: 5%;margin:0 auto">
                                <div class="card-block">
                                    <h4 class="card-header mt-3">Visión</h4>
                                    <div class="card-text" style="font-size:45%;color:grey">
                                            Como visión; ser considerados por sus clientes y aliados estratégicos como una opción viable que ofrece soluciones y servicios basados principalmente en la innovación, tecnología avanzada, servicio y calidad que supere sus expectativas, además de la creatividad que posen a la hora de crear nuevos productos distinguiéndose de la competencia, de manera que su valor añadido sea único.    
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-4">
                            <div class="card">
                                    <img src="/images/valores.png" width="50%" height="20%" style="padding: 5%;margin:0 auto">
                                <div class="card-block">
                                    <h4 class="card-header mt-3">Valores</h4>
                                    <div class="card-text" style="font-size:45%;color:grey">
                                            <ul style="font-size:0.8em">
                                                    <li>  Investigación e innovación tecnológica constante para lograr el crecimiento deseado.</li>
                                                    <li>  Calidad en los productos y servicios que desarrolla.</li>
                                                    <li>  Profesionalismo mediante la capacitación constante de equipo de trabajo.</li>
                                                    <li>  Servicio y atención durante todo el proceso de ciclo comercial y post comercial.</li>
                                                    <li>  Apoyo al entorno social en el que se encuentra</li>
                                                    <li>  Flexibilidad para aceptar el cambio</li>
                                                    <li>  Perseverancia y tenacidad en sus actitudes</li>
                                                 </ul>        
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- /.row -->
        </section>
        <section id="precios" class="offset-sm-1 offset-md-1 offset-lg-1 offset-xl-1 col-10 card" style="margin-bottom:10%;border:1px solid;padding: 3%;border-radius: 1.5rem;">
            <div class="row">
                    <div class="card-header col-12" style="text-align: center;margin-bottom:2%">
                            <h1 style="font-size:2.2em">Precios</h1>
                        </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-header">
                        <h1>Mensual</h1>
                    </div>
                    <div class="card-body" style="font-size: 50%;">
                        <span style="font-size: 160%;">29</span>.95€/mes</h1>
                        <p class="card-text">Puedes disfrutar de nuestro servicio, a través de un pago mensual, teniendo un servicio de soporte 24h.</p>
                    </div>
                    <div class="card-footer text-muted" style="font-size: 50%;">
                        Servicio Plata
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-header">
                        <h1>Semestral</h1>
                    </div>
                    <div class="card-body" style="font-size: 50%;">
                        <span style="font-size: 160%;">24</span>.95€/mes</h1>
                        <p class="card-text">Puedes disfrutar de nuestro servicio, a través de un pago semestral, teniendo un servicio de soporte 24h..</p>
                    </div>
                    <div class="card-footer text-muted" style="font-size: 50%;">
                        Servicio Oro
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-header">
                        <h1>Anual</h1>
                    </div>
                    <div class="card-body" style="font-size: 50%;">
                        <span style="font-size: 160%;">19</span>.95€/mes</h1>
                        <p class="card-text">Puedes disfrutar de nuestro servicio, a través de un pago anual, teniendo un servicio de soporte 24h..</p>
                    </div>
                    <div class="card-footer text-muted" style="font-size: 50%;">
                        Servicio Platino
                    </div>
                </div>
            </div>
            </div>
        </section>
    </section>
       
@endsection

