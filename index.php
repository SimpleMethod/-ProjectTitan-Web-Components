<?php
ini_set('display_errors', 1);
$con = mysqli_connect("127.0.0.1","datauser","password","database");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $debug = $_GET['debugmode'];
  $value = $_GET['value'];
  $name = $_GET['nick'];
  $options =  $_GET['opt'];
  $data =date("Y.m").$name;
  $hashvalue= md5($data);
  $hash=$_GET['hash'];
  $hashvalue=strtoupper($hashvalue);

if($debug==0000)
{
printf("<table><tr><td><b>Zapytanie</b></td><td><b>Wartość</b></td></tr><tr><td>Nick</td><td>%s</td></tr><tr><td>Value</td><td>%s</td></tr><tr><td>Opcja</td><td>%d</td></tr>><tr><td>PreHash</td><td>%s</td></tr><tr><td>Hash Serwer</td><td>%s</td></tr><tr><td>Hash client</td><td>%s</td></tr></table> \n",$name,$value, $options,$data,$hashvalue,$hash );
}
  
if ($options==1 && $stmt = $con->prepare("SELECT Nick,Kills,Death,NumberPD FROM ProjectTitan WHERE Nick=?")) 
{
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($nc,$kil,$dea,$numPD);
    $stmt->fetch();
    printf("Gracz %s zabił %d przeciwników, zginał %d razy i uzyskał %d punktów doświadczenia\n", $nc,$kil,$dea,$numPD);
    $stmt->close();
}

if ($options==2 && $hashvalue==$hash && $stmt = $con->prepare("INSERT INTO ProjectTitan (Nick) SELECT * FROM (SELECT ?) AS tmp WHERE NOT EXISTS (SELECT Nick FROM ProjectTitan WHERE Nick = ?) LIMIT 1")) 
{
    printf("Dodano do bazy");
    $stmt->bind_param("ss", $name,$name);
    $stmt->execute();
    $stmt->close();
}

if ($options==3 && $hashvalue==$hash && $stmt = $con->prepare("UPDATE ProjectTitan SET Kills=Kills+ ? WHERE Nick = ?")) {
    $stmt->bind_param("ss", $value, $name);
    $stmt->execute();
    $stmt->close();
}

if ($options==4 && $hashvalue==$hash && $stmt = $con->prepare("UPDATE ProjectTitan SET Death=Death+ ? WHERE Nick = ?")) {
    $stmt->bind_param("ss", $value, $name);
    $stmt->execute();
    $stmt->close();
}

if ($options==5 && $hashvalue==$hash && $stmt = $con->prepare("UPDATE ProjectTitan SET NumberPD=NumberPD+ ? WHERE Nick = ?")) {
    $stmt->bind_param("ss", $value, $name);
    $stmt->execute();
    $stmt->close();
}
?>

