<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Lütfen tüm alanları doğru doldurun.";
        exit;
    }

    $to = "dowletabdullayew672@gmail.com"; // buraya kendi e-posta adresini yaz
    $subject = "Yeni Mesaj - Fan Sitesi";
    $body = "Ad: $name\nEmail: $email\nMesaj: $message";
    $headers = "From: $email";

    if(mail($to, $subject, $body, $headers)) {
        echo "Mesajınız başarıyla gönderildi!";
    } else {
        echo "Mesaj gönderilemedi, lütfen tekrar deneyin.";
    }
} else {
    echo "Geçersiz istek.";
}
?>
