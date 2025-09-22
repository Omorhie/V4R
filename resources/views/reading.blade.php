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
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: #fdfdfd;
  }

  .cards-section {
    padding: 20px;
  }

  .cards-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-bottom: 20px;
    justify-content: center;
  }

  .card {
    width: 216px;
    height: 370px;
    background: #44B5BD;
    border-radius: 12px;
    padding: 16px;
    text-align: center;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
  }

  .card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2), 0 0 15px rgba(0, 151, 167, 0.5);
  }

  .card h3 {
    font-size: 14px;
    margin-bottom: 12px;
    font-weight: bold;
    line-height: 1.4;
  }

  .card img {
    width: 200px;
    height: 180px;
    object-fit: contain;
    background: white;
    border-radius: 8px;
    padding: 8px;
    margin: 0 auto;
    display: block;
    transition: transform 0.3s ease;
  }

  .card:hover img {
    transform: rotate(2deg) scale(1.05);
  }

  /* ===== Footer ===== */
  .article-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 auto;
    width: 100%;
    max-width: 1360px; /* lebar sesuai navbar */
    gap: 20px;
  }

  .more-article {
    background: #44B5BD;
    color: white;
    border-radius: 8px;
    font-weight: bold;
    display: flex;
    flex-direction: column;
    justify-content: center;
    flex: 1;
    min-width: 280px;
    height: 125px; /* sama dengan button */
    padding-left: 30px;
    transition: background 0.3s ease;
  }

  .more-article:hover {
    background: #3d9fa7ff
  }

  .more-article span {
    font-size: 28px;
  }

  .more-article small {
    font-size: 12px;
    opacity: 0.9;
  }

  .next-btn {
    background: #44B5BD;
    color: white;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    width: 260px;
    height: 125px; /* tinggi disamakan */
    border: none;
    font-size: 28px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .next-btn:hover {
    background: #3d9fa7ff;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 6px 15px rgba(0,0,0,0.2), 0 0 10px rgba(0, 151, 167, 0.5);
  }

  .next-btn span {
    pointer-events: none;
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

    .nav-links a.active {
      font-weight: bold;
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
          <a href="{{ url('/teacher') }}">teacher data</a>
          <a href="{{ route('logout') }}">Log Out</a>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- ====== CARD SECTION ====== -->
  <section class="cards-section">
    <div class="cards-container">
      <div class="card">
        <h3>FUN LEARNING</h3>
        <img src="{{ asset('assets/reading/r1.png') }}" alt="Fun Learning">
      </div>
      <div class="card">
        <h3>PARADIGM:<br>"STUDENTS ARE ACTIVE, TEACHER IS A FACILITATOR"</h3>
        <img src="{{ asset('assets/reading/r2.png') }}" alt="Paradigm">
      </div>
      <div class="card">
        <h3>TEACHER AS FACILITATOR (INFREE LEARNING CONCEPT)</h3>
        <img src="{{ asset('assets/reading/r3.png') }}" alt="Teacher Facilitator">
      </div>
      <div class="card">
        <h3>EDUCATIONAL PUZZLE MEDIA (PUZZLES AS LEARNING MEDIA)</h3>
        <img src="{{ asset('assets/reading/r4.png') }}" alt="Puzzle Learning">
      </div>
      <div class="card">
        <h3>ENTHUSIASTIC STUDENTS GIVE POSITIVE RESPONSES</h3>
        <img src="{{ asset('assets/reading/r5.png') }}" alt="Positive Responses">
      </div>
    </div>

    <!-- ====== FOOTER NAVIGATION ====== -->
    <div class="article-footer">
      <div class="more-article">
        <span>MORE ABOUT THE ARTICLE</span>
        <small>Only Member</small>
      </div>
      <button class="next-btn">
        <span>Next 🔍</span>
      </button>      
    </div>
  </section>
