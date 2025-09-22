<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ilmu Pengetahuan Alam</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    :root{
      --bg: #42ADE2;
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

    .wrap { max-width:1400px; margin:36px auto; padding:24px 56px; }

    .back-row { display:flex; align-items:center; gap:16px; }
    .back-btn {
      color: rgba(255,255,255,0.45);
      text-decoration:none;
      font-weight:600;
      font-size:16px;
      transition: color .18s;
    }
    .back-btn:hover { color: rgba(255,255,255,0.9); }

    .title {
      font-size: 96px;
      font-weight: 800;
      margin: 18px 0 30px;
      line-height: 0.95;
      color:#fff;
      letter-spacing:-2px;
    }

    .tabs { display:flex; gap:20px; margin-bottom:36px; align-items:center; }
    .tab-pill {
      flex:1;
      background: var(--white-trans);
      color: rgba(255,255,255,0.55);
      padding:18px 28px;
      border-radius:18px;
      text-align:center;
      font-weight:700;
      font-size:22px;
      cursor:pointer;
      transition: all .22s ease;
      user-select:none;
    }
    .tab-pill:hover { color:#fff; transform:translateY(-3px); }
    .tab-pill.active { background:#fff; color:var(--bg); }

    .materi-grid {
      display:grid;
      grid-template-columns: repeat(3,1fr);
      gap:26px;
      margin-top:8px;
    }
    .materi-card {
      background: var(--card);
      min-height:160px;
      border-radius:14px;
      display:flex;
      align-items:center;
      justify-content:center;
      text-align:center;
      padding:24px;
      font-size:30px;
      font-weight:600;
      color:#fff;
      cursor:pointer;
      transition:.18s;
    }
    .materi-card:hover {
      transform:translateY(-8px);
      background:var(--card-hover);
    }

    .modal {
      display:none;
      position:fixed; inset:0;
      background:rgba(0,0,0,0.6);
      z-index:9999;
      align-items:center;
      justify-content:center;
      padding:24px;
    }
    .modal-box {
      width:100%; max-width:820px;
      border-radius:12px;
      overflow:hidden;
      background:#fff;
      display:flex;
      gap:0;
      box-shadow:0 30px 80px rgba(0,0,0,0.45);
      animation:pop .22s ease;
    }
    @keyframes pop { from{transform:translateY(-8px);opacity:0;} to{transform:translateY(0);opacity:1;} }
    .modal-left {
      width:40%; min-height:260px;
      background: linear-gradient(180deg,var(--accent), #2a9a98);
      display:flex; align-items:center; justify-content:center;
      color:#fff; padding:24px;
    }
    .modal-left img { width:80%; height:auto; border-radius:8px; object-fit:cover; }
    .modal-right { width:60%; padding:28px 30px; color:#222; }
    .modal-title { font-size:22px; font-weight:700; color:var(--accent); margin-bottom:12px; }
    .modal-section { font-size:15px; line-height:1.6; margin-bottom:14px; }
    .modal-actions { display:flex; justify-content:flex-end; gap:12px; }
    .btn-close { background:var(--accent); color:#fff; border:none; padding:10px 14px; border-radius:8px; cursor:pointer; font-weight:700; }

    @media(max-width:800px){
      .title{font-size:56px;}
      .materi-grid{grid-template-columns:repeat(2,1fr);}
      .materi-card{font-size:22px;min-height:140px;}
      .modal-left{display:none}
      .modal-right{width:100%}
      .modal-box{flex-direction:column}
    }
    @media(max-width:420px){ .materi-grid{grid-template-columns:1fr;} }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="back-row"><a class="back-btn" href="{{ url('dashboard') }}"><>Back</a></div>
    <h1 class="title">Ilmu Pengetahuan Alam</h1>

    <div class="tabs">
      <div class="tab-pill active" data-kelas="X" onclick="selectTab(event)">Kelas 10</div>
      <div class="tab-pill" data-kelas="XI" onclick="selectTab(event)">Kelas 11</div>
      <div class="tab-pill" data-kelas="XII" onclick="selectTab(event)">Kelas 12</div>
    </div>

    <div class="materi-grid" id="materi-list"></div>
  </div>

  <div class="modal" id="materiModal">
    <div class="modal-box">
      <div class="modal-left"><img id="modalImg" src="" alt="Ilustrasi"/></div>
      <div class="modal-right">
        <div>
          <div class="modal-title" id="modalTitle"></div>
          <div class="modal-section"><strong>Contoh Soal:</strong><br><span id="modalSoal"></span></div>
          <div class="modal-section"><strong>Pembahasan:</strong><br><span id="modalPembahasan"></span></div>
        </div>
        <div class="modal-actions"><button class="btn-close" onclick="closeModal()">Tutup</button></div>
      </div>
    </div>
  </div>

<script>
const materi = {
  "X": ["Ekosistem","Gerak","Unsur Kimia","Fotosintesis","Gaya","Pencemaran"],
  "XI": ["Sistem Organ","Gelombang","Ikatan Kimia","Reproduksi","Kalor","Keseimbangan"],
  "XII": ["Genetika","Listrik","Reaksi Redoks","Evolusi","Optik","Asam Basa"]
};

const materiData = {
  "Ekosistem": {soal:"Sebutkan komponen biotik dalam ekosistem hutan!", pembahasan:"Hewan, tumbuhan, jamur, mikroorganisme.", img:"assets/illustrations/ecosystem.png"},
  "Gerak": {soal:"Sebuah mobil dipercepat dari 0 ke 20 m/s dalam 10 detik. Hitung percepatannya!", pembahasan:"a = Δv/Δt = 20/10 = 2 m/s².", img:"assets/illustrations/motion.png"},
  "Unsur Kimia": {soal:"Sebutkan 3 unsur logam alkali!", pembahasan:"Litium, Natrium, Kalium.", img:"assets/illustrations/chem.png"},
  "Fotosintesis": {soal:"Reaksi fotosintesis?", pembahasan:"6CO₂ + 6H₂O → C₆H₁₂O₆ + 6O₂.", img:"assets/illustrations/photo.png"},
  "Gaya": {soal:"Hitung gaya pada benda 10kg dengan percepatan 2 m/s²!", pembahasan:"F = m × a = 10 × 2 = 20 N.", img:"assets/illustrations/force.png"},
  "Pencemaran": {soal:"Contoh pencemaran udara?", pembahasan:"Asap kendaraan, industri, pembakaran sampah.", img:"assets/illustrations/pollution.png"},

  "Sistem Organ": {soal:"Fungsi utama paru-paru?", pembahasan:"Pertukaran O₂ dan CO₂.", img:"assets/illustrations/lungs.png"},
  "Gelombang": {soal:"Rumus cepat rambat gelombang?", pembahasan:"v = λ × f.", img:"assets/illustrations/wave.png"},
  "Ikatan Kimia": {soal:"NaCl terbentuk dari ikatan apa?", pembahasan:"Ikatan ion.", img:"assets/illustrations/bond.png"},
  "Reproduksi": {soal:"Organ reproduksi jantan pada bunga?", pembahasan:"Benang sari.", img:"assets/illustrations/repro.png"},
  "Kalor": {soal:"Hitung Q: m=2kg, c=4200, ΔT=10°C", pembahasan:"Q=mcΔT=2×4200×10=84.000 J.", img:"assets/illustrations/heat.png"},
  "Keseimbangan": {soal:"Apa faktor yang mempengaruhi pergeseran kesetimbangan?", pembahasan:"Konsentrasi, suhu, tekanan.", img:"assets/illustrations/equilibrium.png"},

  "Genetika": {soal:"Pewarisan sifat oleh pasangan alel disebut?", pembahasan:"Hukum Mendel.", img:"assets/illustrations/genetics.png"},
  "Listrik": {soal:"Rumus hukum Ohm?", pembahasan:"V = I × R.", img:"assets/illustrations/electric.png"},
  "Reaksi Redoks": {soal:"Reaksi oksidasi adalah?", pembahasan:"Pelepasan elektron.", img:"assets/illustrations/redox.png"},
  "Evolusi": {soal:"Teori evolusi oleh?", pembahasan:"Charles Darwin.", img:"assets/illustrations/evolution.png"},
  "Optik": {soal:"Rumus pembentukan bayangan lensa cembung?", pembahasan:"1/f = 1/s + 1/s'.", img:"assets/illustrations/optics.png"},
  "Asam Basa": {soal:"pH larutan HCl 0,01 M?", pembahasan:"pH = -log[H+] = 2.", img:"assets/illustrations/acidbase.png"},
};

function render(kelas){
  const list=document.getElementById('materi-list');
  list.innerHTML='';
  (materi[kelas]||[]).forEach(name=>{
    const d=document.createElement('div');
    d.className='materi-card';
    d.textContent=name;
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
  const imgEl=document.getElementById('modalImg');
  if(data.img){imgEl.src=data.img; imgEl.style.display='block';}
  else imgEl.style.display='none';
  document.getElementById('materiModal').style.display='flex';
}

function closeModal(){ document.getElementById('materiModal').style.display='none'; }

document.addEventListener('DOMContentLoaded',()=>{
  document.querySelector('.tab-pill[data-kelas="X"]').click();
});
document.getElementById('materiModal').addEventListener('click',e=>{if(e.target===e.currentTarget)closeModal();});
</script>
</body>
</html>
