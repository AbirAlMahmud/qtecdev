@extends('backend.layouts.master')

@section('main_content')
    <div class="container p-5">
        @include('backend.layouts.includes.message')
        <div class="card">
            <div class="card-header d-flex">
                Note Lists

                <a class="btn btn-sm btn-outline-primary ms-5" href="{{ route('note.create') }}"> <i class="bi bi-plus"></i>
                    Add New Note</a>

            </div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th scope="col">Ser No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col">Last Modified Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl = 1;
                        @endphp
                        @if (Auth::user())
                            @foreach (Auth::user()->notes as $note)
                                <tr class="noteRow">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $note->title ?? '' }}</td>
                                    <td>{!! $note->content ?? '' !!}</td>
                                    <td>{{ $note->created_at ?? '' }}</td>
                                    <td>{{ $note->updated_at ?? '' }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('note.edit', $note->id) }}">
                                            <i class="bi bi-pen"></i>Edit
                                        </a>
                                        <form action="{{ route('note.destroy', $note->id) }}" method="POST"
                                            style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" type="submit"><i
                                                    class="bi bi-trash"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        document.getElementById("searchInput").addEventListener("input", function() {
            var input, filter, table, tr, td, i, txtValue;
            input = this.value.toLowerCase();
            table = document.querySelector("table");
            tr = table.querySelectorAll(".noteRow");
            tr.forEach(function(row) {
                td = row.querySelector("td:nth-child(2)"); // Select the second column (title)
                txtValue = td.textContent || td.innerText;
                if (txtValue.toLowerCase().indexOf(input) > -1) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
@endsection
