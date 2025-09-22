@php
    $username = session('username'); // ambil dari Session Laravel
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <title>Subject Matter</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      /* ✨ background gradasi bawah */
      background: linear-gradient(to bottom, #ffffff 75%, #3BA3A2 100%);
      min-height: 100vh;
    }

    .title {
      font-size: 2.8rem;
      font-weight: 800;
      text-align: center;
      margin-bottom: 50px;
    }
    .title span {
      color: #3BA3A2;
    }

    .container {
      display: flex;
      justify-content: center;
      gap: 50px;
      flex-wrap: wrap;
      padding: 0 20px 60px;
    }

    .card {
      width: 300px;
      min-height: 420px;
      border-radius: 14px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      border: 2px solid #e0e0e0;
      overflow: hidden;
      background: #fff;
      display: flex;
      flex-direction: column;
      transition: transform 0.2s, border-color 0.2s;
    }

    .card:hover {
      transform: translateY(-5px);
      border-color: #56C2FF;
    }

    .card-header {
      background-color: #3BA3A2;
      color: white;
      font-weight: 600;
      text-align: center;
      font-size: 1.25rem;
      padding: 18px;
    }

    .card-body {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 30px 20px;
      gap: 35px;
    }

    .card-body a {
      font-weight: 600;
      font-size: 1.15rem;
      text-align: center;
      text-decoration: none;
      color: black;
      padding: 15px;
      border-radius: 8px;
      transition: background-color 0.2s, color 0.2s;
    }

    .card-body a:hover {
      background-color: #f0f8ff;
      color: #3BA3A2;
    }

            /* HEADER ATAS */
    .header {
      width: 1360px;
      margin: 10px auto 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px 20px;
      box-sizing: border-box;
    }

    .header-left {
      font-size: 35px;
      color: #44B5BD;
      font-weight: bold;
      white-space: nowrap;
    }

    .header-right {
      text-align: center;
    }

    .contact-icon {
      width: 30px;
      height: 30px;
      background: white;
      border: solid 3px #44B5BD;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
    }

    .contact-icon i {
      color: red;
      font-size: 18px;
    }

    .header-right a {
      font-style: italic;
      font-weight: bold;
      text-decoration: none;
      font-size: 12px;
      color: #44B5BD;
      display: block;
      margin-top: 5px;
      transition: color 0.3s ease;
    }

    .header-right a:hover {
      color: #44B5BD;
      font-weight: bolder;
    }

    /* NAVBAR */
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #eaeaea;
      width: 1360px;
      height: 54px;
      padding: 0 20px;
      border-radius: 25px;
      margin: 10px auto 20px auto;
      box-sizing: border-box;
    }

    .nav-links {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      flex: 1;
      position: relative;
    }

    .nav-links a {
      text-decoration: none;
      color: gray;
      font-size: 14px;
      padding: 5px 10px;
      transition: color 0.3s ease;
    }

    .nav-links a:hover {
      color: black;
    }

    /* Dropdown dasar */
    .dropdown {
      position: relative;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      padding: 8px 0;
      min-width: 150px;
      z-index: 100;
      opacity: 0;
      transform: translateY(10px);
      transition: all 0.3s ease;
    }

    .dropdown-menu a {
      display: block;
      padding: 6px 15px;
      color: gray;
      font-size: 14px;
      text-decoration: none;
      white-space: nowrap;
      transition: color 0.3s ease, background 0.3s ease;
    }

    .dropdown-menu a:hover {
      background: #f0f0f0;
      color: black;
    }

    .dropdown:hover .dropdown-menu {
      display: block;
      opacity: 1;
      transform: translateY(0);
    }

    /* Sub-dropdown */
    .dropdown-sub {
      position: relative;
    }

    .dropdown-sub-menu {
      display: none;
      position: absolute;
      top: 0;
      left: 100%;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      padding: 8px 0;
      min-width: 160px;
      opacity: 0;
      transform: translateX(10px);
      transition: all 0.3s ease;
    }

    .dropdown-sub:hover .dropdown-sub-menu {
      display: block;
      opacity: 1;
      transform: translateX(0);
    }

    /* Search box */
    .search-box {
      display: flex;
      align-items: center;
      background: white;
      border-radius: 25px;
      padding: 5px 10px;
      margin-left: 20px;
    }

    .search-box input {
      border: none;
      outline: none;
      font-size: 14px;
      padding-left: 5px;
    }

    .search-box i {
      color: gray;
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <div class="header">
    <div class="header-left">
      Hi, <span id="username">{{ $username }}</span> !
    </div>
    <div class="header-right">
      <a href="{{ url('/contact') }}">
        <div class="contact-icon">
          <i class="fas fa-phone"></i>
        </div>
        Contact
      </a>
    </div>
  </div>

   <!-- NAVBAR -->
<div class="navbar">
  <div class="nav-links">
    <a href="{{ url('/reading') }}">reading room</a>
    <a href="{{ route('dashboard') }}" class="active">home page</a>
    <a href="{{ route('events') }}">event</a>

    <div class="dropdown">
      <a href="#">category ▼</a>
      <div class="dropdown-menu">
        <div class="dropdown-sub">
          <a href="{{ url('/materi') }}">Subject Matter</a>
          <a href="{{ url('teacher') }}">teacher data</a>
          <a href="{{ route('logout') }}">Log Out</a>
        </div>
      </div>
    </div>
  </div>
</div>

  <h1 class="title">Subject <span>Matter</span></h1>

  <div class="container">
    
    <!-- Subject -->
    <div class="card">
      <div class="card-header">Subject</div>
      <div class="card-body">
         <a href="{{ url('mapel/subject/mtk') }}">Matematika</a>
         <a href="{{ url('mapel/subject/ipa') }}">Ipa
         <a href="{{ url('mapel/subject/ips') }}">Ips</a>
      </div>
    </div>

    <!-- Learning Program -->
    <div class="card">
      <div class="card-header">Learning Program</div>
      <div class="card-body">
         <a href="{{ url('mapel/lp/pwpb') }}">Pwpb</a>
        <a href="{{ url('mapel/lp/pkwu') }}">Pkwu</a>
        <a href="{{ url('mapel/lp/pg') }}">Pengembangan Gim</a>
      </div>
    </div>

    <!-- Special Class -->
    <div class="card">
      <div class="card-header">Special Class</div>
      <div class="card-body">
        <a href="{{ url('mapel/sc/mtk-peminatan') }}">Matematika Peminatan</a>
        <a href="{{ url('mapel/sc/penalaran-umum') }}">Penalaran Umum</a>
        <a href="{{ url('mapel/sc/persiapan-utbk') }}">Persiapan UTBK</a>

      </div>
    </div>

  </div>

</body>
</html>
