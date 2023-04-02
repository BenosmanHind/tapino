<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Tapino- Admin dashboard</title>
        <!-- Favicon icon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/img/favicon.png') }}">
        <link href="{{asset('dashboard/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

        <link href="{{asset('dashboard/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('dashboard/vendor/chartist/css/chartist.min.css')}}">
        <!-- Toastr -->

        <link href="{{asset('dashboard/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
        <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">
        <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('dashboard/uploader/pe-icon-7-stroke.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/uploader/drop_uploader.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" referrerpolicy="no-referrer" />

        <link href="{{asset('dashboard/vendor/summernote/summernote.css')}}" rel="stylesheet">

    </head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img src="{{asset('front/assets/images/froidis-white.png')}}" alt="Image">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">

                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-fullscreen" href="#">
                                    <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                                    <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
                                </a>
							</li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
										<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
										<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
									</svg>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px;">
										<ul class="timeline">

										</ul>
									</div>
                                    <a class="all-notification" href="#">Voir les notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="{{ asset('dashboard/images/profile/pic1.jpg') }}" width="20" alt=""/>
									<div class="header-info">
										<span>Hi, <strong>Admin</strong></span>
										<small>Administrateur</small>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a class="dropdown-item ai-icon" style="cursor: pointer" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Déconnexion </span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         @csrf
                                        </form>
                                    </a>
                                </div>
                            </li>
							<li class="nav-item right-sidebar">
                                <a class="nav-link bell ai-icon" href="#">
                                    <svg id="icon-menu" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                </a>
							</li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
				<li class="nav-label first">Main Menu</li>
						<li><a href="{{url('/admin')}}" class="ai-icon" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="17" y="4" width="3" height="13" rx="1.5"/>
                                    <rect fill="#000000" opacity="0.3" x="12" y="9" width="3" height="8" rx="1.5"/>
                                    <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="11" width="3" height="6" rx="1.5"/>
                                </g>
                            </svg>
							<span class="nav-text">Dashboard</span>
						</a></li>

                    <li><a class="ai-icon" href="{{ asset('/admin/customers') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"/>
                            </g>
                        </svg>
							<span class="nav-text">Clients</span>
						</a>
                    </li>
                    <li><a class=" ai-icon" href="{{asset('admin/categories')}}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
                                <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
							<span class="nav-text">Catégories</span>
						</a>
                    </li>
                    <li><a class="ai-icon" href="{{asset('admin/emplacements')}}" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M18,6 L11,6 C10.3333333,5.88561808 10,5.55228475 10,5 C10,4.44771525 10.3333333,4.11438192 11,4 L20,4 L20,13 C20,13.6666667 19.6666667,14 19,14 C18.3333333,14 18,13.6666667 18,13 L18,6 Z M6,18 L13,18 C13.6666667,18.1143819 14,18.4477153 14,19 C14,19.5522847 13.6666667,19.8856181 13,20 L4,20 L4,11 C4,10.3333333 4.33333333,10 5,10 C5.66666667,10 6,10.3333333 6,11 L6,18 Z" fill="#000000" fill-rule="nonzero"/>
                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) " x="7" y="11" width="10" height="2" rx="1"/>
                            </g>
                        </svg>
							<span class="nav-text">Emplacements</span>
						</a>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
                            </g>
                        </svg>
							<span class="nav-text">Produits</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{asset('admin/products/create')}}">Ajouter</a></li>
                            <li><a href="{{asset('admin/products')}}">Tous</a></li>
                        </ul>
                    </li>
                    <li><a class="ai-icon" href="{{ asset('admin/orders') }}" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z" fill="#000000"/>
                            </g>
                        </svg>
							<span class="nav-text">Commandes</span>
						</a>

                    </li>
                    <li><a class="ai-icon" href="{{ asset('admin/payments') }}" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                            </g>
                        </svg>
							<span class="nav-text">Paiements</span>
						</a>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <rect fill="#000000" opacity="0.3" x="11" y="3" width="2" height="14" rx="1"/>
                                <path d="M6.70710678,10.7071068 C6.31658249,11.0976311 5.68341751,11.0976311 5.29289322,10.7071068 C4.90236893,10.3165825 4.90236893,9.68341751 5.29289322,9.29289322 L11.2928932,3.29289322 C11.6714722,2.91431428 12.2810586,2.90106866 12.6757246,3.26284586 L18.6757246,8.76284586 C19.0828436,9.13603827 19.1103465,9.76860564 18.7371541,10.1757246 C18.3639617,10.5828436 17.7313944,10.6103465 17.3242754,10.2371541 L12.0300757,5.38413782 L6.70710678,10.7071068 Z" fill="#000000" fill-rule="nonzero"/>
                                <rect fill="#000000" opacity="0.3" x="3" y="19" width="18" height="2" rx="1"/>
                            </g>
                        </svg>
							<span class="nav-text">Livraison</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="#">Tous</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <rect fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"/>
                                <polygon fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"/>
                                <polygon fill="#000000" points="11 20 15.5 14 20 20"/>
                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"/>
                            </g>
                        </svg>
							<span class="nav-text">Slider</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="#">Tous</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920211 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/><rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/></g></svg>
							<span class="nav-text">Rapports</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="#">Tous</a></li>
                        </ul>
                    </li>
                    <li><a class="ai-icon" href="{{ asset('admin/comments') }}" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L6,18 C4.34314575,18 3,16.6568542 3,15 L3,6 C3,4.34314575 4.34314575,3 6,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 Z" fill="#000000" opacity="0.3"/>
                                <path d="M7.5,12 C6.67157288,12 6,11.3284271 6,10.5 C6,9.67157288 6.67157288,9 7.5,9 C8.32842712,9 9,9.67157288 9,10.5 C9,11.3284271 8.32842712,12 7.5,12 Z M12.5,12 C11.6715729,12 11,11.3284271 11,10.5 C11,9.67157288 11.6715729,9 12.5,9 C13.3284271,9 14,9.67157288 14,10.5 C14,11.3284271 13.3284271,12 12.5,12 Z M17.5,12 C16.6715729,12 16,11.3284271 16,10.5 C16,9.67157288 16.6715729,9 17.5,9 C18.3284271,9 19,9.67157288 19,10.5 C19,11.3284271 18.3284271,12 17.5,12 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
							<span class="nav-text">Commentaires</span>
						</a>

                    </li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        @yield('content')
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © <a href="#" target="_blank">Tapino</a> 2023</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->


    <!-- Required vendors -->
    <script src="{{asset('dashboard/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/js/custom.min.js')}}"></script>
	<!-- Apex Chart -->
	<script src="{{asset('dashboard/vendor/apexchart/apexchart.js')}}"></script>

    <!-- Vectormap -->
	<!-- Chart piety plugin files -->
    <script src="{{asset('dashboard/vendor/peity/jquery.peity.min.js')}}"></script>
    <!-- Chartist -->
    <script src="{{asset('dashboard/vendor/chartist/js/chartist.min.js')}}"></script>
	<!-- Datatable -->
	<script src="{{asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('dashboard/js/plugins-init/datatables.init.js')}}"></script>
	<!-- Dashboard 1 -->
	<script src="{{asset('dashboard/js/dashboard/dashboard-1.js')}}"></script>
	<!-- Svganimation scripts -->
	<script src="{{asset('dashboard/vendor/svganimation/vivus.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/svganimation/svg.animation.js')}}"></script>
    <script src="{{asset('dashboard/uploader/drop_uploader.js')}}"></script>
    <script src="{{asset('dashboard/vendor/summernote/js/summernote.min.js')}}"></script>
    <!-- Summernote init -->
    <script src="{{asset('dashboard/js/plugins-init/summernote-init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js" referrerpolicy="no-referrer"></script>

    <!--Validate jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <!-- Toastr -->



	<script>
	(function($) {
		"use strict"

		var direction =  getUrlParams('dir');
		if(direction != 'rtl')
		{direction = 'ltr'; }

		new dezSettings({
			typography: "roboto",
			version: "light",
			layout: "vertical",
			headerBg: "color_1",
			navheaderBg: "color_3",
			sidebarBg: "color_1",
			sidebarStyle: "full",
			sidebarPosition: "fixed",
			headerPosition: "fixed",
			containerLayout: "wide",
			direction: direction
		});

	})(jQuery);
	</script>
    <script>

        $(document).ready(function(){
        $('.file').drop_uploader({
            uploader_text: 'Drop files to upload, or',
            browse_text: 'Browse',
            only_one_error_text: 'Only one file allowed',
            not_allowed_error_text: 'File type is not allowed',
            big_file_before_error_text: 'Files, bigger than',
            big_file_after_error_text: 'is not allowed',
            allowed_before_error_text: 'Only',
            allowed_after_error_text: 'files allowed',
            browse_css_class: 'button button-primary',
            browse_css_selector: 'file_browse',
            uploader_icon: '',
            file_icon: '',
            progress_color: '#4a90e2',
            time_show_errors: 5,
            layout: 'thumbnails',
            method: 'normal',
            chunk_size: 1000000,
            concurrent_uploads: 5,
            show_percentage: true,
            existing_files: false,
            existing_files_removable: true,
            send_existing_files: false,
            url: 'ajax_upload.php',
            delete_url: 'ajax_delete.php',
        });
    });
    </script>



<script>
    $(document).ready(function(){
          $(".flash-alert").slideDown(200).delay(3500).slideUp(200);
    });

</script>

@stack('show-dimensions-scripts')
@stack('add-dimension-scripts')
@stack('modal-productlines-scripts')
</body>
</html>
