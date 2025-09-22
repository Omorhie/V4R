{{-- resources/views/dashboard.blade.php --}}
@php
    $username = session('username'); // ambil dari Session Laravel
@endphp

<head>
  <meta charset="UTF-8">
  <title>v4r</title>
  <!-- Tambahkan ini -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f9f9;
      margin: 0;
    }

    h3 {
      color: #3BA3A2;
      font-size: 22px;
      font-weight: 600;
      margin: 20px auto 10px;
      max-width: 1350px;
      width: 100%;
    }

    .card-container {
      display: flex;
      gap: 34px;
      flex-wrap: wrap;
      justify-content: center;
      max-width: 1350px;
      margin: 0 auto;
    }

    .card {
      width: 427px;
      height: 180px;
      border-radius: 12px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: 600;
      font-size: 20px;
      color: white;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: transform 0.2s;
      background-size: cover;
      background-position: center;
      text-align: center;
    }

    .card span {
      position: relative;
      z-index: 1;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .logo-carousel {
      overflow: hidden;
      white-space: nowrap;
      box-sizing: border-box;
      padding: 20px 0;
    }

    .logo-carousel .logos {
      display: inline-block;
      padding-left: 100%;
      animation: slide 25s linear infinite;
    }

    .logo-carousel img {
      height: 60px;
      margin: 0 40px;
      vertical-align: middle;
    }

    .colab {
      color: #A1A1A1;
      font-size: 20px;
      font-weight: 600;
      margin: 20px auto 10px;
      max-width: 1350px;
      width: 100%;
      text-align: center;
      padding-top: 5%;
      padding-bottom: 5%;
    }

    @keyframes slide {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-100%); }
    }

    .hero-card {
      width: 600px;
      height: 285px;
      margin: 40px auto 10px;
      border-radius: 8px;
      background:  url('{{ asset('assets/dashboard/edu.jpg') }}') center/cover no-repeat;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      text-align: center;
    }

    .hero-card h2 {
      font-size: 40px;
      font-weight: 700;
      margin: 0;
    }

    .hero-footer {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 15px;
      margin-bottom: 40px;
    }

    .hero-footer span {
      font-size: 50px;
      font-weight: 700;
      color: #44B5BD;
    }

    .hero-footer button {
      background: #44B5BD;
      font-size: 19px;
      width: 210px;
      height: 50px;
      border: none;
      padding: 8px 18px;
      border-radius: 8px;
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
      font-family: 'Poppins', sans-serif;
    }

    .hero-footer button:hover {
      background: #2d7f7f;
    }

    footer {
      background-color: #36B0B7;
      color: white;
      padding: 20px 60px;
      font-family: 'Poppins', sans-serif;
    }

    .footer-container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      max-width: 1350px;
      margin: 0 auto;
      flex-wrap: wrap;
      gap: 10px;
    }

    .footer-logo img {
      width: 259px;
      margin-bottom: 8px;
    }

    .footer-column {
      display: flex;
      flex-direction: column;
      font-size: 16px;
    }

    .footer-column h4 {
      font-weight: 600;
      margin-bottom: 10px;
      font-size: 18px;
    }

    .footer-column a {
      color: white;
      text-decoration: none;
      margin: 3px 0;
      font-weight: 400;
      transition: 0.3s;
    }

    .footer-column a:hover {
      text-decoration: underline;
    }

    .footer-column strong {
      margin-top: 10px;
      font-weight: 600;
    }

    .store-icons {
      display: flex;
      gap: 10px;
      margin-top: 8px;
    }

    .store-icons img {
      width: 50px;
      height: auto;
      cursor: pointer;
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


  <!-- SUBJECT -->
  <h3>SUBJECT</h3>
  <div class="card-container">
    <a href="{{ url('mapel/subject/mtk') }}"><div class="card" style="background-image: url('{{ asset('assets/dashboard/matematika.png') }}');"></div></a>
    <a href="{{ url('mapel/subject/ipa') }}"><div class="card" style="background-image: url('{{ asset('assets/dashboard/ipa.png') }}');"></div></a>
    <a href="{{ url('mapel/subject/ips') }}"><div class="card" style="background-image: url('{{ asset('assets/dashboard/ips.png') }}');"></div></a>
  </div>

  <!-- LEARNING PROGRAM -->
  <h3>LEARNING PROGRAM</h3>
  <div class="card-container">
    <a href="{{ url('mapel/lp/pwpb') }}"><div class="card" style="background-image: url('{{ asset('assets/dashboard/pwpb.png') }}');"></div></a>
    <a href="{{ url('mapel/lp/pkwu') }}"><div class="card" style="background-image: url('{{ asset('assets/dashboard/pkwu.png') }}');"></div></a>
    <a href="{{ url('mapel/lp/pg') }}"><div class="card" style="background-image: url('{{ asset('assets/dashboard/pengembangan-gim.png') }}');"></div></a>
  </div>

  <!-- SPECIAL CLASS -->
  <h3>SPECIAL CLASS</h3>
  <div class="card-container">
    <a href="{{ url('mapel/sc/mtk-peminatan') }}"><div class="card" style="background-image: url('{{ asset('assets/dashboard/matematika-peminatan.png') }}');"></div></a>
    <a href="{{ url('mapel/sc/penalaran-umum') }}"><div class="card" style="background-image: url('{{ asset('assets/dashboard/penalaran-umum.png') }}');"></div></a>
    <a href="{{ url('mapel/sc/persiapan-utbk') }}"><div class="card" style="background-image: url('{{ asset('assets/dashboard/persiapan-utbk.png') }}');"></div></a>
  </div>

  <!-- KOLABORASI -->
  <h3 class="colab">In Collaboration With</h3>
  <div class="logo-carousel">
    <div class="logos">
      <img src="{{ asset('assets/dashboard/cn.png') }}" alt="Logo 1">
      <img src="{{ asset('assets/dashboard/ganesha.png') }}" alt="Logo 2">
      <img src="{{ asset('assets/dashboard/bjb.png') }}" alt="Logo 3">
      <img src="{{ asset('assets/dashboard/kumon.png') }}" alt="Logo 4">
      <img src="{{ asset('assets/dashboard/pnj.png') }}" alt="Logo 5">
    </div>
  </div>

  <!-- HERO CARD -->
  <div class="hero-card"></div>

  <div class="hero-footer">
    <span>TAKE A CLASS</span>
    <button>order now</button>
  </div>

  <!-- FOOTER -->
  <footer>
    <div class="footer-container">
      <div class="footer-logo">
        <img src="{{ asset('assets/logo.png') }}" alt="V4R Logo">
      </div>
      <div class="footer-column">
        <h4>Product V4R</h4>
        <a href="#">reading room</a>
        <a href="#">event</a>
        <a href="#">special class</a>
        <a href="#">learning program</a>
        <strong>Try for Free</strong>
        <div class="store-icons">
          <img src="{{ asset('assets/dashboard/playstore.png') }}" alt="Google Play">
          <img src="{{ asset('assets/dashboard/applestore.png') }}" alt="App Store">
        </div>
      </div>
      <div class="footer-column">
        <h4>Help and Guidance</h4>
        <a href="#">Complaints Service</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">Privacy Policy</a>
        <a href="#">About Us</a>
        <a href="#">Help?</a>
      </div>
      <div class="footer-column">
        <h4>Contact Us</h4>
        <p>✉ <a href="mailto:v4r_education@gmail.com">v4r_education@gmail.com</a></p>
        <p>☎ 0895619008678</p>
      </div>
    </div>
  </footer>

