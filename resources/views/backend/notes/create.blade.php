@extends('backend.layouts.master')

@section('main_content')
    @include('backend.layouts.includes.message')

    <div class="container p-5">
        <div class="card">
            <div class="card-header">Create Note</div>
            <div class="card-body">
                <form action="{{ route('note.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">

                        @error('title')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror

                    </div>
                    <div>
                        <label for="content" class="form-label">Content</label>
                        <textarea type="text" name="content" id="ckeditor" class="form-control"></textarea>

                        @error('content')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror

                    </div>
                    <button class="btn btn-sm btn-primary mt-3" type="submit"><i class="bi bi-check"></i> Save</button>
                    <a class="btn btn-sm btn-danger mt-3" href="{{ route('note.index') }}"><i class="bi bi-x"></i>
                        Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
@endsection
