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

    <h1 class="title">PENGEMBANGAN GIM</h1>

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
const materi = {
  "X": [
    "Pengenalan Game Development",
    "Genre Game",
    "Software & Tools",
    "Dasar Storytelling",
    "Elemen Visual Game",
    "Tim Pengembang Game"
  ],
  "XI": [
    "Game Design Document",
    "Alur Cerita & Gameplay",
    "Karakter & Asset",
    "Level Design",
    "Dasar Pemrograman Game",
    "Testing Game"
  ],
  "XII": [
    "Game Engine Lanjutan",
    "Artificial Intelligence (AI) dalam Game",
    "Optimasi & Debugging",
    "Monetisasi Game",
    "Distribusi Game",
    "Proyek Akhir Game"
  ]
};

const materiData = {
  // Kelas X
  "Pengenalan Game Development": {
    soal: "Apa yang dimaksud dengan Game Development?",
    pembahasan: "Game Development adalah proses menciptakan sebuah permainan mulai dari konsep, desain, pemrograman, hingga distribusi.",
    img: "assets/illustrations/intro-game.png"
  },
  "Genre Game": {
    soal: "Sebutkan 3 genre game populer!",
    pembahasan: "RPG (Role-Playing Game), FPS (First-Person Shooter), MOBA (Multiplayer Online Battle Arena).",
    img: "assets/illustrations/genre.png"
  },
  "Software & Tools": {
    soal: "Apa contoh game engine populer?",
    pembahasan: "Unity, Unreal Engine, dan Godot.",
    img: "assets/illustrations/tools.png"
  },
  "Dasar Storytelling": {
    soal: "Mengapa storytelling penting dalam game?",
    pembahasan: "Karena memberikan pengalaman emosional dan membuat pemain terikat dengan permainan.",
    img: "assets/illustrations/story.png"
  },
  "Elemen Visual Game": {
    soal: "Apa saja elemen visual utama dalam game?",
    pembahasan: "Karakter, lingkungan, UI/UX, dan efek visual.",
    img: "assets/illustrations/visual.png"
  },
  "Tim Pengembang Game": {
    soal: "Sebutkan 3 peran dalam tim pengembang game!",
    pembahasan: "Game designer, programmer, dan artist.",
    img: "assets/illustrations/team.png"
  },

  // Kelas XI
  "Game Design Document": {
    soal: "Apa fungsi Game Design Document (GDD)?",
    pembahasan: "Sebagai panduan utama yang berisi konsep, mekanik, dan detail teknis game.",
    img: "assets/illustrations/gdd.png"
  },
  "Alur Cerita & Gameplay": {
    soal: "Apa perbedaan cerita dengan gameplay?",
    pembahasan: "Cerita adalah narasi, sedangkan gameplay adalah cara pemain berinteraksi dengan game.",
    img: "assets/illustrations/gameplay.png"
  },
  "Karakter & Asset": {
    soal: "Apa itu asset dalam game?",
    pembahasan: "Segala elemen visual/audio seperti karakter, background, musik, dan sound effect.",
    img: "assets/illustrations/assets.png"
  },
  "Level Design": {
    soal: "Apa tujuan level design?",
    pembahasan: "Menciptakan pengalaman bermain yang menantang, seimbang, dan menyenangkan.",
    img: "assets/illustrations/level.png"
  },
  "Dasar Pemrograman Game": {
    soal: "Bahasa pemrograman apa yang sering digunakan di Unity?",
    pembahasan: "C# adalah bahasa utama di Unity.",
    img: "assets/illustrations/code.png"
  },
  "Testing Game": {
    soal: "Mengapa game perlu testing?",
    pembahasan: "Untuk menemukan bug, memastikan gameplay seimbang, dan menjaga kualitas game.",
    img: "assets/illustrations/test.png"
  },

  // Kelas XII
  "Game Engine Lanjutan": {
    soal: "Apa perbedaan Unity dan Unreal Engine?",
    pembahasan: "Unity lebih fleksibel untuk mobile & indie game, sedangkan Unreal unggul dalam grafis AAA.",
    img: "assets/illustrations/engine.png"
  },
  "Artificial Intelligence (AI) dalam Game": {
    soal: "Apa fungsi AI dalam game?",
    pembahasan: "Mengatur perilaku musuh, NPC, dan sistem game agar terasa realistis.",
    img: "assets/illustrations/ai.png"
  },
  "Optimasi & Debugging": {
    soal: "Apa itu optimasi game?",
    pembahasan: "Proses meningkatkan performa game agar berjalan lancar di berbagai perangkat.",
    img: "assets/illustrations/optimization.png"
  },
  "Monetisasi Game": {
    soal: "Apa contoh model monetisasi game?",
    pembahasan: "In-app purchase, iklan, dan subscription.",
    img: "assets/illustrations/money.png"
  },
  "Distribusi Game": {
    soal: "Sebutkan platform distribusi game digital!",
    pembahasan: "Steam, Google Play Store, App Store, dan Epic Games Store.",
    img: "assets/illustrations/distribution.png"
  },
  "Proyek Akhir Game": {
    soal: "Apa tujuan membuat proyek akhir game?",
    pembahasan: "Sebagai bukti kemampuan siswa dalam mengembangkan game secara utuh dari awal hingga akhir.",
    img: "assets/illustrations/project.png"
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