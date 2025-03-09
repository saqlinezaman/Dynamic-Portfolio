@extends('layouts.dashboardmaster')

@section("content")

{{--Username----------------------------------------------------------}}

<div class="row p-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Name</h4>
                <form action="{{route('profile.username')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> New name</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Input your new name" value="" name="name">
                        @error("name")
                            <p class="text-danger"> {{$message }} </p>
                        @enderror
                        <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- email -------------------------------------------------------}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update email</h4>
                <form action="{{route('profile.email')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> New email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="validationCustom01" placeholder="Input your new email" value="" name="email">
                        @error("email")
                            <p class="text-danger"> {{$message }} </p>
                        @enderror
                        <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--password -----------------------------------------------------}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update password</h4>
                <form action="{{route('profile.password')}}" method="POST">
                    @csrf
                    {{-- current Password --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label" > Current Password</label>
                        <input type="password" class="form-control mb-3 @error('c_passwed') is_invalid @enderror"  id="validationCustom01" placeholder="Input your current Password" value="" name="c_password">
                        @error("c_password")
                            <p class="text-danger"> {{$message }} </p>
                        @enderror
                    </div>
                    {{-- New Passwword --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label" > New Password</label>
                        <input type="password" class="form-control mb-3 @error('password') is_invalid @enderror"  id="validationCustom01" placeholder="Input your new Password" value="" name="password">
                        @error("password")
                            <p class="text-danger"> {{$message }} </p>
                        @enderror
                    </div>
                    {{-- Confirem password --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label" > Confirm Password</label>
                        <input type="password" class="form-control mb-3  id="validationCustom01" placeholder="Confirm new Password" value="" name="password_confirmation">
                    </div>
                    <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
     {{-- Image ------------------------------------------------------}}
     <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Image</h4>
                <form action="{{route('profile.image')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Upload image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="validationCustom01" value="" name="image">
                        @error("image")
                            <p class="text-danger"> {{$message }} </p>
                        @enderror
                        <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- tostify alart -------------------------------------------------------------------------}}

@section("script")

@if (session('name_update'))

<script>
   Toastify({
  text: "{{session('name_update')}}",
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
{{-- email alart --------------------------------------------------------------------------}}

@if (session('email_update'))

<script>
   Toastify({
  text: "{{session('email_update')}}",
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
{{-- password---------------------------------------------------------------------- --}}

@if (session('password_update'))

<script>
   Toastify({
  text: "{{session('password_update')}}",
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
