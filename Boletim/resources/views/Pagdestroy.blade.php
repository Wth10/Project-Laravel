<html lang="pt-br">
<head>
    <title> Deletar </title>
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
</head>

<body class="">
  <div class="wrapper">
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="">Excluir Aluno</a>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Excluir Aluno</h5>
              </div>
              <div class="card-body">
                <form action="" method="POST">
                  <div class="row">
                    @csrf
                    <div class="form-group col-md-9">
                      <label>Nome</label>
                      <input name="Nome" type="text" class="form-control" value="{{ $boletins->nome }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Nota 1º Unidade:</label>
                      <input name="nota1" type="text" class="form-control" value="{{ $boletins->nota_1_unidade }}" readonly>
                    </div>           
                    <div class="form-group col-md-4">
                      <label>Nota 2º Unidade:</label>
                      <input name="nota2" type="text" class="form-control" value="{{ $boletins->nota_2_unidade }}" readonly>
                    </div>       
                    <div class="form-group col-md-4">
                      <label>Nota 3º Unidade:</label>
                      <input name="nota3" type="text" class="form-control" value="{{ $boletins->nota_3_unidade }}" readonly>
                    </div>
                    <div class="form-group col-md-5">
                      <label>Sala:</label>
                      <input name="sala" type="text" class="form-control" value="{{ $boletins->sala }}" readonly>
                    </div>
                    <div class="form-group col-md-5">
                      <label>Turno:</label>
                      <input name="turno" type="text" class="form-control" value="{{ $boletins->turno }}" readonly>
                    </div>
                    
                  </div>
                </form>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Excluir
                    </button>
                        <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">AVISO:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                  <i class="tim-icons icon-simple-remove"></i>
                                </button>
                          </div>
                          <div class="modal-body">
                            TEM CERTEZA QUE DESEJA REALMENTE EXCLUIR ESSE ALUNO?
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                              <a href="{{ route('destroy', ['id'=>$boletins->id]) }}" class="shiny-button" id="Submit" onClick="SubmitForm();"><button type="button" class="btn btn-danger">Excluir</button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <a href="{{ route('dashboard') }}"><button type="submit" class="btn btn-fill btn-primary">Voltar</button></a>
                  </div> 
              </div>  
            </div>
          </div>
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