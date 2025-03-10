 @extends('layouts.dashboardmaster')

 @section('content')
 <div class="row p-4">
    {{-- catagory insert table --}}
    <div class="col-sm-4 col-lg-7">
        <div class="card">
            <div class="card-body">
                <table class="table align-middle mb-0 bg-white " >
                    <thead class="bg-light">
                      <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Position</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle"
                                />
                            <div class="ms-3">
                              <p class="fw-bold mb-1">John Doe</p>
                              <p class="text-muted mb-0">john.doe@gmail.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="fw-normal mb-1">Software engineer</p>
                          <p class="text-muted mb-0">IT department</p>
                        </td>
                        <td>
                          <span class="badge badge-success rounded-pill d-inline">Active</span>
                        </td>
                        <td>Senior</td>
                        <td>
                          <button type="button" class="btn btn-link btn-sm btn-rounded">
                            Edit
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                                class="rounded-circle"
                                alt=""
                                style="width: 45px; height: 45px"
                                />
                            <div class="ms-3">
                              <p class="fw-bold mb-1">Alex Ray</p>
                              <p class="text-muted mb-0">alex.ray@gmail.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="fw-normal mb-1">Consultant</p>
                          <p class="text-muted mb-0">Finance</p>
                        </td>
                        <td>
                          <span class="badge badge-primary rounded-pill d-inline"
                                >Onboarding</span
                            >
                        </td>
                        <td>Junior</td>
                        <td>
                          <button
                                  type="button"
                                  class="btn btn-link btn-rounded btn-sm fw-bold"
                                  data-mdb-ripple-color="dark"
                                  >
                            Edit
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img
                                src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                                class="rounded-circle"
                                alt=""
                                style="width: 45px; height: 45px"
                                />
                            <div class="ms-3">
                              <p class="fw-bold mb-1">Kate Hunington</p>
                              <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="fw-normal mb-1">Designer</p>
                          <p class="text-muted mb-0">UI/UX</p>
                        </td>
                        <td>
                          <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                        </td>
                        <td>Senior</td>
                        <td>
                          <button
                                  type="button"
                                  class="btn btn-link btn-rounded btn-sm fw-bold"
                                  data-mdb-ripple-color="dark"
                                  >
                            Edit
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    {{-- catagory form --}}
    <div class="col-lg-5 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Category insert</h4>
                <form action="" method="" enctype="multipart/form-data" role="form">
                    @csrf
                    {{-- titel --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Category title</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Input your category titel " value="" name="title">
                    </div>
                    {{-- slug --}}
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Category slug</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Input your category slug " value="" name="slug">
                    </div>
                    {{-- img --}}
                    <div class="row my-5 justify-content-center align-items-center d-flex">
                        <img id="masudMama" src="{{asset('uploads/default/default.png')}}" alt="" style="width; full" height="400px; object-fit-contain;" class="">
                    </div>
                    <div class="mb-3">
                        <label for="validationCustom01" class="form-label"> Category image</label>
                        <input onchange="document.querySelector('#masudMama').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="validationCustom01" value="" name="image">
                    </div>
                    <button  style="background-color: #2D9596" class="btn btn-primary mt-4" type="submit">insert</button>
                </form>
            </div>
        </div>
    </div>
 </div>
 @endsection
