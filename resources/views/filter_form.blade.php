@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! Session::get('message') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{route('filter')}}" class="p-2">
                        @csrf
                        <div class="form-group">
                          <input type="text" class="form-control" name="filter" placeholder="Search Data">
                        </div>
                        @if ($errors->has('filter'))
                            <span class="text-danger">{{ $errors->first('filter') }}</span>
                        @endif

                        <input type="submit"  value="Submit" class="btn btn-primary" name="upload">

                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


