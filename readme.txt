Drakos Software - Full Package
===============================

İçerik:
- drakos-software-package/ (tema içinde)
  - style.css
  - functions.php
  - page-home.php  (homepage template)
  - whatsapp-snippet.php
  - assets/whatsapp-icon.png
  - readme.txt

Kurulum:
1) SSH veya FTP ile wp-content/themes/ dizinine 'drakos-software-package' klasörünü yükleyin.
2) WordPress yönetici panelinden 'Görünüm > Temalar' kısmına gidip 'Drakos Software - Full Package' temayı etkinleştirin.
   Not: Bu paket bir child-theme olarak tasarlandı; temanız 'twentytwentyone' olarak ayarlandı. Eğer farklı ana tema kullanıyorsanız
   style.css içindeki 'Template' alanını güncelleyin veya child theme mantığını kendi temanıza göre ayarlayın.

OpenAI API Ayarı:
- Lütfen wp-config.php dosyanıza aşağıdaki satırı ekleyin (anahtarınızı kendi OpenAI hesabınızdan alın):
  define('DRK_OPENAI_API_KEY', 'sk-XXXXXXXXXXXXXXXXXXXXXXXX');

- AI asistan endpoint'i admin-ajax.php üzerinden çalışır. Model olarak 'gpt-4o-mini' kullanılmıştır; tercihinize göre değiştirin.

WhatsApp:
- whatsapp-snippet.php içindeki telefon numarasını +90 ile başlayacak şekilde güncelleyin.
- Eğer eklenti kullanmak isterseniz 'Click to Chat' veya 'WP Social Chat' eklentisini öneririz.

Elementor / Bloklar:
- Bu paket statik bir homepage template içerir (page-home.php). Elementor kullanıyorsanız bu template'i açıp Elementor ile özelleştirebilirsiniz.

Güvenlik Uyarısı:
- OpenAI API anahtarınızı istemci tarafına (JS içinde) kesinlikle koymayın.
- Canlı üretimde HTTPS (SSL) kullanın.
- AI kullanım maliyetlerine dikkat edin.

Destek:
- Bu paketi Drakos için hazırladım. Kurulumda yardım isterseniz bana mesaj atın; kurulum, Elementor blokları veya özel entegrasyon yapabilirim.
