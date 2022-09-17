<div class="wrapper ">
    @include('layouts.navbars.sidebar')
    <div class="main-panel main-panel-mode" style="

    /* background-color: #923cb5;
    background-image: linear-gradient(147deg, #923cb5 0%, #000000 74%); */
/*    background: rgb(0,0,0);
    background: linear-gradient(318deg, rgba(0,0,0,1) 0%, rgba(156,39,176,1) 35%); */

    /* background: linear-gradient(to right, #000000 0%, #923cb5 100%); */
    ">

        @include('layouts.navbars.navs.auth')
        @yield('content')
        @include('layouts.footers.auth')
    </div>
</div>
