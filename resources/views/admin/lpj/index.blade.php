@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">LPJ</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">LPJ</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data LPJ</h4>
                            <a href="{{ route('lpj.create') }}" class="btn btn-primary btn-round ml-auto">
                                <span class="fa fa-plus"></span>
                                &nbsp; Upload LPJ
                            </a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">

                                    <table id="basic" class="display table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judul</th>
                                                <th>Jenis</th>
                                                <th>Divisi</th>
                                                <th>Periode</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lpjs as $lpj)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $lpj->judul }}</td>
                                                    <td>{{ $lpj->jenis }}</td>
                                                    <td>{{ $lpj->role->name }}</td>
                                                    <td>{{ $lpj->periode }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{ route('lpj.edit', $lpj->id) }}" class="btn btn-link"
                                                                title="edit"><span class="fas fa-edit"></span></a>
                                                            <form action="" method="post" id="formDelete">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button data-action="{{ route('lpj.destroy', $lpj->id) }}"
                                                                    data-bagian="{{ $lpj->name }}" title="hapus"
                                                                    class="btn btn-link btnDelete"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                        </div>
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
            </div>
        </div>
    </div>
@endsection

<x-admin.sweetAlert />

@push('script')
    <script>
        $(document).ready(function() {
            $("#basic").DataTable({});
        });
    </script>
@endpush
