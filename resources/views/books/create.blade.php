@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pridėti Knygą</div>
                <div class="card-body">
                    @include('books.error')
                    <form method="POST" action="{{ route('books.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Knygos pavadinimas</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Puslapių skaičiųs</label>
                            <input type="text" class="form-control @error('pages') is-invalid @enderror" name="pages" value="{{ old('pages') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Knygos numeris</label>
                            <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Aprašymas</label>
                            <input type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{ old('short_description') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Autorius</label>

                            <select name="author_id" class="form-select">
                                @foreach($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }} {{ $author->surname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vartotojas</label>

                            <select name="user_id" class="form-select">
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success">Pridėti</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection