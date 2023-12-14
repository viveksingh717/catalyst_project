@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-warning float-right" href="{{route('user')}}" role="button">Filter Data</a>
            <div class="card mt-5">
                <div class="card-body">
                    @isset($count)
                        <p>Number of Records: {{ $count }}</p>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


