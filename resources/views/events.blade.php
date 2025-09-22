{{-- resources/views/events.blade.php --}}
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
      margin: 0;
      padding: 0;
      background: #fff;
    }
    .container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .event-card {
      display: flex; align-items: flex-start; gap: 20px;
      background: #f2f9f9; padding: 20px; border-radius: 12px; margin-bottom: 20px;
      transition: transform 0.2s ease, box-shadow 0.2s ease; cursor: default;
    }
    .event-card:hover { transform: translateY(-4px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    .event-card img { width: 120px; height: 120px; border-radius: 10px; object-fit: cover; }
    .event-info { flex: 1; }
    .event-info h3 { margin: 0 0 8px; font-size: 1.2rem; font-weight: 600; color: #333; }
    .event-info p { margin: 0; font-size: 0.95rem; color: #444; line-height: 1.5; }
    .see-more { display: inline-block; margin-top: 10px; font-size: 0.9rem; color: #00a6a6;
                font-weight: 600; cursor: pointer; text-decoration: underline; }
    .modal { display: none; position: fixed; z-index: 999; left: 0; top: 0; width: 100%; height: 100%;
             background: rgba(0,0,0,0.5); justify-content: center; align-items: center; padding: 20px; }
    .modal-content { background: #fff; border-radius: 12px; max-width: 900px; width: 100%; display: flex;
                     gap: 20px; padding: 20px; position: relative; animation: fadeIn 0.3s ease; }
    .modal-left { flex: 1; display: flex; justify-content: center; align-items: center; }
    .modal-left img { width: 100%; aspect-ratio: 3 / 4; object-fit: cover; border-radius: 8px; }
    .modal-right { flex: 2; display: flex; flex-direction: column; }
    .modal-right h2 { margin: 0; font-size: 1.4rem; font-weight: 600; color: #00a6a6; }
    .modal-right p { font-size: 1rem; line-height: 1.6; margin-top: 10px; color: #333; }
    .event-time { margin-top: auto; padding: 10px; background: #f2f2f2; border-radius: 8px; font-weight: 600;
                  text-align: center; color: #333; }
    .close-btn { position: absolute; top: 10px; right: 15px; font-size: 24px; font-weight: bold; cursor: pointer; color: #888; }
    .close-btn:hover { color: #000; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }

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

  <div class="container">
    <!-- Event 1 -->
    <div class="event-card">
      <img src="{{ asset('assets/event/tirta.jpeg') }}" alt="Health Seminar">
      <div class="event-info">
        <h3>Hidup Sehat ala Gen Z: Kita Bahas Bareng dr. Tirta!</h3>
        <p>Generasi Z dikenal aktif, penuh energi, dan dekat banget sama teknologi...</p>
        <span class="see-more" onclick="openModal('event1')">see more..</span>
      </div>
    </div>

    <!-- Event 2 -->
    <div class="event-card">
      <img src="{{ asset('assets/event/jerome.jpeg') }}" alt="Programming Competition">
      <div class="event-info">
        <h3>Cara Mudah Memahami Matematika Bersama Jerome Polin</h3>
        <p>Banyak siswa merasa matematika itu sulit, padahal kalau tau triknya, justru bisa jadi pelajaran favorit...</p>
        <span class="see-more" onclick="openModal('event2')">see more..</span>
      </div>
    </div>

    <!-- Event 3 -->
    <div class="event-card">
      <img src="{{ asset('assets/event/indra.jpeg') }}" alt="UTBK Prep">
      <div class="event-info">
        <h3>Komedi Hari Ini! Ada Indra Frimawan~</h3>
        <p>Kalau lagi penat dengan tugas sekolah atau kuliah, nggak ada salahnya rehat sejenak dengan hiburan...</p>
        <span class="see-more" onclick="openModal('event3')">see more..</span>
      </div>
    </div>

    <!-- Event 4 -->
    <div class="event-card">
      <img src="{{ asset('assets/event/fery.jpeg') }}" alt="Student Forum">
      <div class="event-info">
        <h3>Usut Tuntas Siapa Orang di Balik Terlindasnya Affan, ft. Fery Irwandi</h3>
        <p>Belakangan ini forum sempat ramai dengan cerita kocak sekaligus bikin penasaran: Affan katanya terlindas sesuatu...</p>
        <span class="see-more" onclick="openModal('event4')">see more..</span>
      </div>
    </div>
  </div>

  <!-- ================== MODALS (copy dari versi PHP kamu) ================== -->
  <div id="event1" class="modal">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal('event1')">&times;</span>
      <div class="modal-left">
        <img src="{{ asset('assets/event/tirta2.jpeg') }}" alt="Health Seminar">
      </div>
      <div class="modal-right">
        <h2>Hidup Sehat ala Gen Z: Kita Bahas Bareng dr. Tirta!</h2>
        <p>Generasi Z dikenal aktif, penuh energi, dan dekat banget sama teknologi...</p>
        <div class="event-time">Event dimulai: 10 Oktober 2025</div>
      </div>
    </div>
  </div>

  <!-- event2, event3, event4 -> tinggal copy paste -->
  
  <script>
    function openModal(id) { document.getElementById(id).style.display = "flex"; }
    function closeModal(id) { document.getElementById(id).style.display = "none"; }
    window.onclick = function(event) {
      let modals = document.querySelectorAll('.modal');
      modals.forEach(modal => {
        if (event.target === modal) { modal.style.display = "none"; }
      });
    }
  </script>
