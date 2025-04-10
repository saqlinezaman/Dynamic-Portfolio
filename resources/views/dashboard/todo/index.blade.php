@extends('layouts.dashboardmaster')
@section('content')

<div class="row p-4">
    <div class="col-lg-3 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Insert Your Tusk</h4>
                <form action="{{route('todo.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    {{-- name --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Tusk Name</label>
                        <input type="text" class="form-control @error('title') is_invalid @enderror" id="validationCustom01" placeholder="title" value="" name="title">
                        @error('title')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Date</label>
                        <input type="date" class="form-control @error('date') is_invalid @enderror" id="validationCustom01" placeholder="date" value="" name="date">
                        @error('date')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Start Time</label>
                        <input type="time" class="form-control @error('start_time') is_invalid @enderror" id="validationCustom01" placeholder="start time" value="" name="start_time">
                        @error('start_time')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- end Time --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Start Time</label>
                        <input type="time" class="form-control @error('end_time') is_invalid @enderror" id="validationCustom01" placeholder="end time" value="" name="end_time">
                        @error('end_time')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <button  style="background-color: #2D9596" class="btn btn-primary mt-4 px-5" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
{{-- table --}}

<div class="col-sm-4 col-lg-9">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-4 text-success bg-dark px-full py-2 rounded-2 text-center">Your To Do List</h4>
            <table class="table align-middle mb-0 bg-white item-center " >
                <thead class="bg-light ">
                  <tr>
                    <th>Title of Tusk</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th class="text-center">Mark As Complete</th>
                  </tr>
                </thead>
                <tbody class=" items-center">
                  @forelse ($todos as $todo)
                    <tr>

                      <td>
                        <div class="d-flex align-items-center">
                         {{$todo->title}}
                        </div>
                        </td>
                      <td>
                        <div class="d-flex align-items-center">
                         {{$todo->date}}
                        </div>
                        </td>

                      <td>
                        <div class="d-flex align-items-center">
                         {{$todo->start_time}}
                        </div>
                        </td>
                      <td>
                        <div class="d-flex align-items-center">
                         {{$todo->end_time}}
                        </div>
                        </td>
                      <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('todo.delete',$todo->id)}}"  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i style="font-size: 20px" class=" text-danger fa-regular fa-circle-check"></i>
                            </a>
                        </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-danger text-center" colspan="4">
                            You don't create any tusk
                        </td>
                    </tr>
                     {{-- pagination --}}
                     @endforelse
                    </tbody>
                </table>
                <div class="pt-5 d-flex justify-content-center">
                    {{$todos->links()}}
                  </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@if (session('success'))

<script>
   Toastify({
  text: "{{session('success')}}",
  duration: 4000,
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  },
  onClick: function(){} // Callback after click
}).showToast();
</script>
@endif

@endsection
