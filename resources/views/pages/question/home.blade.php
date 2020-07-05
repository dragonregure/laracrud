@extends('layouts.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <h1>Questions</h1>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="/pertanyaan/create" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Asked by</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $key => $question)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $question->title }}</td>
                            <td>{{ $question->content }}</td>
                            <td>{{ $question->created_by }}</td>
                            <td class="text-center">
                                <a href="/pertanyaan/{{ $question->id }}" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Detail</a>
                                <a href="/pertanyaan/{{ $question->id }}/edit" class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Edit</a>
                                <form action="/pertanyaan/{{ $question->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin nih mau dihapus?')"><i class="far fa-trash-alt"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function () {
        $("#example1").DataTable();
    });
</script>
@endpush
