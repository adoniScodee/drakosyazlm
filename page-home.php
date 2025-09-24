<?php
/*
Template Name: Drakos Home Template
*/
get_header(); ?>

<section class="drakos-hero">
  <div class="wrap">
    <h1>Drakos Software — Yazılımı Basitleştirir, Büyümeyi Hızlandırır</h1>
    <p>Kurumsal yazılım, mobil uygulama ve yapay zekâ çözümleri. Hızlı prototip, güvenli üretim.</p>
    <p><a class="button" href="#contact">Ücretsiz Keşif Görüşmesi</a> <a class="button" href="#demo">Canlı Demo İzle</a></p>
  </div>
</section>

<section id="services" class="drakos-services">
  <h2 style="text-align:center;margin-bottom:20px;">Hizmetlerimiz</h2>
  <div class="grid">
    <div class="drakos-card"><h3>Özel Yazılım Geliştirme</h3><p>İş süreçlerinize özel web & backend çözümleri.</p></div>
    <div class="drakos-card"><h3>Mobil Uygulama</h3><p>iOS & Android, performans odaklı.</p></div>
    <div class="drakos-card"><h3>Yapay Zekâ & Veri Bilimi</h3><p>Otomasyon, NLP, öneri motorları.</p></div>
    <div class="drakos-card"><h3>Bulut & DevOps</h3><p>CI/CD, güvenli dağıtım, maliyet optimizasyonu.</p></div>
    <div class="drakos-card"><h3>UI/UX Tasarım</h3><p>Kullanıcı odaklı modern tasarımlar.</p></div>
  </div>
</section>

<section id="demo" style="padding:40px 20px; text-align:center;">
  <h2>Canlı Demo</h2>
  <p>Ürün demo videoları veya canlı sandbox embed'leri buraya eklenebilir.</p>
</section>

<section id="contact" style="padding:40px 20px; background:#f8fafc;">
  <h2 style="text-align:center;">İletişim</h2>
  <div style="max-width:760px;margin:0 auto;">
    <form id="drk-contact-form" method="post" enctype="multipart/form-data">
      <p><input type="text" name="ad" placeholder="İsim" required style="width:100%;padding:10px;margin-bottom:8px;"></p>
      <p><input type="email" name="email" placeholder="E-posta" required style="width:100%;padding:10px;margin-bottom:8px;"></p>
      <p><input type="text" name="telefon" placeholder="Telefon" style="width:100%;padding:10px;margin-bottom:8px;"></p>
      <p><textarea name="mesaj" placeholder="Kısa proje özeti" style="width:100%;padding:10px;margin-bottom:8px;"></textarea></p>
      <p><input type="file" name="dosya" style="margin-bottom:8px;"></p>
      <p><button type="submit">Gönder</button></p>
    </form>
  </div>
</section>

<?php get_footer(); ?>
