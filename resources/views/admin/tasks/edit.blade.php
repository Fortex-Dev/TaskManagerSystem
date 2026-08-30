@extends('admin.layouts.app')
@section('content')
<main id="main" class="main">
<h1>Edit Task</h1>

<form action="{{ route('task.update',$task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Task Name</label>
                  <div class="col-sm-10">
    <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title',$task->title) }}">
                  </div>
                </div>
    @error('title')
        <div>{{ $message }}</div>
    @enderror
    <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Descriptions</label>
                  <div class="col-sm-10">
    <textarea name="description" id="" class="form-control" style="height: 100px"; placeholder="Description">{{ old('description',$task->description) }}</textarea>
                    
                  </div>
                </div>
    @error('description')
        <div>{{ $message }}</div>
    @enderror
    <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Task Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="status">
                      <option selected>Open this select menu</option>
                      <option value="pending" {{ old('status',$task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="in_progress" {{ old('status',$task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
        <option value="completed" {{ old('status',$task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Task Priority</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="priority" aria-label="Default select example">
                      <option selected>Open this select menu</option>
        <option value="low" {{ old('priority',$task->priority) == 'low' ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ old('priority',$task->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="hight" {{ old('priority',$task->priority) == 'hight' ? 'selected' : '' }}>Hight</option>
                    </select>
                  </div>
                </div>

    <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="due_date" value={{ old('due_date',$task->due_date) }}>
                  </div>
                </div>
    <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit That Task</button>
                  </div>
                </div>
</form>
</main>
@endsection