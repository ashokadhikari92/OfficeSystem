@extends('layouts.master')

@section('title')
    {{'User/Create'}}
@stop

@section('content')
<div class="col-lg-10 main-chart">
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
            @include('errors.error')
            <h4 class="mb"><i></i>Add New User</h4>
                <div class="panel-body">
                     {{--<form action="">--}}
                     {{ Form::open(array('route'=>'users.store')) }}
                        <fieldset>
                            <div class="form-group col-md-6">
                                <label>First Name:</label>
                                {{--<input class="form-control" placeholder="first_name" type="text">--}}
                                {{ Form::text('first_name',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Last Name:</label>
                                {{--<input class="form-control" placeholder="last_name" type="text">--}}
                                {{ Form::text('last_name',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email:</label>
                                {{ Form::text('email',null,array('class' => 'form-control')) }}
                               {{-- <input class="form-control" placeholder="Email" type="email">--}}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Password:</label>
                               <input class="form-control" name="password" type="password">
                                {{--{{ Form::password('password',null,array('class'=>'form-control')) }}--}}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Conform Password:</label>
                                <input class="form-control" name="password_confirmation" type="password">
                                {{--{{ Form::password('conformPassword',null,array('class'=>'form-control')) }}--}}
                            </div>
                           <div class="form-group col-md-6">
                                <label>User Role</label>
                                <select class="form-control" name="group">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                                </select>

                                 {{--{{ Form::select('projectId',$projects,array('class'=>'form-control')) }}--}}
                            </div>


                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /col-lg-9 END SECTION MIDDLE -->
@stop

@section('js_code')

@stop