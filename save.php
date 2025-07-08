<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";       // اسم المستخدم في phpMyAdmin
$password = "";           // كلمة المرور (فارغة غالبًا في XAMPP)
$dbname = "form_data";    // اسم قاعدة البيانات

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// التأكد من الاتصال
if ($conn->connect_error) {
  die("فشل الاتصال: " . $conn->connect_error);
}

// استلام البيانات من النموذج
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// إدخال البيانات في الجدول
$sql = "INSERT INTO users (name, address, phone) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $address, $phone);
$stmt->execute();

if ($stmt->affected_rows > 0) {
  echo "✅ تم حفظ البيانات بنجاح!";
} else {
  echo "❌ حدث خطأ أثناء الحفظ.";
}

$stmt->close();
$conn->close();
?>
