@extends('layouts.master')

@section('title')
    {{'User/Home'}}
@stop

@section('content')
  <div class="col-lg-11 main-chart">
    <div class="form-panel">
    @include('errors.error')
                             <div class="row-fluid">
                                <!-- block -->
                                <div class="block">
                                    <div class="navbar navbar-inner block-header">
                                        <div class="muted pull-left"><h4 class="mb">Clients Lists</h4></div>
                                    </div>
                                    <div class="block-content collapse in">
                                        <div class="span12">
                                           <div class="table-toolbar">
                                              <div class="btn-group">
                                                 <a href="{{route('clients.create')}}"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
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
                                                        <th>Client Id</th>
                                                        <th>Organization Name</th>
                                                        <th>Address</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Contact Person</th>
                                                        <th>Details</th>
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
    <script src="../assets/js/clients/client.js"></script>
@stop