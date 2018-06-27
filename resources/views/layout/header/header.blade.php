<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="offset-1 col-10">
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                <ul class="navbar-nav mr-auto">
                    @guest
                        <a class="navbar-brand" href="{{ url('/') }}" style="font-size:1.7em">
                            Gestion Economica
                        </a>
                    @else
                        @include('layout.header.navbar')
                    @endguest
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto" style="font-size: 1.7em">
                    @guest
                        <li><a class="facebookBtn smGlobalBtn" href="https://www.facebook.com"></a></li>
                        <li><a class="twitterBtn smGlobalBtn" href="https://www.twitter.com"></a></li>
                        <li><a class="googleplusBtn smGlobalBtn" href="https://plus.google.com/"></a></li>
                        <li><a class="linkedinBtn smGlobalBtn" href="https://es.linkedin.com/"></a></li>
                        <li style="margin-right:3%"><a class="pinterestBtn smGlobalBtn" href="https://www.pinterest.es/"></a></li>
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Menu 
                                </a>
    
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/login">Login</a>
                                    <a class="dropdown-item" href="/register">Registro</a>
                                    <a class="dropdown-item" href='/contact'>Contacto</a>
                                    <a class="dropdown-item" href='/password/reset'> Enviar Contraseña</a>
    
                                </div>
                            </li>
                    @else
                        <li class="nav-item dropdown" style="float:right">
                    <div class="dropdown" style="width: 10%">
                                    <a class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;background-color:white">
                                            <img src="/images/user.png" width="100%" height="3%" style="float:right">
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();" style="float:right">
                                             {{ __('Logout') }}
                                         </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="float:right;">
                                                @csrf
                                            </form>
                                    </div>
                                  </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

