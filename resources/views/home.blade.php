@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <p>Add a new <a href="{{route('event.add')}}">event</a></p>
                    </div>
                    <livewire:event-listing></livewire:event-listing>
                </div>
            </div>
        </div>
    </div>
@endsection
