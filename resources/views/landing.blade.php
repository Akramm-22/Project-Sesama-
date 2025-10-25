<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pertamina - Program Sosial untuk Masyarakat</title>
  <style>
    :root {
      --pertamina-blue: #0072ce;
      --pertamina-green: #009639;
      --pertamina-light-blue: #00b5e2;
      --text-dark: #222;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: "Inter", system-ui, sans-serif;
      background: #fff;
      color: var(--text-dark);
      overflow-x: hidden;
    }

    /* NAVBAR */
    header {
      position: absolute;
      top: 0;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 60px;
      z-index: 20;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #fff;
      font-weight: 700;
      font-size: 18px;
    }
    .logo .mark {
      width: 40px; height: 40px; border-radius: 6px;
      background: linear-gradient(135deg, var(--pertamina-blue), var(--pertamina-green));
      display: flex; align-items: center; justify-content: center; color: #fff;
    }
    nav { display: flex; align-items: center; gap: 28px; }
    nav a { color: #fff; text-decoration: none; font-weight: 500; transition: .3s; }
    nav a:hover { color: #ffebee; }

    /* HERO SLIDER */
    .hero {
      position: relative; height: 100vh; overflow: hidden;
    }
    .slide {
      position: absolute; inset: 0; background-size: cover; background-position: center;
      opacity: 0; transition: opacity 1.5s ease-in-out;
    }
    .slide.active { opacity: 1; }
    .hero::after {
      content: ""; position: absolute; inset: 0;
      background: rgba(0,0,0,0.55); z-index: 1;
    }
    .hero-content {
      position: relative; z-index: 2; text-align: center; color: #fff;
      top: 50%; transform: translateY(-50%); max-width: 800px; margin: 0 auto;
      animation: fadeInUp 1.2s ease;
    }
    .hero-content h1 { font-size: 48px; font-weight: 800; margin-bottom: 20px; }
    .hero-content p { font-size: 18px; line-height: 1.6; color: #e8e8e8; }

    @keyframes fadeInUp { from {opacity:0; transform:translateY(30px);} to {opacity:1; transform:translateY(0);} }

    /* INTRO */
    .intro {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 100px 60px;
      gap: 80px;
      flex-wrap: wrap;
      background: #f9f9f9;
    }

    .intro img {
      width: 400px;
      max-width: 100%;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .intro-text {
      max-width: 600px;
    }

    .intro-text h3 {
      color: var(--pertamina-blue);
      font-weight: 700;
      text-transform: uppercase;
      font-size: 14px;
      margin-bottom: 12px;
    }

    .intro-text h2 {
      font-size: 36px;
      font-weight: 800;
      margin-bottom: 16px;
    }

    .intro-text p {
      color: #555;
      line-height: 1.8;
      font-size: 16px;
    }

    /* PROGRAM */
    .program-wrapper {
      text-align: center;
      padding: 80px 40px;
    }

    .program-wrapper h2 {
      font-size: 36px;
      font-weight: 800;
      color: var(--pertamina-blue);
      margin-bottom: 10px;
    }

    .program-wrapper p {
      color: #555;
      margin-bottom: 50px;
      font-size: 16px;
    }

    .program-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      min-height: 550px;
      text-align: left;
      gap: 0;
    }

    .program-card {
      position: relative;
      color: #fff;
      height: 550px;
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: flex-end;
      padding: 40px;
      transition: transform .3s ease;
    }

    .program-card::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.6), rgba(0,0,0,0.2));
      z-index: 1;
    }

    .program-card:hover { transform: scale(1.02); }

    .program-content {
      position: relative;
      z-index: 2;
    }

    .program-content h5 {
      font-size: 14px;
      font-weight: 700;
      letter-spacing: 1px;
      opacity: .9;
      margin-bottom: 8px;
    }

    .program-content h3 {
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .btn-login {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 50px;
      background: linear-gradient(90deg, var(--pertamina-blue), var(--pertamina-green));
      color: #fff;
      padding: 10px 20px;
      font-weight: 600;
      border: none;
      margin-top: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      text-decoration: none;
    }

    .btn-login:hover {
      background: linear-gradient(90deg, #0059a8, #007f3d);
      transform: translateY(-3px);
    }

    footer {
      background: #002147;
      color: #fff;
      text-align: center;
      padding: 20px;
      font-size: 14px;
    }

    @media (max-width: 768px) {
      .intro { flex-direction: column; padding: 60px 20px; gap: 40px; }
      .intro-text h2 { font-size: 28px; }
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <div class="mark">P</div>
      <span>Pertamina</span>
    </div>
    <nav>
      <a href="#beranda">Beranda</a>
      <a href="#program">Program</a>
      <a href="#tentang">Tentang</a>
    </nav>
  </header>

  <!-- HERO -->
  <section class="hero" id="beranda">
    <div class="slide active" style="background-image:url('https://pertamina.com/AssetWeb/images/banner-pertamina1.jpg');"></div>
    <div class="slide" style="background-image:url('https://pertamina.com/AssetWeb/images/banner-pertamina2.jpg');"></div>
    <div class="slide" style="background-image:url('https://pertamina.com/AssetWeb/images/banner-pertamina3.jpg');"></div>

    <div class="hero-content">
      <h1>Program Sosial Pertamina untuk Masyarakat</h1>
      <p>Pertamina berkomitmen memberikan manfaat bagi masyarakat melalui berbagai program sosial, kesehatan, dan pendidikan di seluruh Indonesia.</p>
    </div>
  </section>

  <!-- INTRO -->
  <section class="intro" id="tentang">
    <img src="https://pertamina.com/AssetWeb/images/pertamina-building.jpg" alt="Gedung Pertamina">
    <div class="intro-text">
      <h3>ENERGIZING YOU</h3>
      <h2>Mewujudkan Kedaulatan Energi hingga Pelosok Negeri</h2>
      <p>Pertamina senantiasa menggaungkan semangat transformasi berkelanjutan dengan berinovasi dalam energi hijau dan digitalisasi. Sebagai motor penggerak transisi energi di Indonesia, Pertamina berkomitmen menjadi perusahaan energi global terdepan yang mendukung kemandirian energi nasional serta menciptakan masa depan yang berkelanjutan.</p>
    </div>
  </section>

  <!-- PROGRAM -->
  <section class="program-wrapper" id="program">
    <h2>Program Pertamina</h2>
    <p>Berbagai inisiatif sosial yang membawa energi positif bagi masyarakat Indonesia.</p>

    <div class="program-section">
      <div class="program-card" style="background-image:url('https://pertamina.com/AssetWeb/images/ppid.jpg');">
        <div class="program-content">
          <h5>PROFIL PPID</h5>
          <h3>Layanan Informasi Publik</h3>
          <a href="{{ route('login') }}" class="btn-login">Login</a>
        </div>
      </div>

      <div class="program-card" style="background-image:url('https://pertamina.com/AssetWeb/images/harga-bbm.jpg');">
        <div class="program-content">
          <h5>INFORMASI</h5>
          <h3>Harga BBM Pertamina</h3>
          <a href="{{ route('login') }}" class="btn-login">Login</a>
        </div>
      </div>

      <div class="program-card" style="background-image:url('https://pertamina.com/AssetWeb/images/sustainability.jpg');">
        <div class="program-content">
          <h5>KOMITMEN</h5>
          <h3>Energi Berkelanjutan</h3>
          <a href="{{ route('login') }}" class="btn-login">Login</a>
        </div>
      </div>

      <div class="program-card" style="background-image:url('https://pertamina.com/AssetWeb/images/rekrutmen.jpg');">
        <div class="program-content">
          <h5>REKRUTMEN</h5>
          <h3>Menjadi Perwira Pertamina</h3>
          <a href="{{ route('login') }}" class="btn-login">Login</a>
        </div>
      </div>
    </div>
  </section>

  <footer>
    &copy; {{ date('Y') }} Pertamina - Program Sosial untuk Masyarakat. Semua hak cipta dilindungi.
  </footer>

  <script>
    const slides = document.querySelectorAll('.slide');
    let index = 0;
    setInterval(() => {
      slides[index].classList.remove('active');
      index = (index + 1) % slides.length;
      slides[index].classList.add('active');
    }, 5000);
  </script>
</body>
</html>
