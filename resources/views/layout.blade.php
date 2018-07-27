<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>EFZ| @yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{ asset("lib/stroke-7/style.css") }}"/>
  <link rel="stylesheet" type="text/css" href="{{asset("lib/jquery.nanoscroller/css/nanoscroller.css")}}"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="{{ asset('lib/datatables/css/dataTables.bootstrap.min.css') }}" type="text/css"/> 
<link rel="stylesheet" href="{{ asset('lib/datatables/css/dataTables.tableTools.css') }}" type="text/css"/>
<style href="https://cdn.datatables.net/plug-ins/preview/searchPane/dataTables.searchPane.min.css" type="text/css" ></style>
 <link rel="stylesheet" type="text/css" href="{{ asset('lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{asset("lib/jquery.vectormap/jquery-jvectormap-1.2.2.css")}}"/>
<link rel="stylesheet" href="{{asset("css/style.css")}}"/>
<style type="text/css">
  hr
{
border:solid 1px black;
width: 96%;
color: #FFFF00;
height: 1px;

}
</style>
</head>


<body>
 <div class="am-wrapper am-fixed-sidebar am-white-header">
  @yield('header')
  <nav class="navbar navbar-default navbar-fixed-top am-top-header">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="page-title"><span>Dashboard</span></div><a href="{{ route('dashboard.index')}}" class="am-toggle-left-sidebar navbar-toggle collapsed"><span><span></span><span></span><span></span></span></a><a href="#"><img src="{{ asset('css/hana.png') }}"></a>
      </div>

