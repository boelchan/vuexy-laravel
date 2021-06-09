
@extends('layouts/contentLayoutMaster')

@section('title', 'User')

@section('content')

<section class="bs-validation">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" class="form_ajax" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="customFile1">Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ $user->name }}" />
                        </div>

                        <div class="form-group">
                            <label for="basicSelect">Role</label>
                            <select class="form-control" name="role_id">
                                @foreach($roles as $k => $v)
                                    <option 
                                        value="{{ $k }}" 
                                        @if ($user->role_id == $k)
                                            {{ 'selected' }}
                                        @endif
                                        >
                                        {{ $v }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" placeholder="email" value="{{ $user->email }}" />
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Status</label>
                            {{ $user->active  }}
                            <div class="demo-inline-spacing">
                                <div class="custom-control custom-control-success custom-radio">
                                    <input type="radio" name="active" value="1" id="customRadio1" class="custom-control-input"  
                                        @if($user->active == 1)
                                            {{ 'checked' }}
                                        @endif
                                    />
                                    <label class="custom-control-label" for="customRadio1">Aktif</label>
                                </div>
                                <div class="custom-control custom-control-danger custom-radio">
                                    <input type="radio" name="active" value="0" id="customRadio2" class="custom-control-input" 
                                        @if($user->active == 0)
                                            {{ 'checked' }}
                                        @endif
                                    />
                                    <label class="custom-control-label" for="customRadio2">Tidak Aktif</label>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
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