<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $conn = new mysqli($servername, $username, $password);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "CREATE DATABASE int220";
  if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . $conn->error;
  }
  echo "<br>";
  $conn->close();
?>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "int220";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "CREATE TABLE shows (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(200),
  image VARCHAR(1000),
  link VARCHAR(1000),
  genre VARCHAR(500),
  lang VARCHAR(20),
  timestamp TIMESTAMP default CURRENT_TIMESTAMP
  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table shows created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
  echo '<br>';
  $conn->close();
?>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "int220";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(200),
  password VARCHAR(80),
  image VARCHAR(300),
  timestamp TIMESTAMP default CURRENT_TIMESTAMP
  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
  echo '<br>';
  $conn->close();
?>

<?php
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $conn = mysqli_connect($server, $username, $password);
  if(!$conn){
    die('Connection Failed: '.mysqli_connect_error());
  }

  $sql = "INSERT INTO `int220`.`shows` (`Name`,`image`,`link`,`genre`,`lang`) 
    VALUES 
    ('Money Heist','/int220/imgs/moneyheist.jpg','https://www.netflix.com/in/title/80192098','Popular on Netflix','en'),
    ('Business Proposal','/int220/imgs/businessproposal.jpg','https://www.netflix.com/in/title/81509440','Popular on Netflix','en'),
    ('Bridgerton','/int220/imgs/bridgerton.jpg','https://www.netflix.com/in/title/80232398','Popular on Netflix','en'),
    ('All of Us Are Dead','/int220/imgs/allofusaredead.jpg','https://www.netflix.com/in/title/81237994','Popular on Netflix','en'),
    ('Squid Game','/int220/imgs/squidgame.jpg','https://www.netflix.com/in/title/81040344','Popular on Netflix','en'),
    ('Lucifer','/int220/imgs/lucifer.jpg','https://www.netflix.com/in/title/80057918','Popular on Netflix','en'),
    ('Stranger Things','/int220/imgs/strangerthings.jpg','https://www.netflix.com/in/title/80057281','Popular on Netflix','en'),
    ('The Fame Game','/int220/imgs/thefamegame.jpg','https://www.netflix.com/in/title/81133092','Popular on Netflix','en'),
    ('The Adam Project','/int220/imgs/theadamproject.jpg','https://www.netflix.com/in/title/81309354','Popular on Netflix','en'),
    ('Lost in Space','/int220/imgs/lostinspace.jpg','https://www.netflix.com/in/title/80104198','Popular on Netflix','en'),
    ('Peaky Blinders','/int220/imgs/peakyblinders.jpg','https://www.netflix.com/in/title/80002479','Popular on Netflix','en'),
    ('The Witcher','/int220/imgs/thewitcher.jpg','https://www.netflix.com/in/title/80189685','Popular on Netflix','en'),
    ('Delhi Crime','/int220/imgs/delhicrime.jpg','https://www.netflix.com/in/title/81076756','Popular on Netflix','en'),
    ('Sacret Games','/int220/imgs/sacretgames.jpg','https://www.netflix.com/in/title/80115328','Popular on Netflix','en'),
    ('Kota Factory','/int220/imgs/kotafactory.jpg','https://www.netflix.com/in/title/81249783','Popular on Netflix','en'),
    ('Narcos','/int220/imgs/narcos.jpg','https://www.netflix.com/in/title/80025172','Popular on Netflix','en'),
    ('Ozark','/int220/imgs/ozark.jpg','https://www.netflix.com/in/title/80117552','Popular on Netflix','en'),
    ('Dark','/int220/imgs/dark.jpg','https://www.netflix.com/in/title/80100172','Popular on Netflix','en'),
    
    ('Peaky Blinders','/int220/imgs/peakyblinders.jpg','https://www.netflix.com/in/title/80002479','Relentless Crime Dramas','en'),
    ('Sacret Games','/int220/imgs/sacretgames.jpg','https://www.netflix.com/in/title/80115328','Relentless Crime Dramas','en'),
    ('Narcos','/int220/imgs/narcos.jpg','https://www.netflix.com/in/title/80025172','Relentless Crime Dramas','en'),
    ('Ozark','/int220/imgs/ozark.jpg','https://www.netflix.com/in/title/80117552','Relentless Crime Dramas','en'),
    ('Dark','/int220/imgs/dark.jpg','https://www.netflix.com/in/title/80100172','Relentless Crime Dramas','en'),
    ('Narcos','/int220/imgs/narcos.jpg','https://www.netflix.com/in/title/80025172','Relentless Crime Dramas','en'),
    ('Ludo','/int220/imgs/ludo.jpg','https://www.netflix.com/in/title/81107576','Relentless Crime Dramas','en'),
    
    ('Stranger Things','/int220/imgs/strangerthings.jpg','https://www.netflix.com/in/title/80057281','US TV Shows','en'),
    ('Lost in Space','/int220/imgs/lostinspace.jpg','https://www.netflix.com/in/title/80104198','US TV Shows','en'),
    ('The Witcher','/int220/imgs/thewitcher.jpg','https://www.netflix.com/in/title/80189685','US TV Shows','en'),
    ('Narcos','/int220/imgs/narcos.jpg','https://www.netflix.com/in/title/80025172','US TV Shows','en'),
    ('Ozark','/int220/imgs/ozark.jpg','https://www.netflix.com/in/title/80117552','US TV Shows','en'),
    
    ('The Adam Project','/int220/imgs/theadamproject.jpg','https://www.netflix.com/in/title/81309354','Action Movies','en'),
    ('Red Notice','/int220/imgs/rednotice.jpg','https://www.netflix.com/in/title/81161626','Action Movies','en'),
    ('Mowgli: Legend of the Jungle','/int220/imgs/mowgli.jpg','https://www.netflix.com/in/title/80993105','Action Movies','en'),
    
    ('The Fame Game','/int220/imgs/thefamegame.jpg','https://www.netflix.com/in/title/81133092','Hindi Movies & TV','en'),
    ('Delhi Crime','/int220/imgs/delhicrime.jpg','https://www.netflix.com/in/title/81076756','Hindi Movies & TV','en'),
    ('Kota Factory','/int220/imgs/kotafactory.jpg','https://www.netflix.com/in/title/81249783','Hindi Movies & TV','en'),
    ('Aranyak','/int220/imgs/aranyak.jpg','https://www.netflix.com/in/title/81226180','Hindi Movies & TV','en'),
    ('Ludo','/int220/imgs/ludo.jpg','https://www.netflix.com/in/title/81107576','Hindi Movies & TV','en'),
    
    ('Money Heist','/int220/imgs/moneyheist.jpg','https://www.netflix.com/in-hi/title/80192098','Popular on Netflix','in-hi'),
    ('Business Proposal','/int220/imgs/businessproposal-hi.jpg','https://www.netflix.com/in-hi/title/81509440','Popular on Netflix','in-hi'),
    ('ब्रिजरटन खानदान','/int220/imgs/bridgerton-hi.jpg','https://www.netflix.com/in-hi/title/80232398','Popular on Netflix','in-hi'),
    ('All of Us Are Dead','/int220/imgs/allofusaredead.jpg','https://www.netflix.com/in-hi/title/81237994','Popular on Netflix','in-hi'),
    ('Squid Game','/int220/imgs/squidgame.jpg','https://www.netflix.com/in-hi/title/81040344','Popular on Netflix','in-hi'),
    ('लूसिफ़र','/int220/imgs/lucifer-hi.jpg','https://www.netflix.com/in-hi/title/80057918','Popular on Netflix','in-hi'),
    ('Stranger Things','/int220/imgs/strangerthings.jpg','https://www.netflix.com/in-hi/title/80057281','Popular on Netflix','in-hi'),
    ('द फ़ेम गेम','/int220/imgs/thefamegame-hi.jpg','https://www.netflix.com/in-hi/title/81133092','Popular on Netflix','in-hi'),
    ('द एडम प्रोजेक्ट','/int220/imgs/theadamproject-hi.jpg','https://www.netflix.com/in-hi/title/81309354','Popular on Netflix','in-hi'),
    ('लॉस्ट इन स्पेस','/int220/imgs/lostinspace-hi.jpg','https://www.netflix.com/in-hi/title/80104198','Popular on Netflix','in-hi'),
    ('पीकी ब्लाइंडर्स','/int220/imgs/peakyblinders.jpg','https://www.netflix.com/in-hi/title/80002479','Popular on Netflix','in-hi'),
    ('The Witcher','/int220/imgs/thewitcher.jpg','https://www.netflix.com/in-hi/title/80189685','Popular on Netflix','in-hi'),
    ('दिल्ली क्राइम','/int220/imgs/delhicrime-hi.jpg','https://www.netflix.com/in-hi/title/81076756','Popular on Netflix','in-hi'),
    ('सेक्रेड गेम्स','/int220/imgs/sacretgames-hi.jpg','https://www.netflix.com/in-hi/title/80115328','Popular on Netflix','in-hi'),
    ('कोटा फ़ैक्ट्री','/int220/imgs/kotafactory-hi.jpg','https://www.netflix.com/in-hi/title/81249783','Popular on Netflix','in-hi'),
    ('Narcos','/int220/imgs/narcos.jpg','https://www.netflix.com/in-hi/title/80025172','Popular on Netflix','in-hi'),
    ('ओज़ार्क','/int220/imgs/ozark-hi.jpg','https://www.netflix.com/in-hi/title/80117552','Popular on Netflix','in-hi'),
    ('Dark','/int220/imgs/dark.jpg','https://www.netflix.com/in-hi/title/80100172','Popular on Netflix','in-hi'),
    ('पीकी ब्लाइंडर्स','/int220/imgs/peakyblinders.jpg','https://www.netflix.com/in-hi/title/80002479','Relentless Crime Dramas','in-hi'),
    ('सेक्रेड गेम्स','/int220/imgs/sacretgames-hi.jpg','https://www.netflix.com/in-hi/title/80115328','Relentless Crime Dramas','in-hi'),
    ('Narcos','/int220/imgs/narcos.jpg','https://www.netflix.com/in-hi/title/80025172','Relentless Crime Dramas','in-hi'),
    ('ओज़ार्क','/int220/imgs/ozark-hi.jpg','https://www.netflix.com/in-hi/title/80117552','Relentless Crime Dramas','in-hi'),
    ('Dark','/int220/imgs/dark.jpg','https://www.netflix.com/in-hi/title/80100172','Relentless Crime Dramas','in-hi'),
    ('Narcos','/int220/imgs/narcos.jpg','https://www.netflix.com/in-hi/title/80025172','Relentless Crime Dramas','in-hi'),
    ('लूडो','/int220/imgs/ludo-hi.jpg','https://www.netflix.com/in-hi/title/81107576','Relentless Crime Dramas','in-hi'),
    ('Stranger Things','/int220/imgs/strangerthings.jpg','https://www.netflix.com/in-hi/title/80057281','US TV Shows','in-hi'),
    ('लॉस्ट इन स्पेस','/int220/imgs/lostinspace-hi.jpg','https://www.netflix.com/in-hi/title/80104198','US TV Shows','in-hi'),
    ('The Witcher','/int220/imgs/thewitcher.jpg','https://www.netflix.com/in-hi/title/80189685','US TV Shows','in-hi'),
    ('Narcos','/int220/imgs/narcos.jpg','https://www.netflix.com/in-hi/title/80025172','US TV Shows','in-hi'),
    ('ओज़ार्क','/int220/imgs/ozark-hi.jpg','https://www.netflix.com/in-hi/title/80117552','US TV Shows','in-hi'),
    ('द एडम प्रोजेक्ट','/int220/imgs/theadamproject-hi.jpg','https://www.netflix.com/in-hi/title/81309354','Action Movies','in-hi'),
    ('Red Notice','/int220/imgs/rednotice.jpg','https://www.netflix.com/in-hi/title/81161626','Action Movies','in-hi'),
    ('मोगली: लेजेंड ऑफ़ द जंगल','/int220/imgs/mowgli-hi.jpg','https://www.netflix.com/in-hi/title/80993105','Action Movies','in-hi'),
    ('द फ़ेम गेम','/int220/imgs/thefamegame-hi.jpg','https://www.netflix.com/in-hi/title/81133092','Hindi Movies & TV','in-hi'),
    ('दिल्ली क्राइम','/int220/imgs/delhicrime-hi.jpg','https://www.netflix.com/in-hi/title/81076756','Hindi Movies & TV','in-hi'),
    ('कोटा फ़ैक्ट्री','/int220/imgs/kotafactory-hi.jpg','https://www.netflix.com/in-hi/title/81249783','Hindi Movies & TV','in-hi'),
    ('आरण्यक','/int220/imgs/aranyak-hi.jpg','https://www.netflix.com/in-hi/title/81226180','Hindi Movies & TV','in-hi'),
    ('लूडो','/int220/imgs/ludo-hi.jpg','https://www.netflix.com/in-hi/title/81107576','Hindi Movies & TV','in-hi');";
  if($conn->query($sql) === true){
    echo 'Success';
  } else {
    echo 'Error: '.$sql.'<br>'.$conn->error;
  }
  $conn->close();
  echo '<br>';
?>