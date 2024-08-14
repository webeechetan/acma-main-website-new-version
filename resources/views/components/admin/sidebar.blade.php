<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
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
      <li class="menu-item
        @if(request()->routeIs('admin.dashboard'))
        active
        @endif 
      ">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- Layouts -->
      <li class="menu-item
        @if(request()->routeIs('circulers.*'))
        active
        @endif
      ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Circulers</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('circulers.create')}}" class="menu-link">
              <div data-i18n="Without menu">Add New</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('circulers.index')}}" class="menu-link">
              <div data-i18n="Without navbar">View All</div>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </aside>