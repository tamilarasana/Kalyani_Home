<!DOCTYPE html>
<html class="no-js" lang="en">
<!-- Mirrored from wrraptheme.com/templates/nexa/html/basic-form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Aug 2022 12:35:16 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit." />
    @yield('title')
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet"
        href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
              ') }}" /> --}}
    <link href="{{ asset('assets/plugins/waitme/waitMe.css" rel="stylesheet') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/color_skins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}" />
    {{-- <link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/icons.min.css') }}" /> --}}
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

</head>

<body class="theme-orange">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <p>Please wait...</p>
            <div class="m-t-30"><img src="{{ asset('assets/images/logo1.svg')}}" width="80" height="80" alt="Nexa"></div>
        </div>
    </div>

    <div class="overlay" ></div>
    {{-- <div class="search-bar">
        <div class="search-icon"> <i class="material-icons">search</i> </div>
        <input type="text" placeholder="Explore Nexa...">
        <div class="close-search"> <i class="material-icons">close</i> </div>
    </div> --}}

    <nav class="navbar">
        <div class="col-12">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ route('banner.index') }}">Kalyani Home</a>
            </div>
            {{-- <ul class="nav navbar-nav navbar-left">
                <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i
                            class="fa fa-arrows-h"></i></a></li>
                <li><a href="javascript:void(0);" class="inbox-btn hidden-sm-down" data-close="true"><i
                            class="fa fa-envelope"></i></a></li>
                <li class="dropdown menu-app hidden-sm-down"><a href="javascript:void(0);" class="dropdown-toggle"
                        data-toggle="dropdown" role="button"> <i class="fa fa-th"></i> </a>
                    <ul class="dropdown-menu slideDown">
                        <li class="body">
                            <ul class="menu">
                                <li><a href="blog-dashboard.html"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a>
                                </li>
                                <li><a href="contact.html"><i
                                            class="zmdi zmdi-accounts-list"></i><span>Contacts</span></a></li>
                                <li><a href="chat.html"><i class="zmdi zmdi-comment-text"></i><span>Chat</span></a></li>
                                <li><a href="javascript:void(0)"><i class="zmdi zmdi-arrows"></i><span>Notes</span></a>
                                </li>
                                <li><a href="javascript:void(0)"><i
                                            class="zmdi zmdi-view-column"></i><span>Taskboard</span></a></li>
                                <li><a href="events.html"><i
                                            class="zmdi zmdi-calendar-note"></i><span>Calendar</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul> --}}
            <ul class="nav navbar-nav navbar-right">
                {{-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i
                            class="fa fa-search"></i></a>
                </li> --}}
                {{-- <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle xs-hide" data-toggle="dropdown"
                        role="button"><i class="fa fa-bell"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu slideDown">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu list-unstyled">
                                <li><a href="javascript:void(0);">
                                        <div class="icon-circle l-coral"> <i class="material-icons">person_add</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>12 new members joined</h4>
                                            <p> <i class="material-icons">access_time</i> 14 mins ago </p>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0);">
                                        <div class="icon-circle l-turquoise"> <i
                                                class="material-icons">add_shopping_cart</i> </div>
                                        <div class="menu-info">
                                            <h4>4 sales made</h4>
                                            <p> <i class="material-icons">access_time</i> 22 mins ago </p>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0);">
                                        <div class="icon-circle g-bg-cyan"> <i
                                                class="material-icons">delete_forever</i> </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy Doe</b> deleted account</h4>
                                            <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0);">
                                        <div class="icon-circle g-bg-blue"> <i class="material-icons">mode_edit</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy</b> changed name</h4>
                                            <p> <i class="material-icons">access_time</i> 2 hours ago </p>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0);">
                                        <div class="icon-circle l-slategray"> <i class="material-icons">comment</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> commented your post</h4>
                                            <p> <i class="material-icons">access_time</i> 4 hours ago </p>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0);">
                                        <div class="icon-circle l-seagreen"> <i class="material-icons">cached</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> updated status</h4>
                                            <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0);">
                                        <div class="icon-circle l-blue"> <i class="material-icons">settings</i> </div>
                                        <div class="menu-info">
                                            <h4>Settings updated</h4>
                                            <p> <i class="material-icons">access_time</i> Yesterday </p>
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="footer"><a href="javascript:void(0);">View All Notifications</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i
                            class="fa fa-flag"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu slideDown">
                        <li class="header">TASKS</li>
                        <li class="body">
                            <ul class="menu tasks list-unstyled">
                                <li><a href="javascript:void(0);">
                                        <h4> Footer display issue <small>72%</small> </h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 68%;"></div>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0);">
                                        <h4> Make new buttons <small>56%</small> </h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 68%;"></div>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0);">
                                        <h4> Create new dashboard <small>68%</small> </h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 68%;"></div>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0);">
                                        <h4> Solve transition issue <small>77%</small> </h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 68%;"></div>
                                        </div>
                                    </a></li>
                                <li><a href="javascript:void(0);">
                                        <h4> Answer GitHub questions <small>87%</small> </h4>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar"
                                                aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 68%;"></div>
                                        </div>
                                    </a></li>
                            </ul>
                        </li>
                        <li class="footer"><a href="javascript:void(0);">View All Tasks</a></li>
                    </ul>
                </li> --}}
                {{-- <li><a href="#" class="mega-menu xs-hide" data-close="true"><i
                            class="fa fa-power-off mr-1"></i> Logout</a></li> --}}
                            <li >
                                <a id="navbarDropdown" class="n dropdown-toggle" href="#" role="button" data-toggle="dropdown" 	>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                {{-- <li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i
                    class="fa fa-cog zmdi-hc-spin"></i></a></li> --}}

                    
            </ul>
        </div>
    </nav>

    

    <aside id="leftsidebar" class="sidebar">
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('assets/images/xs/logo2.png')}}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown">Kalyani Home</div>
                {{-- <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                        role="button"> keyboard_arrow_down </i>
                    <ul class="dropdown-menu slideUp">
                        <li><a href="profile.html"><i class="material-icons">person</i>Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        <li class="divider"></li>
                        <li><a href="sign-in.html"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
                <div class="email"><a href="https://wrraptheme.com/cdn-cgi/l/email-protection" class="__cf_email__"
                        data-cfemail="0862676066266c676d486d70696578646d266b6765">[email&#160;protected]</a></div> --}}
            </div>
        </div>


        <div class="menu">
            <ul class="list">            
                <li class=" {{ Request::is('banner') ? 'active open' : ''}}"><a href="{{ route("banner.index") }}"><i class="fa fa-home"></i><span>Banner</span> </a></li>
                <li  class=" {{ Request::is('category') ? 'active open' : ''}}"><a href="{{ route('category.index') }}"><i class="fa fa-list"></i><span>Category</span> </a></li>
                <li class=" {{ Request::is('location') ? 'active open' : ''}}"><a href="{{ route('location.index') }}"><i class="fa fa-map-marker"></i><span>Location</span> </a></li>
                <li class=" {{ Request::is('producttype') ? 'active open' : ''}}"><a href="{{ route('producttype.index') }}"><i class="fa fa-list-alt"></i><span>Product Type</span> </a></li>
                <li class=" {{ Request::is('product') ? 'active open' : ''}}"><a href="{{ route('product.index') }}"><i class="fa fa-product-hunt"></i><span>Product</span></a></li>
                <li class=" {{ Request::is('aboutus') ? 'active open' : ''}}"><a href="{{ route('aboutus.index') }}"><i class="fa fa-info"></i><span>Abouts</span> </a></li>
              
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i><span>Medias</span>
                </a>
                <ul class="ml-menu" >
                    {{-- <li class=" {{ Request::is('images') ? 'active open' : ''}}"><a href="{{ route('images.index') }} "><i class="fa fa-picture-o" aria-hidden="true"></i><span>Images</span> </a></li> --}}
                    <li class=" {{ Request::is('interior') ? 'active open' : ''}}" ><a href="{{ route('interior.index') }} "><i class="fa fa-file-image-o" ></i><span>Interior</span> </a></li>
                    <li class=" {{ Request::is('fullview') ? 'active open' : ''}}"><a href="{{ route('fullview.index') }}"><i  class="fa fa-street-view" ></i><span>Full Views</span> </a></li>
                    <li class=" {{ Request::is('exterior') ? 'active open' : ''}}"><a href="{{ route('exterior.index') }}"><i class="fa fa-external-link"></i><span>Exterior</span> </a></li>
                    <li class=" {{ Request::is('walkthroughvedio') ? 'active open' : ''}}"><a href="{{ route('walkthroughvedio.index') }}"><i class="fa fa-google-wallet"></i><span>Walk Through Video</span> </a></li>
                </ul>
            </li>  
                 <li class=" {{ Request::is('highlight') ? 'active open' : ''}}"><a href="{{ route('highlight.index') }}"><i class="fa fa-street-view"></i><span>Highlight</span> </a></li>
                 <li class ="{{ Request::is('enquiry') ? 'active open' : ''}}" ><a href="{{ route('enquiry.index') }} "><i class="fa fa-users"></i><span>Enquery</span> </a></li>
                 <li class=" {{ Request::is('masterplan') ? 'active open' : ''}}"><a href="{{ route('masterplan.index') }}" ><i class="fa fa-sitemap" ></i><span>Master Plan</span> </a></li>
                 <li class=" {{ Request::is('amentities') ? 'active open' : ''}}"><a href="{{ route('amentities.index') }}"><i class="fa fa-building"></i><span>Amentities</span> </a></li>
                 <li class=" {{ Request::is('season') ? 'active open' : ''}}"><a href="{{ route('season.index') }}"><i class="fa fa-sellsy"></i><span>Season</span> </a></li>
                 <li class=" {{ Request::is('specification') ? 'active open' : ''}}"><a href="{{ route('specification.index') }}"><i class="fa fa-star"></i><span>Specification</span> </a></li>
                 <li class=" {{ Request::is('broucher') ? 'active open' : ''}}"><a href="{{ route('broucher.index') }}"><i class="fa fa-sticky-note"></i><span>Broucher </span> </a></li>
                 <li class=" {{ Request::is('faq') ? 'active open' : ''}}"><a href="{{ route('faq.index') }}"><i class="fa fa-circle-o-notch"></i><span>FAQ</span> </a></li>
                 <li class=" {{ Request::is('blog') ? 'active open' : ''}}"><a href="{{ route('blog.index') }}"><i  class="fa fa-square"></i><span>Blog</span> </a></li>
                 <li class=" {{ Request::is('maplocation') ? 'active open' : ''}}"><a href="{{ route('maplocation.index') }}"><i class="fa fa-globe" ></i><span>Map Location</span> </a></li>
            </ul>
        </div>
        </aside>

    {{-- <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat">Chat</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Setting</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active slideRight" id="skins">
                <div class="slim_scroll">
                    <h6>Flat Color</h6>
                    <ul class="choose-skin">
                        <li data-theme="purple">
                            <div class="purple"></div><span>Purple</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div><span>Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div><span>Cyan</span>
                        </li>
                    </ul>
                    <h6>Multi Color</h6>
                    <ul class="choose-skin">
                        <li data-theme="black">
                            <div class="black"></div><span>Black</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div><span>Deep Purple</span>
                        </li>
                        <li data-theme="red">
                            <div class="red"></div><span>Red</span>
                        </li>
                    </ul>
                    <h6>Gradient Color</h6>
                    <ul class="choose-skin">
                        <li data-theme="green">
                            <div class="green"></div><span>Green</span>
                        </li>
                        <li data-theme="orange" class="active">
                            <div class="orange"></div><span>Orange</span>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div><span>Blush</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane pullUp" id="chat">
                <div class="right_chat slim_scroll">
                    <div class="search">
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Search..." required
                                    autofocus>
                            </div>
                        </div>
                    </div>
                    <h6>Recent</h6>
                    <ul class="list-unstyled">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia</span>
                                        <span class="message">There are many variations of passages of Lorem Ipsum
                                            available</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Grayson</span>
                                        <span class="message">All the Lorem Ipsum generators on the</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Isabella</span>
                                        <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="me">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">John</span>
                                        <span class="message">It is a long established fact that a reader</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexander</span>
                                        <span class="message">Richard McClintock, a Latin professor</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <h6>Contacts</h6>
                    <ul class="list-unstyled">
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar10.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar6.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar7.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar8.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar9.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="assets/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane slideLeft" id="settings">
                <div class="settings slim_scroll">
                    <p class="text-left">General Settings</p>
                    <ul class="setting-list">
                        <li><span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li><span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p class="text-left">System Settings</p>
                    <ul class="setting-list">
                        <li><span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li><span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p class="text-left">Account Settings</p>
                    <ul class="setting-list">
                        <li><span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li><span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside> --}}

    {{-- <div class="chat-launcher"></div> --}}
    {{-- <div class="chat-wrapper">
        <div class="card">
            <div class="header">
                <h2>TL Groups</h2>
            </div>
            <div class="body">
                <div class="chat-widget">
                    <ul class="chat-scroll-list clearfix">
                        <li class="left float-left">
                            <img src="assets/images/xs/avatar3.jpg" class="rounded-circle" alt="">
                            <div class="chat-info">
                                <a class="name" href="javascript:void(0);">Alexander</a>
                                <span class="datetime">6:12</span>
                                <span class="message">Hello, John </span>
                            </div>
                        </li>
                        <li class="right">
                            <div class="chat-info"><span class="datetime">6:15</span> <span class="message">Hi,
                                    Alexander<br> How are you!</span> </div>
                        </li>
                        <li class="right">
                            <div class="chat-info"><span class="datetime">6:16</span> <span class="message">There are
                                    many variations of passages of Lorem Ipsum available</span> </div>
                        </li>
                        <li class="left float-left"> <img src="assets/images/xs/avatar2.jpg" class="rounded-circle"
                                alt="">
                            <div class="chat-info"><a class="name" href="javascript:void(0);">Elizabeth</a> <span
                                    class="datetime">6:25</span> <span class="message">Hi, Alexander,<br> John <br>
                                    What are you doing?</span> </div>
                        </li>
                        <li class="left float-left"> <img src="assets/images/xs/avatar1.jpg" class="rounded-circle"
                                alt="">
                            <div class="chat-info"><a class="name" href="javascript:void(0);">Michael</a> <span
                                    class="datetime">6:28</span> <span class="message">I would love to join the
                                    team.</span> </div>
                        </li>
                        <li class="right">
                            <div class="chat-info"><span class="datetime">7:02</span> <span class="message">Hello,
                                    <br>Michael</span> </div>
                        </li>
                    </ul>
                </div>
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" class="form-control date" placeholder="Enter your email...">
                    </div>
                    <span class="input-group-addon"> <i class="material-icons">send</i> </span>
                </div>
            </div>
        </div>
    </div> --}}
    <section class="content home">
        @yield('content')        
    </section>
     


    {{-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}" ></script>
    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}" ></script>
    <script src="{{ asset('assets/js/pages/index.js') }}" ></script>
    {{-- <script src="{{ asset('assets/js/pages/charts/jquery-knob.min.js') }}" ></script> --}}

    <script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script> --}}
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>

    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/js/pages/forms/form-validation.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>


    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/bundles/morrisscripts.bundle.js"></script>
    <script src="assets/bundles/sparkline.bundle.js"></script>
    <script src="assets/bundles/knob.bundle.js"></script>

    {{-- <script>
        $('#add-row').DataTable({
				"pageLength": 5,
			});
        </script> --}}

    @yield('scripts');
</body>

<style>
    .sidebar .menu .list .ml-menu li.active a.toggled:not(.menu-toggle):before {
    content: '' ;
}
</style>

<!-- Mirrored from wrraptheme.com/templates/nexa/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Aug 2022 12:34:49 GMT -->

</html>
