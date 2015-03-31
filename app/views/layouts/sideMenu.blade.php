<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="profile.html"><img src="{{\Sentry::getUser()->image}}" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">{{\Sentry::getUser()->first_name}} {{\Sentry::getUser()->last_name}}</h5>

                  <li class="mt">
                      <a class="active" href="{{route('dashboard.index')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="{{route('projects.index')}}" >
                          <i class="fa fa-folder-open"></i>
                          <span>Projects</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="{{route('users.index')}}" >
                          <i class="fa fa-users"></i>
                          <span>Users</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="{{route('clients.index')}}" >
                          <i class="fa fa-share"></i>
                          <span>Clients</span>
                      </a>
                     {{-- <ul class="sub">
                          <li><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>--}}
                  </li>
                  <li class="sub-menu">
                      <a href="{{route('tasks.index')}}" >
                          <i class="fa fa-tasks"></i>
                          <span>Tasks</span>
                      </a>
                      {{--<ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>--}}
                  </li>
                  <li class="sub-menu">
                      <a href="{{route('issues.index')}}" >
                          <i class="fa fa-bug"></i>
                          <span>Issues/Bugs</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-clock-o"></i>
                          <span>Time-Sheet</span>
                      </a>
                  </li>
                 {{-- <li class="sub-menu">
                       <a href="javascript:;" >
                           <i class=" fa fa-language"></i>
                           <span>Inquiry</span>
                       </a>
                  </li>--}}

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>