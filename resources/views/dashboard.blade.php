<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--   Font Awesome  -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
    {{-- CSS File --}}
    <link rel="stylesheet" href="css/post.css">
    {{-- Icon --}}
    <link rel="shortcut icon" href="https://img.icons8.com/bubbles/50/m.png" type="image/x-icon">
    <title>MAG | Dashboard</title>
</head>
<body>

    <x-app-layout>

    </x-app-layout>


    <div class="title-card">
        <h2>What are you thinking today, <span class="username">{{ Auth::user()->name }}</span>?</h2>
        <h4>You can share a new post with friends</h4>
    </div>

        <div class="card">
            <div class="name-flex">
                <span class="title">Add Post</span>
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

            <form action="{{url('upload-post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-box">
                    <div class="box-container">
                        <textarea name="description" placeholder="what are you thinking about?" required></textarea>
                        <div class="image-input">

                            <div class="grid w-full max-w-xs items-center gap-1.5">
                                <label class="text-sm text-gray-400 font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Picture</label>
                                <input id="picture" name="image" type="file" class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium" required>
                            </div>

                        </div>
                        <div>
                            <div class="formatting">
                                <button type="button" class="button">
                                    <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M5 6C5 4.58579 5 3.87868 5.43934 3.43934C5.87868 3 6.58579 3 8 3H12.5789C15.0206 3 17 5.01472 17 7.5C17 9.98528 15.0206 12 12.5789 12H5V6Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M12.4286 12H13.6667C16.0599 12 18 14.0147 18 16.5C18 18.9853 16.0599 21 13.6667 21H8C6.58579 21 5.87868 21 5.43934 20.5607C5 20.1213 5 19.4142 5 18V12"></path>
                                    </svg>
                                </button>
                                <button type="button" class="button">
                                    <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M12 4H19"></path>
                                        <path stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M8 20L16 4"></path>
                                        <path stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M5 20H12"></path>
                                    </svg>
                                </button>
                                <button type="button" class="button">
                                    <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M5.5 3V11.5C5.5 15.0899 8.41015 18 12 18C15.5899 18 18.5 15.0899 18.5 11.5V3"></path>
                                        <path stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M3 21H21"></path>
                                    </svg>
                                </button>
                                <button type="button" class="button">
                                    <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M4 12H20"></path>
                                        <path stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M17.5 7.66667C17.5 5.08934 15.0376 3 12 3C8.96243 3 6.5 5.08934 6.5 7.66667C6.5 8.15279 6.55336 8.59783 6.6668 9M6 16.3333C6 18.9107 8.68629 21 12 21C15.3137 21 18 19.6667 18 16.3333C18 13.9404 16.9693 12.5782 14.9079 12"></path>
                                    </svg>
                                </button>
                                <button type="button" class="button">
                                    <svg fill="none" viewBox="0 0 24 24" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <circle stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" r="10" cy="12" cx="12"></circle>
                                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" stroke="#707277" d="M8 15C8.91212 16.2144 10.3643 17 12 17C13.6357 17 15.0879 16.2144 16 15"></path>
                                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="3" stroke="#707277" d="M8.00897 9L8 9M16 9L15.991 9"></path>
                                    </svg>
                                </button>
                                <button type="submit" class="send" title="Send">
                                    <span>Post</span> &nbsp; <i id="share" class="fa-solid fa-paper-plane"></i>
                                </button>
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



