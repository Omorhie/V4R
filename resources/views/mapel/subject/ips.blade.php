<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>IPS</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    :root{
      --bg: #34a2aa;         /* beda warna dominan untuk IPS */
      --accent: #34a2aa;     
      --card: rgba(0,0,0,0.18);
      --card-hover: rgba(0,0,0,0.26);
      --white-trans: rgba(255,255,255,0.18);
    }
    *{box-sizing:border-box}
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: url('../../assets/mapel/subject.png') no-repeat center center fixed; 
        background-size: cover;
        color: white;
    }
    .wrap { max-width: 1400px; margin: 36px auto; padding: 24px 56px; }
    .back-row { display:flex; align-items:center; gap:16px; }
    .back-btn { color: rgba(255,255,255,0.45); text-decoration:none; font-weight:600; font-size:16px; transition: color .18s; }
    .back-btn:hover { color: rgba(255,255,255,0.9); }
    .title { font-size: 110px; font-weight: 800; margin: 18px 0 30px 0; line-height: 0.95; color: #fff; letter-spacing: -2px; }
    .tabs { display:flex; gap:20px; margin-bottom: 36px; align-items:center; }
    .tab-pill {
      flex:1; background: var(--white-trans); color: rgba(255,255,255,0.55);
      padding: 18px 28px; border-radius: 18px; text-align:center; font-weight:700; font-size:22px;
      cursor:pointer; transition: all .22s ease; user-select:none; box-shadow: inset 0 -6px 0 rgba(0,0,0,0.02);
    }
    .tab-pill:hover { color: #fff; transform: translateY(-3px); }
    .tab-pill.active { background:#fff; color:var(--bg); box-shadow:0 6px 18px rgba(0,0,0,0.08); }
    .materi-grid { display:grid; grid-template-columns: repeat(3, 1fr); gap: 26px; margin-top: 8px; }
    .materi-card {
      background: var(--card); min-height: 180px; border-radius: 14px;
      display:flex; align-items:center; justify-content:center;
      font-size: 32px; font-weight:600; color: #fff; cursor: pointer;
      transition: transform .18s ease, background .18s ease, box-shadow .18s ease;
    }
    .materi-card:hover { transform: translateY(-8px); background: var(--card-hover); box-shadow: 0 18px 40px rgba(0,0,0,0.15); }
    .modal { display:none; position:fixed; inset:0; background: rgba(0,0,0,0.6); z-index: 9999; align-items:center; justify-content:center; padding: 24px; }
    .modal-box { width:100%; max-width:820px; border-radius:12px; overflow:hidden; background:#fff; display:flex; gap:0; box-shadow: 0 30px 80px rgba(0,0,0,0.45); animation: pop .22s ease; }
    @keyframes pop { from { transform: translateY(-8px); opacity:0; } to { transform: translateY(0); opacity:1; } }
    .modal-left { width: 40%; min-height: 260px; background: linear-gradient(180deg,var(--accent), #34a2aa); display:flex; align-items:center; justify-content:center; padding:24px; }
    .modal-left img{ width: 80%; height: auto; border-radius:8px; object-fit:cover; box-shadow: 0 8px 30px rgba(0,0,0,0.25); }
    .modal-right { width:60%; padding: 28px 30px; color:#222; }
    .modal-title { font-size:22px; font-weight:700; color: var(--accent); margin-bottom:12px; }
    .modal-section { font-size:15px; line-height:1.6; color:#333; margin-bottom:14px; }
    .modal-actions { display:flex; justify-content:flex-end; gap:12px; }
    .btn-close { background: var(--accent); color:#fff; border: none; padding:10px 14px; border-radius:8px; cursor:pointer; font-weight:700; }
  </style>
</head>
<body>

<div class="wrap">
  <div class="back-row">
    <a class="back-btn" href="{{ url('dashboard') }}"><>Back</a>
  </div>

  <h1 class="title">IPS</h1>

  <div class="tabs">
    <div class="tab-pill active" data-kelas="X" onclick="selectTab(event)">Kelas 10</div>
    <div class="tab-pill" data-kelas="XI" onclick="selectTab(event)">Kelas 11</div>
    <div class="tab-pill" data-kelas="XII" onclick="selectTab(event)">Kelas 12</div>
  </div>

  <div class="materi-grid" id="materi-list"></div>
</div>

<!-- Modal -->
<div class="modal" id="materiModal">
  <div class="modal-box">
    <div class="modal-left"><img id="modalImg" src="" alt="Ilustrasi materi"></div>
    <div class="modal-right">
      <div class="modal-title" id="modalTitle"></div>
      <div class="modal-section"><strong>Contoh Soal:</strong><br><span id="modalSoal"></span></div>
      <div class="modal-section"><strong>Pembahasan:</strong><br><span id="modalPembahasan"></span></div>
      <div class="modal-actions"><button class="btn-close" onclick="closeModal()">Tutup</button></div>
    </div>
  </div>
</div>

<script>
const materi = {
  "X": ["Geografi Dasar","Ekonomi Dasar","Sosiologi Dasar","Sejarah Indonesia","PKKN","Antropologi"],
  "XI": ["Perdagangan","Sistem Sosial","Kebijakan Moneter","Kolonialisme","Demografi","Kebijakan Publik"],
  "XII": ["Globalisasi","Sejarah Dunia Modern","Ekonomi Pembangunan","Sosiologi Perubahan","Geopolitik","Pasar Bebas"]
};

const materiData = {
  "Geografi Dasar": {soal:"Apa itu peta topografi?", pembahasan:"Peta topografi adalah peta yang menunjukkan relief permukaan bumi.", img:"assets/illustrations/geo.png"},
  "Ekonomi Dasar": {soal:"Sebutkan contoh kebutuhan primer!", pembahasan:"Sandang, pangan, papan.", img:"assets/illustrations/eco.png"},
  "Sosiologi Dasar": {soal:"Apa itu interaksi sosial?", pembahasan:"Hubungan timbal balik antarindividu/kelompok.", img:"assets/illustrations/socio.png"},
  "Sejarah Indonesia": {soal:"Kapan Proklamasi Kemerdekaan RI?", pembahasan:"17 Agustus 1945.", img:"assets/illustrations/history.png"},
  "Pancasila & Kewarganegaraan": {soal:"Sila ke-3 Pancasila?", pembahasan:"Persatuan Indonesia.", img:"assets/illustrations/civics.png"},
  "Antropologi": {soal:"Apa itu kebudayaan?", pembahasan:"Keseluruhan sistem gagasan, tindakan, hasil karya manusia.", img:"assets/illustrations/anthro.png"},
  "Globalisasi": {soal:"Apa dampak positif globalisasi?", pembahasan:"Kemudahan akses informasi, perdagangan, komunikasi.", img:"assets/illustrations/global.png"}
};

function render(kelas){
  const list=document.getElementById('materi-list');
  list.innerHTML='';
  (materi[kelas]||[]).forEach(name=>{
    const d=document.createElement('div');
    d.className='materi-card'; d.textContent=name;
    d.onclick=()=>openModal(name);
    list.appendChild(d);
  });
}

function selectTab(e){
  document.querySelectorAll('.tab-pill').forEach(t=>t.classList.remove('active'));
  e.currentTarget.classList.add('active');
  render(e.currentTarget.getAttribute('data-kelas'));
}

function openModal(name){
  const data=materiData[name]||{soal:'-',pembahasan:'-',img:''};
  document.getElementById('modalTitle').textContent=name;
  document.getElementById('modalSoal').textContent=data.soal;
  document.getElementById('modalPembahasan').textContent=data.pembahasan;
  const img=document.getElementById('modalImg');
  if(data.img){ img.src=data.img; img.style.display='block'; } else { img.style.display='none'; }
  document.getElementById('materiModal').style.display='flex';
}

function closeModal(){ document.getElementById('materiModal').style.display='none'; }

document.addEventListener('DOMContentLoaded',()=>document.querySelector('.tab-pill[data-kelas="X"]').click());
document.getElementById('materiModal').addEventListener('click',e=>{ if(e.target===e.currentTarget) closeModal(); });
</script>

</body>
</html>
