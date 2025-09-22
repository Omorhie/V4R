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

    <h1 class="title">MATEMATIKA PEMINATAN</h1>

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
    "Fungsi dan Grafik",
    "Trigonometri Dasar",
    "Limit dan Kekontinuan",
    "Persamaan Kuadrat",
    "Matriks dan Determinan",
    "Statistika Dasar"
  ],
  "XI": [
    "Turunan dan Penerapannya",
    "Integral Dasar",
    "Trigonometri Lanjutan",
    "Barisan dan Deret",
    "Vektor",
    "Transformasi Geometri"
  ],
  "XII": [
    "Integral Lanjutan",
    "Persamaan Diferensial",
    "Program Linear",
    "Peluang dan Distribusi",
    "Statistika Inferensial",
    "Geometri Ruang"
  ]
};

const materiData = {
  // Kelas X
  "Fungsi dan Grafik": {
    soal: "Apa yang dimaksud dengan fungsi dalam matematika?",
    pembahasan: "Fungsi adalah relasi yang memasangkan setiap anggota himpunan A tepat satu anggota himpunan B.",
    img: "assets/illustrations/function.png"
  },
  "Trigonometri Dasar": {
    soal: "Sebutkan nilai sin 30°, cos 60°, dan tan 45°.",
    pembahasan: "sin 30° = 1/2, cos 60° = 1/2, tan 45° = 1.",
    img: "assets/illustrations/trigonometry.png"
  },
  "Limit dan Kekontinuan": {
    soal: "Hitung lim (x→2) (x² − 4)/(x − 2).",
    pembahasan: "Faktorkan: (x² − 4) = (x − 2)(x + 2). Setelah disederhanakan, limit = 4.",
    img: "assets/illustrations/limit.png"
  },
  "Persamaan Kuadrat": {
    soal: "Apa rumus akar-akar persamaan kuadrat ax²+bx+c=0?",
    pembahasan: "x = (-b ± √(b² − 4ac)) / 2a.",
    img: "assets/illustrations/quadratic.png"
  },
  "Matriks dan Determinan": {
    soal: "Tentukan determinan matriks [[2,3],[1,4]].",
    pembahasan: "det = (2)(4) − (3)(1) = 5.",
    img: "assets/illustrations/matrix.png"
  },
  "Statistika Dasar": {
    soal: "Apa perbedaan mean dan median?",
    pembahasan: "Mean adalah rata-rata, median adalah nilai tengah dari data.",
    img: "assets/illustrations/statistics.png"
  },

  // Kelas XI
  "Turunan dan Penerapannya": {
    soal: "Turunkan f(x)=3x²+2x.",
    pembahasan: "f’(x) = 6x + 2.",
    img: "assets/illustrations/derivative.png"
  },
  "Integral Dasar": {
    soal: "Hitung ∫ x dx.",
    pembahasan: "∫ x dx = (1/2)x² + C.",
    img: "assets/illustrations/integral.png"
  },
  "Trigonometri Lanjutan": {
    soal: "Tunjukkan identitas sin²x + cos²x = 1.",
    pembahasan: "Diperoleh dari teorema Pythagoras pada segitiga siku-siku.",
    img: "assets/illustrations/trig-advanced.png"
  },
  "Barisan dan Deret": {
    soal: "Rumus jumlah n suku pertama deret aritmetika?",
    pembahasan: "Sn = n/2 (a + Un).",
    img: "assets/illustrations/series.png"
  },
  "Vektor": {
    soal: "Jika u=(2,3) dan v=(1,4), hitung u·v.",
    pembahasan: "u·v = (2)(1) + (3)(4) = 14.",
    img: "assets/illustrations/vector.png"
  },
  "Transformasi Geometri": {
    soal: "Apa itu translasi?",
    pembahasan: "Perpindahan titik dengan arah dan jarak tertentu tanpa mengubah bentuk.",
    img: "assets/illustrations/transform.png"
  },

  // Kelas XII
  "Integral Lanjutan": {
    soal: "Hitung ∫ (2x+1) dx.",
    pembahasan: "Hasil: x² + x + C.",
    img: "assets/illustrations/integral-advanced.png"
  },
  "Persamaan Diferensial": {
    soal: "Selesaikan dy/dx = 2x.",
    pembahasan: "Integrasi: y = x² + C.",
    img: "assets/illustrations/differential.png"
  },
  "Program Linear": {
    soal: "Apa tujuan metode grafik dalam program linear?",
    pembahasan: "Untuk mencari solusi optimum dari masalah linear dua variabel.",
    img: "assets/illustrations/linear-program.png"
  },
  "Peluang dan Distribusi": {
    soal: "Berapa peluang muncul angka genap dari pelemparan dadu?",
    pembahasan: "Ada 3 angka genap (2,4,6), peluang = 3/6 = 1/2.",
    img: "assets/illustrations/probability.png"
  },
  "Statistika Inferensial": {
    soal: "Apa tujuan uji hipotesis?",
    pembahasan: "Untuk menentukan apakah data mendukung suatu klaim/statistik populasi.",
    img: "assets/illustrations/inference.png"
  },
  "Geometri Ruang": {
    soal: "Hitung volume bola berjari-jari r.",
    pembahasan: "V = (4/3)πr³.",
    img: "assets/illustrations/geometry.png"
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