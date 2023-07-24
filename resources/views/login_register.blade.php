<!doctype html>
<html lang="en">

<head>
    <title>login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <video id="video-background" autoplay loop muted>

        <source src="img/hutaoo.mp4" type="video/mp4">
        Maaf, browser Anda tidak mendukung pemutaran video.
    </video>
    <div class="section">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        @if (session('success'))
                            <div class="alert alert-info alert-dismissible fade show w-50 position-fixed top-10 start-50 translate-middle"
                                role="alert" style="z-index: 9999;">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->has('password'))
                            <div class="alert alert-danger alert-dismissible fade show w-50 position-fixed top-10 start-50 translate-middle"
                                role="alert" style="z-index: 9999;">
                                {{ $errors->first('password') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <h6 class="mb-0 pb-3"><span>Login </span><span>register</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="pb-3">Login</h4>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="email" class="form-style" placeholder="Email"
                                                        name="email" required>
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" class="form-style" placeholder="Password"
                                                        name="password" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4">Login</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-3 pb-3">register</h4>
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input id="name" type="text" class="form-style"
                                                        placeholder="Full Name" name="name" required autofocus>
                                                    <i class="input-icon uil uil-user mt-4"></i>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label for="email">Email</label>
                                                    <input id="email" type="email" class="form-style"
                                                        placeholder="Email" name="email" required>
                                                    <i class="input-icon uil uil-at mt-4"></i>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="password" class="form-style"
                                                        placeholder="Password" name="password" required>
                                                    <i class="input-icon uil uil-lock-alt mt-4"></i>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label for="password_confirmation">Konfirmasi Password</label>
                                                    <input id="password_confirmation" type="password" class="form-style"
                                                        placeholder="Konfirmasi Password" name="password_confirmation"
                                                        required>
                                                    <i class="input-icon uil uil-lock-alt mt-4"></i>
                                                </div>

                                                <button type="submit" class="btn mt-4">Register</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var video = document.getElementById("video-background");
        video.play();
    </script>
</body>

</html>
