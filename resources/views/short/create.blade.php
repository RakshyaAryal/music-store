<form action="{{url('school/store')}}" method="post">
  {{csrf_field()}}
    <input type="text" name="long_url">
    <input type="submit" name="shorten">
</form>


<form id="logout-form" action="{{ route('logout') }}" method="POST" >
    {{ csrf_field() }}
    <input type="submit" value="Logout" />
</form>


