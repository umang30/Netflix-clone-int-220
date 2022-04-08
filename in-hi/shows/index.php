<?php
    include 'base.php';
    include 'header.php';
?>
<div class="main">
    <div class="top">
        <h1>सिर्फ़ Netflix पर</h1>
        <p>Netflix पर ऐसे अनोखे ओरिजिनल प्रोग्राम हैं जो आपको और कहीं नहीं मिलेंगे. फ़िल्में, टीवी शो, स्पेशल्स, और अन्य कई कार्यक्रम, जो खास तौर पर आपके लिए तैयार किए गए हैं.</p>
    </div>
    <?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'int220';

    $conn = new mysqli($server, $username, $password, $dbname);
    if($conn->connect_error){
      die('Connection Failed: '.$conn->connect_error);
    }
    $sql = "SELECT genre FROM shows where lang = 'in-hi' group by genre order by id asc";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $sql1 = "SELECT * FROM shows where genre = '".$row['genre']."' and lang = 'in-hi' order by id asc";
        $result1 = $conn->query($sql1);
        if($result1->num_rows > 0){
          echo '<div class="listArr">';
          echo '<h4 class="listTitle">'.$row['genre'].'</h4>';
          echo '<div class="list_cont">';
          while($row1 = $result1->fetch_assoc()){
            echo '<a class="list_card" href="'.$row1['link'].'">';
            echo '<img class="list_img" src="'.$row1['image'].'" alt="'.$row1['Name'].'">';
            echo '<p class="series_title">'.$row1['Name'].'</p>';
            echo '</a>';
          }
          echo '</div>';
          echo '</div>';
        }
      }
    }
    $conn->close();
    ?>
</div>
<?php
    include 'footer.php'
?>