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

    <h1 class="title">PKWU</h1>

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
    "Pengantar Kewirausahaan",
    "Ciri dan Jiwa Wirausaha",
    "Ide dan Peluang Usaha",
    "Jenis Usaha",
    "Etika Bisnis",
    "Kerja Sama Tim"
  ],
  "XI": [
    "Perencanaan Usaha",
    "Analisis SWOT",
    "Model Bisnis",
    "Manajemen Produksi",
    "Pemasaran Produk",
    "Kalkulasi Biaya"
  ],
  "XII": [
    "Pengembangan Produk",
    "Inovasi dan Kreativitas",
    "Strategi Pemasaran",
    "Keuangan Usaha",
    "Presentasi Bisnis",
    "Laporan Usaha"
  ]
};

const materiData = {
  // Kelas X
  "Pengantar Kewirausahaan": {
    soal: "Apa yang dimaksud dengan kewirausahaan?",
    pembahasan: "Kewirausahaan adalah kemampuan seseorang untuk menciptakan, mengelola, dan mengembangkan usaha dengan berani menanggung risiko.",
    img: "assets/illustrations/entrepreneur.png"
  },
  "Ciri dan Jiwa Wirausaha": {
    soal: "Sebutkan 2 ciri utama seorang wirausaha!",
    pembahasan: "Berani mengambil risiko dan kreatif dalam mencari solusi.",
    img: "assets/illustrations/character.png"
  },
  "Ide dan Peluang Usaha": {
    soal: "Apa perbedaan ide dengan peluang usaha?",
    pembahasan: "Ide usaha adalah gagasan, sedangkan peluang usaha adalah ide yang dapat diwujudkan menjadi bisnis yang menguntungkan.",
    img: "assets/illustrations/idea.png"
  },
  "Jenis Usaha": {
    soal: "Sebutkan contoh usaha di bidang jasa!",
    pembahasan: "Contohnya usaha laundry, bengkel motor, kursus privat.",
    img: "assets/illustrations/service.png"
  },
  "Etika Bisnis": {
    soal: "Mengapa etika bisnis penting?",
    pembahasan: "Karena menjaga kepercayaan pelanggan dan keberlangsungan usaha.",
    img: "assets/illustrations/ethics.png"
  },
  "Kerja Sama Tim": {
    soal: "Apa manfaat kerja sama dalam tim wirausaha?",
    pembahasan: "Mempercepat pencapaian tujuan dan meningkatkan produktivitas.",
    img: "assets/illustrations/team.png"
  },

  // Kelas XI
  "Perencanaan Usaha": {
    soal: "Apa tujuan membuat perencanaan usaha?",
    pembahasan: "Agar usaha berjalan terarah dan meminimalisir risiko kegagalan.",
    img: "assets/illustrations/planning.png"
  },
  "Analisis SWOT": {
    soal: "Apa kepanjangan SWOT?",
    pembahasan: "Strength, Weakness, Opportunity, Threat.",
    img: "assets/illustrations/swot.png"
  },
  "Model Bisnis": {
    soal: "Apa fungsi Business Model Canvas?",
    pembahasan: "Sebagai alat untuk merancang, menggambarkan, dan mengembangkan model bisnis secara sederhana.",
    img: "assets/illustrations/bmc.png"
  },
  "Manajemen Produksi": {
    soal: "Apa yang dimaksud dengan manajemen produksi?",
    pembahasan: "Pengelolaan sumber daya untuk menghasilkan produk secara efektif dan efisien.",
    img: "assets/illustrations/production.png"
  },
  "Pemasaran Produk": {
    soal: "Apa contoh strategi pemasaran digital?",
    pembahasan: "Menggunakan media sosial seperti Instagram, TikTok, atau iklan online.",
    img: "assets/illustrations/marketing.png"
  },
  "Kalkulasi Biaya": {
    soal: "Jika biaya produksi Rp500.000 dan keuntungan yang diinginkan 20%, berapa harga jual?",
    pembahasan: "Harga jual = 500.000 + (20% × 500.000) = Rp600.000.",
    img: "assets/illustrations/cost.png"
  },

  // Kelas XII
  "Pengembangan Produk": {
    soal: "Apa langkah pertama dalam pengembangan produk?",
    pembahasan: "Melakukan riset pasar untuk mengetahui kebutuhan konsumen.",
    img: "assets/illustrations/product.png"
  },
  "Inovasi dan Kreativitas": {
    soal: "Apa contoh inovasi produk makanan?",
    pembahasan: "Membuat donat dengan topping unik seperti matcha dan red velvet.",
    img: "assets/illustrations/innovation.png"
  },
  "Strategi Pemasaran": {
    soal: "Apa itu strategi diferensiasi?",
    pembahasan: "Strategi membedakan produk dari pesaing agar lebih menarik di pasar.",
    img: "assets/illustrations/strategy.png"
  },
  "Keuangan Usaha": {
    soal: "Apa fungsi laporan laba rugi?",
    pembahasan: "Untuk mengetahui keuntungan atau kerugian usaha dalam periode tertentu.",
    img: "assets/illustrations/finance.png"
  },
  "Presentasi Bisnis": {
    soal: "Apa tujuan presentasi bisnis?",
    pembahasan: "Untuk meyakinkan investor, partner, atau konsumen tentang produk/ide usaha.",
    img: "assets/illustrations/pitch.png"
  },
  "Laporan Usaha": {
    soal: "Mengapa laporan usaha penting?",
    pembahasan: "Sebagai bahan evaluasi perkembangan usaha dan dasar pengambilan keputusan.",
    img: "assets/illustrations/report.png"
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