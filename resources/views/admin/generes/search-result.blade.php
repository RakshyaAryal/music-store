@if(count($music) > 0)
    @foreach($music as $m)
        <div><a href="#">{{ $m->album_name }}</a></div>
    @endforeach
@else
    No record found
@endif
