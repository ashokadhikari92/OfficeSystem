@if($errors->any())
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            {{ implode('',$errors->all('<li class="error">:message</li>')) }}
        </ul>
    </div>
@endif
@if(Session::has('message'))

<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('message') }}
</div>
@endif