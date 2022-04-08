<?php
$name = "Not yet logged in";
session_start();
if(isset($_SESSION['email'])){
    $name = $_SESSION['email'];
} else {
    setcookie('notloggedin', 'true', 0, '/');
    header("Location: http://localhost/int220/in-hi/");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/int220/css/nflx.css" data-uia="botLink">
    <link rel="shortcut icon" href="/int220/imgs/favicon.ico"/>
    <link rel="stylesheet" href="/int220/css/legal_header.css"/>
    <link rel="stylesheet" href="/int220/css/account.css"/>
    <title><?php echo $name?></title>
</head>
<body>
<?php
    if(isset($_POST) && isset($_FILES['img'])) {
        $target_dir = "../../profilepicture/";
        $imageName = $_SESSION['email'] . basename($_FILES["img"]["name"]);
        $target_file = $target_dir . $_SESSION['email'] . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<script>alert('File is not an image.');</script>";
            $uploadOk = 0;
        }
        if ($_FILES["img"]["size"] > 500000) {
            echo "<script>alert('Sorry, your file is too large.');</script>";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            echo "<script>alert('Sorry, only JPG, JPEG & PNG files are allowed.');</script>";
            $uploadOk = 0;
        }
        if ($uploadOk != 0) {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                
                $server = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'int220';
            
                $conn = new mysqli($server, $username, $password, $dbname);
                if($conn->connect_error){
                die('Connection Failed: '.$conn->connect_error);
                }
                $sql = "UPDATE users SET image = '".$imageName."' where email = '".$_SESSION['email']."';";
                $result = $conn->query($sql);
                if($result){
                    echo "<script>alert('Profile picture updated successfully.');</script>";
                } else {
                    echo "<script>alert('Profile picture update failed.');</script>";
                }
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
            }
        }
    }
?>
<header>
    <div class="title_cont">
        <svg viewBox="0 0 111 30" class="svg-icon svg-icon-netflix-logo" focusable="false"><g id="netflix-logo"><path d="M105.06233,14.2806261 L110.999156,30 C109.249227,29.7497422 107.500234,29.4366857 105.718437,29.1554972 L102.374168,20.4686475 L98.9371075,28.4375293 C97.2499766,28.1563408 95.5928391,28.061674 93.9057081,27.8432843 L99.9372012,14.0931671 L94.4680851,-5.68434189e-14 L99.5313525,-5.68434189e-14 L102.593495,7.87421502 L105.874965,-5.68434189e-14 L110.999156,-5.68434189e-14 L105.06233,14.2806261 Z M90.4686475,-5.68434189e-14 L85.8749649,-5.68434189e-14 L85.8749649,27.2499766 C87.3746368,27.3437061 88.9371075,27.4055675 90.4686475,27.5930265 L90.4686475,-5.68434189e-14 Z M81.9055207,26.93692 C77.7186241,26.6557316 73.5307901,26.4064111 69.250164,26.3117443 L69.250164,-5.68434189e-14 L73.9366389,-5.68434189e-14 L73.9366389,21.8745899 C76.6248008,21.9373887 79.3120255,22.1557784 81.9055207,22.2804387 L81.9055207,26.93692 Z M64.2496954,10.6561065 L64.2496954,15.3435186 L57.8442216,15.3435186 L57.8442216,25.9996251 L53.2186709,25.9996251 L53.2186709,-5.68434189e-14 L66.3436123,-5.68434189e-14 L66.3436123,4.68741213 L57.8442216,4.68741213 L57.8442216,10.6561065 L64.2496954,10.6561065 Z M45.3435186,4.68741213 L45.3435186,26.2498828 C43.7810479,26.2498828 42.1876465,26.2498828 40.6561065,26.3117443 L40.6561065,4.68741213 L35.8121661,4.68741213 L35.8121661,-5.68434189e-14 L50.2183897,-5.68434189e-14 L50.2183897,4.68741213 L45.3435186,4.68741213 Z M30.749836,15.5928391 C28.687787,15.5928391 26.2498828,15.5928391 24.4999531,15.6875059 L24.4999531,22.6562939 C27.2499766,22.4678976 30,22.2495079 32.7809542,22.1557784 L32.7809542,26.6557316 L19.812541,27.6876933 L19.812541,-5.68434189e-14 L32.7809542,-5.68434189e-14 L32.7809542,4.68741213 L24.4999531,4.68741213 L24.4999531,10.9991564 C26.3126816,10.9991564 29.0936358,10.9054269 30.749836,10.9054269 L30.749836,15.5928391 Z M4.78114163,12.9684132 L4.78114163,29.3429562 C3.09401069,29.5313525 1.59340144,29.7497422 0,30 L0,-5.68434189e-14 L4.4690224,-5.68434189e-14 L10.562377,17.0315868 L10.562377,-5.68434189e-14 L15.2497891,-5.68434189e-14 L15.2497891,28.061674 C13.5935889,28.3437998 11.906458,28.4375293 10.1246602,28.6868498 L4.78114163,12.9684132 Z" id="Fill-14"></path></g></svg>
        <div class="line_sep"></div>
        <h2>अकाउंट</h2>
    </div>
    <div class="header__container">
        <a href="/int220/in-hi/" class="join_netflix">
            <?php
            if(isset($_SESSION['email'])){
                echo "होम पर जाएं";
            } else {
                echo "Netflix जॉइन करें";
            }
            ?>
        </a>
        <a href="/int220/in-hi/login"><button class="button_login">
            <?php
                if(isset($_SESSION['email'])){
                    echo "साइन आउट करें";
                } else {
                    echo "साइन इन करें";
                }
            ?>
        </button></a>
    </div>
</header>
<div class="main_content">
    <img src=<?php 
        $email = $_SESSION['email'];

        $server = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'int220';
    
        $conn = new mysqli($server, $username, $password, $dbname);
        if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
        }
        $sql = "SELECT image FROM users where email = '".$email."';";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row['image'] == "default"){
                    echo '"/int220/imgs/default.png"';
                } else {
                    echo '"/int220/profilepicture/'.$row['image'].'"';
                }
            }
        }else{
            echo '"/int220/imgs/default.png"';
        }
        $conn->close();
    ?> alt="" class="userprofile">
    <form action="" method="post" class="changeImage" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="submit" name="submit" value="चित्र को बदलें" class="button_login">
    </form>
    <H1>आपका ईमेल: <?php echo $_SESSION['email']; ?></H1>
</div>
</body>
</html>