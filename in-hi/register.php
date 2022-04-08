<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix</title>
    <link type="text/css" rel="stylesheet" href="/int220/css/nflx.css" data-uia="botLink">
    <link rel="shortcut icon" href="/int220/imgs/favicon.ico"/>
    <link rel="stylesheet" href="/int220/css/register.css"/>
</head>
<body>
    <?php
        function isValidEmail($email){ 
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }
        function sendConfirmationMail($email){
            $subject = "उमंग वर्मा द्वारा Netflix क्लोन में आपका स्वागत है";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";               
            $message = "<div><h1 style='width:100%; text-align:center;'>नमस्कार, Netflix क्लोन में आपका स्वागत है</h1><img style='width:100%;' src='https://c.tenor.com/wZW05QUURk4AAAAC/welcome-anime.gif' alt='animated welcome'><br /> <p style='width:100%; text-align:center;'>आपने Netflix क्लोन के लिए सफलतापूर्वक पंजीकरण कर लिया है। <br />Project का आनंद लें<br />के द्वारा निर्मित: उमंग वर्मा<br />धन्यवाद</p></div>";       
            if(mail($email, $subject, $message, $headers)){
                return true;
            } else {
                return false;
            }
        }
        if(isset($_POST) && isset($_POST['email'])){
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'int220';
        
            $conn = new mysqli($server, $username, $password, $dbname);
            if($conn->connect_error){
            die('Connection Failed: '.$conn->connect_error);
            }
            $sql = "SELECT * FROM users where email = '".$_POST['email']."';";
            $result = $conn->query($sql);
            if($result -> num_rows > 0){
                setcookie('emailsaved', 'true', 0, '/');
                header("Location: http://localhost/int220/in-hi/");
                exit;
            } 
            $conn->close();
        }
        if(isset($_POST) && isset($_POST['email']) && isset($_POST['password'])){
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $conn = mysqli_connect($server, $username, $password);
            if(!$conn){
                die('Connection Failed: '.mysqli_connect_error());
            }
            $passwordpo = hash('sha256', $_POST['password']);
            $sql = "INSERT INTO `int220`.`users` (`email`,`password`,`image`) 
                VALUE ('".$_POST['email']."','".$passwordpo."','default')";
            if($conn->query($sql) === true){
                session_start();
                if(isValidEmail($_POST['email'])){
                    sendConfirmationMail($_POST['email']);
                }
                $_SESSION['email'] = $_POST['email'];
                header('Location: http://localhost/int220/in-hi/');
            } else {
                echo 'Error: '.$sql.'<br>'.$conn->error;
            }
            $conn->close();
        }
        
    ?>
    <header>
        <svg viewBox="0 0 111 30" class="svg-icon svg-icon-netflix-logo" focusable="false"><g id="netflix-logo"><path d="M105.06233,14.2806261 L110.999156,30 C109.249227,29.7497422 107.500234,29.4366857 105.718437,29.1554972 L102.374168,20.4686475 L98.9371075,28.4375293 C97.2499766,28.1563408 95.5928391,28.061674 93.9057081,27.8432843 L99.9372012,14.0931671 L94.4680851,-5.68434189e-14 L99.5313525,-5.68434189e-14 L102.593495,7.87421502 L105.874965,-5.68434189e-14 L110.999156,-5.68434189e-14 L105.06233,14.2806261 Z M90.4686475,-5.68434189e-14 L85.8749649,-5.68434189e-14 L85.8749649,27.2499766 C87.3746368,27.3437061 88.9371075,27.4055675 90.4686475,27.5930265 L90.4686475,-5.68434189e-14 Z M81.9055207,26.93692 C77.7186241,26.6557316 73.5307901,26.4064111 69.250164,26.3117443 L69.250164,-5.68434189e-14 L73.9366389,-5.68434189e-14 L73.9366389,21.8745899 C76.6248008,21.9373887 79.3120255,22.1557784 81.9055207,22.2804387 L81.9055207,26.93692 Z M64.2496954,10.6561065 L64.2496954,15.3435186 L57.8442216,15.3435186 L57.8442216,25.9996251 L53.2186709,25.9996251 L53.2186709,-5.68434189e-14 L66.3436123,-5.68434189e-14 L66.3436123,4.68741213 L57.8442216,4.68741213 L57.8442216,10.6561065 L64.2496954,10.6561065 Z M45.3435186,4.68741213 L45.3435186,26.2498828 C43.7810479,26.2498828 42.1876465,26.2498828 40.6561065,26.3117443 L40.6561065,4.68741213 L35.8121661,4.68741213 L35.8121661,-5.68434189e-14 L50.2183897,-5.68434189e-14 L50.2183897,4.68741213 L45.3435186,4.68741213 Z M30.749836,15.5928391 C28.687787,15.5928391 26.2498828,15.5928391 24.4999531,15.6875059 L24.4999531,22.6562939 C27.2499766,22.4678976 30,22.2495079 32.7809542,22.1557784 L32.7809542,26.6557316 L19.812541,27.6876933 L19.812541,-5.68434189e-14 L32.7809542,-5.68434189e-14 L32.7809542,4.68741213 L24.4999531,4.68741213 L24.4999531,10.9991564 C26.3126816,10.9991564 29.0936358,10.9054269 30.749836,10.9054269 L30.749836,15.5928391 Z M4.78114163,12.9684132 L4.78114163,29.3429562 C3.09401069,29.5313525 1.59340144,29.7497422 0,30 L0,-5.68434189e-14 L4.4690224,-5.68434189e-14 L10.562377,17.0315868 L10.562377,-5.68434189e-14 L15.2497891,-5.68434189e-14 L15.2497891,28.061674 C13.5935889,28.3437998 11.906458,28.4375293 10.1246602,28.6868498 L4.78114163,12.9684132 Z" id="Fill-14"></path></g></svg>
        <a href="login" class="loginBtn">साइन इन करें</a>
    </header>
    <div class="container">
        <div class="main">
            <div class="first">
                <img src="/int220/imgs/Devices.png" alt="" class="devices">
                <h6>स्टेप <b>1/3</b></h6>
                <h1>अपनी अकाउंट सेटिंग पूरी करें</h1>
                <p>Netflix को आपके लिए पर्सनलाईज़ किया गया है. किसी भी समय किसी भी डिवाइस पर देखने के लिए पासवर्ड बनाएं.</p>
                <button class="btn" onclick="openSecond()">आगे बढ़ें</button>
            </div>
            <div class="second">
                <h6>स्टेप <b>1/3<b></h6>
                <h1>अपनी मेंबरशिप शुरू करने के लिए पासवर्ड बनाएं</h1>
                <p>बस कुछ और स्टेप, और हो गया! <br />हमें भी पेपरवर्क अच्छा नहीं लगता.</p>
                <form action="/int220/in-hi/register.php" method="post">
                    <input type="email" name="email" placeholder="ईमेल" value="<?php if(isset($_POST) && isset($_POST['email'])) echo $_POST['email']?>" required>
                    <input type="password" placeholder="पासवर्ड" name="password" required>
                    <button class="btn" type="submit">आगे बढ़ें</button>
                </form>
            </div>
            <div class="third">

            </div>
        </div>
    </div>
    <script>
        function openSecond(){
            let second = document.querySelector('.second');
            let first = document.querySelector('.first');
            first.style.display = 'none';
            second.style.display = 'block';
        }
    </script>
</body>
</html>