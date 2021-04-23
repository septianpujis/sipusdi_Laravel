<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
        <li class="text-center">
            <img src="{{asset('template')}}/assets/img/logo septi.png" class="user-image img-responsive"/>
            </li>            
            <li>
                <a class="{{request()->is('/')? 'active-menu' : '' }}" href="/"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>
              <li>
                <a class="{{request()->is('buku')? 'active-menu' : '' }}" href="/buku"><i class="fa fa-desktop fa-3x"></i> Buku</a>
            </li>
            <li>
                <a class="{{request()->is('user')? 'active-menu' : '' }}" href="/user"><i class="fa fa-qrcode fa-3x"></i> Pengguna</a>
            </li>
                   <li  >
                <a class="{{request()->is('trans')? 'active-menu' : '' }}" href="/trans"><i class="fa fa-bar-chart-o fa-3x"></i> Transaksi</a>
            </li>   

            {{-- <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i>Print Laporan PDF<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/buku/printpdf" target="blank">Buku</a>
                    </li>
                    <li>
                        <a href="/user/printpdf" target="blank">Pengguna</a>
                    </li>
                    <li>
                        <a href="/trans/printpdf" target="blank">Transaksi</a>
                    </li>
                </ul>
              </li>  
            <li >
                <a class="{{request()->is('api')? 'active-menu' : '' }}" href="/"><i class="fa fa-square-o fa-3x"></i> API</a>
            </li>
             --}}
            <li >
                <a class="{{request()->is('about')? 'active-menu' : '' }}" href="/about"><i class="fa fa-user fa-3x"></i> About</a>
            </li>
        </ul>
    </div>
</nav>