{{-- 
      <a href="#" class="am-toggle-right-sidebar"><span class="icon s7-menu2"></span></a><a href="#" data-toggle="collapse" data-target="#am-navbar-collapse" class="am-toggle-top-header-menu collapsed"><span class="icon s7-angle-down"></span></a> --}}
      <div id="am-navbar-collapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav am-user-nav">
          <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"> <img src="{{asset('img/avatar2.jpg')}}">  <span class="user-name">{{Auth::user()->name}}</span><span class="angle-down s7-angle-down"></span></a>
            <ul role="menu" class="dropdown-menu">
              <li><a href="#"> <span class="icon s7-user"></span>My profile</a></li>
              <li><a href="#"> <span class="icon s7-config"></span>Settings</a></li>
              <li><a href="#"> <span class="icon s7-help1"></span>Help</a></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"> <span class="icon s7-power"></span>Sign Out</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </ul>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav am-top-menu">
        <li><a href="{{ route('dashboard.index')}}">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Support</a></li>
      </ul>
     
                      </div>
                    </div>
                  </nav>



                  @section('sidebar')
                  <div class="am-left-sidebar">
                    <div class="content">
                      <div></div>
                      <ul class="sidebar-elements">
                        <li class="parent"><a href="{{ route('dashboard.index')}}"><i class="icon s7-monitor"></i><span>Dashboard</span></a>

                        </li>

                        @if(Auth::user()->user_level==3 OR Auth::user()->user_level==1)
                        <li class="parent"><a href="{{ route('denomination.index') }}"><i class="icon s7-diamond"></i><span>Members</span></a>
                          
                          <ul class="sub-menu">
                            <li><a href="{{ route('denomination.create')}}"><i class="icon s7-server"></i>Add Denominaton</a>
                            </li>
                            <li><a href="{{ route('denomination.index')}}"><i class="icon s7-server"></i>View Denominations</a>
                            </li>
                            <hr>
                             <li><a href="{{ route('bible.create')}}"><i class="icon s7-study"></i>Add Bible School</a>
                            </li>
                            <li><a href="{{ route('bible.index')}}"><i class="icon s7-study"></i>View Bible Schools</a>
                            </li>
                              <li><a href="{{ route('parachurch.create')}}"><i class="icon s7-culture"></i>Add Parachurch</a>
                            </li>
                            <li><a href="{{ route('parachurch.index')}}"><i class="icon s7-culture"></i>View Para Churches</a>
                            </li>
                         
                           

                          </ul>
                        </li>
                        <li class="parent"><a href="{{ route('minister.index')}}"><i class="icon s7-graph"></i><span>Ministers</span></a>
                          <ul class="sub-menu">
                            <li><a href="{{ route('minister.create')}}">Add</a>
                            </li>
                            <li><a href="{{ route('minister.index')}}">View</a>
                            </li>

                          </ul>
                        </li> 
                        @endif


                        <li class="parent"><a href="{{ route('individualcontribution.index')}}"><i class="icon s7-graph"></i><span>Finance</span></a>
                          <ul class="sub-menu">
                         @if(Auth::user()->user_level==3 OR Auth::user()->user_level==1)
                            <li><a href="{{ route('individualcontribution.create')}}">Add  Subscriptions</a>
                              <li><a href="{{ route('individualcontribution.index')}}">View  Subscriptions</a>
                            </li>
                            <li><a href="{{ route('expenses.create')}}">Add Expenses</a>
                            </li><li><a href="{{ route('expenses.index')}}">View Expenses</a>
                            </li>
                        @endif

                       @if(Auth::user()->user_level==4 OR Auth::user()->user_level==1)

                            <li><a href="{{ route('contribution.create')}}">Add  Contributions</a>
                              <li><a href="{{ route('contribution.index')}}">View  Contributions</a>
                            </li>
                           {{--  <li><a href="{{ route('expenses.index')}}">Add Expenses</a>
                            </li> --}}

                        @endif
                                </ul>
               
                        </li> 
                        @if(Auth::user()->user_level==6 OR Auth::user()->user_level==1)
                           <li class="parent"><a href="{{ route('denomination.index') }}"><i class="icon s7-diamond"></i><span>Activity Management</span></a>
                          
                          <ul class="sub-menu">
                            <li><a href="{{ route('activities.create')}}"><i class="icon s7-plus"></i>Add Activity</a>
                            </li>
                            <li><a href="{{ route('activities.index')}}"><i class="icon s7-look"></i>View Activities</a>
                            </li>
                         
                         
                          </ul>
                        </li>
                        @endif




                @if(Auth::user()->user_level==1 )


                        <li class="parent"><a href="{{ route('sms.index')}}"><i class="icon s7-ribbon"></i><span>Communication</span></a>
                          <ul class="sub-menu">
                            <li><a href="{{ route('sms.index')}}">sms</a>
                            </li>
                            <li><a href="#">Email</a>
                            </li>
                  @endif


                          </ul>
                        </li>
                        @if(Auth::user()->user_level==1)
                        <li class="parent"><a href="{{ route('register') }}"><i class="icon s7-box2"></i><span>Admin</span></a>
                          <ul class="sub-menu">
                            <li><a href="{{ route('register') }}">Add Users</a>
                            </li>
                            <li><a href="{{ route('allusers') }}">All Users</a>
                            </li>
                            <li><a href="#">General Settings</a>
                            </li>
                          </ul>
                        </li>
                        @endif

                      </ul>
                      <!--Sidebar bottom content-->
                    </div>
                  </div>
                  @show


                  @yield('content')




                  @yield('footer')

                  <script src="{{ asset('lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
                  <script src="{{ asset('lib/jquery-flot/jquery.flot.js') }}"></script>
                  <script src="{{ asset('lib/jquery-flot/jquery.flot.pie.js') }}"></script>
                  <script src="{{ asset('lib/jquery-flot/jquery.flot.resize.js') }}"></script>
                  <script src="{{ asset('lib/jquery-flot/plugins/jquery.flot.orderBars.js') }}"></script>
                  <script src="{{ asset('lib/jquery-flot/plugins/curvedLines.js') }}"></script>
                  <script src="{{ asset('lib/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
                  <script src="{{ asset('lib/jquery-ui/jquery-ui.min.js') }}"></script>
                  <script src="{{ asset('lib/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
                  {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
                  <script src="{{ asset('js/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
                  <script src="{{ asset('lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js') }}" type="text/javascript"></script>
                  <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
      <script src="{{ asset('lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('lib/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('lib/datatables/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
      
      <script src="{{ asset('lib/datatables/plugins/buttons/js/dataTables.buttons.js') }}" type="text/javascript"></script>
      <script src="{{ asset('lib/datatables/plugins/buttons/js/buttons.print.js') }}" type="text/javascript"></script>
      <script src="{{ asset('lib/datatables/plugins/buttons/js/buttons.colVis.js') }}" type="text/javascript"></script>

      <script src="{{ asset('lib/datatables/plugins/buttons/js/buttons.bootstrap.js') }}" type="text/javascript"></script>
      <script src="{{ asset('lib/datatables/plugins/buttons/js/buttons.html5.js')}}"></script>
      <script src="{{ asset('lib/datatables/plugins/buttons/js/buttons.flash.js')}}"></script>
      <script src="{{ asset('lib/datatables/plugins/buttons/js/buttons.print.js')}}"></script>

      <script src="{{ asset('js/app-charts-morris.js') }}" type="text/javascript"></script>
      <script src="{{ asset('js/app-tables-datatables.js') }}" type="text/javascript"></script>
      <script src="{{ asset('js/app-tables-datatables.js') }}" type="text/javascript"></script>
      <script src="{{ asset('js/filterDropDown.js') }}"></script>



      
    <script src="{{ asset('lib/countup/countUp.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" ></script>
    
    <script src="{{ asset('js/app-dashboard.js') }}" type="text/javascript"></script> 
    {{-- <script src="{{ asset('js/app-dashboard2.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('js/efz.js') }}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                  <script type="text/javascript">
                    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dataTables();


      });

      function grandParent(ele) {
        return $(ele).parent().parent()
      }

      $('.sub-menu').on('mouseover', function() {
        let parent = $(this).parent();

        $(parent).addClass('open');
        $(this).addClass('visible');
      });      

      $('.nav-items').on('mouseover', function() {
        let parent = $(this).parent();

        if(!$(grandParent(this)).hasClass('open')) {
          $(grandParent(this)).addClass('open');
        }

        if($(parent).hasClass('visible')) {
          $(parent).addClass('visible');
        }
      });
    </script>



    @yield('page-scripts')

  </div>
</body>
</html>