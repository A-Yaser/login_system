<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=100%, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <title>Document</title>
  <style></style>
</head>

<?php


$name = $email = $password = $cpassword = $age = "";

// $_SERVER["REQUEST_METHOD"] == "POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty(trim($_POST["name"]))) {

    $error[] = "يجب إدخال الاسم";

  } else {
    $name = test_input($_POST["name"]);
    // فحص الاسم إن كان يحوي على مدخلات غير صالحة
    if (preg_match("/[@$!%*?&]/", $name)) {
      $error[] = "أدخل اسم صالح";
    }
  }

  if (empty(trim($_POST["email"]))) {
    $error[] = "يجب إدخال بريد الكتروني";
  } else {
    $email = test_input($_POST["email"]);
    // فحص ما إذا كان البريد الالكتروني صالحا
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = "البريد الإلكتروني غير صالح";
    }
  }

  if (empty(trim($_POST["password"]))) {
    $error[] = "يجب إدخال كلمة مرور";
  } else {
    $password = test_input($_POST["password"]);

    // فحص ما إذا كانت كلمة المرور صالحة
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
      $error[] = " يجب أن تحتوي كلمة المرور على أحرف كبيرة وأحرف صغير وأرقام ورمز خاص، ويكون طولها 8 أحرف على الأقل";
    } else {
      if (empty(trim($_POST["cpassword"]))) {
        $error[] = "يجب تأكيد كلمة مرور";
      } else {

        $cpassword = test_input($_POST["cpassword"]);
        // فحص ما إذا كانت الكلمتين متطابقتين
        if ($cpassword != $password) {
          $error[] = "الكلميتن غير متطابقتين!";
        }
      }
    }
  }



  if ($_POST["age"] < 10) {
    $error[] = "يجب تحديد العمر";
  } else {
    $age = $_POST["age"];
  }

  if (!isset($error)) {
    header('location:login.php');
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>



<body dir="rtl">
  <main>
    <div class="container">
      <!-- $_SESSION['PHP_SELF']  -->
      <form action="" method="post">
        <h3>إنشاء حساب</h3>


        <?php
        if (isset($error)) {
          foreach ($error as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
          }
          ;
        }
        ;
        ?>

        <input type="text" name="name" placeholder="أدخل اسمك " required value="<?php if (isset($name)) {
          echo $name;
        } ?>" />

        <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني" required value="<?php if (isset($email)) {
          echo $email;
        } ?>" />
        <input type="password" name="password" placeholder="أدخل كلمة المرور" required value="<?php if (isset($password)) {
          echo $password;
        } ?>" />
        <input type="password" name="cpassword" placeholder="أعد إدخال كلمة المرور لتأكيدها" required value="<?php if (isset($cpassword)) {
          echo $cpassword;
        } ?>" />
        <input type="number" name="age" id="age" min="10" autocomplete="off" required value="<?php if (isset($age)) {
          echo $age;
        } ?>">
        <input type="submit" name="register" value="أنشئ حسابًا" class="form-btn" />
        <p>لديك بالفعل حساب؟ <a href="login.php">سجل الدخول</a></p>
      </form>
    </div>
  </main>

</body>

</html>