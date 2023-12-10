<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--   Font Awesome  -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/updata.css">
    {{-- Icon --}}
    <link rel="shortcut icon" href="https://img.icons8.com/bubbles/50/m.png" type="image/x-icon">
    <title>MAG | Update Post</title>
</head>
<body>


    <x-app-layout>

    </x-app-layout>


    <div class="title-card">
        <h2>You Can Update Your Post Now!</h2>
    </div>


        <div class="card container" id="card">
            <div class="name-flex">
                <span class="title">Update Post</span>
                <div class="user-info">
                    <div class="user-pic">
                        <svg fill="none" viewBox="0 0 24 24" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linejoin="round" fill="#707277" stroke-linecap="round" stroke-width="2" stroke="#707277" d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z"></path>
                            <path stroke-width="2" fill="#707277" stroke="#707277" d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z"></path>
                        </svg>
                    </div>
                    <p class="title">{{ Auth::user()->name }}</p>
                </div>
            </div>

            <form action="{{url('confirm-post', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-box">
                    <div class="box-container">

                        <div class="dis-flex">
                            {{-- <label for="">Description</label> --}}
                            <label class="text-sm text-gray-400 font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Description :</label>
                            <input class="dis" name="description" value="{{$data->description}}" >
                        </div>

                        {{-- <hr> --}}


                        <div class="grid w-full max-w-xs items-center gap-1.5 mt-3">
                            <label class="text-sm text-gray-400 font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Picture :</label>
                            <img class="m-auto" src="/posts/{{$data->image}}" alt="" width="200" height="200">
                            <input id="picture" name="image" type="file" class="mt-3 flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium">
                        </div>
                        <div>
                            <div class="formatting flex justify-content-center align-items-center">
                                <button type="submit" class="send" title="Send">Update &nbsp; <i class="fa-solid fa-pen-nib"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form class="p-3" action="{{url('view-post')}}" method="get">
                @csrf

                <div class="btn btn-info flex justify-content-center align-items-center">
                    <input type="submit" value="View Your Posts "> &nbsp; <i class="fa-solid fa-paste"></i>
                </div>

            </form>
        </div>




</body>
</html>



