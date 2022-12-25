@extends('admin.components.container')

 <!-- Content Wrapper. Contains page content -->
 @section('dynamicdata')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Welcome Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa-brands fa-servicestack"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Companies</span>
               
              </div>
              <a href="#" class="small-box-footer" >More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-newspaper"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Employees</span>
              </div>
              <a href="#" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
 @endsection

  <!-- /.content-wrapper -->
