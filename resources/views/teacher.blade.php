@php
    $username = session('username'); // ambil dari Session Laravel
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Pengajar</title>
  <!-- Tambah Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      font-weight: 200;
      background-color: #fff;
      margin: 0;
      padding: 0;
    }

    .container {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 30px;
      padding: 50px 120px;
      box-sizing: border-box;
    }

    h1 {
      font-size: 4rem;
      font-weight: 700;
      margin: 0;
    }
    .highlight {
      color: #00a6a6;
    }

    /* Grid Cards */
    .teacher-cards {
      display: grid;
      grid-template-columns: repeat(3, 1fr); /* 3 kolom */
      gap: 20px;
      margin-top: 30px;
      max-width: 700px;
    }

    .teacher-card {
      width: 200px;
      border-radius: 15px;
      overflow: hidden;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      background: #fff;
    }

    .teacher-card:hover {
      transform: translateY(-10px) scale(1.05);
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .teacher-card img {
      width: 100%;
      height: 250px;
      object-fit: cover;
    }

    .teacher-name {
      font-weight: 600;
      text-align: center;
      margin: 10px 0;
      padding: 5px;
    }

    /* Foto besar kanan */
    .right {
      flex: 1;
      display: flex;
      justify-content: flex-start;
    }

    .big-photo {
      position: fixed;
      bottom: 0;
      right: 120px;
      max-width: 400px;
      height: auto;
    }

    /* Modal Styling */
    .modal {
      display: none; 
      position: fixed; 
      z-index: 1000; 
      left: 0;
      top: 0;
      width: 100%; 
      height: 100%; 
      background-color: rgba(0,0,0,0.5); 
      justify-content: center; 
      align-items: center;
    }

    .modal-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      max-width: 500px;
      text-align: center;
      animation: fadeIn 0.3s ease;
    }

    .modal-content h2 {
      margin-top: 15px;
      font-weight: 600;
    }

    .modal-content img {
      width: 100%;
      max-height: 250px;
      object-fit: cover;
      border-radius: 10px;
    }

    .modal-content p {
      margin-top: 10px;
      line-height: 1.6;
    }

    .close-btn {
      color: #aaa;
      float: right;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
    }

    .close-btn:hover {
      color: #000;
    }

    @keyframes fadeIn {
      from { transform: translateY(-20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
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

<div class="container">
  <!-- Bagian Kiri -->
  <div class="left">
    <h1>
      Find the <span class="highlight">Right <br>Teacher</span> for you
    </h1>

    <div class="teacher-cards">
      <!-- Card 1 -->
      <div class="teacher-card" onclick="openModal('teacher1')">
        <img src="assets/teacher/guru2.png" alt="Subject Teacher">
        <p class="teacher-name">Subject Teacher</p>
      </div>

      <!-- Card 2 -->
      <div class="teacher-card" onclick="openModal('teacher2')">
        <img src="assets/teacher/guru3.png" alt="Learning Program Teacher">
        <p class="teacher-name">Learning Program Teacher</p>
      </div>

      <!-- Card 3 -->
      <div class="teacher-card" onclick="openModal('teacher3')">
        <img src="assets/teacher/guru4.png" alt="Special Class Teacher">
        <p class="teacher-name">Special Class Teacher</p>
      </div>

      <!-- Card 4 -->
      <div class="teacher-card" onclick="openModal('teacher4')">
        <img src="assets/teacher/blankcard.png" alt="Teacher 4">
        <p class="teacher-name"></p>
      </div>

      <!-- Card 5 -->
      <div class="teacher-card" onclick="openModal('teacher5')">
        <img src="assets/teacher/blankcard.png" alt="Teacher 5">
        <p class="teacher-name"></p>
      </div>

      <!-- Card 6 -->
      <div class="teacher-card" onclick="openModal('teacher6')">
        <img src="assets/teacher/blankcard.png" alt="Teacher 6">
        <p class="teacher-name"></p>
      </div>

      <!-- Card 7 -->
      <div class="teacher-card" onclick="openModal('teacher7')">
        <img src="assets/teacher/blankcard.png" alt="Teacher 7">
        <p class="teacher-name"></p>
      </div>

      <!-- Card 8 -->
      <div class="teacher-card" onclick="openModal('teacher8')">
        <img src="assets/teacher/blankcard.png" alt="Teacher 8">
        <p class="teacher-name"></p>
      </div>

      <!-- Card 9 -->
      <div class="teacher-card" onclick="openModal('teacher9')">
        <img src="assets/teacher/blankcard.png" alt="Teacher 9">
        <p class="teacher-name"></p>
      </div>
    </div>
  </div>

  <!-- Bagian Kanan (Foto besar) -->
  <div class="right">
    <img src="assets/teacher/guru1.png" alt="Big Teacher" class="big-photo">
  </div>
</div>

<!-- ================== MODALS ================== -->
<div id="teacher1" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('teacher1')">&times;</span>
    <img src="assets/teacher/guru2.png" alt="Subject Teacher">
    <h2>Subject Teacher</h2>
    <p>Guru berfokus pada mata pelajaran tertentu untuk membantu siswa memahami topik mendalam.</p>
  </div>
</div>

<div id="teacher2" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('teacher2')">&times;</span>
    <img src="assets/teacher/guru3.png" alt="Learning Program Teacher">
    <h2>Learning Program Teacher</h2>
    <p>Guru yang memandu program belajar khusus sesuai kebutuhan siswa.</p>
  </div>
</div>

<div id="teacher3" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('teacher3')">&times;</span>
    <img src="assets/teacher/guru4.png" alt="Special Class Teacher">
    <h2>Special Class Teacher</h2>
    <p>Guru untuk kelas spesial dengan pendekatan berbeda agar siswa lebih mudah memahami.</p>
  </div>
</div>

<div id="teacher4" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('teacher4')">&times;</span>
    <img src="assets/teacher/blankcard.png" alt="Teacher 4">
    <h2>not yet available</h2>
    <p>guru belum tersedia</p>
  </div>
</div>

<div id="teacher5" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('teacher5')">&times;</span>
    <img src="assets/teacher/blankcard.png" alt="Teacher 5">
    <h2>not yet available</h2>
    <p>guru belum tersedia</p>
  </div>
</div>

<div id="teacher6" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('teacher6')">&times;</span>
    <img src="assets/teacher/blankcard.png" alt="Teacher 6">
    <h2>not yet available</h2>
    <p>guru belum tersedia</p>
  </div>
</div>

<div id="teacher7" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('teacher7')">&times;</span>
    <img src="assets/teacher/blankcard.png" alt="Teacher 7">
    <h2>not yet available</h2>
    <p>guru belum tersedia</p>
  </div>
</div>

<div id="teacher8" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('teacher8')">&times;</span>
    <img src="assets/teacher/blankcard.png" alt="Teacher 8">
    <h2>not yet available</h2>
    <p>guru belum tersedia</p>
  </div>
</div>

<div id="teacher9" class="modal">
  <div class="modal-content">
    <span class="close-btn" onclick="closeModal('teacher9')">&times;</span>
    <img src="assets/teacher/blankcard.png" alt="Teacher 9">
    <h2>not yet available</h2>
    <p>guru belum tersedia</p>
  </div>
</div>

<script>
  function openModal(id) {
    document.getElementById(id).style.display = "flex";
  }

  function closeModal(id) {
    document.getElementById(id).style.display = "none";
  }

  // Tutup modal kalau klik luar area
  window.onclick = function(event) {
    let modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  }
</script>

</body>
</html>
