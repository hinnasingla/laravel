Messages:
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
@endif

@if(session('success'))
    <p>{{session('success')}}</p>
@endif

@if(session('error'))
    <p>{{session('error')}}</p>
@endif

