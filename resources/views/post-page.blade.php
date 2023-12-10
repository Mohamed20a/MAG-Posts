<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--   Font Awesome  -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/post.css">
    {{-- Icon --}}
    <link rel="shortcut icon" href="https://img.icons8.com/bubbles/50/m.png" type="image/x-icon">
    <title>MAG | Posts</title>
</head>
<body>

    <x-app-layout>

    </x-app-layout>


    <div class="title-card">
        <h2>All My Posts</h2>
    </div>



    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Time</th>
                <th scope="col">Updata</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>

        @foreach ($post as $post)
            <tbody>
                <tr>
                    <th scope="row">{{$post->description}}</th>

                    <td><img height="200" width="200" src="posts/{{$post->image}}" alt="" srcset=""></td>

                    <th scope="row">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</th>

                    <td>
                        {{--<button class="btn btn-success"> --}}
                        <a href="{{url('update-post' , $post->id)}}">
                            <button class="noselect" id="update">
                                <span class="text">
                                    Update
                                </span>
                                <span class="icon">
                                    <i class="fa-solid fa-pen-nib" style="color: #fff;"></i>
                                </span>
                            </button>
                        </a>
                        {{-- </button> --}}
                    </td>

                    <td>
                        {{-- <button class="btn btn-danger"> --}}
                        <a onclick="return confirm('Are you sure you want to delete this post ?')" href="{{url('delete-post', $post->id)}}">
                            <button class="noselect" id="delete">
                                <span class="text">
                                    Delete
                                </span>
                                <span class="icon">
                                    <i class="fa-solid fa-x" style="color: #fff;"></i>
                                </span>
                            </button>
                        {{-- </button> --}}
                        </a>
                    </td>

                </tr>
            </tbody>
        @endforeach
    </table>



</body>
</html>



