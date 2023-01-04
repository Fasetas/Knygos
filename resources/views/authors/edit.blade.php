@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Redagavimas</div>
                <div class="card-body">
                    @include('authors.error')
                    <form method="POST" action="{{ route('authors.update', $author->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label class="form-label">Vardas</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',  $author->name )}}">
                            <label class="form-label">Pavardė</label>
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname',  $author->name )}}">
                        </div>
                        <button class="btn btn-success">Išsaugoti</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection