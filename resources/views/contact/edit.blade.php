@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><b>Contacts</b></div>
                    <div class="card-body">
                        <div>
                            <a href="/contacts">Back</a>
                        </div>
                            <form action="{{ route('contact.update',[$contact->id]) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $contact->name }}">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $contact->address }}">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $contact->phone }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    @if($errors->any())
                        <div class="alert alert-danger mt-2">
                            @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
