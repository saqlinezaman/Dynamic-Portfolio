<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- fab icon --}}
    <link rel="shortcut icon" href="{{asset('dashboard')}}/assets/images/fab-image.webp">
    <link rel="stylesheet" href="{{asset('website/asset')}}//css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('website/asset')}}//css/style.css">
    <link rel="stylesheet" href="{{asset('website/asset')}}//css/plugins/font-awesome.min.css">
    <title>Saqline Zaman | Blog</title>
</head>
<body class="bg-black">

    <div  class="row p-4 d-flex justify-content-center " >
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-body  d-flex justify-content-center">
                    <img style="width: 100%;" class="pb-5" src="{{asset('uploads/blog')}}/{{$blog->thumbnail}}" alt="">
                </div>
                {{-- title --}}
                <div class="my-5 p-4">
                    <h1 style="color: black; font-size: 40px; " class=" text-center">{{$blog->title}}</h1>
                </div>
                {{-- desveiption --}}
                <div class=" text-white p-4 mb-4" style="background-color: rgb(122, 122, 122)">
                    <p style="font-size: 30px" class="text bg-center">{!!$blog->description!!}</p>
                </div>
                <div class="mt-3 mb-5 px-4 ">
                    <a style="font-weight: bold; background-color:#FF4646; border-radius: 5px; "  class=" px-5 py-3 text-white" href="{{route('home')}}">Back</i></a>
                </div>

            </div>
        </div>
    </div>

</body>
</html>





