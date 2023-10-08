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
                <li class="nav-item">
                    <a href="#">Edit Role</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Role</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group  @error('name') ? has-error @enderror has-feedback">
                                        <label for="name">Role</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $role->name }}" placeholder="ex. Divisi Kemahasiswaan" autofocus>
                                        @error('name')
                                            <small class="form-text text-muted">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><span class="fas fa-save"></span>
                                            &nbsp; Ubah</button>
                                        <a href="{{ route('role.index') }}" class="btn btn-default ml-auto">
                                            <span class="fa fa-undo"></span>
                                            &nbsp; Kembali
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
