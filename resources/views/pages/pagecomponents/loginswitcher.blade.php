@if ($logon_type == 'marina')
    @if ($customer = Auth::guard('marinastaff')->user())
    <a href="{{ route('logout') }}" class="text-sm font-semibold leading-6 text-white">Log Out</a> &nbsp; | &nbsp;
    <a href="{{ route('marina-admin.pages.dashboard') }}" class="text-sm font-semibold leading-6 text-white">{{ $customer->name }}</a>
    @else
    <a href="{{ route('devmenu') }}" class="text-sm font-semibold leading-6 text-white">Log in <span
            aria-hidden="true">&rarr;</span></a>
    @endif
@else
    @if ($customer = Auth::guard('web')->user())
    <a href="{{ route('marina-admin.auth.login') }}" class="text-sm font-semibold leading-6 text-white">Log Out</a> &nbsp; | &nbsp;
    <a href="{{ route('user-profile-information.update') }}" class="text-sm font-semibold leading-6 text-white">{{ $customer->name }}</a>
    @else
    <a href="{{ route('devmenu') }}" class="text-sm font-semibold leading-6 text-white">Log in <span
            aria-hidden="true">&rarr;</span></a>
    @endif
@endif
    

