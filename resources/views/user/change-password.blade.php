@extends('layouts/contentLayoutMaster')

@section('title', 'user')

@section('content')

<section class="bs-validation">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Password</h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('user.change.password.store') }}" class="form_ajax">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="form-group row">
                            <label class="col-md-4 text-md-right">Nama</label>
                            <div class="col-md-6">
                                <span>{{ $user->name }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-md-right">Email</label>
                            <div class="col-md-6">
                                <span>{{ $user->email }}</span>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password Baru</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Konfirmasi Password
                                Baru</label>

                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control"
                                    name="new_confirm_password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page-script')
@endsection