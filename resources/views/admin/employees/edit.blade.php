@extends('admin.components.container')

@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit Employee
                </h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">

                    <form id="EditForm" action="{{ route('admin.employee.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        @include('admin.components.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">
                                        <div class="form-group">
                                            <label for="company_id">Company <span class="text-danger">*</span></label>
                                            <select name="company_id" id="company_id" class="form-control" required>
                                                <option value="">--Select Company--</option>
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}" {{(($employee->company_id==$company->id)? 'selected':'')}}>{{$company->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <div class="form-group">
                                        <label class="control-label">First Name <span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="f_name" placeholder="Enter First Name" value="{{ $employee->f_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Last Name  <span style="color: red;"> *</span></label>
                                        <input type="text" class="form-control" name="l_name" placeholder="Enter Last Name" value="{{ $employee->l_name }}">
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Employee Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Valid Email" value="{{ $employee->email }}">
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Phone Number</label>
                                            <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number" value="{{ $employee->phone }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($employee->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($employee->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <input type="hidden" name="_method" value="PUT">

                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection