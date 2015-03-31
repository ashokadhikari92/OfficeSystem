@extends('layouts.master')

@section('title')
    {{'Task/Home'}}
@stop

@section('content')
  <div class="col-lg-11 main-chart">
    <div class="form-panel">
    @include('errors.error')
        <div class="row-fluid">
         <!-- block -->
         <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><h4 class="mb">Tasks Lists</h4></div>
            </div>
         <div class="block-content collapse in">

                             <table class="table table-bordered table-striped table-condensed">
                               <tbody>
                               <tr>
                                   <td>AAC</td>
                                   <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                                   <td class="numeric">$1.38</td>
                                   <td class="numeric">-0.01</td>
                                   <td class="numeric">-0.36%</td>
                                   <td class="numeric">$1.39</td>
                                   <td class="numeric">$1.39</td>
                                   <td class="numeric">$1.38</td>
                                   <td class="numeric">9,395</td>
                               </tr>
                               <tr>
                                <td></td>
                               </tr>
                               <tr>
                                <td></td>
                               </tr>
                               <tr>
                                   <td>AAD</td>
                                   <td>ARDENT LEISURE GROUP</td>
                                   <td class="numeric">$1.15</td>
                                   <td class="numeric">  +0.02</td>
                                   <td class="numeric">1.32%</td>
                                   <td class="numeric">$1.14</td>
                                   <td class="numeric">$1.15</td>
                                   <td class="numeric">$1.13</td>
                                   <td class="numeric">56,431</td>
                               </tr>
                             </tbody>
                           </table>
                 </div>
             </div>
            <!-- /block -->
          </div>

 </div><!-- /col-lg-9 END SECTION MIDDLE -->
@stop

@section('js_code')
    <script src="{{asset('assets/js/tasks/task.js')}}"></script>
@stop