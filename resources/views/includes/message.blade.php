<div class="row justify-content-center">
    <div class="col-md-6">
@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{$error}}
        </div>
    @endforeach
@endif
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        @if(session('success'))
            <div class="alert alert-success">
                {!!  session('success')!!}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {!!session('error')!!}
            </div>
        @endif

    </div>
</div>