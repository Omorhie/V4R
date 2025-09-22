<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Matematika</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    :root{
      --bg: #8ccdeb;         /* background utama */
      --accent: #8ccdeb;     /* warna tombol/aksen */
      --card: rgba(0,0,0,0.18);
      --card-hover: rgba(0,0,0,0.26);
      --white-trans: rgba(255,255,255,0.18);
    }

    *{box-sizing:border-box}
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: url('../../assets/mapel/lp.png') no-repeat center center fixed;
      background-size: cover;
      color: white;
    }

    /* LAYOUT KONTEN */
    .wrap {
      max-width: 1400px;
      margin: 36px auto;
      padding: 24px 56px;
    }

    /* Back kecil di pojok kiri */
    .back-row {
      display:flex;
      align-items:center;
      gap:16px;
    }
    .back-btn {
      color: rgba(255,255,255,0.45);
      text-decoration:none;
      font-weight:600;
      font-size:16px;
      transition: color .18s;
    }
    .back-btn:hover { color: rgba(255,255,255,0.9); }

    /* Judul besar seperti mock */
    .title {
      font-size: 110px;         /* besar seperti mock */
      font-weight: 800;
      margin: 18px 0 30px 0;
      line-height: 0.95;
      color: #ffffff;
      letter-spacing: -2px;
    }

    /* Tabs (pill) */
    .tabs {
      display:flex;
      gap:20px;
      margin-bottom: 36px;
      align-items:center;
    }
    .tab-pill {
      flex:1;
      background: var(--white-trans);
      color: rgba(255,255,255,0.55);
      padding: 18px 28px;
      border-radius: 18px;
      text-align:center;
      font-weight:700;
      font-size:22px;
      cursor:pointer;
      transition: all .22s ease;
      user-select:none;
      box-shadow: inset 0 -6px 0 rgba(0,0,0,0.02);
    }
    .tab-pill:hover { color: #fff; transform: translateY(-3px); }
    .tab-pill.active {
      background: #fff;
      color: var(--bg);
      box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    }

    /* Grid materi 3x2 */
    .materi-grid {
      display:grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 26px;
      margin-top: 8px;
    }
    .materi-card {
      background: var(--card);
      min-height: 180px;
      border-radius: 14px;
      display:flex;
      align-items:center;
      justify-content:center;
      text-align:center;
      padding: 24px;
      font-size: 36px;
      font-weight:600;
      color: #fff;
      cursor: pointer;
      transition: transform .18s ease, background .18s ease, box-shadow .18s ease;
      box-shadow: 0 6px 0 rgba(0,0,0,0.03);
    }
    .materi-card:hover {
      transform: translateY(-8px);
      background: var(--card-hover);
      box-shadow: 0 18px 40px rgba(0,0,0,0.15);
    }

    /* Modal (soal + pembahasan) */
    .modal {
      display:none;
      position:fixed;
      inset:0;
      background: rgba(0,0,0,0.6);
      z-index: 9999;
      align-items:center;
      justify-content:center;
      padding: 24px;
    }
    .modal-box {
      width:100%;
      max-width:820px;
      border-radius:12px;
      overflow:hidden;
      background:#fff;
      display:flex;
      gap:0;
      box-shadow: 0 30px 80px rgba(0,0,0,0.45);
      animation: pop .22s ease;
    }
    @keyframes pop {
      from { transform: translateY(-8px); opacity:0; }
      to { transform: translateY(0); opacity:1; }
    }
    .modal-left {
      width: 40%;
      min-height: 260px;
      background: linear-gradient(180deg,var(--accent), #2a9a98);
      display:flex;
      align-items:center;
      justify-content:center;
      color:#fff;
      padding: 24px;
    }
    .modal-left img{
      width: 80%;
      height: auto;
      border-radius:8px;
      object-fit:cover;
      box-shadow: 0 8px 30px rgba(0,0,0,0.25);
    }
    .modal-right {
      width:60%;
      padding: 28px 30px;
      color:#222;
    }
    .modal-title {
      font-size:22px;
      font-weight:700;
      color: var(--accent);
      margin-bottom:12px;
    }
    .modal-section {
      font-size:15px;
      line-height:1.6;
      color:#333;
      margin-bottom:14px;
    }
    .modal-actions {
      display:flex;
      justify-content:flex-end;
      gap:12px;
    }
    .btn-close {
      background: var(--accent);
      color:#fff;
      border: none;
      padding:10px 14px;
      border-radius:8px;
      cursor:pointer;
      font-weight:700;
    }

    /* Responsif */
    @media (max-width:1100px){
      .title { font-size:72px; }
      .materi-card { font-size:28px; min-height:160px; }
    }
    @media (max-width:800px){
      .wrap { padding:20px; }
      .title { font-size:48px; }
      .tabs { gap:12px; }
      .tab-pill { font-size:18px; padding:12px; border-radius:12px; }
      .materi-grid { grid-template-columns: repeat(2,1fr); }
      .materi-card { font-size:22px; min-height:140px; }
      .modal-left{display:none}
      .modal-right{width:100%}
      .modal-box{flex-direction:column}
    }
    @media (max-width:420px){
      .materi-grid { grid-template-columns: 1fr; }
      .title { font-size:40px; }
    }

  </style>
</head>
<body>

  <div class="wrap">
    <div class="back-row">
      <a class="back-btn" href="{{ url('dashboard') }}"><>Back</a>
    </div>

    <h1 class="title">PWPB</h1>

    <!-- Tabs -->
    <div class="tabs" role="tablist" aria-label="pilih kelas">
      <div class="tab-pill active" data-kelas="X" onclick="selectTab(event)">Kelas 10</div>
      <div class="tab-pill" data-kelas="XI" onclick="selectTab(event)">Kelas 11</div>
      <div class="tab-pill" data-kelas="XII" onclick="selectTab(event)">Kelas 12</div>
    </div>

    <!-- Grid materi -->
    <div class="materi-grid" id="materi-list"></div>
  </div>

  <!-- Modal -->
  <div class="modal" id="materiModal" role="dialog" aria-modal="true">
    <div class="modal-box">
      <div class="modal-left" id="modalLeft">
        <!-- opsional gambar/ilustrasi -->
        <img id="modalImg" src="" alt="Ilustrasi materi" />
      </div>
      <div class="modal-right">
        <div>
          <div class="modal-title" id="modalTitle"></div>
          <div class="modal-section"><strong>Contoh Soal:</strong><br><span id="modalSoal"></span></div>
          <div class="modal-section"><strong>Pembahasan:</strong><br><span id="modalPembahasan"></span></div>
        </div>
        <div class="modal-actions">
          <button class="btn-close" onclick="closeModal()">Tutup</button>
        </div>
      </div>
    </div>
  </div>

<script>
  // data materi (6 per kelas)
  // data materi (6 per kelas)
const materi = {
  "X": [
    "Pengenalan PWPB",
    "HTML Dasar",
    "CSS Dasar",
    "Form dan Input",
    "Multimedia di Web",
    "Struktur Folder Project"
  ],
  "XI": [
    "JavaScript Dasar",
    "DOM & Event",
    "Local Storage",
    "Responsive Design",
    "Framework CSS",
    "JSON & AJAX"
  ],
  "XII": [
    "PHP Dasar",
    "CRUD dengan MySQL",
    "Session & Authentication",
    "Upload File",
    "REST API",
    "Deploy Project"
  ]
};

const materiData = {
  // kelas X
  "Pengenalan PWPB": {
    soal: "Apa kepanjangan dari PWPB?",
    pembahasan: "PWPB adalah Pemrograman Web dan Perangkat Bergerak, mata pelajaran yang membahas tentang pembuatan aplikasi berbasis web dan mobile.",
    img: "assets/illustrations/pwpb.png"
  },
  "HTML Dasar": {
    soal: "Tulis tag HTML untuk membuat heading utama.",
    pembahasan: "Gunakan tag <h1>Heading</h1>.",
    img: "assets/illustrations/html.png"
  },
  "CSS Dasar": {
    soal: "Bagaimana cara memberi warna merah pada teks dengan CSS?",
    pembahasan: "Gunakan property color: red; misalnya h1 { color: red; }",
    img: "assets/illustrations/css.png"
  },
  "Form dan Input": {
    soal: "Buat elemen input untuk email di HTML!",
    pembahasan: "Gunakan: <input type='email' name='email'>",
    img: "assets/illustrations/form.png"
  },
  "Multimedia di Web": {
    soal: "Bagaimana menampilkan gambar dengan HTML?",
    pembahasan: "Gunakan tag <img src='gambar.jpg' alt='deskripsi'>",
    img: "assets/illustrations/media.png"
  },
  "Struktur Folder Project": {
    soal: "Sebutkan contoh struktur folder project web sederhana!",
    pembahasan: "Misalnya: /css, /js, /images, dan index.html",
    img: "assets/illustrations/folder.png"
  },

  // kelas XI
  "JavaScript Dasar": {
    soal: "Bagaimana cara menampilkan teks di console?",
    pembahasan: "Gunakan console.log('Hello');",
    img: "assets/illustrations/js.png"
  },
  "DOM & Event": {
    soal: "Bagaimana cara mengambil elemen dengan id 'demo' di JS?",
    pembahasan: "Gunakan document.getElementById('demo');",
    img: "assets/illustrations/dom.png"
  },
  "Local Storage": {
    soal: "Bagaimana cara menyimpan data 'nama=Fauzan' di localStorage?",
    pembahasan: "Gunakan localStorage.setItem('nama', 'Fauzan');",
    img: "assets/illustrations/storage.png"
  },
  "Responsive Design": {
    soal: "Apa fungsi meta viewport di HTML?",
    pembahasan: "Untuk membuat tampilan web menyesuaikan layar device: <meta name='viewport' content='width=device-width, initial-scale=1'>",
    img: "assets/illustrations/responsive.png"
  },
  "Framework CSS": {
    soal: "Sebutkan contoh framework CSS populer!",
    pembahasan: "Contohnya Bootstrap, TailwindCSS, Bulma.",
    img: "assets/illustrations/framework.png"
  },
  "JSON & AJAX": {
    soal: "Apa kepanjangan JSON?",
    pembahasan: "JavaScript Object Notation, format data untuk pertukaran informasi.",
    img: "assets/illustrations/json.png"
  },

  // kelas XII
  "PHP Dasar": {
    soal: "Bagaimana menampilkan teks 'Hello' dengan PHP?",
    pembahasan: "Gunakan: <?php echo 'Hello'; ?>",
    img: "assets/illustrations/php.png"
  },
  "CRUD dengan MySQL": {
    soal: "Apa kepanjangan CRUD?",
    pembahasan: "Create, Read, Update, Delete.",
    img: "assets/illustrations/crud.png"
  },
  "Session & Authentication": {
    soal: "Bagaimana memulai session di PHP?",
    pembahasan: "Gunakan session_start();",
    img: "assets/illustrations/session.png"
  },
  "Upload File": {
    soal: "Fungsi apa di PHP yang digunakan untuk memindahkan file upload?",
    pembahasan: "move_uploaded_file()",
    img: "assets/illustrations/upload.png"
  },
  "REST API": {
    soal: "Apa itu REST API?",
    pembahasan: "REST API adalah antarmuka yang memungkinkan aplikasi berkomunikasi menggunakan HTTP request.",
    img: "assets/illustrations/api.png"
  },
  "Deploy Project": {
    soal: "Apa itu deploy?",
    pembahasan: "Proses mempublikasikan aplikasi/web ke server agar bisa diakses pengguna.",
    img: "assets/illustrations/deploy.png"
  }
};


  // render cards for a kelas
  function render(kelas){
    const list = document.getElementById('materi-list');
    list.innerHTML = '';
    (materi[kelas] || []).forEach(name=>{
      const d = document.createElement('div');
      d.className = 'materi-card';
      d.textContent = name;
      d.onclick = ()=> openModal(name);
      list.appendChild(d);
    });
  }

  // tab click handler -> activates pill + render
  function selectTab(e){
    const clicked = e.currentTarget || e.target;
    document.querySelectorAll('.tab-pill').forEach(t=> t.classList.remove('active'));
    clicked.classList.add('active');
    const k = clicked.getAttribute('data-kelas');
    render(k);
  }

  // open modal with data, if image missing use placeholder color box
  function openModal(name){
    const data = materiData[name] || { soal:'-', pembahasan:'-' , img: ''};
    document.getElementById('modalTitle').textContent = name;
    document.getElementById('modalSoal').textContent = data.soal;
    document.getElementById('modalPembahasan').textContent = data.pembahasan;

    const imgEl = document.getElementById('modalImg');
    if(data.img){
      imgEl.src = data.img;
      imgEl.style.display = 'block';
    } else {
      imgEl.style.display = 'none';
    }

    document.getElementById('materiModal').style.display = 'flex';
  }

  function closeModal(){
    document.getElementById('materiModal').style.display = 'none';
  }

  // default: aktif Kelas 10
  document.addEventListener('DOMContentLoaded', ()=>{
    const firstTab = document.querySelector('.tab-pill[data-kelas="X"]');
    if(firstTab) firstTab.click();
  });

  // tutup modal saat klik area luar konten
  document.getElementById('materiModal').addEventListener('click', function(e){
    if(e.target === this) closeModal();
  });
</script>

</body>
</html>