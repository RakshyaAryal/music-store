@if(count($chat) > 0)
    @foreach($chat as $item)
        <div>user_{{$item->user_id}}: {{ $item->text }}</div>
    @endforeach
@else
    No chat history found
@endif