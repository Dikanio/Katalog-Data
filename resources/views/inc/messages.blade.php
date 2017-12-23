<div class="container">
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissable"  style="padding-right:50px;padding-top:10px">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-fw fa-times"></i></a>
                {{$error}}
            </div>
        @endforeach
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissable" style="padding-right:50px;padding-top:10px">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-fw fa-times"></i></a>
            {{session('success')}}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-success alert-dismissable" style="padding-right:50px;padding-top:10px">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-fw fa-times"></i></a>
            {{session('error')}}
        </div>
    @endif
</div>
