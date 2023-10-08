@extends('layouts.user.app')
@section('content')
    <div class="page-inner">
        {{-- <div class="page-header">
            <h4 class="page-title">Laporan Pertanggung Jawaban</h4>
        </div> --}}
        <div class="row">

            <div class="col-12 col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                            @foreach ($roles as $role)
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#{{ $role->id }}"
                                        role="tab" aria-controls="pills-home"
                                        aria-selected="true">{{ $role->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                            @foreach ($roles as $role)
                                <div class="tab-pane fade show" id="{{ $role->id }}" role="tabpanel" aria-labelledby="">
                                    @foreach ($lpjs as $lpj)
                                        @if ($lpj->role_id == $role->id)
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        @if ($lpj->jenis == 'General')
                                                            <tr>
                                                                <th class="text-center" colspan="2">General</th>
                                                            </tr>
                                                        @elseif ($lpj->jenis == 'Kegiatan')
                                                            <tr>
                                                                <th class="text-center" colspan="2">Kegiatan</th>
                                                            </tr>
                                                        @endif
                                                    </thead>
                                                    <tbody>
                                                        @if ($lpj->jenis == 'General')
                                                            <tr>
                                                                <td>{{ $lpj->judul }}</td>
                                                                <td class="text-right">
                                                                    <a href="{{ route('download', $lpj->id) }}"
                                                                        class="btn btn-sm btn-danger"><span
                                                                            class="fa fa-download"></span> Unduh</a>
                                                                </td>
                                                            </tr>
                                                        @elseif ($lpj->jenis == 'Kegiatan')
                                                            <tr>
                                                                <td>{{ $lpj->judul }}</td>
                                                                <td class="text-right">

                                                                    <a href="" class="btn btn-sm btn-danger"><span
                                                                            class="fa fa-download"></span> Unduh</a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('home') }}" class="btn btn-outline-warning"><span class="fas fa-undo"></span>
                            &nbsp;
                            KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
