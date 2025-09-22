<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/icon.png') }}">
  <style>
    /* CSS sama dengan kode asli Anda */
    body {
      margin:0; padding:0;
      font-family: Arial, sans-serif;
      display:flex;
      height:100vh;
      align-items:center;
      justify-content:center;
      background:url({{ asset('assets/bg-signin.jpeg') }});
      background-size:cover;
    }
    .container { display:flex; width:80%; max-width:900px; }
    .logo { flex:1; display:flex; align-items:center; justify-content:center; }
    .form-container { flex:1; display:flex; flex-direction:column; justify-content:center; padding:20px; }
    .signup-link { width:100%; text-align:right; margin-bottom:20px; }
    .signup-link a { color:#fff; text-decoration:none; font-size:14px; }
    form { display:flex; flex-direction:column; gap:20px; width:100%; }
    .input-group { position:relative; width:100%; }
    .input-group input, .btn {
      width:100%; padding:18px 15px; font-size:16px; border-radius:5px;
      outline:none; transition: all 0.3s ease; box-sizing:border-box;
    }
    .input-group input {
      border:2px solid transparent; background-color:#34a2aa; color:#fff;
    }
    .input-group label {
      position:absolute; left:15px; top:50%; transform:translateY(-50%);
      font-size:16px; color:#22777e; pointer-events:none; transition:0.3s ease;
    }
    .input-group input:focus + label,
    .input-group input:not(:placeholder-shown) + label {
      top:-8px; left:12px; font-size:12px; color:#22777e; padding:0 4px;
    }
    .input-group input:focus { border:2px solid #22777e; }
    .btn {
      position:relative; overflow:hidden; border:2px solid #2bb3ad;
      border-radius:8px 8px 30px 30px; font-weight:bold; background-color:#fff;
      color:#2bb3ad; cursor:pointer; z-index:1; transition: color 0.3s ease, border-color 0.3s ease;
    }
    .btn::before {
      content:""; position:absolute; top:0; right:0; width:0%; height:100%;
      background-color:#34a2aa; z-index:-1; transition: width 0.4s ease;
    }
    .btn:hover::before { width:100%; left:0; right:auto; }
    .btn:hover { color:#fff; border-color:#22777e; }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-container">
      @if(session('error'))
        <div style="color:red;">{{ session('error') }}</div>
      @endif
      @if(session('success'))
        <div style="color:green;">{{ session('success') }}</div>
      @endif

      <div class="signup-link">
        <a href="{{ route('signup') }}">sign up</a> <!-- nanti diganti route signup -->
      </div>

      <form action="{{ route('login.post') }}" method="post">
        @csrf
        <div class="input-group">
          <input type="text" name="username" id="username" placeholder=" " required>
          <label for="username">username</label>
        </div>
        <div class="input-group">
          <input type="password" name="password" id="password" placeholder=" " required>
          <label for="password">password</label>
        </div>
        <button type="submit" class="btn">sign in</button>
      </form>
    </div>

    <div class="logo">
      <img src="{{ asset('assets/logo.png') }}" alt="Logo" width="400">
    </div>
  </div>
</body>
</html>
