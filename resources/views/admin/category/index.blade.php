@extends('admin.layouts.app')

@section('title', 'Category Index Page')

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
@endsection

@section('content')
    <h5 class="mb-4">Daftar Kategori</h5>
    @auth
        <div class="d-flex mb-4">
            <a href="{{ route('admin.category.create') }}" type="button" class="ms-auto btn btn-primary">
                Tambah
            </a>
        </div>
    @endauth

    <table id="exampleTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="d-flex">
                        <form action="{{ route('admin.category.destroy', $item->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger me-3">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#exampleTable').DataTable();
        });
    </script>
@endsection
