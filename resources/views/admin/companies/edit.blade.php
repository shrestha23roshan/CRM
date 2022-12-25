@extends('admin.components.container')

@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit Company
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

                    <form id="EditForm" action="{{ route('admin.company.update', $company->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        @include('admin.components.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">

                                    <div class="form-group">
                                            <label class="control-label">Company Name <span style="color: red;"> *</span></label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Company Name" value="{{ $company->name }}">
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Company Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Valid Company Email" value="{{ $company->email }}">
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label">Website Url</label>
                                            <input type="text" class="form-control" name="website_url" placeholder="Enter website Url" value="{{ $company->website_url }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="logo">Logo </label>
                                        <input type="file" name="logo" class="form-control" id="logo" accept="image/png, image/jpeg" />
                                        <img src="{{ asset('uploads/companies/'. $company->logo) }}" height="80" width="100">
                                        <span style="color: red;">Maximum 2MB Image Logo </span>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($company->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($company->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
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