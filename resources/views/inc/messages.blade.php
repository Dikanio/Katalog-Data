<div class="container" style="margin-left: -14px;">
    <!-- @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</i></a>
                {{$error}}
            </div>
        @endforeach
    @endif -->

    @if(session('success'))
        <div class="alert alert-success alert-dismissable">
            <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</i></a> -->
            {{session('success')}}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissable">
            <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</i></a> -->
            {{session('error')}}
        </div>
    @endif
</div>