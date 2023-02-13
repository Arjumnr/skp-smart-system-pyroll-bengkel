@extends('admin._layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Jenis Servis</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Jenis Servis</li>
            </ol>
        </nav>
    </div>


    <section class="section ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <br>
                    <div style="width:90%;" align="right">
                        <button id="btnADD" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal">Tambah Data</button>
                    </div>
                    <div class="card-body">
                        <table class="ui celled table" id="tableJenis" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Nama Servis</th>
                                    <th>Tanggal Input</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
        @include('admin.jenis.modal')

    </section>
@endsection

@section('js')
    @include('admin.jenis.js')
@endsection
