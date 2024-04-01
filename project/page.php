<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <title>TranZ</title>
</head>

<body>
  <?php
  require_once('C:\xampp\htdocs\c\database.php');
  session_start();
  $id = $_SESSION['id'];
  $emailuser = $_SESSION['email'];
  $nameuser = $_SESSION['name'];
  $sql = "select * from user where ID='$id'";
  $anjam = mysqli_query($conn, $sql);
  if (mysqli_num_rows($anjam) > 0) {
    while ($user = mysqli_fetch_assoc($anjam)) {
      $id1 = $user['ID'];
    }
  }




  ?>

  <?php
  if (isset($_POST['save'])) {
    $radio = $_POST['radiobutton'];
  }








  $sql2 = "select id_file,datediff(curdate(),date) as daydiferents from fileup1  where id_user=$id";
  $anjam1 = mysqli_query($conn, $sql2);
  if (mysqli_num_rows($anjam1) > 0) {
    while ($user = mysqli_fetch_assoc($anjam1)) {
      $daysdeferents = $user['daydiferents'];
      if ($daysdeferents >= 7) {
        $idfile1 = $user['id_file'];
        $sql4 = "delete from fileup1 where id_file=$idfile1";
        mysqli_query($conn, $sql4);
      }
    }
  }


  ?>



  <!-- Sidebar  -->
  <div class="sidebar close">
    <a href="#" class="logo">
      <i class='bx bx-transfer'></i>
      <div class="logo-name"><span>Tran</span>Z</div>
    </a>
    <ul class="side-menu">
      <li class="active"><a href="#"><i class='bx bxs-dashboard'></i>Home</a></li>
      <li><a href="#"><i class='bx bx-notification'></i>Notifications</a></li>
      <li><a href="#"><i class='bx bx-trash'></i>Delete</a></li>
      <li><a href="#"><i class='bx bx-download'></i>Download</a></li>
      <li><a href="#" class="upload upload-from-sidebar"><i class='bx bx-upload'></i>Upload files</a></li>
    </ul>
    <ul class="side-menu">
      <li>
        <a href="#" class="logout">
          <i class='bx bx-log-out'></i>
          Logout
        </a>
      </li>
    </ul>
  </div>
  <!-- End of Sidebar -->

  <!-- Main Content -->
  <div class="content">
    <!-- Navbar -->
    <nav>
      <i class="bx bx-menu"></i>
      <form action="" method="POST">
        <div class="form-input">
          <input type="search" placeholder="Search..." />
          <button class="search-btn" type="submit">
            <i class="bx bx-search"></i>
          </button>
        </div>
      </form>
      <input type="checkbox" id="theme-toggle" hidden />
      <label for="theme-toggle" class="theme-toggle"></label>

      <a href="#" class="profile">
        <img src="images/lexica.jpeg">
        <!--Drop-Down-Menu-->
        <div class="drop-menu-wrap" id="subMenu">
          <div class="drop-menu">
            <div class="user-info">
              <img src="images/lexica.jpeg">
              <h3><?php echo $nameuser; ?> <br>
                <span><?php echo $emailuser; ?></span>
              </h3>
            </div>
            <hr>
            <a href="#" class="drop-menu-link">
              <i class='bx bx-log-out'></i>
              <p>Logout</p>
            </a>
            <a href="#" class="drop-menu-link drop-menu-link-settings">
              <i class='bx bxs-cog'></i>
              <p>Setting</p>
              <span>></span>
            </a>

            <!--Radio Buttons-->
            <div class="radio-list" id="settingMenu">
              <a href="#">
                <p>Delete Files After:</p>
              </a>
              <form action="" method="POST">
                <div class="radio-item">
                  <input type="radio" name="radiobutton" value="oneweek" id="radio1" checked>

                  <label for="radio1">One Week</label>
                </div>
                <div class="radio-item">
                  <input type="radio" name="radiobutton" value="onemonth" id="radio2" <?php if (isset($radio) && $radio == "onemonth") echo "checked"; ?>>
                  <label for="radio2">One Month</label>
                </div>
                <div class="radio-item">
                  <input type="radio" name="radiobutton" value="threemonth" id="radio3" <?php if (isset($radio) && $radio == "threemonth") echo "checked"; ?>>
                  <label for="radio3">Three Month</label>
                </div>
                <div class="btns">
                  <button type="submit" name="save">Save</button>
                  <button type="submit" name="cancel">Cancle</button>
                </div>
            </div>
            <!--End-of-Radio-Buttons-->
          </div>
        </div>
        <!--End-of-Drop-Down-Menu-->
        </form>
      </a>
    </nav>

    <!-- End of Navbar -->

    <!-- Main -->
    <?php
    require_once("typesfile.php")



    ?>

    <main>


      <!-- Insights -->

      <div class="main-container">
        <div>
          <ul class="insights">

            <li>
              <i class='bx bx-image'></i>
              <a href="?image">
                <span class="info">
                  <h3>
                    Images
                  </h3>
                  <p><?php echo $countimage; ?> files</p>
                </span>
              </a>
            </li>

            <li><i class='bx bx-file'></i>
              <a href="?docs">
                <span class="info">

                  <h3>
                    Docs
                  </h3>
                  <p><?php echo $countfile; ?> files</p>
                </span>
              </a>
            </li>

            <li>
              <i class='bx bx-video'></i>
              <a href="?video">
                <span class="info">
                  <h3>
                    Videos
                  </h3>
                  <p><?php echo $countvideo ?> files</p>
                </span>
              </a>
            </li>

            <li><i class='bx bx-music'></i>
              <a href="?audio">
                <span class="info">
                  <h3>
                    Audio
                  </h3>
                  <p><?php echo $countaudio; ?> files</p>
                </span>
              </a>
            </li>
          </ul>
          <!-- End of Insights -->
          <!-- BOTTOM-DATA -->

          <div class="bottom-data">
            <div class="orders">
              <div class="header">
                <i class='bx bx-receipt'></i>
                <h3>Recent Opened</h3>
              </div>
              <div class="content-recent-opened">
                <?php require_once('show_files.php'); ?>
              </div>

            </div>


          </div>

          <!-- END OF BOTTOM-DATA -->


          <div>
            <!-- Aside -->
            <?php

            if (isset($_POST['submit'])) {
              // Check if the Directory exist(uploaded) folder where we want to upload images
              $dir = "uploads/";
              if (!is_dir($dir)) {
                echo "directory not found,  create the uploaded folder";
                mkdir($dir);
              }
              $upload = 1;

              // Check if $upload is set to 0 by an error
              if ($upload == 0) {
                echo "Sorry, your file was not uploaded.<br>";
              }
              // if everything is ok, try to upload file
              else {

                $countfiles = count($_FILES['fileToUpload']['name']);
                for ($i = 0; $i < $countfiles; $i++) {
                  $name = $_FILES['fileToUpload']['name'][$i];
                  $tmp = $_FILES['fileToUpload']['tmp_name'][$i];
                  $imageFilSize = $_FILES["fileToUpload"]["size"][$i];
                  $imageFileType = $_FILES['fileToUpload']['type'][$i];
                  if (file_exists($dir . $name)) {
                    echo "Sorry, file " . $name . "  already exists.<br>";
                  } else {
                    $curdate = date("Y/m/d");
                    $no = "no";
                    move_uploaded_file($tmp, "uploads/" . $name);
                    $sql = "insert into fileup1(id_user,id_file,files_name,files_type,files_size,date,pin) values('$id1','','$name','$imageFileType','$imageFilSize','$curdate','$no')";
                    $result = mysqli_query($conn, $sql);
                    echo "<script>location.href='page.php?image'</script>  ";
                  }
                }
              }
            }
            ?>




            <div class="container upload upload-item">
              <div class="header-section">
                <h1>Upload Files</h1>
                <p>Upload files you want to share with your other devices.</p>
                <!--<p>PDF, Images & Videos are allowed.</p>-->
              </div>
              <div class="drop-section">
                <div class="col">
                  <div class="cloud-icon">
                    <img src="icons/cloud.png" alt="cloud" />
                  </div>
                  <span>Drag & Drop your files here</span>
                  <span>OR</span>
                  <button class="file-selector">Browse Files</button>
                  <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" class="file-selector-input" name="fileToUpload[]" multiple />
                </div>
                <div class="col">
                  <div class="drop-here">Drop Here</div>
                </div>
              </div>
              <div class="list-section">
                <div class="list-title">Uploaded Files</div>


                <input type="submit" value="Upload Image" name="submit">

                </form>
                <div class="list"></div>
              </div>
            </div>
          </div>

          <!-- End of Aside -->
        </div>
    </main>
    <!-- End of Main -->
  </div>

  <script src="index.js"></script>
  <script src="script.js"></script>

  <script>
    let subMenu = document.getElementById("subMenu");
    let profileBTN = document.querySelector('.profile');
    let settingMenu = document.getElementById("settingMenu");
    let settingLink = document.querySelector('.drop-menu-link-settings');
    let arrow = document.querySelector('.drop-menu-link-settings span');

    profileBTN.addEventListener("click", function() {
      subMenu.classList.toggle("open-menu");
      subMenu.classList.remove("open-setting")
    });


    settingLink.addEventListener("click", function() {
      subMenu.classList.toggle("open-setting");
      arrow.classList.toggle("rotate-arrow");
    });
  </script>

</body>

</html>