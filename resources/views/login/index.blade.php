<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="{{ asset('mdrsh.png') }}" rel="shortcut icon">

    <title>SIAKAD | Login</title>
</head>

<body background=" {{ asset('AdminLTE-3.2.0/images/bg.jpg') }}">
    <div class="row justify-content-center" style="margin-top: 80px">
        <div class="col-lg-4">
            <main class="form-registration">
                <center>
                <img src="{{ asset('mdrsh.png') }}" alt="madarasah" height="200" width="200" style="margin-bottom: 20px">
                </center>
                <h1 class="h3 mb-2 fw-bold text-center">Sistem Informasi Akademik</h1>
                <h3 class="h3 mb-3 fw-normal text-center">MTs Al - Islahiyah Bobosan</h3>
                <h2 class="h3 mb-3 text-center">Kediri</h2>

                <form action="/login" method="POST">
                    @csrf
                    @if (Session::has('status'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control " name="email" id="email" required
                            value="{{ old('email') }}" placeholder="Email..">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-bottom" name="password" id="password"
                            required placeholder="Password..">
                        <label for="password">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
                </form>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
