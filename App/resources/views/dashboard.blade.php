<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title> DashBoard </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!--  demo  -->
    <link rel="stylesheet" href="{{ URL::asset('/site/assets/demo/demo.css') }}" type="text/css">

    <!--  css  -->
    <link rel="stylesheet" href="{{ URL::asset('/site/assets/css/black-dashboard.css?v=1.0.0') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('/site/assets/css/nucleo-icons.css') }}" type="text/css">

    <!--  img  -->
    <link rel="icon" href="{{ URL::asset('/site/assets/img/favicon.png') }}" type="text/css">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('/site/assets/img/apple-icon.png') }}" type="text/css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a style="text-align:center;" href="" class="simple-text logo-normal">
                        Bom Dia seu Lindo!!!
                    </a>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="{{ route('dashboard') }}">
                            <i class="tim-icons icon-puzzle-10"></i>
                            <p>Painel</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('create') }}">
                            <i class="tim-icons icon-badge"></i>
                            <p>Cadastrar Aluno</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile') }}">
                            <i class="tim-icons icon-single-02"></i>
                            <p>Perfil</p>
                        </a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}">
                        <li>
                            @csrf
                            <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="tim-icons icon-button-power"></i>
                                <p>Sair</p>
                            </a>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
        <div class="main-panel">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:void(0)">Boletim Do Aluno</a>
                    </div>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="separator d-lg-none"></li>
                            <div class="form-group no-border">

                            </div>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-chart">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <h5 class="card-category">BEM-VINDO</h5>
                                        <h2 class="card-title">Sr. {{ Auth::user()->name }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <div class="card card-nav-tabs">
                                        <div class="card-header card-header-success"> Sabedoria </div>
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                                <p>Não espere por uma crise para descobrir o que é importante em sua vida.</p>
                                                <footer class="blockquote-footer">Platão</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(session('status'))
                <div class="alert alert-success">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                    <span>{{session('status')}}</span>
                </div>
                @endif

                <form action="{{ route('search') }}" method="GET" class="form-inline justify-content-center">
                    <div class="form-group no-border ">
                        <input type="search" name="search" class="form-control" placeholder="Pesquisar" require>
                        <button class="btn btn-link btn-icon btn-round">
                            <i class="tim-icons icon-zoom-split"></i>
                        </button>
                    </div>
                </form>

                <div class="row">
                    <!-- tabela  -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">NOME</th>
                                <th class="text-center">NOTA 1º UNIDADE</th>
                                <th class="text-center">NOTA 2º UNIDADE</th>
                                <th class="text-center">NOTA 3º UNIDADE</th>
                                <th class="text-center">SALA</th>
                                <th class="text-center">TURNO</th>
                                <th class="text-center">RESULTADO</th>
                                <th colspan="2" class="text-center">Modificações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($boletins as $boletins)
                            <tr>
                                <td class="text-center">{{ $boletins->nome}}</td>
                                <td class="text-center">{{ $boletins->nota_1_unidade}}</td>
                                <td class="text-center">{{ $boletins->nota_2_unidade}}</td>
                                <td class="text-center">{{ $boletins->nota_3_unidade}}</td>
                                <td class="text-center">{{ $boletins->sala}}</td>
                                <td class="text-center">{{ $boletins->turno}}</td>
                                <td class="text-center">
                                    <?php
                                    $SomarNota = ((string)$boletins->nota_1_unidade + (string)$boletins->nota_2_unidade + (string)$boletins->nota_3_unidade);
                                    $NotaFinal = 15;

                                    if( $SomarNota >= $NotaFinal){echo "<span style='color:lime;'>APROVADO<span>";}else{echo "<span style='color:red;'>REPROVADO<span>";}
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('edit', ['id' => $boletins->id]) }}">
                                        <button type="button" class="btn btn-info btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('Pagdestroy', ['id' => $boletins->id]) }}">
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ URL::asset('site/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('site/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('site/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('site/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ URL::asset('site/assets/js/core/jquery.min.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src=" {{ URL::asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE') }}"></script>
    <!-- Chart JS -->
    <script src="{{ URL::asset('site/assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ URL::asset('site/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('site/assets/js/black-dashboard.min.js?v=1.0.0') }}"></script>
    <!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ URL::asset('site/assets/demo/demo.js') }}"></script>

    <!-- <script>
    var search = document.ElementById('Pesquisa');

    search.addEventListener('Keydown', function(event) {
        if (event.key === 'Enter') {
            searchdata();
        }
    });

    function searchdata() {
        window.location = '/dashboard?search' + search.value;
    }
    </script> -->

    <script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');
            $navbar = $('.navbar');
            $main_panel = $('.main-panel');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = true;
            white_color = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            $('.fixed-plugin a').click(function(event) {
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .background-color span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data', new_color);
                }

                if ($main_panel.length != 0) {
                    $main_panel.attr('data', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data', new_color);
                }
            });

            $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                var $btn = $(this);

                if (sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    sidebar_mini_active = false;
                    blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                } else {
                    $('body').addClass('sidebar-mini');
                    sidebar_mini_active = true;
                    blackDashboard.showSidebarMessage('Sidebar mini activated...');
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);
            });

            $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                var $btn = $(this);

                if (white_color == true) {

                    $('body').addClass('change-background');
                    setTimeout(function() {
                        $('body').removeClass('change-background');
                        $('body').removeClass('white-content');
                    }, 900);
                    white_color = false;
                } else {

                    $('body').addClass('change-background');
                    setTimeout(function() {
                        $('body').removeClass('change-background');
                        $('body').addClass('white-content');
                    }, 900);

                    white_color = true;
                }


            });

            $('.light-badge').click(function() {
                $('body').addClass('white-content');
            });

            $('.dark-badge').click(function() {
                $('body').removeClass('white-content');
            });
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
    </script>
    <script>
    window.TrackJS &&
        TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
            application: "black-dashboard-free"
        });
    </script>
</body>

</html>