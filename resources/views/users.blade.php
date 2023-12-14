@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="p-2 text-center">User Details</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Sr.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (isset($users))
                            @php
                                $i=1;
                            @endphp
                            @foreach ($users as $user)
                            <tr>
                                <th>{{$i}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                            
                            @else
                                <p class="text-danger text-center">No data found</p>
                            @endif
                         
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


