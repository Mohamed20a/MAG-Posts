<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MAG | Home</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


        {{-- Icon --}}
        <link rel="shortcut icon" href="https://img.icons8.com/bubbles/50/m.png" type="image/x-icon">


        <!--   Font Awesome  -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        {{-- Bootstarp --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="css/style.css">

        {{-- <link rel="stylesheet" href="post.css"> --}}

    </head>


    {{--
        Hello all,
        This is a Laravel project that simulates publishing posts, updating them, and deleting them.
        Each user has a page for publishing the post, another page for displaying all his posts, and a page for updating and deleting.
        There is a home page to display all posts and an account of when the post was published for all users
        Each user has the right to delete only his own post from the main page and not the posts of other users
        Visual mockery was used in the design and Facebook posts were simulated in terms of interaction and comment buttons
        Laravel Jetstream was used to build login and data logging

        Languages used: Html, CSS, Js, Bootstrap, Laravel, MySQL
    --}}


    <body class="antialiased">
        <nav class="navbar fixed-top  navbar-expand-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  " id="navbar">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">
                    <img src="build/assets/logoo.png" alt="Logo" width="170" >
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navTogller" aria-controls="navTogller" aria-expanded="false" aria-label="Toggle navigation">
                    <input id="checkbox" type="checkbox">
                    <label class="toggle" for="checkbox">
                        <div id="bar1" class="bars"></div>
                        <div id="bar2" class="bars"></div>
                        <div id="bar3" class="bars"></div>
                    </label>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navTogller">
                    <div class="navbar-nav">
                        {{-- <a class="nav-link active" aria-current="page" href="#">Home</a> --}}

                        @if (Route::has('login'))
                            @auth
                                <a class="nav-link"  href="{{ url('/dashboard') }}">
                                    <button class="button" style="--clr: #0c7d81;">
                                        <span class="button-decor"></span>
                                        <div class="button-content">
                                            <div class="button__icon">
                                                <i id="icon" class="fa-solid fa-user"></i>
                                            </div>
                                            <span class="button__text">{{ Auth::user()->name }}</span>
                                        </div>
                                    </button>
                                </a>
                        @else
                                <a class="nav-link"  href="{{ route('login') }}">
                                    <button class="button" style="--clr: #0b5dcf;">
                                        <span class="button-decor"></span>
                                        <div class="button-content">
                                            <div class="button__icon">
                                                <img width="25" height="25" src="https://img.icons8.com/ios-filled/50/FFFFFF/login-rounded-right.png" alt="login-rounded-right"/>
                                            </div>
                                            <span class="button__text">Login</span>
                                        </div>
                                    </button>
                                </a>

                                <a class="nav-link" href="{{ route('register') }}">
                                    <button class="button" style="--clr: #00ad54;">
                                        <span class="button-decor"></span>
                                        <div class="button-content">
                                            <div class="button__icon">
                                                <img width="25" height="25" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/add-user-male.png" alt="add-user-male"/>
                                            </div>
                                            <span class="button__text">Register</span>
                                        </div>
                                    </button>
                                </a>

                                {{-- <a class="nav-link" id="login" href="{{ route('login') }}">Login</a>
                                <a class="nav-link" id="reg" href="{{ route('register') }}">Register</a> --}}
                            @endauth

                        @endif

                    </div>
                </div>
            </div>
        </nav>


        @if (Route::has('login'))
            @auth
                <div class="title">
                    <h2 class="intro">Welcome &nbsp; Back &nbsp; <p class="username">{{ Auth::user()->name }}</p></h2>
                    <h4>All posts you can see</h4>
                </div>
        @else
                <div class="title">
                    <h2 class="intro">Welcome &nbsp; Back!</h2>
                    <h4>All posts you can see</h4>
                </div>
            @endauth
        @endif


        @foreach ($post as $post)

            <div class="content">
                <div class="title-bar">
                    {{-- UserName Section --}}
                    <div class="name-flex">
                        <div class="user-pic">
                            <svg fill="none" viewBox="0 0 24 24" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linejoin="round" fill="#707277" stroke-linecap="round" stroke-width="2" stroke="#707277" d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z"></path>
                                <path stroke-width="2" fill="#707277" stroke="#707277" d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z"></path>
                            </svg>
                        </div>
                        <div class="pic-name">
                            <span class="title">{{$post->username}}</span> <br>
                            <span class="time">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                        </div>
                    </div>
                    {{-- Dropdown Section --}}
                    <div class="icon-back">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <svg color="gray" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M16 12a2 2 0 0 1 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2m-6 0a2 2 0 0 1 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2m-6 0a2 2 0 0 1 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2Z" />
                                </svg>
                            </a>
                            <ul class="dropdown-menu">
                                @if (Route::has('login'))
                                    @auth
                                        @if ($post->id == Auth::user()->id)
                                            <li><a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this post ?')" href="{{ url('delete-post', $post->id) }}"><i class="fa-solid fa-square-xmark"></i> &nbsp; Delete</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-bookmark"></i> &nbsp; Save Post</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-bell"></i> &nbsp; Turn on notifications</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-rectangle-xmark"></i> &nbsp; Hide post</a></li>
                                @else
                                        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-bookmark"></i> &nbsp; Save Post</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-bell"></i> &nbsp; Turn on notifications</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-rectangle-xmark"></i> &nbsp; Hide post</a></li>
                                    @endauth
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <h4>{{$post->username}}</h4> --}}
                <p>{{$post->description}}</p>
                <img class="img" src="posts/{{$post->image}}" alt="" >

                {{-- React Section --}}
                <div class="react">
                    <i id="like-react" class="fa-solid fa-thumbs-up"></i>
                    <p>Mohamed and Omar</p>
                </div>

                <hr>

                {{-- Bottom Icon Section --}}
                <div class="bottom-icon">
                    <div class="make-horizontal">
                        <label class="container">
                            <input type="checkbox">
                            <div class="checkmark">
                                <svg class="icon" color="#6E757D" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M237 77.47A28 28 0 0 0 216 68h-52V56a44.05 44.05 0 0 0-44-44a12 12 0 0 0-10.73 6.63L72.58 92H32a20 20 0 0 0-20 20v88a20 20 0 0 0 20 20h172a28 28 0 0 0 27.78-24.53l12-96a28 28 0 0 0-6.78-22ZM36 116h32v80H36Zm184-19.5l-12 96a4 4 0 0 1-4 3.5H92v-89.17l34.82-69.63A20 20 0 0 1 140 56v24a12 12 0 0 0 12 12h64a4 4 0 0 1 4 4.5Z" />
                                </svg>
                                <p>Like</p>
                            </div>
                        </label>
                    </div>
                    <div class="make-horizontal">
                        <svg color="#6E757D" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16">
                            <path fill="currentColor" d="M1 2.75C1 1.784 1.784 1 2.75 1h10.5c.966 0 1.75.784 1.75 1.75v7.5A1.75 1.75 0 0 1 13.25 12H9.06l-2.573 2.573A1.458 1.458 0 0 1 4 13.543V12H2.75A1.75 1.75 0 0 1 1 10.25Zm1.75-.25a.25.25 0 0 0-.25.25v7.5c0 .138.112.25.25.25h2a.75.75 0 0 1 .75.75v2.19l2.72-2.72a.749.749 0 0 1 .53-.22h4.5a.25.25 0 0 0 .25-.25v-7.5a.25.25 0 0 0-.25-.25Z" />
                        </svg>
                        <p>Comment</p>
                    </div>
                    <div class="make-horizontal">
                        <svg color="#6E757D" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 48 48">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="m26 4l18 18l-18 17V28C12 28 6 43 6 43c0-17 5-28 20-28V4Z" />
                        </svg>
                        <p>Share</p>
                    </div>
                </div>

                <hr>

                {{-- Comment Section --}}
                <div class="comment-sec">
                    <img src="build/assets/me.jpg" alt="">
                    <div class="input-div">
                        <input type="text" placeholder="Write a comment...">
                        <div class="comment-flex">
                            <div>
                                <svg color="gray" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 18q2.075 0 3.538-1.462Q17 15.075 17 13q0-2.075-1.462-3.538Q14.075 8 12 8Q9.925 8 8.463 9.462Q7 10.925 7 13q0 2.075 1.463 3.538Q9.925 18 12 18Zm0-2q-1.25 0-2.125-.875T9 13q0-1.25.875-2.125T12 10q1.25 0 2.125.875T15 13q0 1.25-.875 2.125T12 16Zm6-6q.425 0 .712-.288Q19 9.425 19 9t-.288-.713Q18.425 8 18 8t-.712.287Q17 8.575 17 9t.288.712Q17.575 10 18 10ZM4 21q-.825 0-1.412-.587Q2 19.825 2 19V7q0-.825.588-1.412Q3.175 5 4 5h3.15L8.7 3.325q.15-.15.337-.238Q9.225 3 9.425 3h5.15q.2 0 .388.087q.187.088.337.238L16.85 5H20q.825 0 1.413.588Q22 6.175 22 7v12q0 .825-.587 1.413Q20.825 21 20 21Zm16-2V7h-4.05l-1.825-2h-4.25L8.05 7H4v12Zm-8-6Z" />
                                </svg>
                                <svg color="gray" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <g fill="currentColor">
                                        <path fill-rule="evenodd" d="M12 2.75a9.25 9.25 0 1 0 0 18.5a9.25 9.25 0 0 0 0-18.5ZM1.25 12C1.25 6.063 6.063 1.25 12 1.25S22.75 6.063 22.75 12S17.937 22.75 12 22.75S1.25 17.937 1.25 12Zm7.147 3.553a.75.75 0 0 1 1.05-.155c.728.54 1.607.852 2.553.852s1.825-.313 2.553-.852a.75.75 0 1 1 .894 1.204A5.766 5.766 0 0 1 12 17.75a5.766 5.766 0 0 1-3.447-1.148a.75.75 0 0 1-.156-1.049Z" clip-rule="evenodd" />
                                        <path d="M16 10.5c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5s.448-1.5 1-1.5s1 .672 1 1.5Zm-6 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S8.448 9 9 9s1 .672 1 1.5Z" />
                                    </g>
                                </svg>
                                <svg color="gray" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21H5Zm0-2h14V5H5v14ZM5 5v14V5Zm3.5 9h1q.425 0 .713-.288T10.5 13v-.5q0-.2-.15-.35T10 12q-.2 0-.35.15t-.15.35v.5h-1v-2H10q.2 0 .35-.15t.15-.35q0-.2-.15-.35T10 10H8.5q-.425 0-.713.288T7.5 11v2q0 .425.288.713T8.5 14Zm3.5 0q.2 0 .35-.15t.15-.35v-3q0-.2-.15-.35T12 10q-.2 0-.35.15t-.15.35v3q0 .2.15.35T12 14Zm2 0q.2 0 .35-.15t.15-.35v-1h1q.2 0 .35-.15T16 12q0-.2-.15-.35t-.35-.15h-1V11H16q.2 0 .35-.15t.15-.35q0-.2-.15-.35T16 10h-2q-.2 0-.35.15t-.15.35v3q0 .2.15.35T14 14Z" />
                                </svg>
                                <svg color="gray" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17.75 3A3.25 3.25 0 0 1 21 6.25v6.879a2.25 2.25 0 0 1-.659 1.59l-5.621 5.622a2.25 2.25 0 0 1-1.591.659H6.25A3.25 3.25 0 0 1 3 17.75V6.25A3.25 3.25 0 0 1 6.25 3h11.5Zm0 1.5H6.25A1.75 1.75 0 0 0 4.5 6.25v11.5c0 .966.784 1.75 1.75 1.75H13v-3.064a6.657 6.657 0 0 1-.673.066L12 16.51a6.334 6.334 0 0 1-3.678-1.14a.75.75 0 1 1 .854-1.234c.844.584 1.78.874 2.824.874c.462 0 .903-.057 1.324-.171a3.247 3.247 0 0 1 2.713-1.832L16.25 13h3.25V6.25a1.75 1.75 0 0 0-1.75-1.75Zm.689 10h-2.188a1.75 1.75 0 0 0-1.744 1.607l-.006.143l-.001 2.189l3.939-3.939ZM9 7.751a1.25 1.25 0 1 1 0 2.499a1.25 1.25 0 0 1 0-2.5Zm6 0a1.25 1.25 0 1 1 0 2.499a1.25 1.25 0 0 1 0-2.499Z" />
                                </svg>
                            </div>
                            <div><i id="share" class="fa-solid fa-paper-plane"></i></div>
                        </div>
                    </div>

                </div>
            </div>

        @endforeach



        {{-- <footer class="bg-body-tertiary text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2020 Copyright:
                <a class="text-body" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer> --}}


        <!-- Bootstrap css -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>

    </body>
</html>



        {{-- <nav class="">
            @if (Route::has('login'))
                <ul class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        </li>
                    @else

                        <li>
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        </li>

                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            </li>
                            @endif
                    @endauth
                </ul>
            @endif

            <div>
                Home Page
            </div>

        </nav> --}}
