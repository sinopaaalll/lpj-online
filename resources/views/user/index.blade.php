@extends('layouts.user.app')
@section('content')
    <div class="page-inner">
        {{-- <div class="page-header">
            <h4 class="page-title">Laporan Pertanggung Jawaban</h4>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <h2 class="text-center font-weight-bold">LAPORAN PERTANGGUNG JAWABAN</h2>
                <h4 class="text-center">Himpunan Mahasiswa Teknik Informatika (HUMANIKA)</h4>
                <h4 class="text-center">STT Wastukancana Purwakarta</h4><br>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-header card-danger">
                        <h1 class=" text-center">
                            Lpj Online 2023
                        </h1>
                    </div><br><br><br>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <span class="fas fa-10x fa-book"></span><br><br><br><br>
                                    <p>
                                        Laporan pertanggung jawaban kepengurusan HUMANIKA <br> periode 2022 - 2023
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-center">
                                <a href="{{ route('kunjungi') }}" class="col-12 btn btn-lg btn-danger"> KUNJUNGI</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
