<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="container py-5">
    <div class="row">
        <div class="col-auto m-auto">
            @if ($errors->any())
                <div class="alert alert-danger small">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form method="POST" action="{{ route('feedback.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="message" value="{{ old('message') }}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.google.recaptcha_id') }}"></div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Send">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>