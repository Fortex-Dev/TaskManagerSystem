@extends('admin.layouts.app')
@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Task Detuiles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('tasks.index')}}">Go Back</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Task Info</h5>

            
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Status</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td class="title-cell">{{$task -> title}}</td>
                    <td class="description-cell">{{$task-> description}}</td>
                    <td>@switch($task->priority)
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
                    <td>@switch($task->status)
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
                    <td>{{$task -> due_date}}</td>
                    <td>{{$task -> created_at}}</td>
                    <td>
                    <a href="{{route('task.edit',$task->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('task.destroy',$task->id)}}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <form action="{{route('task.complete',$task->id)}}" method="POST" style="display:inline;">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure the Task is complete?')">Complete</button>
                    </form>
                  </tr>

                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
    </section>

  </main><!-- End #main -->
@endsection