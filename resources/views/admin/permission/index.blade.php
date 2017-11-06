@extends('admin.layouts.admin')

@section('styles')
    <style>
        .fixed_headers {
            width: 750px;
            table-layout: fixed;
            border-collapse: collapse;
        }
        .fixed_headers th {
            text-decoration: underline;
        }
        .fixed_headers th,
        .fixed_headers td {
            padding: 5px;
            text-align: left;
        }
        .fixed_headers td:nth-child(1),
        .fixed_headers th:nth-child(1) {
            min-width: 200px;
        }
        .fixed_headers td:nth-child(2),
        .fixed_headers th:nth-child(2) {
            min-width: 200px;
        }
        .fixed_headers td:nth-child(3),
        .fixed_headers th:nth-child(3) {
            width: 350px;
        }
        .fixed_headers thead {
            background-color: #333;
            color: #FDFDFD;
        }
        .fixed_headers thead tr {
            display: block;
            position: relative;
        }
        .fixed_headers tbody {
            display: block;
            overflow: auto;
            width: 100%;
            height: 300px;
        }
        .fixed_headers tbody tr:nth-child(even) {
            background-color: #DDD;
        }
        .old_ie_wrapper {
            height: 300px;
            width: 750px;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .old_ie_wrapper tbody {
            height: auto;
        }

    </style>
@endsection

@section('contents')
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">User Permission</span>
                </div>
            </div>
            {{--Alert--}}
            @include('admin.includes.alerts')
            <div class="portlet-body">
                <form action="{{ url('admin/permission/update') }}" method="post">
                    {{ csrf_field() }}
                    <table class="table table-hover dataTable fixed_headers " id="permission-table">
                        <thead>
                        <tr>
                            <td>Permissions</td>
                            @foreach($roles as $role)
                                <td>{{ $role->role_name }}</td>
                            @endforeach
                            {{-- <th>Slug</th>--}}
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($permissions as $titleHead => $permission)
                            <tr>
                                <td colspan="{{ count($roles)+1 }}"><h4><i class="fa fa-paragraph"></i> {{$titleHead}}</h4></td>
                            </tr>
                            @foreach($permission as $item)
                                <tr>
                                    <td style="padding-left: 30px"><i class="fa fa-circle-o"></i> {{ $item['description'] }}</td>
                                    @php($permission_slug = $item['slug'])
                                    @foreach($roles as $role)
                                        <td>
                                            {{--@if(\App\Libraries\Permission::check('permission-view'))--}}

                                            <div class="md-checkbox has-success">

                                                <input type="checkbox" name="roles_permission_slug[]"
                                                       id="{{ $role->id }}_{{$permission_slug }}"
                                                       value="{{ $role->id }}|{{$permission_slug}}"
                                                       @if($role->rolePermission->contains('permission_slug', $permission_slug)) checked
                                                       @endif
                                                       class="md-check">

                                                <label for="{{ $role->id }}_{{$permission_slug }}">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                            {{--@endif--}}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                    <input type="submit" value="Save" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $("#permission-table").dataTable({
         "pageLength": 10
         });
    </script>
@endsection
