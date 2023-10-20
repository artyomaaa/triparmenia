@extends('admin.layout')
@section('content')

        @if (session('status'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>
                    <i class="icon fa fa-info"></i>
                    {{--Alert!--}}
                </h4>
                {!! session('status')  !!}
            </div>
        @endif
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                    @if(isset($users) && is_object($users))

                        <br>
                        <table class="table table-dark table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>first_name</th>
                                <th>last_name</th>
                                <th>Email</th>
                                <th>role_id</th>
                                <th>image</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role_id}}</td>
                                    <td><img src="{{asset('assets/images/users/'.$user->image)}}" style="width: 50px;height: 50px">
                                        </td>




                                    <td><a href="{{route('user.edit',$user->id)}}"
                                           class="btn btn-info btn-sm"><i
                                                    class="fa fa-edit fa-fw"></i> </a></td>
                                    <td>
                                        {{--<form action="{{route('user.destroy',$users->id)}}" method="post">--}}
                                        {{--@csrf--}}
                                        {{--<input type="hidden" name="_method" value="DELETE">--}}
                                        {{--<button type="submit" onclick="return confirm('are you sure..? to delete')"  class="btn btn-danger btn-sm"><i class="fa fa-trash fa-fw"></i></button>--}}
                                        {{--</form>--}}


                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#myModal-{{$user->id}}">
                                            <i class="fa fa-trash fa-fw"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal-{{$user->id}}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content"
                                                     style="border: 3px solid red;background-color: green">
                                                    <div>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal"
                                                                aria-hidden="true">&times;
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel"
                                                            style="text-align: center;">
                                                            delete</h4>
                                                    </div>
                                                    <div class="modal-body border border-danger">
                                                        <h3 style="text-align: center;">Are you sure..? to
                                                            delete</h3>
                                                        <form action="{{route('user.destroy',$user->id)}}"
                                                              method="post"
                                                              id='delete-form-".{{$user->id}}."'>
                                                            @csrf
                                                            <input type="hidden" name="_method"
                                                                   value="DELETE">
                                                            <div class="modal-footer"
                                                                 style="border-top: none">
                                                                {{--<a  class="btn green">Delete</a>--}}
                                                                <button type="submit" class="btn btn-danger"> delete
                                                                </button>
                                                                <button type="button"
                                                                        class="btn btn-primary"
                                                                        data-dismiss="modal">cancle
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                </div>
                {{$users->links()}}
            </div>
        </div>
        @endif


    </div>
    <div class="footer">
        <div>
            <strong>Copyright</strong> Example Company &copy; 2014-2018
        </div>
    </div>


@endsection