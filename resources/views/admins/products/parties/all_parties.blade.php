@extends('layouts.parent')


@section('nav')
    <li class="nav-item">
        <a href="{{ route('adminType', $type) }}" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Home</p>
        </a>
    </li>
@endsection

@section('title', 'All Parties')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

    <div class="col-12">
        @include('admins.incloudes.messages')
    </div>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>date</th>
                <th>time</th>
                <th>price</th>
                <th>location</th>
                <th>Description</th>
                <th>Accompaniment</th>
                <th>status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->date }}</td>
                    <td>{{ $product->time }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->location }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->other_people_price }}</td>


                    <td class="{{ $product->status == 0 ? 'text-danger' : 'text-success' }}">
                        {{ $product->status == 0 ? 'Not Active' : 'Active' }}
                    </td>

                    <td>
                        <a href="{{ route('edit_party', ['id' => $product->id, 'type' => $type]) }}"
                            class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete_party', $product->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                </form>
            @endforeach
        </tbody>
    </table>
@endsection


@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
