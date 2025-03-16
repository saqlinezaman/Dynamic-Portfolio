@extends('layouts.dashboardmaster')
@section('content')

{{-- form --}}
<div class="row">
    <div class="row p-4 d-flex justify-content-center">
        <div class="col-lg-8 ">
            <div class="card  p-5">
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

{{-- tables --}}
<div class="row p-4">
    {{-- table 1 --}}
    <div class="col-sm-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-4 text-success bg-dark px-full py-2 rounded-2 text-center">Manaers role table</h4>
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
                      @forelse ($managers as $manager)
                        <tr>
                          {{-- image --}}
                          <td>
                            <div class="d-flex align-items-center">
                             {{$manager->name}}
                            </div>
                          </td>
                          <td>
                              <p class="fw-normal mb-1 fw-bold"> {{$manager->role}} </p>
                            </td>
                            @if (Auth::user()->role == 'admin')

                            <td>

                                <form id="madrid{{ $manager->id }}" action="{{route('management.down' , $manager->id)}}" method="POST">
                                @csrf
                            <div class="form-check form-switch">

                                <input onchange="document.querySelector('#madrid{{ $manager->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $manager->role == $manager->role ? 'checked' : '' }}>
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
                <h4 class="mb-4 text-success bg-dark px-full py-2 rounded-2 text-center">Manaers role table</h4>
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
                      @forelse ($managers as $manager)
                        <tr>
                          {{-- image --}}
                          <td>
                            <div class="d-flex align-items-center">
                             {{$manager->name}}
                            </div>
                          </td>
                          <td>
                              <p class="fw-normal mb-1 fw-bold"> {{$manager->role}} </p>
                            </td>
                            @if (Auth::user()->role == 'admin')

                            <td>

                                <form id="madrid{{ $manager->id }}" action="{{route('management.down' , $manager->id)}}" method="POST">
                                @csrf
                            <div class="form-check form-switch">

                                <input onchange="document.querySelector('#madrid{{ $manager->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $manager->role == $manager->role ? 'checked' : '' }}>
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
