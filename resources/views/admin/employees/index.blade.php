@extends('admin.components.container')

@section('dynamicdata')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>
         Employee Lists
        </h1>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
      @include('admin.components.alert')
        <div class="card card-primary card-outline card-tabs">
          <div class="card-body">
            <h3><a href="javascript:;" class="add-employee-table btn btn-sm btn-primary">Add New &nbsp;<i class="fa fa-plus"></i></a></h3>
            <table id="dataTable" class="table table-bordered table-striped show-search-bar">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Company Name</th>
                  <th>Employee Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tablebody">
              @foreach($employees as $record)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $record->company->name }} </td>
                    <td>{{ $record->f_name.' '.$record->l_name }}</td>
                    <td>{{ $record->email }}</td>
                    <td>{{ $record->phone }}</td>
                    <td> @if($record->status == 1)
                        <small class="label btn-sm  bg-green">Active</small>
                        @else
                        <small class="label btn-sm  bg-red">Deactive</small>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.employee.edit',$record->id) }}" title="Edit employee">
                            <button type="button" class="btn btn-sm  bg-green btn-circle waves-effect waves-circle waves-float">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>&nbsp;

                        <a href="javascript:;" title="Delete employee" class="delete-employee" id="{{ $record->id }}"><button class="btn btn-sm bg-red btn-circle waves-effect waves-circle waves-float"><i class="fa fa-trash"></i></button></a>

                    </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>SN</th>
                  <th>Company Name</th>
                  <th>Employee Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>

             <!-- Add Form Start -->
             <div class="modal fade" id="addemployeeForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card-header">
                                    <h3 class="card-title" id="myModalLabel">Add New Employee</h3>
                                </div>
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.employee.store') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="company_id">Company <span class="text-danger">*</span></label>
                                            <select name="company_id" id="company_id" class="form-control" required>
                                                <option value="">--Select Company--</option>
                                                @foreach($companies as $key=>$companie)
                                            
                                                    <option value='{{$companie->id}}'>{{$companie->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="form-line">
                                                    <label for="f_name">First Name <span style="color: red;"> *</span></label>
                                                    <input type="text" name="f_name" class="form-control" placeholder="Enter First Name" required/>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-line">
                                                    <label for="l_name">Last Name <span style="color: red;"> *</span></label>
                                                    <input type="text" name="l_name" class="form-control" placeholder="Enter Last Name" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="email">Employee Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter Valid Email"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="phone">Phone Number</label>
                                                <input type="number" name="phone" class="form-control" placeholder="Enter Phone"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control m-bot15" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Add Form -->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('footer_js')

<script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '.add-employee-table', function(e) {
        e.preventDefault();
        $('#addemployeeForm').modal('show');
      });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $('.show-search-bar').dataTable();

        $('#tablebody').on('click', '.delete-employee', function(e) {
            e.preventDefault();
            $object = $(this);
            var id = $object.attr('id');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'red',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }, function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}",
                    },
                    type: "DELETE",
                    url: "{{ url('/admin/employee/') }}" + "/" + id,
                    dataType: 'json',
                    success: function(response) {
                        var nRow = $($object).parents('tr')[0];
                        oTable.fnDeleteRow(nRow);
                        swal('success', response.message, 'success');
                    },
                    error: function(e) {
                        swal('Oops...', 'Something went wrong!', 'error');
                    }
                });
            });
        });
    });
</script>


@endsection