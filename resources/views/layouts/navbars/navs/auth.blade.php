@if(! is_null(Users\Models\Setting::first()))
    @if(! is_null(Users\Models\Setting::first()->preferred_language))
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            {{-- <a class="navbar-brand" href="#">{{ $titlePage }}</a> --}}
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              @if(app()->getLocale() == $localeCode)
                  @continue
              @endif
              <a class="navbar-brand text-mode p-2 " rel="alternate" class="d-lg-none d-md-block" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                  <i class="fa fa-globe" aria-hidden="true"></i>

                  {{ $properties['native'] }}
              </a>
            @endforeach
            <div class="container-switch" id="switch-mode-div" title="{{Session()->has('mode') ? (Session()->get('mode') == 'Light' ? 'Dark' : 'Light' ) : 'light'}} Mode">
              <div class="button-switch"></div>
            </div>
            <form method="post" action="{{route('switch-mode')}}" id="switch-mode-form">
              @csrf
              <input type="hidden" name="mode" value="{{Session()->has('mode') ? Session()->get('mode') : 'Light'}}" >
              <input type="submit" class="d-none" id="switch-mode-button">
            </form>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
              <input type="text" value="" class="form-control" placeholder="{{__('translation.website.crud.Search')}}..">
              <button type="submit" class="btn btn-white btn-round btn-just-icon text-dark">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                  <i class="fas fa-tachometer-alt text-mode"></i>
                  <p class="d-lg-none d-md-block">
                    {{ __('Stats') }}
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-bell text-mode" aria-hidden="true"></i>

                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    {{ __('Some Actions') }}
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-mode dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item dropdown-item-mode" href="#">{{ __('Mike John responded to your email') }}</a>
                  <a class="dropdown-item dropdown-item-mode" href="#">{{ __('You have 5 new tasks') }}</a>
                  <a class="dropdown-item dropdown-item-mode" href="#">{{ __('You\'re now friend with Andrew') }}</a>
                  <a class="dropdown-item dropdown-item-mode" href="#">{{ __('Another Notification') }}</a>
                  <a class="dropdown-item dropdown-item-mode" href="#">{{ __('Another One') }}</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user text-mode" aria-hidden="true"></i>

                  <p class="d-lg-none d-md-block">
                    {{ __('Account') }}
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-mode dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item dropdown-item-mode" href="{{ route('profile.edit', auth()->user()->slug) }}">{{ __('translation.profile.Profile') }}</a>
                  @role('Super Admin')
                    <a class="dropdown-item dropdown-item-mode" href="{{ route('get.user.wallet', auth()->user()->slug) }}">{{ __('translation.website.sidebar.My Wallet') }}</a>
                    <a class="dropdown-item dropdown-item-mode" href="{{ route('users.index') }}">{{ __('translation.website.sidebar.My Employees') }}</a>
                    <a class="dropdown-item dropdown-item-mode" href="{{ route('general.settings') }}">{{ __('translation.profile.Settings') }}</a>
                  @endrole
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item dropdown-item-mode" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('translation.profile.Log out') }}</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    @endif
@endif

@push('js')
<script>
    $('#switch-mode-div').click(function(){
      $('#switch-mode-form').submit();
    });
</script>
@endpush
