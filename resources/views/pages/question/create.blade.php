@extends('layouts.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <h1>Make a Question</h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-success">
            <div class="card-header">
                Question Form
            </div>
            <form action="/pertanyaan" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" id="content" rows="5" style="resize: none;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="created_by">Your Name</label>
                        <input type="text" name="created_by" id="created_by" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
