
<style>
  body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(180deg, #fff, #dff3f3);
    min-height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .back {
    text-decoration: none;
    font-weight: 600;
    color: #646464ff;
    display: inline-block;
    margin: 20px;
  }
  .back:hover { color: #00a5a5ff; }
  .content {
    display: flex; flex-wrap: wrap;
    justify-content: space-between; align-items: flex-start;
    padding: 40px 80px; gap: 40px; flex: 1;
  }
  .contact-title { font-size: 100px; font-weight: 700; color: #007272; margin: 0 0 20px 0; }
  form { max-width: 500px; width: 100%; }
  .form-row { display: flex; gap: 20px; margin-bottom: 20px; }
  .form-group { flex: 1; display: flex; flex-direction: column; }
  label { font-size: 15px; margin-bottom: 8px; font-weight: 600; }
  .form-control {
    border: none; border-bottom: 2px solid #000; border-radius: 0;
    padding: 14px 12px; font-size: 18px; background: transparent;
  }
  .form-control:focus { outline: none; border-bottom: 2px solid #000; }
  textarea.form-control { resize: vertical; min-height: 140px; }
  .btn-submit {
    background-color: #007272; color: #fff; border-radius: 50px;
    width: 180px; padding: 14px; font-size: 18px; font-weight: 600;
    border: none; cursor: pointer; transition: all 0.3s;
  }
  .btn-submit:hover { background-color: #005c5c; }
  .date { color: #007272; }
  footer {
    font-size: 34px; padding: 20px 40px; color: #007272;
    display: flex; justify-content: space-between; align-items: flex-start;
    background: #f9f9f9;
  }
  footer b { font-size: 36px; font-weight: 600; }
  footer span { display: block; font-size: 15px; color: #646464ff; margin-top: 4px; }
  .right-ft { display: flex; justify-content: right; font-size: 15px; color: #646464ff; }
  footer a { text-decoration: none; color: #646464ff; font-weight: 600; transition: 0.3s; }
  footer a:hover { color: #007272; }
</style>

<a href="{{ route('dashboard') }}" class="back">back</a>

<div class="content">
  <div class="left">
    <h1 class="contact-title">Contact Us.</h1>
    <p>Indonesia, Depok — <br>
      <span id="datetime" class="date"></span>
    </p>
  </div>

  <div class="right">
    @if(session('success'))
      <div style="color: green; font-weight: bold;">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('contact.store') }}">
      @csrf
      <div class="form-row">
        <div class="form-group">
          <label>Name (required)</label>
          <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
        </div>
        <div class="form-group">
          <label>&nbsp;</label>
          <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
        </div>
      </div>

      <div class="form-group" style="margin-bottom: 20px;">
        <input type="email" class="form-control" name="email" placeholder="Email (required)" required>
      </div>

      <div class="form-group" style="margin-bottom: 20px;">
        <textarea class="form-control" name="message" placeholder="Message"></textarea>
      </div>

      <button type="submit" class="btn-submit">submit</button>
    </form>
  </div>
</div>

<footer>
  <div class="footer-left">
    <b>v4r_education@gmail.com</b>
    <span>© Copyright All right reserved</span>
  </div>
  <div class="footer-right">
    <b>(+62) 895 6190 08678</b>
    <span class="right-ft">
      Say Hello&nbsp;<a href="https://www.instagram.com/v4r_team" target="_blank">V4R Team</a>
    </span>
  </div>
</footer>

<script>
  function updateDateTime() {
    const now = new Date();
    const options = { weekday:'long', year:'numeric', month:'long', day:'numeric',
      hour:'2-digit', minute:'2-digit', second:'2-digit', hour12:false };
    document.getElementById('datetime').innerText = now.toLocaleDateString('id-ID', options);
  }
  setInterval(updateDateTime, 1000); updateDateTime();
</script>
