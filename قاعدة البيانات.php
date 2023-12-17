<?php
// اتصال بقاعدة البيانات
$servername = "اسم_الخادم";
$username = "اسم_المستخدم";
$password = "كلمة_المرور";
$dbname = "اسم_قاعدة_البيانات";

$conn = new mysqli($servername, $username, $password, $dbname);

// فحص اتصال قاعدة البيانات
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// تنفيذ تسجيل الدخول
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // قم بتنفيذ استعلام SQL لفحص صحة بيانات تسجيل الدخول هنا
    // ...

    // على سبيل المثال:
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // تسجيل الدخول ناجح
        echo "تم تسجيل الدخول بنجاح!";
    } else {
        // تسجيل الدخول فاشل
        echo "فشل تسجيل الدخول. الرجاء التحقق من اسم المستخدم وكلمة المرور.";
    }
}

// تنفيذ إنشاء حساب
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $newUsername = $_POST["new_username"];
    $newPassword = $_POST["new_password"];

    // قم بتنفيذ استعلام SQL لإضافة حساب جديد هنا
    // ...

    // على سبيل المثال:
    $sql = "INSERT INTO users (username, password) VALUES ('$newUsername', '$newPassword')";
    if ($conn->query($sql) === TRUE) {
        echo "تم إنشاء حساب جديد بنجاح!";
    } else {
        echo "فشل إنشاء الحساب. الرجاء المحاولة مرة أخرى.";
    }
}

// أغلق اتصال قاعدة البيانات عند الانتهاء
$conn->close();
?>