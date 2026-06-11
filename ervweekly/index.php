<!DOCTYPE html>
<html>
  <head>
    <title>WEB TI ERVI - 2026</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
      * { margin: 0; padding: 0; box-sizing: border-box; }

      body {
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(160deg, #ffe0f0 0%, #ffd6f0 40%, #f0d6ff 100%);
        min-height: 100vh;
        overflow-x: hidden;
      }

      /* === DEKORASI BUBBLE === */
      .bubble {
        position: fixed;
        border-radius: 50%;
        opacity: 0.18;
        pointer-events: none;
        z-index: 0;
      }
      .b1 { width:200px; height:200px; background:#ff80c0; top:-60px; left:-60px; }
      .b2 { width:140px; height:140px; background:#ff99cc; top:80px; right:-40px; }
      .b3 { width:100px; height:100px; background:#d580ff; bottom:120px; left:20px; }
      .b4 { width:180px; height:180px; background:#ff66b3; bottom:-60px; right:-40px; }

      /* === NAVIGASI === */
      nav {
        display: flex;
        justify-content: center;
        background: rgba(255,255,255,0.55);
        border-bottom: 2px dashed #ffb3d9;
        backdrop-filter: blur(8px);
        position: relative;
        z-index: 10;
      }

      nav a {
        color: #d6538a;
        text-decoration: none;
        padding: 14px 28px;
        font-size: 15px;
        font-weight: 700;
        border-bottom: 3px solid transparent;
        transition: all 0.2s;
      }

      nav a:hover {
        color: #b5006e;
        border-bottom-color: #ff69b4;
        background: rgba(255,105,180,0.1);
      }

      /* === HERO === */
      .hero {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 48px 20px 36px;
        text-align: center;
        position: relative;
        z-index: 2;
      }

      .label {
        font-family: 'Fredoka One', sans-serif;
        font-size: 13px;
        color: #e05595;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 6px;
      }

      h1 {
        font-family: 'Fredoka One', sans-serif;
        font-size: 54px;
        color: #c0337a;
        margin-bottom: 8px;
        text-shadow: 3px 3px 0 #ffb3d9;
      }

      .tagline {
        font-size: 15px;
        color: #d45f95;
        margin-bottom: 36px;
        font-weight: 600;
      }

      /* === AVATAR === */
      .avatar-wrap {
        margin-bottom: 32px;
        position: relative;
      }

      .avatar-deco {
        position: absolute;
        top: -14px; right: -14px;
        font-size: 26px;
        animation: bounce 1.4s ease-in-out infinite;
      }

      .avatar-deco2 {
        position: absolute;
        bottom: -10px; left: -12px;
        font-size: 22px;
        animation: bounce 1.8s ease-in-out infinite;
      }

      @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
      }

      .avatar-ring {
        width: 176px;
        height: 176px;
        border-radius: 50%;
        background: conic-gradient(#ff69b4, #ff99cc, #ffb3d9, #d580ff, #ff69b4);
        padding: 4px;
        animation: spin 6s linear infinite;
      }

      @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
      }

      .avatar-inner {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: #fff0f8;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
      }

      .avatar-inner img {
        width: 168px;
        height: 168px;
        border-radius: 50%;
        object-fit: cover;
      }

      /* === KARTU === */
      .card {
        background: rgba(255,255,255,0.7);
        border: 2px solid #ffb3d9;
        border-radius: 28px;
        padding: 32px 36px;
        max-width: 460px;
        width: 100%;
        position: relative;
      }

      .card::before {
        content: '🎀';
        position: absolute;
        top: -18px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 28px;
      }

      .card h2 {
        font-family: 'Fredoka One', sans-serif;
        font-size: 24px;
        color: #c0337a;
        margin-bottom: 20px;
        padding-bottom: 14px;
        border-bottom: 2px dashed #ffb3d9;
        text-align: center;
      }

      .bio-row {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 13px 0;
        border-bottom: 1.5px dotted #ffd6eb;
      }

      .bio-row:last-child {
        border-bottom: none;
      }

      .bio-icon {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        background: linear-gradient(135deg, #ff80c0, #ffb3d9);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
      }

      .bio-label {
        font-size: 11px;
        color: #e075a8;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 2px;
      }

      .bio-value {
        font-size: 16px;
        color: #7a1a4a;
        font-weight: 700;
      }

      .dots {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 20px;
      }

      .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #ffb3d9;
      }

      .dot:nth-child(2) { background: #ff69b4; transform: scale(1.3); }
      .dot:nth-child(3) { background: #d580ff; }

      footer {
        text-align: center;
        padding: 20px;
        color: #d45f95;
        font-size: 13px;
        font-weight: 700;
        position: relative;
        z-index: 2;
      }
    </style>
  </head>
  <body>

    <div class="bubble b1"></div>
    <div class="bubble b2"></div>
    <div class="bubble b3"></div>
    <div class="bubble b4"></div>

    <nav>
      <a href="index.html">🏠 Home</a>
      <a href="profile.html">🌸 Profile</a>
      <a href="contact.html">💌 Contact</a>
    </nav>

    <div class="hero">
      <p class="label">✨ Web TI ERVI — 2026 ✨</p>
      <h1>Holla!</h1>
      <p class="tagline">Selamat datang di halaman ku~ 💕</p>

      <div class="avatar-wrap">
        <span class="avatar-deco">🌸</span>
        <span class="avatar-deco2">⭐</span>
        <div class="avatar-ring">
          <div class="avatar-inner">
            <img src="images/tidakfantass.jpg" alt="Foto Profil">
          </div>
        </div>
      </div>

      <div class="card">
        <h2>Biodata</h2>
        <div class="bio-row">
          <div class="bio-icon">👩</div>
          <div>
            <p class="bio-label">Nama</p>
            <p class="bio-value">Ervistia Eka F.</p>
          </div>
        </div>
        <div class="bio-row">
          <div class="bio-icon">🎓</div>
          <div>
            <p class="bio-label">NIM</p>
            <p class="bio-value">13242520067</p>
          </div>
        </div>
        <div class="dots">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>
      </div>
    </div>

    <footer>Made with 💖 · © 2026 WEB TI ERVI</footer>

  </body>
</html>