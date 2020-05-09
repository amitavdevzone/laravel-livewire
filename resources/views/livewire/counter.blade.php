@extends('layouts.app')

@section('content')
<div>
    <p>This is my counter component. {{$user->name}}</p>
    <p>{{$guest->name}}</p>
</div>
@endsection
