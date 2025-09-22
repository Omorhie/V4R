<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/icon.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <style>
      /* === semua CSS sama persis dari file anda === */
      html,body{margin:0;height:100%;font-family:"Poppins",Arial,sans-serif;}
      body{background:url({{ asset('assets/bg-signup.jpeg') }}) no-repeat center/cover;display:flex;align-items:center;justify-content:center;}
      .form-wrapper{display:flex;width:80%;max-width:900px;border-radius:12px;overflow:hidden;}
      .form-logo{flex:1;display:flex;align-items:center;justify-content:center;padding:20px;}
      .form-logo img{max-width:300px;}
      .form-container{flex:1;display:flex;flex-direction:column;justify-content:center;padding:20px;}
      .signin-link{margin-bottom:20px;}
      .signin-link a{color:#fff;text-decoration:none;font-size:14px;}
      form{display:flex;flex-direction:column;gap:20px;}
      .input-group{position:relative;width:100%;}
      .input-group input,.btn{width:100%;padding:18px 15px;font-size:16px;border-radius:5px;outline:none;transition:all .3s ease;box-sizing:border-box;}
      .input-group input{border:2px solid transparent;background-color:#34a2aa;color:#fff;}
      .input-group label{position:absolute;left:15px;top:50%;transform:translateY(-50%);font-size:16px;color:#22777e;pointer-events:none;transition:.3s ease;}
      .input-group input:focus+label,.input-group input:not(:placeholder-shown)+label{top:-8px;left:12px;font-size:12px;color:#22777e;padding:0 4px;border-radius:3px;}
      .input-group input:focus{border:2px solid #22777e;}
      .btn{position:relative;overflow:hidden;border:2px solid #2bb3ad;border-radius:8px 8px 30px 30px;font-weight:bold;background-color:#fff;color:#2bb3ad;cursor:pointer;z-index:1;transition:color .3s,border-color .3s;}
      .btn::before{content:"";position:absolute;top:0;right:0;width:0%;height:100%;background-color:#34a2aa;z-index:-1;transition:width .4s ease;}
      .btn:hover::before{width:100%;left:0;right:auto;}
      .btn:hover{color:#fff;border-color:#22777e;}
      #toast{position:fixed;top:-80px;left:50%;transform:translateX(-50%);padding:16px 24px;border-radius:8px;color:#fff;font-weight:400;font-family:"Poppins",sans-serif;box-shadow:0 2px 8px rgba(0,0,0,.3);display:flex;align-items:center;gap:10px;font-size:16px;z-index:9999;transition:top .5s ease;}
      #toast.success{background-color:#31ce56ff;}
      #toast.error{background-color:#dc3545;}
      #toast.show{top:20px;}
      #toast svg{width:20px;height:20px;}
    </style>
  </head>
  <body>
    <div class="form-wrapper">
      <div class="form-logo">
        <img src="{{ asset('assets/logo.png') }}" alt="Logo" />
      </div>
      <div class="form-container">
        <div class="signin-link">
          <a href="{{ route('login') }}">sign in</a>
        </div>
        <form action="{{ route('signup') }}" method="post">
          @csrf
          <div class="input-group">
            <input type="email" name="email" id="email" placeholder=" " value="{{ old('email') }}" required />
            <label for="email">e-mail</label>
          </div>
          <div class="input-group">
            <input type="text" name="username" id="username" placeholder=" " value="{{ old('username') }}" required />
            <label for="username">username</label>
          </div>
          <div class="input-group">
            <input type="password" name="password" id="password" placeholder=" " required />
            <label for="password">password</label>
          </div>
          <button type="submit" class="btn">sign up</button>
        </form>
      </div>
    </div>

    {{-- TOAST --}}
    @if(!empty($message))
    <div id="toast" class="{{ $status }}">
      @if($status=="success")
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
        </svg>
      @else
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
        </svg>
      @endif
      {{ $message }}
    </div>
    @endif

    <script>
      window.addEventListener("load", function () {
        const toast = document.getElementById("toast");
        if (toast) {
          setTimeout(() => toast.classList.add("show"), 100);
          setTimeout(() => { toast.classList.remove("show"); }, 3000);

          if (toast.classList.contains("success")) {
            setTimeout(() => (window.location.href = "{{ route('login') }}"), 3000);
          }
        }
      });
    </script>
  </body>
</html>
