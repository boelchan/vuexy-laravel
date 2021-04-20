
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit data')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')
<!-- Validation -->
<section class="bs-validation">
  <div class="row">
    <!-- Bootstrap Validation -->
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form</h4>
        </div>
        <div class="card-body">
          @if ( $errors->any() )
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
      
          <form action="{{ route('user.update', $user->id) }}" method="post">
              @csrf
              @method('PUT')


            <div class="form-group">
              <label for="customFile1">Nama</label>
              <input type="text" name="name" class="form-control" placeholder="Nama" required value="{{ $user->name }}" />
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
              <input type="email" name="email" id="" class="form-control" placeholder="email" required value="{{ $user->email }}" />
            </div>

            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Bootstrap Validation -->

   
  </div>
</section>
<!-- /Validation -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  {{-- <script src="{{ asset(mix('js/scripts/forms/form-validation.js')) }}"></script> --}}
@endsection
