<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@php($user_id = rand(0,20))
@php($group_id = rand(0,5))
<div>USER: user_{{ $user_id }}</div>
<div class="form-group" style="height: 500px; background: grey; width: 400px; overflow-y: scroll" id="show_data"></div>

<br>
<div>

    <div class="form-group">
        <label for="message"></label>

        <input type="text" name="message" id="message" class="form-control"/>
        <input type="hidden" name="user_id" id="user_id" value="{{ $user_id }}">
        <input type="hidden" name="group_id" id="group_id" value="1">
        <input type="submit" value="send" id="btn-send"/>

    </div>
</div>



<script>

    $(document).ready(function () {

        // save ajax call
        $('#btn-send').click(function () {
            var message = $("#message").val();
            var user_id = $('#user_id').val();
            var group_id = $('#group_id').val();

            //$('#show_data').append('<label>'+message+'</label></br>');
            $.ajax({
                'url' : '{{ url('chat/store') }}',
                'type': 'get',
                'data': {
                    'text': message,
                    'user_id': user_id,
                    'group_id': group_id,
                    'status': 1,
                },
                'success': function (response) {
                    $("message").val('');
                    $('#show_data').append('<div>user_{{$user_id}}:'+message+'</div></br>');
                }
            })

        });

        //fetch ajax call

        var interval = setInterval(function () {

            $.ajax({
                'url': '{{ url('chat/list-all') }}',
                'type': 'get',
                'success': function (response) {
                    $("#show_data").html(response);
                }
            })

        }, 1000);

    });

</script>