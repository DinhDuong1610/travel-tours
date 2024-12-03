<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        function validateForm(event) {
            var password = document.getElementById("passw").value;
            var againpass = document.getElementById("againpass").value;
            var errorpass = document.getElementById("passagain");
            var errorphone = document.getElementById('errorphone');
            var userphone = document.getElementById('userphone').value;
            let i = 0;
            if (isNaN(userphone)) {
                errorphone.style.display = "block";
                event.preventDefault();
                i++;
            }

            if (password !== againpass) {
                errorpass.style.display = "block";
                // Chặn sự kiện mặc định của form (sự kiện submit)
                event.preventDefault();
                i++;
            }
            if (i > 0) {
                return false;
            }
            return true;
        }
    </script>
    <title>login</title>
</head>

<body>
    <div class="sigin" id="sigin" style="z-index: 999;">
        <div class="img-close" id="closeBtn"><a href="#"><img src="img/close.png" alt=""></a></div>
        <div class="form-sigin sign-up">
            <form method="post" action="{{ route('register') }}" onsubmit="return validateForm(event)">
                @csrf
                <h2>Tạo tài khoản</h2>
                <div class="col-sm-12">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Tên người dùng">

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-sm-12">
                  <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Số điện thoại">

                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    <span style="text-align: left; color: red; display: none;" id="errorphone">* You must fill number
                    </span>
                </div>
                <div class="col-sm-12">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-sm-12">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mật khẩu">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-sm-12">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Nhập lại mật khẩu">
                    <span style="text-align: left; color: red; display: none;" id="passagain">* Passwords do not
                        match</span>
                </div>
                <button type="submit" name="register">Đăng ký</button>
            </form>
        </div>
        <div class="form-sigin sign-in">
            <form method="post" action="{{ route('login') }}">
                @csrf
                <h1>Đăng nhập</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Mật khẩu">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <a href="#">Quên mật khẩu?</a>
                <button type="submit" name="login" class="btn btn-primary" id="sigin-index">Đăng nhập</button>
            </form>
        </div>
        <div class="convert-sigin">
            <div class="convert">
                <div class="convert-panel convert-left">
                    <img class="animate-movingXY" src="{{ asset('images/img2.png') }}" alt=""
                        style="height: 300px; width: 300px;">
                    <button class="hiddenSig" id="login">Đăng nhập</button>
                </div>
                <div class="convert-panel convert-right">
                    <img class="animate-movingXY" src="{{ asset('images/img3.png') }}" alt=""
                        style="height: 300px; width: 300px;">
                    <button class="hiddenSig" id="register">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
    <div class="background" id="background"><img src="{{ asset('images/img1.jpg') }}" alt="">
    <script src="{{ asset('script.js') }}"></script>
</body>

</html>
