@extends('layouts.dashboardmaster')
@section('content')

<div class="row p-2">
    <div class="col-sm-4 col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table align-middle mb-0 bg-white " >
                    <thead class="bg-light text-center">
                      <tr class="">
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @forelse ($portfolios as $portfolio)
                        <tr>
                            {{-- image --}}
                          <td>
                            <div class="d-flex align-items-center">
                              <img
                                  src="{{ asset('uploads/portfolio/') }}/{{$portfolio->thumbnail}}"
                                  alt=""
                                  style="width: 45px; height: 45px"
                                  class="rounded-circle"
                                  />
                            </div>
                          </td>
                          {{-- title and slug --}}
                          <td>
                            <p class="fw-normal mb-1 fw-bold"> {{$portfolio->title}} </p>
                          </td>


                          <td>
                            <form id="halamadrid{{ $portfolio->id }}" action="{{ route('category.status',$portfolio->id) }}" method="POST">
                                @csrf
                            <div class="form-check form-switch d-flex justify-content-center">
                                <input onchange="document.querySelector('#halamadrid{{ $portfolio->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $portfolio->status == 'active' ? 'checked' : '' }}>
                              </div>
                            </form>
                          </td>
                          {{-- edit --}}
                          <td>
                            <a href="{{route('portfolio.delete',$portfolio->id)}}"  type="button" class="btn btn-link btn-sm btn-rounded">
                                <i class="fa-solid fa-trash-can text-danger"></i>
                            </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="4">
                                You don't create any Portfolio
                            </td>
                        </tr>
                      @endforelse
                    </tbody>
                </table>
                <div class="pt-5 d-flex justify-content-center">
                    {{$portfolios->links()}}
                  </div>
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
