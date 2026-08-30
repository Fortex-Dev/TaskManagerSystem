@extends('admin.layouts.app')
@section('content')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row g-3 align-items-stretch">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row g-3 align-items-stretch">

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card h-100">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total Tasks</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgba(4, 4, 4, 0.259);">
                      <i class="bi bi-card-list" style="color: rgba(4, 4, 4, 0.775);"></i>
                    </div>
                    <div class="ps-3">
                      <h6 style="color: rgba(4, 4, 4, 0.775);">{{$totalTasks}}</h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card h-100">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Completed Taskse</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-checklist"></i>
                    </div>
                    <div class="ps-3">
                      <h6 style="color: rgba(0, 255, 94, 0.858);">{{$completedTasks}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card h-100">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">In Progress tasks</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bar-chart-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$inProgressTasks}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


            <!-- Customers Card -->
            <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card h-100">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pending Tasks</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$pendingTasks}}</h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

          </div>
        </div>
      </div>
      </section>
      <hr>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Recent Tasks</h5>

             
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    
                    <th scope="col">Task</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Status</th>
                    <th scope="col">Due Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($recentTasks as $recentTask)
                    <tr>
                    <td><a style="color: blue" href={{route('task.show',$recentTask->id)}}>{{ \Illuminate\Support\Str::limit($recentTask -> title, 15)}}</a></td>
                    
                    <td>@switch($recentTask->status)
                      @case('pending')
                        <span class="badge bg-warning">Pending</span>
                        @break
                      @case('in_progress')
                        <span class="badge bg-info">In Progress</span>
                        @break
                      @case('completed')
                        <span class="badge bg-success">Completed</span>
                        @break
                      @default
                        <span class="badge bg-secondary">Unknown</span>
                    @endswitch</td>
                    <td>@switch($recentTask->priority)
                      @case('low')
                        <span class="badge bg-secondary">Low</span>
                        @break
                      @case('medium')
                        <span class="badge bg-warning">Medium</span>
                        @break
                      @case('hight')
                        <span class="badge bg-danger">High</span>
                        @break
                      @default
                        <span class="badge bg-secondary">Unknown</span>
                    @endswitch</td>
                    <td>{{$recentTask -> due_date}}</td>

                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
    </section>
        </main>
@endsection