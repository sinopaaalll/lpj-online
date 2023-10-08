@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Role</h4>
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
                    <a href="#">Role</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Role</h4>
                            <a href="{{ route('role.create') }}" class="btn btn-primary btn-round ml-auto">
                                <span class="fa fa-plus"></span>
                                &nbsp; Add Data
                            </a>
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('role.edit', $role->id) }}" class="btn btn-link"
                                                    title="edit"><span class="fas fa-edit"></span></a>
                                                <form action="" method="post" id="formDelete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-action="{{ route('role.destroy', $role->id) }}"
                                                        data-bagian="{{ $role->name }}" title="hapus"
                                                        class="btn btn-link btnDelete"><i class="fa fa-trash"></i></button>
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
@endsection

<x-admin.sweetAlert />

@push('script')
    <script>
        $(document).ready(function() {
            $("#basic").DataTable({});
        });
    </script>
@endpush
