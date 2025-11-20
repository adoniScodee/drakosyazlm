<?php
// -----------------------------------------------------------
// Drakos.Software — Backend Fonksiyonları
// -----------------------------------------------------------

// Güvenlik: XSS temizleme
function clean($str) {
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}

// Kullanıcı IP adresi
function getIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
    return $_SERVER['REMOTE_ADDR'];
}

// Basit loglama
function logMessage($message) {
    $logFile = __DIR__ . "/logs.txt";
    $date = date("Y-m-d H:i:s");
    file_put_contents($logFile, "[$date] $message" . PHP_EOL, FILE_APPEND);
}

// İletişim formu e-posta gönderme
function sendContactMail($name, $email, $phone, $message) {

    $name = clean($name);
    $email = clean($email);
    $phone = clean($phone);
    $message = clean($message);

    $to = "info@drakos.software";
    $subject = "Yeni Mesaj (Drakos.Software)";
    
    $body = "
        İsim: $name\n
        Email: $email\n
        Telefon: $phone\n
        Mesaj:\n$message
    ";

    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        logMessage("Mesaj gönderildi: $email");
        return true;
    } else {
        logMessage("HATA: Mesaj gönderilemedi -> $email");
        return false;
    }
}

// API endpoint örneği
function apiResponse($status, $data = []) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        "status" => $status,
        "data" => $data
    ]);
    exit;
}
