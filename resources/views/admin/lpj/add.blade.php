@extends('layouts.admin.app')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Lpj</h4>
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
                    <a href="#">Lpj</a>
                </li>
                <li class="nav-item">
                    <a href="#">Upload Lpj</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Upload Lpj</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('lpj.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group @error('periode') ? has-error @enderror has-feedback">
                                        <label for="periode">Periode</label>
                                        <select class="form-control" name="periode" id="periode">
                                            <option value="" selected disabled>PILIH PERIODE</option>
                                            {{-- @foreach ($roles as $role) --}}
                                            <option value="2022 - 2023">2022 - 2023</option>
                                            {{-- @endforeach --}}
                                        </select>
                                        @error('periode')
                                            <small class="form-text text-muted">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('role') ? has-error @enderror has-feedback">
                                        <label for="role">Divisi</label>
                                        <select class="form-control" name="role_id" id="role">
                                            <option value="" selected disabled>PILIH DIVISI</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <small class="form-text text-muted">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <label>Jenis Lpj</label><br>
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="jenis" value="General"
                                                checked="">
                                            <span class="form-radio-sign">General</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="jenis" value="Kegiatan">
                                            <span class="form-radio-sign">Kegiatan</span>
                                        </label>
                                        @error('jenis')
                                            <small class="form-text text-muted">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group  @error('judul') ? has-error @enderror has-feedback">
                                        <label for="judul">Judul</label>
                                        <input type="text" name="judul" id="judul" class="form-control"
                                            value="{{ old('judul') }}" placeholder="ex. LPJ Kegiatan .....">
                                        @error('judul')
                                            <small class="form-text text-muted">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group  @error('lpj') ? has-error @enderror has-feedback">
                                        <label for="lpj">File lpj</label>
                                        <input type="file" name="lpj" id="lpj" class="form-control"
                                            value="{{ old('lpj') }}" placeholder="ex. LPJ Kegiatan .....">
                                        @error('lpj')
                                            <small class="form-text text-muted">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><span class="fas fa-save"></span>
                                            &nbsp; Simpan</button>
                                        <a href="{{ route('lpj.index') }}" class="btn btn-default ml-auto">
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
