@if (Session::has('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {!!Session::get('error')!!}
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {!!Session::get('success')!!}
</div>
@endif


