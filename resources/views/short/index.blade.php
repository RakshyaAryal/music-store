<table>
    <tr>
        <td>#</td>
        <td>long url</td>
        <td>short url</td>
    </tr>

    @foreach($school as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ url('/').'/'.$item->short_url }}</td>
            <td>{{ $item->long_url }}</td>
        </tr>
        @endforeach
</table>
