@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Knygos pavadinimas</th>
                        <th>Puslapių skaičius</th>
                        <th>Knygos numeris</th>
                        <th>Aprašymas</th>
                        <th>Autorius</th>
                        <th>Ištrinti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->pages }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->short_description }}</td>
                        <td>{{ $book->author->name }} {{ $book->author->surname }}</td>
                        <td style="width: 100px;">
                            <form method="POST" action="{{route('books.destroy', $book->id) }}">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger">Ištrinti</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection