<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("location:login.php");
}


function changeUserName($newName)
{
  $_SESSION['username'] = $newName;
  // echo "<pre>";

}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=100%, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="home.css" />
  <script src="script.js">
    // let box = document.getElementById("nameBox");

    // // تعريف الوظيفة لإخفاء العنصر
    // function hideElement() {
    //   var box = document.getElementById("nameBox");
    //   if (box) {
    //     box.style.display = "none";
    //   }
    // }

    // // تعريف الوظيفة لإظهار العنصر
    // function showElement() {
    //   var box = document.getElementById("nameBox");
    //   if (box) {
    //     box.style.display = "block";
    //   }
    // }


  </script>

  <title>Document</title>
  <style></style>
</head>

<body dir="rtl">
  <div class="name-box " id="nameBox">

    <form action="#" method="post">
      <h1>change user name</h1>
      <input type="text" placeholder="enter new user name">
      <input type="submit">
    </form>
  </div>
  <nav class="navbar">



    <ul class="navbar-nav ">
      <li class="nav-item">
        <a href="logout.php" class="btn">تسجيل الخروج</a>
      </li>
      <li class="nav-item">
        <a href="register.php" class="btn">انشاء حساب جديد</a>
      </li>
      <li class="nav-item">
        <a href="register.php" class="btn">تعديل اسم المستخدم</a>
      </li>
    </ul>


  </nav>

  <main>
    <div class="container">
      <div class="content">
        <h3>أهلًا وسهلا بك <span><?php echo $_SESSION['username'] ?></span></h3>
        <!-- <p>this is an admin page</p> -->

      </div>
    </div>
  </main>


</body>

</html>