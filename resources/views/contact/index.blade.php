@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>Contact Info</b></div>
                @csrf
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="mb-2">
                            <a href="{{ route('contact.create') }}" class="btn btn-success">Create New</a>
                        </div>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone No.</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            @foreach($contacts as $contact)
                            <tbody>
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>
                                    <a href="{{ route('contact.edit',[$contact->id]) }}" class="btn btn-outline-default">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('contact.delete',[$contact->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                            class="btn btn-danger" onclick="return confirm ('Are you sure you want to delete this data')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
