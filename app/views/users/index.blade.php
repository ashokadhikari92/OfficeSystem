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
                                        <div class="muted pull-left"><h4 class="mb">Current Users</h4></div>
                                    </div>
                                    <div class="block-content collapse in">
                                        <div class="span12">
                                           <div class="table-toolbar">
                                              <div class="btn-group">
                                                 <a href="{{route('users.create')}}"><button class="btn btn-success">Add New User<i class="icon-plus icon-white"></i></button></a>
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
                                                        <th class="dtThColumn">User</th>
                                                        <th class="dtThColumn">Active</th>
                                                        <th class="dtThColumn">Suspend/UnSuspend</th>
                                                        <th class="dtThColumn">Ban/UnBan</th>
                                                        <th class="dtThColumn">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="odd gradeX">
                                                        <td>1</td>
                                                        <td>Ashok Adhikari</td>
                                                        <td>ashok</td>
                                                        <td>ashok.adhikari92@gmail.com</td>
                                                        <td>Project Manager</td>
                                                        <td>Active</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="odd gradeX">
                                                         <td>2</td>
                                                         <td>PRO014002</td>
                                                         <td>Library Management System</td>
                                                         <td>15-11-2014</td>
                                                         <td>25-01-2015</td>
                                                         <td>54</td>
                                                         <td>Sabin Maharjan</td>
                                                         <td></td>
                                                    </tr>

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
    <script src="../assets/js/users/user.js"></script>
@stop