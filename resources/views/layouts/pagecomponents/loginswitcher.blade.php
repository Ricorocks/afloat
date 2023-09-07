@if ($logon_type == 'marina')
    @if ($customer = Auth::guard('marinastaff')->user())
    <a href="{{ route('logout') }}" class="text-sm font-semibold leading-6 text-white" onclick="event.preventDefault(); document.getElementById('logout-marina-form').submit();">
        Log Out
    </a> &nbsp; <span class="text-white">|</span> &nbsp;
    <a href="{{ route('marina-admin.pages.dashboard') }}" class="text-sm font-semibold leading-6 text-white">{{ $customer->name }}</a>
    <form id="logout-marina-form" action="{{ route('marina-admin.logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @else
    <a href="{{ route('devmenu') }}" class="text-sm font-semibold leading-6 text-white">Log in <span
            aria-hidden="true">&rarr;</span></a>
    @endif
@elseif ($logon_type == 'customer')
    @if ($customer = Auth::guard('web')->user())
    <a href="{{ route('marina-admin.auth.login') }}" class="text-sm font-semibold leading-6 text-white"  onclick="event.preventDefault(); document.getElementById('logout-customer-form').submit();">
        Log Out
    </a> &nbsp; <span class="text-white">|</span> &nbsp;
    <a href="{{ route('user-profile-information.update') }}" class="text-sm font-semibold leading-6 text-white">{{ $customer->name }}</a>
    <form id="logout-customer-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @else
    <a href="{{ route('devmenu') }}" class="text-sm font-semibold leading-6 text-white">Log in <span
            aria-hidden="true">&rarr;</span></a>
    @endif
@else

@endif
    

