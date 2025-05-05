
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body class="watermark-container-dls-app-train">
    <div class="half">
        <div class="bg-left"></div>
        <div class="content">
            <div class="login-form">
                <form action="#">
                    @csrf
                    {{-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>{{trans('admin.error_login')}}</strong>
                        </div>
                    @endif --}}

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="input-group">
                            <input type="username" name="npp" id="npp-show" class="form-control" placeholder="NPP">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <img src="{{ asset('newlogin/ic_npp.svg') }}" alt="NPP Icon">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <img src="{{ asset('newlogin/ic_password.svg') }}" alt="Password Icon">
                                </span>
                            </div>
                        </div>
                        <div class="form-check" style="margin-top: 10px;">
                            <input class="form-check-input" type="checkbox" id="showPasswordCheckbox">
                            <label class="form-check-label" for="showPasswordCheckbox">
                                Show Password
                            </label>
                        </div>
                    </div>

                    <button type="button" id="btn-submit-form" class="btn btn-block btn-custom-primary"  style="color:white;background: #F5540D;border:solid #F5540D">LOGIN</button>
                </form>

            </div>
        </div>
        <div class="bg-right"></div>
    </div>

    <form method="POST" action="{{ route('auth.login') }}" id="form-login">
        @csrf
        <input type="hidden" id="npp" name="email" class="form-control" placeholder="{{trans('admin.npp')}}" value="{{ old('npp') }}">
        <input id="password-send" type="hidden" name="password" class="form-control" placeholder="{{trans('admin.password')}}" autocomplete="off">

    </form>
    <div id="error-message" style="display: none">@if(Session::has('err_message')){{Session::get('err_message')}}@endif
    </div>
    </body>
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('newlogin/js/popper.min.js')}}"></script>
    <script src="{{ asset('newlogin/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('newlogin/js/main.js')}}"></script>
    <script src="{{ asset('js/passwordToggle.js')}}"></script>

    <script type="text/javascript" src="{{ asset('plugin/js/plugins/loaders/blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin//js/plugins/notifications/noty.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/js/plugins/ui/ripple.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/js/plugins/notifications/pnotify.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/cryptojs-aes.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cryptojs-aes-format.js') }}"></script>
    </body>
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
</html>
