@extends('layouts.master')
@section('content')

    <div class="panel">
        <div class="panel-heading"><h2>Add new genere</h2></div>
        <div class="panel-body"><form action="{{url('admin/generes/store/'.$generes->id)}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$generes->title}}" class="form-group">
                </div>

                <input type="submit"name="submit" class="btn-success">

            </form></div>
        <div class="panel-footer"></div>
    </div>



@endsection