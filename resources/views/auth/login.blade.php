<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PaceX | Admin Sign In</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <style>
        * { box-sizing: border-box; }
        html, body {
            margin: 0;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
        body {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: #000;
            overflow: hidden;
        }
        /* giant faint X brand mark */
        body::before {
            content: "X";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 90vh;
            line-height: 1;
            font-weight: 800;
            font-style: italic;
            color: rgba(255, 255, 255, 0.035);
            pointer-events: none;
            z-index: 0;
        }

        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 400px;
            padding: 44px 34px 38px;
            background: rgba(20, 20, 20, 0.72);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 18px;
            -webkit-backdrop-filter: blur(16px);
            backdrop-filter: blur(16px);
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.55);
        }

        .brand {
            text-align: center;
            margin-bottom: 6px;
            font-size: 34px;
            font-weight: 800;
            letter-spacing: 6px;
            text-transform: uppercase;
            color: #fff;
        }
        .brand b { font-style: italic; }
        .brand-sub {
            text-align: center;
            margin: 0 0 30px;
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.45);
        }

        .field { position: relative; margin-bottom: 18px; }
        .field input {
            width: 100%;
            height: 54px;
            padding: 0 46px 0 18px;
            color: #fff;
            font-size: 15px;
            letter-spacing: 0.5px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 10px;
            outline: none;
            transition: border-color 0.25s, background-color 0.25s;
        }
        .field input::placeholder { color: rgba(255, 255, 255, 0.45); }
        .field input:focus {
            border-color: #fff;
            background: rgba(255, 255, 255, 0.09);
        }
        .field .field-icon {
            position: absolute;
            top: 50%;
            right: 16px;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
            font-size: 16px;
        }
        .field.has-error input { border-color: #ff5b5b; }

        .err { margin: 6px 2px 0; font-size: 12px; color: #ff7b7b; }

        .row-between {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 6px 2px 24px;
        }
        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            cursor: pointer;
            user-select: none;
        }
        .remember input { width: 16px; height: 16px; accent-color: #fff; cursor: pointer; }

        .btn-signin {
            width: 100%;
            height: 54px;
            border: 1px solid #fff;
            border-radius: 10px;
            background: #fff;
            color: #000;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.25s, color 0.25s;
        }
        .btn-signin:hover {
            background: transparent;
            color: #fff;
        }

        .back-home {
            display: block;
            margin-top: 22px;
            text-align: center;
            color: rgba(255, 255, 255, 0.45);
            font-size: 12px;
            letter-spacing: 1px;
            text-decoration: none;
            transition: color 0.25s;
        }
        .back-home:hover { color: #fff; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand">Pace<b>X</b></div>
        <p class="brand-sub">Admin Panel</p>

        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="field @error('email') has-error @enderror">
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" autofocus />
                <i class="fa fa-envelope field-icon"></i>
            </div>
            @error('email')
                <p class="err">{{ $message }}</p>
            @enderror

            <div class="field @error('password') has-error @enderror" style="margin-top:18px;">
                <input type="password" name="password" placeholder="Password" />
                <i class="fa fa-lock field-icon"></i>
            </div>
            @error('password')
                <p class="err">{{ $message }}</p>
            @enderror

            @error('failed')
                <p class="err">{{ $message }}</p>
            @enderror

            <div class="row-between">
                <label class="remember">
                    <input name="remember" type="checkbox"> Remember me
                </label>
            </div>

            <button type="submit" class="btn-signin">Sign In</button>
        </form>

        <a href="{{ route('home') }}" class="back-home"><i class="fa fa-arrow-left"></i> &nbsp;Back to store</a>
    </div>
</body>
</html>
