@extends('layouts.master')

@section('title')
    {{'Task/Create'}}
@stop

@section('content')
<div class="col-lg-10 main-chart">
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
            @include('errors.error')
            <h4 class="mb"><i></i>Add New Task</h4>
                <div class="panel-body">
                     {{ Form::open(array('route'=>'tasks.store')) }}
                        <fieldset>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Title:</label>
                                {{ Form::text('title',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Description:</label>
                                 {{ Form::textarea('description',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Project</label>
                                <select class="form-control" name="projectId">
                                @foreach($projects as $project)
                                    <option value="{{$project->projId}}">{{$project->projName}}</option>
                                @endforeach
                                </select>

                                 {{--{{ Form::select('projectId',$projects,array('class'=>'form-control')) }}--}}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Task Category</label>
                                <select class="form-control" name="taskCategoryId">
                                @foreach($taskCategory as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>

                                 {{--{{ Form::select('taskCategoryId',$taskCategory,array('class'=>'form-control')) }}--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Assigned To:</label>
                                <select class="form-control" name="assignedTo">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->first_name}}</option>
                                @endforeach
                                </select>
                                 {{--{{ Form::select('assignedTo',$users,array('class'=>'form-control')) }}--}}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Assigned Date:</label>
                                 {{ Form::text('assignedDate',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Deadline</label>
                                 {{ Form::text('deadline',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Status:</label>
                                 {{ Form::select('status',array('Processing'=>'Processing','Completed'=>'Completed'),array('class'=>'form-control')) }}
                            </div>
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

@stop