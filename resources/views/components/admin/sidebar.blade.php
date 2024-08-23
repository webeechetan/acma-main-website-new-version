<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{route('admin.dashboard')}}" class="app-brand-link">
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
            <a href="{{route('members.create')}}" class="menu-link">
              <div data-i18n="Without menu">Add New</div>
            </a>
          </li>
          <li class="menu-item {{ active('members.index')}}">
            <a href="{{route('members.index')}}" class="menu-link">
              <div data-i18n="Without navbar">View All</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- ECMinutes -->

      <li class="menu-item {{ active('ecminutes.index') }}">
        <a href="{{ route('ecminutes.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Analytics">EcMinute</div>
        </a>
      </li>

      <!-- All Doc -->

      <li class="menu-item {{ active('alldocs.index') }}">
        <a href="{{ route('alldocs.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Analytics">All Docs</div>
        </a>
      </li>
    </ul>
  </aside>
