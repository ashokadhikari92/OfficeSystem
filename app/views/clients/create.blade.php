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
            <h4 class="mb"><i></i>Add New Client</h4>
                <div class="panel-body">
                     {{ Form::open(array('route'=>'clients.store')) }}
                        <fieldset>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Organization Name:</label>
                                {{ Form::text('organizationName',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Address:</label>
                                 {{ Form::text('address',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone:</label>
                                 {{ Form::text('phone',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email:</label>
                                 {{ Form::text('email',null,array('class'=>'form-control')) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Contact Person 1</label>
                                 {{ Form::text('contactPerson1',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contact Person 1 Phone:</label>
                                 {{ Form::text('mobileContact1',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contact Person 2</label>
                                 {{ Form::text('contactPerson2',null,array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contact Person 2 Phone:</label>
                                 {{ Form::text('mobileContact2',null,array('class'=>'form-control')) }}
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