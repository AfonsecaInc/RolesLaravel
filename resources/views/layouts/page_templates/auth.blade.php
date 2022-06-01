<div class="wrapper ">
  @include('layouts.navbars.sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.alerts.alerts')
    @include('layouts.footers.auth')
  </div>
</div>
