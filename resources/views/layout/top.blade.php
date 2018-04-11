<!-- Main navbar -->
<div class="navbar navbar-inverse">
    @guest
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('uploads/images/logo_demo.png')}}" alt="">
            </a>

            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">

            <p class="navbar-text"><span class="label bg-danger">{{trans('layout.offline')}}</span></p>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown language-switch">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        @if(app()->getLocale() == 'ar')
                            <img src="{{asset('uploads/images/flags/ar.png')}}"
                                 class="position-left"
                                 title="arabic"
                                 alt="arabic">
                            العربية
                        @else
                            <img src="{{asset('uploads/images/flags/fr.png')}}"
                                 class="position-left"
                                 title="français"
                                 alt="français">
                            Français
                        @endif
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" id="lang-switcher">
                        @if(app()->getLocale() == 'ar')
                            <li>
                                <a href="#" data-lang="fr">
                                    <img src="{{asset('uploads/images/flags/fr.png')}}"
                                         title="français"
                                         alt="français"> Français
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="#" data-lang="ar" class="text-right">
                                    <img src="{{asset('images/flags/ar.png')}}" alt="">
                                    العربية</a>
                            </li>
                        @endif
                    </ul>
                </li>

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-user-plus"></i>
                        <span>{{ucfirst(trans('layout.auth'))}}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="{{route('login')}}">
                                <i class="fas fa-user mr-4 text-primary"></i> {{ucfirst(trans('layout.login'))}}
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('register')}}">
                                <i class="fas fa-user-plus mr-4 text-warning"></i> {{ucfirst(trans('layout.register'))}}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @else
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset('uploads/images/logo_light.png')}}" alt="">
                </a>
                <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>
            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
                    </li>
                    <li class="dropdown" id="notification-data">
                    </li>
                </ul>

                <p class="navbar-text hidden-sm"><span class="label bg-success">{{trans('layout.online')}}</span></p>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown language-switch">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            @if(app()->getLocale() == 'ar')
                                <img src="{{asset('uploads/images/flags/ar.png')}}"
                                     class="position-left"
                                     title="arabic"
                                     alt="arabic">
                                العربية
                            @else
                                <img src="{{asset('uploads/images/flags/fr.png')}}"
                                     class="position-left"
                                     title="français"
                                     alt="français">
                                Français
                            @endif
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" id="lang-switcher">
                            @if(app()->getLocale() == 'ar')
                                <li>
                                    <a href="#" data-lang="fr">
                                        <img src="{{asset('images/flags/fr.png')}}"
                                             title="français"
                                             alt="français"> Français
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="#" data-lang="ar">
                                        <img src="{{asset('images/flags/ar.png')}}"
                                             title="arabic"
                                             alt="arabic">
                                        العربية</a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-bubbles4"></i>
                            <span class="visible-xs-inline-block position-right">Messages</span>
                            <span class="badge bg-warning-400">2</span>
                        </a>

                        <div class="dropdown-menu dropdown-content width-350">
                            <div class="dropdown-content-heading">
                                Messages
                                <ul class="icons-list">
                                    <li><a href="#"><i class="icon-compose"></i></a></li>
                                </ul>
                            </div>

                            <ul class="media-list dropdown-content-body">
                                <li class="media">
                                    <div class="media-left">
                                        <img src="{{asset('uploads/images/demo/users/face10.jpg')}}"
                                             class="img-circle img-sm" alt="">
                                        <span class="badge bg-danger-400 media-badge">5</span>
                                    </div>

                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">James Alexander</span>
                                            <span class="media-annotation pull-right">04:58</span>
                                        </a>

                                        <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left">
                                        <img src="assets/images/demo/users/face3.jpg" class="img-circle img-sm" alt="">
                                        <span class="badge bg-danger-400 media-badge">4</span>
                                    </div>

                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Margo Baker</span>
                                            <span class="media-annotation pull-right">12:16</span>
                                        </a>

                                        <span class="text-muted">That was something he was unable to do because...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left"><img src="assets/images/demo/users/face24.jpg"
                                                                 class="img-circle img-sm" alt=""></div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Jeremy Victorino</span>
                                            <span class="media-annotation pull-right">22:48</span>
                                        </a>

                                        <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left"><img src="assets/images/demo/users/face4.jpg"
                                                                 class="img-circle img-sm" alt=""></div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Beatrix Diaz</span>
                                            <span class="media-annotation pull-right">Tue</span>
                                        </a>

                                        <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left"><img src="assets/images/demo/users/face25.jpg"
                                                                 class="img-circle img-sm" alt=""></div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Richard Vango</span>
                                            <span class="media-annotation pull-right">Mon</span>
                                        </a>

                                        <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                    </div>
                                </li>
                            </ul>

                            <div class="dropdown-content-footer">
                                <a href="#" data-popup="tooltip" title="All messages"><i
                                            class="icon-menu display-block"></i></a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            @if(isset($user) and !empty($user->photo_profil))
                                <img src="{{ asset($user->photo_profil) }}" alt=""/>
                            @else
                                <img src="{{asset('images/profil/profil.png')}}" alt=""/>
                            @endif
                            <span>
                                @if(isset($user)) {{$user->name}} @endif
                            </span>
                            <i class="caret"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="{{route('user.show',['id'=>$user->id])}}" data-navigation="true" data-title="@if(isset($user)) {{$user->name}} @else 'Profil' @endif">
                                    <i class="icon-user-plus"></i> My profile
                                </a>
                            </li>
                            <li><a href="#"><i class="icon-coins"></i> Organisation</a></li>
                            @if($user->is_admin)
                                <li><a href="{{route('user.index')}}"><i class="icon-coins"></i> users</a></li>
                                <li><a href="{{route('societies.index')}}"><i class="icon-coins"></i> societies</a></li>
                            @endif
                            <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i
                                            class="icon-comment-discussion"></i> Messages</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('setting.index')}}"><i class="icon-cog5"></i> Account settings</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="icon-switch2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        <!-- notifications form -->
            {{ Form::open(['method'=>'put','url'=>route('notifications'),'id'=>'notification_form',"class"=>'hidden']) }}
            {{ Form::close() }}

            {{ Form::open(['method'=>'post','url'=>route('notification.read'),'id'=>'notification_read_form',"class"=>'hidden']) }}
            {{ Form::close() }}
        <!-- /notification form -->
    @endguest

    <form id="language"  method="POST"
          style="display: none;">
        {{ csrf_field() }}
    </form>


</div>
<!-- /main navbar -->