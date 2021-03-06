@extends('layouts.master')

@section('title')
    {{'Issues/Home'}}
@stop

@section('content')
  <div class="col-lg-11 main-chart">
    <div class="form-panel">
    @include('errors.error')
                             <div class="row-fluid">
                                <!-- block -->
                                <div class="block">
                                    <div class="navbar navbar-inner block-header">
                                        <div class="muted pull-left"><h4 class="mb">Issue/Bug Lists</h4></div>
                                    </div>
                                    <div class="block-content collapse in">
                                        <div class="span12">
                                           <div class="table-toolbar">
                                              <div class="btn-group">
                                                 <a href="{{route('issues.create')}}"><button class="btn btn-success">Add New Issue/Bug<i class="icon-plus icon-white"></i></button></a>
                                              </div>
                                              <div class="btn-group pull-right">
                                                 <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                                 <ul class="dropdown-menu">
                                                    <li><a href="#">Print</a></li>
                                                    <li><a href="#">Save as PDF</a></li>
                                                    <li><a href="#">Export to Excel</a></li>
                                                 </ul>
                                              </div>
                                           </div>

                                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="data_table">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Project</th>
                                                        <th>Title</th>
                                                        <th>Observed By</th>
                                                        <th>Observed Date</th>
                                                        <th>Status</th>
                                                        <th>Detail</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- /block -->
                            </div>

 </div><!-- /col-lg-9 END SECTION MIDDLE -->
@stop

@section('js_code')
    <script src="{{asset('assets/js/issues/issue.js')}}"></script>
@stop