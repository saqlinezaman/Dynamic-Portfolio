@extends('layouts.dashboardmaster')
@section('content')

{{-- form --}}
<div class="row">
    <div class="row p-4 d-flex justify-content-center">
        <div class="col-lg-8 ">
            <div class="card  p-5">
                <div class="card-body">
                    <h4 class="header-title">Exist role management</h4>
                    <form action="{{route('management.role.assign')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
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
                        {{-- role  users  --}}
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">Manage users</label>
                            <select name="user_id" class="form-select">
                                <option value="">Select role</option>
                                @foreach ($rodrigo as $users)
                                    <option value=" {{$users->id}} "> {{$users->name}}</option>
                                @endforeach
                                @foreach ($bloggers as $blogger)
                                    <option value=" {{$blogger->id}} "> {{$blogger->name}}</option>
                                @endforeach

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

{{-- tables --}}
<div class="row p-4">
    {{-- table 1 --}}
    <div class="col-sm-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-4 text-success bg-dark px-full py-2 rounded-2 text-center">Bloggers role table</h4>
                <table class="table align-middle mb-0 bg-white item-center " >
                    <thead class="bg-light ">
                      <tr>
                        <th>Name</th>
                        <th>Role</th>
                        @if (Auth::user()->role == 'admin')
                        <th>Status</th>
                        <th>Actions</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody class=" items-center">
                      @forelse ($bloggers as $blogger)
                        <tr>
                          {{-- image --}}
                          <td>
                            <div class="d-flex align-items-center">
                             {{$blogger->name}}
                            </div>
                          </td>
                          <td>
                              <p class="fw-normal mb-1 fw-bold"> {{$blogger->role}} </p>
                            </td>
                            @if (Auth::user()->role == 'admin')

                            <td>

                                <form id="madrid{{ $blogger->id }}" action="{{route('management.role.blogger.down' , $blogger->id)}}" method="POST">
                                @csrf
                            <div class="form-check form-switch">

                                <input onchange="document.querySelector('#madrid{{ $blogger->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $blogger->role == $blogger->role ? 'checked' : '' }}>
                              </div>
                            </form>
                          </td>
                          <td>
                            <a href=""  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-pen-to-square text-info"></i>
                            </a>
                            <a href=""  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </a>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="4">
                                You don't create any category
                            </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    {{-- table 2 --}}
    <div class="col-sm-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-4 text-success bg-dark px-full py-2 rounded-2 text-center">Users role table</h4>
                <table class="table align-middle mb-0 bg-white item-center " >
                    <thead class="bg-light ">
                      <tr>
                        <th>Name</th>
                        <th>Role</th>
                        @if (Auth::user()->role == 'admin')
                        <th>Status</th>
                        <th>Actions</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody class=" items-center">
                      @forelse ($rodrigo as $users)
                        <tr>
                          {{-- image --}}
                          <td>
                            <div class="d-flex align-items-center">
                             {{$users->name}}
                            </div>
                          </td>
                          <td>
                              <p class="fw-normal mb-1 fw-bold"> {{$users->role}} </p>
                            </td>
                            @if (Auth::user()->role == 'admin')

                            <td>

                                <form id="madrid{{ $users->id }}" action="{{route('management.role.user.down' , $users->id)}}" method="POST">
                                @csrf
                            <div class="form-check form-switch">

                                <input onchange="document.querySelector('#madrid{{ $users->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $users->role == $users->role ? 'checked' : '' }}>
                              </div>
                            </form>
                          </td>
                          <td>
                            <a href=""  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-pen-to-square text-info"></i>
                            </a>
                            <a href=""  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </a>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="4">
                                You don't create any category
                            </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

@if (session('role_assign'))

<script>
   Toastify({
  text: "{{session('role_assign')}}",
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

@if (session('role_blogger_down'))

<script>
   Toastify({
  text: "{{session('role_blogger_down')}}",
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
