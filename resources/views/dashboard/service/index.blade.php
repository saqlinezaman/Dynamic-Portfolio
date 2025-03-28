@extends('layouts.dashboardmaster')
@section('content')
<div class="row p-2">
    <div class="col-sm-4 col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table align-middle mb-0 bg-white " >
                    <thead class="bg-light text-center">
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @forelse ($services as $service)
                        <tr>
                          {{-- title and slug --}}
                          <td>
                            <p class="fw-normal mb-1 fw-bold"> {{$service->title}} </p>
                          </td>
                          {{-- description --}}
                          <td>
                            <p class="fw-normal mb-1 fw-bold"> {{$service->description}} </p>
                          </td>

                          <td>
                            <form id="halamadrid{{ $service->id }}" action="{{ route('service.status',$service->id) }}" method="POST">
                                @csrf
                            <div class="form-check form-switch">
                                <input onchange="document.querySelector('#halamadrid{{ $service->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $service->status == 'active' ? 'checked' : '' }}>
                              </div>
                            </form>
                          </td>
                          {{-- edit --}}
                          <td>
                            <a href="{{route('service.edit',$service->id)}}"  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-pen-to-square text-info"></i>
                            </a>
                            <a href="{{route('service.delete',$service->id)}}"  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </a>
                            </td>
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
                <div class="pt-5 d-flex justify-content-center">
                    {{$services->links()}}
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@if (session('service_create_success'))

<script>
   Toastify({
  text: "{{session('service_create_success')}}",
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
