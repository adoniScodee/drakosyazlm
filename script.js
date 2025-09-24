async function sendMsg(){
  let msg = document.getElementById("chat-input").value;
  if(!msg) return;
  document.getElementById("chat-box").innerHTML += "<p><b>Siz:</b> "+msg+"</p>";
  document.getElementById("chat-input").value="";
  // Burada kendi sunucu tarafı proxy'nizi ayarlamanız gerekir (OpenAI API key gizli tutulmalı)
  // Demo amaçlı sadece echo yapıyoruz
  document.getElementById("chat-box").innerHTML += "<p><b>Asistan:</b> Bu bir demo cevabıdır. Gerçek AI cevabı için sunucu API ekleyin.</p>";
}
