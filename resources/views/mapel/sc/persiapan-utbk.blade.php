<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Matematika</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    :root{
      --bg: #42ADE2;         /* background utama */
      --accent: #34a2aa;     /* warna tombol/aksen */
      --card: rgba(0,0,0,0.18);
      --card-hover: rgba(0,0,0,0.26);
      --white-trans: rgba(255,255,255,0.18);
    }

    *{box-sizing:border-box}
    body{
      margin:0;
      font-family: 'Poppins', sans-serif;
      background: var(--bg);
      color: #fff;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
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

    <h1 class="title">PERSIAPAN UTBK</h1>

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
// materi per kelas
const materi = {
  "X": [
    "Penalaran Umum",
    "Literasi Bahasa Indonesia",
    "Literasi Bahasa Inggris",
    "Matematika Dasar",
    "Pemahaman Bacaan",
    "Logika & Pola"
  ],
  "XI": [
    "Pengetahuan Kuantitatif",
    "Pengetahuan & Pemahaman Umum",
    "Literasi Sains",
    "Ekonomi Dasar",
    "Sejarah & Sosial",
    "Geografi"
  ],
  "XII": [
    "Matematika UTBK",
    "Fisika UTBK",
    "Kimia UTBK",
    "Biologi UTBK",
    "Sosiologi UTBK",
    "Ekonomi UTBK"
  ]
};

// detail materi + soal kelas XII (ada soal & pembahasan)
const materiData = {
  // Kelas X
  "Penalaran Umum": {
    soal: "Jika semua A adalah B, dan semua B adalah C, maka ...?",
    pembahasan: "Kesimpulannya: semua A adalah C.",
    img: "assets/illustrations/reasoning.png"
  },
  "Literasi Bahasa Indonesia": {
    soal: "Apa ide pokok paragraf tentang pentingnya menjaga lingkungan?",
    pembahasan: "Ide pokoknya adalah menjaga lingkungan penting untuk kelestarian hidup.",
    img: "assets/illustrations/literasi-id.png"
  },
  "Literasi Bahasa Inggris": {
    soal: "Find the synonym of 'begin'!",
    pembahasan: "The synonym is 'start'.",
    img: "assets/illustrations/literasi-en.png"
  },
  "Matematika Dasar": {
    soal: "5 × (2 + 3) = ?",
    pembahasan: "Hitung dalam kurung dulu: 2 + 3 = 5. Hasil = 5 × 5 = 25.",
    img: "assets/illustrations/math-basic.png"
  },
  "Pemahaman Bacaan": {
    soal: "Kalimat 'Budi belajar keras agar lulus UTBK' memiliki makna ...",
    pembahasan: "Makna: usaha sungguh-sungguh akan membawa keberhasilan.",
    img: "assets/illustrations/reading.png"
  },
  "Logika & Pola": {
    soal: "1, 4, 9, 16, ... suku berikutnya?",
    pembahasan: "25, karena pola kuadrat.",
    img: "assets/illustrations/pattern.png"
  },

  // Kelas XI
  "Pengetahuan Kuantitatif": {
    soal: "Jika x + 2 = 5, maka x = ?",
    pembahasan: "x = 3.",
    img: "assets/illustrations/quant.png"
  },
  "Pengetahuan & Pemahaman Umum": {
    soal: "Siapakah presiden pertama Indonesia?",
    pembahasan: "Ir. Soekarno.",
    img: "assets/illustrations/general.png"
  },
  "Literasi Sains": {
    soal: "Air mendidih pada suhu berapa (di permukaan laut)?",
    pembahasan: "100°C.",
    img: "assets/illustrations/science.png"
  },
  "Ekonomi Dasar": {
    soal: "Apa hukum permintaan?",
    pembahasan: "Jika harga naik, jumlah yang diminta turun.",
    img: "assets/illustrations/economy.png"
  },
  "Sejarah & Sosial": {
    soal: "Kapan proklamasi kemerdekaan Indonesia?",
    pembahasan: "17 Agustus 1945.",
    img: "assets/illustrations/history.png"
  },
  "Geografi": {
    soal: "Apa sebutan garis khatulistiwa?",
    pembahasan: "Equator.",
    img: "assets/illustrations/geo.png"
  },

  // Kelas XII
  "Matematika UTBK": {
    soal: "Jika f(x) = x², tentukan turunan f(x).",
    pembahasan: "f'(x) = 2x.",
    img: "assets/illustrations/utbk-math.png"
  },
  "Fisika UTBK": {
    soal: "Hitung gaya pada benda bermassa 2 kg dengan percepatan 5 m/s²!",
    pembahasan: "F = m × a = 2 × 5 = 10 N.",
    img: "assets/illustrations/utbk-physics.png"
  },
  "Kimia UTBK": {
    soal: "Berapa jumlah atom H dalam H₂SO₄?",
    pembahasan: "Ada 2 atom H.",
    img: "assets/illustrations/utbk-chem.png"
  },
  "Biologi UTBK": {
    soal: "Organisme yang mampu membuat makanan sendiri disebut?",
    pembahasan: "Autotrof.",
    img: "assets/illustrations/utbk-bio.png"
  },
  "Sosiologi UTBK": {
    soal: "Apa yang dimaksud dengan sosialisasi?",
    pembahasan: "Proses belajar individu agar dapat hidup bermasyarakat.",
    img: "assets/illustrations/utbk-soc.png"
  },
  "Ekonomi UTBK": {
    soal: "Apa arti inflasi?",
    pembahasan: "Kenaikan harga barang dan jasa secara umum dan terus-menerus.",
    img: "assets/illustrations/utbk-eco.png"
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