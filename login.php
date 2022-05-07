<body>
  <?php include 'header.php' ?>
  <?php require 'config.php' ?>
  <form action="" method='post'>
    <h1>Login</h1><br>
    Name:<br><input type="text" name="name" id="name"><br><br>
    Enrollment:<br><input type="text" name="user" id="user"><br><br>
    <button>Login</button>

  </form>
  <form action="register.php" method="post">
    <input type="submit" value="Register">
  </form>
  <?php
  if (isset($_POST['user'])) {
    $servername = "localhost";
    $username = "id18840905_divyam4444";
    $password = ")iw9NDM9Ok|n7Gfe";
    $dbname = "id18840905_lampdb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $name = $_POST['name'];
    $user = $_POST['user'];
    $sql = "SELECT * from login;";
    $result = $conn->query($sql);
    $f = 0;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if ($row['name'] == $name && $row['user'] == $user && $row['registered'] == 1) {
          $f = 1;
          break;
        }
        if ($row['name'] == $name && $row['user'] == $user && $row['registered'] == 2) {
          $f = 2;
          break;
        }
      }
      if ($f == 2) {
        $_SESSION['name'] = $name;
        $_SESSION['user'] = $user;
        header("location:index2.php");
      } elseif ($f == 1) {
        $_SESSION['name'] = $name;
        $_SESSION['user'] = $user;
        header("location:index.php");
      } else {
        echo "Invalid Login";
      }
    } else {
      echo "No Login Data";
    }
    $conn->close();
  }
  ?>
  <?php include 'footer.php' ?>
</body>
