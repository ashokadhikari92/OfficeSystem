@extends('layouts.master')

@section('title')
    {{'Issue/Bug/Edit'}}
@stop

@section('content')
<div class="col-lg-10 main-chart">
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
            @include('errors.error')
            <h4 class="mb"><i></i>Edit Issue/Bug</h4>
                <div class="panel-body">
                     {{ Form::model($issue,array('method' => 'PATCH','route'=>array('issues.update',$issue->id))) }}
                        <fieldset>
                         <div class="row">
                             <div class="form-group col-md-6">
                                 <label>Title:</label>
                                 <select class="form-control" name="projectId">
                                 @foreach($projects as $project)
                                     <option value="{{$project->projId}}">{{$project->projName}}</option>
                                 @endforeach
                                 </select>
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Title:</label>
                                 {{ Form::text('title',null,array('class'=>'form-control')) }}
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Description:</label>
                                  {{ Form::textarea('description',null,array('class'=>'form-control')) }}
                             </div>
                         </div>
                         <div class="row">
                             <div class="form-group col-md-6">
                                 <label>Observed By:</label>
                                 <select class="form-control" name="observedBy">
                                 @foreach($users as $user)
                                     <option value="{{$user->id}}">{{$user->first_name}}</option>
                                 @endforeach
                                 </select>
                                  {{--{{ Form::select('assignedTo',$users,array('class'=>'form-control')) }}--}}
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Observed Date:</label>
                                  {{ Form::text('observedDate',null,array('class'=>'form-control')) }}
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Status:</label>
                                  {{ Form::select('status',array('Pending'=>'Pending','Assigned'=>'Assigned'),array('class'=>'form-control')) }}
                             </div>
                              <div class="form-group col-md-6">
                                  <label>Solved By</label>
                                 <select class="form-control" name="solvedBy">
                                 <option>None</option>
                                 @foreach($users as $user)
                                     <option value="{{$user->id}}">{{$user->first_name}}</option>
                                 @endforeach
                                 </select>
                              </div>
                            <div class="form-group col-md-6">
                                 <label>Remarks:</label>
                                  {{ Form::textarea('remarks',null,array('class'=>'form-control')) }}
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