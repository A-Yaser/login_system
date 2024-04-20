<?php
$error = array();
$error = array_diff($error, $error);
$name = $email = $password = $cpassword = $age = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    }


    if (isset($_POST['register'])) {
      if (empty(trim($_POST["name"]))) {

        $error[] = "يجب إدخال الاسم";

      } else {
        $name = test_input($_POST["name"]);
        // فحص الاسم إن كان يحوي على مدخلات غير صالحة
        if (preg_match("/[@$!%*?&]/", $name)) {
          $error[] = "أدخل اسم صالح";
        }
      }


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

    if ($_POST["age"] < 10) {
      $error[] = "يجب تحديد العمر";
    } else {
      $age = $_POST["age"];
    }

    if (!isset($error)) {
      header('location:login_form.php');
    }

  }

  if (isset($_POST['login'])) {
    if ($email == test_input($_POST["email"])) {
      echo "test done";
      // $_SESSION['email'] = ;
      // $_SESSION['username'] = $row['Username'];
      // $_SESSION['age'] = $row['Age'];
      // $_SESSION['id'] = $row['Id'];
    }
    // if (isset($_SESSION['valid'])) {
    //   header("Location: home.php");
    // }

  }
}





function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
