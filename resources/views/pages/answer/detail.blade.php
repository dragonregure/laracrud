@extends('layouts.master')

@section('content')
<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h3>Question</h3>
                <div class="card">
                    <div class="card-header">
                        <b>{{ $question->title }}</b>
                    </div>
                    <div class="card-body">
                        <div style="border-bottom: 1px solid grey">
                            <p><i class="far fa-clock"></i> Created at {{ date_format(date_create($question->created_at),'d M Y H:i') }}<br>
                            <i class="fas fa-history"></i> Last updated at {{ date_format(date_create($question->updated_at),'d M Y H:i') }}<br>
                            <i class="far fa-user"></i> Asked by {{ $question->created_by }}</p>
                        </div>
                        <p class="mt-2">{{ $question->content }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h3>Answer</h3>
                <div class="card">
                    <div class="card-body">
                        @if (count($answers) == 0)
                            <div class="text-center p-3">Be the first to answer</div>
                        @else
                            @foreach ($answers as $answer)
                            <b>{{ $answer->created_by }}</b> &bull; {{ $answer->diff }}
                            <p class="pb-2" style="border-bottom: 1px solid grey;">{{ $answer->content }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card">
                    <form action="/jawaban/{{ $question->id }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="created_by" placeholder="Your Name">
                            </div>
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-reply"></i></span>
                                </div>
                                <textarea class="form-control" name="content" rows="5" placeholder="Your answer" style="resize: none;"></textarea>
                            </div>
                            <button class="btn btn-primary btn-sm mt-3" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
