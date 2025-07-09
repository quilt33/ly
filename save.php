<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "user_paidads"; // تم تعديل اسم قاعدة البيانات

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استقبال البيانات من النموذج
$full_name = $_POST['full_name'];
$city = $_POST['city'];
$identity = $_POST['identity'];
$phone = $_POST['phone'];

// إدخال البيانات في الجدول
$sql = "INSERT INTO users (الاسم_بالكامل, المدينة, حامل_تعريف, رقم_الهاتف)
        VALUES ('$full_name', '$city', '$identity', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "✅ تم حفظ البيانات بنجاح.";
} else {
    echo "❌ خطأ: " . $conn->error;
}

$conn->close();
?>
