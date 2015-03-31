@extends('layouts.master')

@section('title')
    {{'Project/Create'}}
@stop

@section('content')
<div class="col-lg-10 main-chart">
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
            @include('errors.error')
            <h4 class="mb"><i></i>Edit Project</h4>
                <div class="panel-body">
                     {{--<form action="{{route('projects.update')}}" method="">--}}
                     {{ Form::model($projects,array('method'=>'PATCH','route'=>array('projects.update',$projects->projId))) }}
                        <fieldset>
                            <div class="form-group">
                                <label>Project Name</label>
                                {{--<input name="projName" class="form-control" placeholder="Enter Project Name" type="text">--}}
                                {{ Form::text('projName',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group">
                                <label>Start Date</label>
                                {{--<input name="projStartDate" class="form-control" id="date" placeholder="Enter Estimated Start Date" type="text">--}}
                                {{ Form::text('projStartDate',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group">
                                <label>End Date</label>
                               {{-- <input name="projEndDate" class="form-control" placeholder="Enter Estimated End Name" type="text">--}}
                                {{ Form::text('projEndDate',null,array('class'=>'form-control')) }}

                            </div>
                            <div class="form-group">
                                <label>Project Manager</label>
                              <select class="form-control" name="projManager">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Project Cost</label>
                                {{--<input name="projCost" class="form-control" placeholder="Enter Estimated Cost" type="text">--}}
                                {{ Form::text('projCost',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group">
                                <label>Project Status</label>
                                {{--{{ Form::select('projStatus',array('Pending'=>'Pending','Scheduled'=>'Scheduled','Processing'=>'Processing','Completed'=>'Completed'),array('class'=>'form-control')) }}--}}
                                <select class="form-control" name="projStatus">
                                    <option>Pending</option>
                                    <option>Scheduled</option>
                                    <option>Processing</option>
                                    <option>Completed</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /col-lg-9 END SECTION MIDDLE -->
@stop

@section('js_code')
<script>
        $(document).ready(function() {
            $('#date').datepicker({ dateFormat: "yy-mm-dd",
                timeFormat: 'hh:mm:ss' });
        });
    </script>
@stop