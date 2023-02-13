@extends('admin._layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
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
                        <table class="ui celled table" id="users-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
        @include('admin.users.modal')

    </section>
@endsection

@section('js')
    @include('admin.users.js')
@endsection
