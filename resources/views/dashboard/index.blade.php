you are in dashboard.

{{ Auth::user()->email }}

<form id="logout-form" action="{{ route('logout') }}" method="POST" >
    {{ csrf_field() }}
    <input type="submit" value="Logout" />
</form>