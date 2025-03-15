@extends('layouts.dashboardmaster')
@section('content')
{{-- form --}}

<div class="row p-4">
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Roll & user ragistration</h4>
                <form action="{{route('management.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    {{-- name --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is_invalid @enderror" id="validationCustom01" placeholder="name" value="" name="name">
                        @error('name')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- email --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is_invalid @enderror" id="validationCustom01" placeholder="Email" value="" name="email">
                        @error('email')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Password</label>
                        <input type="text" class="form-control @error('password') is_invalid @enderror" id="validationCustom01" value="" name="password" placeholder="Password">
                        @error('password')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    {{-- role --}}

                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label">Role</label>

                        <select name="role" class="form-select">
                            <option value="">Select role</option>
                            <option value="manager">Manager</option>
                            <option value="blogger">Blogger</option>
                            <option value="user">User</option>
                        </select>
                        @error('role')
                            <p class="text-danger"> {{$message}} </p>
                        @enderror
                    </div>
                    <button  style="background-color: #2D9596" class="btn btn-primary mt-4 px-5" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
@if (session('register_complete'))

<script>
   Toastify({
  text: "{{session('register_complete')}}",
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
