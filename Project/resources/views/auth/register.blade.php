<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title> Registrar </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!--  demo  -->
  <link rel="stylesheet" href="{{ URL::asset('/site/assets/demo/demo.css') }}" type="text/css">

  <!--  css  -->
  <link rel="stylesheet" href="{{ URL::asset('/site/assets/css/black-dashboard.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ URL::asset('/site/assets/css/nucleo-icons.css') }}" type="text/css">

  <!--  img  -->
  <link  rel="icon" href="{{ URL::asset('/site/assets/img/favicon.png') }}" type="text/css">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('/site/assets/img/apple-icon.png') }}" type="text/css">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="">
  <div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="logo">
            <a style="text-align:center;"href="javascript:void(0)" class="simple-text logo-normal">
                Cadastra-se
            </a>
            </div>
            <ul class="nav">
                <li >
                    <a href="{{ route('login') }}">
                      <i class="tim-icons icon-puzzle-10"></i>
                      <p>Login</p>
                    </a>
                </li>
                <li class="active">
                    <a href="">
                      <i class="tim-icons icon-badge"></i>
                      <p>Cadastra-se</p>
                    </a>
                </li>
            </ul>
      </div>
    </div>
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)"></a>
          </div>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav ml-auto">
                  <li class="separator d-lg-none"></li>
                      <div class="form-group no-border" >
                    
                      </div>
                </ul>
            </div>
        </div>
      </nav>
    <div class="content">
    <div class="row">
      <div class="card">
          <div class="card-body">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="name">Nome</label>
                  <input type="text" class="form-control" name="name" :value="old('name')" placeholder="Nome">
                </div>

                <div class="form-group col-md-8">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" :value="old('email')" placeholder="Email">
                </div>

                <div class="form-group col-md-5">
                  <label for="password">Senha</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
                </div>

                <div class="form-group col-md-5">
                  <label for="password_confirmation">Repetir Senha</label>
                  <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Repetir Senha">
                </div>  

              </div>
              <button class="btn btn-info">Cadastra-se</button>
            </form>
          </div>
        </div>
      </div>
      <footer class="footer">
        
      </footer>
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
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>
</html>