<?php
// Include this file in footer.php or via functions to render a WhatsApp floating button and a small JS to open the AI chat
?>
<a id="whatsapp-float" href="https://wa.me/905xxxxxxxxx?text=Merhaba%20Drakos%20Software,%20projem%20hakk%C4%B1nda%20konu%C5%9Fmak%20istiyorum" target="_blank" rel="noopener">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/whatsapp-icon.png" alt="WhatsApp ile ulaş" style="width:60px;height:60px;">
</a>

<div id="drk-chat">
  <header>Drakos Asistan</header>
  <div class="chat-body" id="chat-body"></div>
  <div class="chat-input">
    <input type="text" id="chat-input" placeholder="Mesajınızı yazın...">
    <button id="chat-send">Gönder</button>
  </div>
</div>

<script>
document.getElementById('chat-send').addEventListener('click', async function(){
  var msg = document.getElementById('chat-input').value;
  if(!msg) return;
  var cb = document.getElementById('chat-body');
  cb.innerHTML += '<p><b>Siz:</b> '+msg+'</p>';
  var fd = new FormData();
  fd.append('action','drk_ai_chat');
  fd.append('message', msg);
  var resp = await fetch('<?php echo admin_url("admin-ajax.php"); ?>', { method: 'POST', body: fd, credentials: 'same-origin' });
  var data = await resp.json();
  if(data.success){
    cb.innerHTML += '<p><b>Asistan:</b> '+data.data.reply+'</p>';
    cb.scrollTop = cb.scrollHeight;
  } else {
    cb.innerHTML += '<p><i>Asistan yanıt veremedi.</i></p>';
  }
  document.getElementById('chat-input').value = '';
});
</script>
