


      <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                
                                <h1 class="text-white">{{$bed}}</h1>
                                <h1 class="font-light text-white"><i class="fas fa-bed "></i></h1>
                                <h4 class="text-white">Total Bed</h4>
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="text-white">{{$bedassign}}</h1>
                                <h1 class="font-light text-white"><i class="fas fa-address-book "></i></h1>
                                <h4 class="text-white">Bed Assigned</h4>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="text-white">{{$bav}}</h1>
                                <h1 class="font-light text-white"><i class="fas fa-exclamation "></i></h1>
                                <h4 class="text-white">Bed Available</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="text-white">{{$member}}</h1>
                                <h1 class="font-light text-white"><i class="fas fa-users "></i></h1>
                                <h4 class="text-white">Members</h4>
                            </div>
                        </div>
                    </div>
                    
                </div>
            
            </div>