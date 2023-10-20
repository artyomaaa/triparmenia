@extends('admin.layout')
@section('content')

    <div class="row  border-bottom white-bg dashboard-header">

        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                    @if(isset($roles) && is_object($roles))

                        <br>
                        <table class="table table-dark table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>role</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->role}}</td>

                                    <td><a href="{{route('role.edit',$role->id)}}"
                                           class="btn btn-info btn-sm"><i
                                                    class="fa fa-edit fa-fw"></i> </a></td>
                                    <td>



                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#myModal-{{$role->id}}">
                                            <i class="fa fa-trash fa-fw"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal-{{$role->id}}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="myModalLabel" aria-hidden="true" >
                                            <div class="modal-dialog">
                                                <div class="modal-content"
                                                     style="border: 3px solid red;background-color: green">
                                                    <div>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal"
                                                                aria-hidden="true">&times;
                                                        </button>
{{--                                                        <h4 class="modal-title" id="myModalLabel"--}}
{{--                                                            style="text-align: center;">--}}
{{--                                                            delete</h4>--}}
                                                    </div>
                                                    <div class="modal-body ">
                                                        <h3 style="text-align: center;">Are you sure..? to
                                                            delete</h3>
                                                        <form action="{{route('user.destroy',$role->id)}}"
                                                              method="post"
                                                              id='delete-form-".{{$role->id}}."'>
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