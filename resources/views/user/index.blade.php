
@extends('layouts/contentLayoutMaster')

@section('title', 'DataTables')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
@endsection


@section('content')

<section id="advanced-search-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-bottom">
          <h4 class="card-title">Advanced Search</h4>
        </div>
        <!--Search Form -->
        <div class="card-body mt-2">
          <form class="dt_adv_search" method="POST">
            <div class="row hidden">
              <div class="col-12">
                <div class="form-row mb-1">
                  <div class="col-lg-4">
                    <label>Name:</label>
                    <input
                      type="text"
                      class="form-control dt-input dt-full-name"
                      data-column="1"
                      placeholder="Alaric Beslier"
                      data-column-index="0"
                    />
                  </div>
                  <div class="col-lg-4">
                    <label>Email:</label>
                    <input
                      type="text"
                      class="form-control dt-input"
                      data-column="2"
                      placeholder="demo@example.com"
                      data-column-index="1"
                    />
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <hr class="my-0" />
        <div class="card-body">
          <a href="{{ route('user.create') }}" class="btn btn-outline-primary" class="mr-25"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <hr class="my-0" />
        <div class="card-datatable">
          <table class="dt-advanced-search table" id="users-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection


@section('vendor-script')
{{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>

@endsection

@section('page-script')

<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('user.data_list') !!}',
            columns: [
                { data: 'id', name: 'id', searchable: false},
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'action', name: 'action'}
            ],
            dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            select: true,

            language: {
                paginate: {
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            }
        });
    });
</script>
  
@endsection
