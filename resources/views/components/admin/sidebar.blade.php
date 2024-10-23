<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route('admin.dashboard')}}" class="app-brand-link">
        <span class="app-brand-logo demo ">
            <img src="{{ asset('backend') }}/assets/img/logo.png" alt="brand-logo" height="50" />
        </span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ active('admin.dashboard') }}">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li> 

      
      <!-- ECMinutes -->

      <li class="menu-item {{ active('ecminutes.index') }}">
        <a href="{{ route('ecminutes.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Analytics">EcMinute</div>
        </a>
      </li>


      <!-- File Manager -->
      <li class="menu-item {{ active('file.manager') }}">
        <a href="{{ route('file.manager') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Analytics">File Manager</div>
        </a>
      </li>

      

      <!-- Circulers -->
      <li class="menu-item {{ active('circulers.*','active open') }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Circulers</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item {{ active('circulers.create')}}">
            <a href="{{route('circulers.create')}}" class="menu-link">
              <div data-i18n="Without menu">Add New</div>
            </a>
          </li>
          <li class="menu-item {{ active('circulers.index')}}">
            <a href="{{route('circulers.index')}}" class="menu-link">
              <div data-i18n="Without navbar">View All</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Members -->
      <li class="menu-item {{ active('members.*','active open') }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Layouts">Members</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item {{ active('members.create')}}">
            <a href="{{ route('members.create')}}" class="menu-link">
              <div data-i18n="Without menu">Add New</div>
            </a>
          </li>
          <li class="menu-item {{ active('members.index')}}">
            <a href="{{ route('members.index')}}" class="menu-link">
              <div data-i18n="Without navbar">View All</div>
            </a>
          </li>
        </ul>
      </li>

       <!-- Gallery -->
       <li class="menu-item {{ active('galleries.*','active open') }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-image"></i>
          <div data-i18n="Layouts">Gallery</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item {{ active('galleries.create')}}">
            <a href="{{ route('galleries.create')}}" class="menu-link">
              <div data-i18n="Without menu">Add New</div>
            </a>
          </li>
          <li class="menu-item {{ active('galleries.index')}}">
            <a href="{{ route('galleries.index')}}" class="menu-link">
              <div data-i18n="Without navbar">View All</div>
            </a>
          </li>
        </ul>
      </li>
      
      <!-- Sliders -->
      <li class="menu-item {{ active('sliders.*','active open') }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-slideshow"></i>
          <div data-i18n="Layouts">Slider</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item {{ active('sliders.create')}}">
            <a href="{{route('sliders.create')}}" class="menu-link">
              <div data-i18n="Without menu">Add New</div>
            </a>
          </li>
          <li class="menu-item {{ active('sliders.index')}}">
            <a href="{{route('sliders.index')}}" class="menu-link">
              <div data-i18n="Without navbar">View All</div>
            </a>
          </li>
        </ul>
      </li>

      {{-- Publications --}}

      <li class="menu-item {{ active('publications.*','active open') }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-printer"></i>
          <div data-i18n="Layouts">Publications</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item {{ active('publications.create')}}">
            <a href="{{route('publications.create')}}" class="menu-link">
              <div data-i18n="Without menu">Add New</div>
            </a>
          </li>
          <li class="menu-item {{ active('publications.index')}}">
            <a href="{{route('publications.index')}}" class="menu-link">
              <div data-i18n="Without navbar">View All</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Press Release -->

      <li class="menu-item {{ active('pressreleases.index')}}">
        <a href="{{ route('pressreleases.index')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-news"></i>
          <div data-i18n="Analytics">Press Release</div>
        </a>
      </li>

      <!-- Press Coverage Doc -->

      <li class="menu-item {{ active('presscoverages.index') }}">
        <a href="{{ route('presscoverages.index')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-comment-add"></i>
          <div data-i18n="Analytics">Press Coverage</div>
        </a>
      </li>

        <!-- Gallery -->
        <li class="menu-item {{ active('event_masters.*','active open') }} ">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-image"></i>
            <div data-i18n="Layouts">Event Master</div>
          </a>
  
          <ul class="menu-sub">
            <li class="menu-item {{ active('event_masters.create') }}">
              <a href="{{ route('event_masters.create')}}" class="menu-link">
                <div data-i18n="Without menu">New Event</div>
              </a>
            </li>
            <li class="menu-item {{ active('event_masters.index') }}">
              <a href="{{ route('event_masters.index')}}" class="menu-link">
                <div data-i18n="Without navbar">View Event</div>
              </a>
            </li>
          </ul>
        </li>

     
          <!-- Govt Policy -->
          <li class="menu-item {{active('govt-policy.*', 'active open')}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class='menu-icon tf-icon  bx bxs-analyse'></i>
              <div data-i18n="Layouts">Govt Policy</div>
            </a>
    
            <ul class="menu-sub">
              <li class="menu-item {{ active('govt-policy.create') }}">
                <a href="{{ route('govt-policy.create')}}" class="menu-link">
                  <div data-i18n="Without menu">New Policy</div>
                </a>
              </li>
              <li class="menu-item {{ active('govt-policy.index')}}">
                <a href="{{ route('govt-policy.index')}}" class="menu-link">
                  <div data-i18n="Without navbar">All Policy</div>
                </a>
              </li>
            </ul>
          </li>
      
           <!-- Regulatory Standard-->
           <li class="menu-item {{active('regulatory-standard.*', 'active open')}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-image"></i>
              <div data-i18n="Layouts">Regulatory Standards</div>
            </a>
    
            <ul class="menu-sub">
              <li class="menu-item {{ active('regulatory-standard.create') }}">
                <a href="{{ route('regulatory-standard.create')}}" class="menu-link">
                  <div data-i18n="Without menu">Add New</div>
                </a>
              </li>
              <li class="menu-item {{ active('regulatory-standard.index')}}">
                <a href="{{ route('regulatory-standard.index')}}" class="menu-link">
                  <div data-i18n="Without navbar">View All</div>
                </a>
              </li>
            </ul>
          </li>
      
        <!-- Vehicle Report -->
        <li class="menu-item {{ active('vehicle-reports.*','active open') }} ">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-car"></i>
            <div data-i18n="Layouts">Vehicle Report</div>
          </a>
  
          <ul class="menu-sub">
            <li class="menu-item {{ active('vehicle-reports.create') }}" >
              <a href="{{ route('vehicle-reports.create')}}" class="menu-link">
                <div data-i18n="Without menu">New Report</div>
              </a>
            </li>
            <li class="menu-item {{ active('vehicle-reports.index') }}">
              <a href="{{ route('vehicle-reports.index')}}" class="menu-link">
                <div data-i18n="Without navbar">View Report</div>
              </a>
            </li>
          </ul>
        </li>

        <!-- Auto Components -->
        <li class="menu-item {{ active('auto-components.*','active open') }} ">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bxs-component"></i>
            <div data-i18n="Layouts">Auto Component</div>
          </a>
  
          <ul class="menu-sub">
            <li class="menu-item {{ active('auto-components.create') }}" >
              <a href="{{ route('auto-components.create')}}" class="menu-link">
                <div data-i18n="Without menu">New Component</div>
              </a>
            </li>
            <li class="menu-item {{ active('auto-components.index') }}">
              <a href="{{ route('auto-components.index')}}" class="menu-link">
                <div data-i18n="Without navbar">View Component</div>
              </a>
            </li>
          </ul>
        </li>
  
    </ul>
  </aside>