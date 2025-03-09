    @extends('layouts.dashboardmaster')

    @section('content')
   <div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Welcome Junior Elephant</h4>
                    <p>Name : {{Auth::user()->name}}</p>
                    <p>Email : {{Auth::user()->email}}</p>
                    <hr>
                    <p class="mb-0">"Keep coding, keep learning, and never give up!" 🚀</p>
                </div>

            </div>
        </div>
    </div>
   </div>

    @endsection

