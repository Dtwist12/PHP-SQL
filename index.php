<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
  
  <?php
$servername = 'localhost';
$username='root';
$password='';
$db ='Dogs';
$conn=mysqli_connect($servername,$username,$password,$db);

if(!conn){
    die("connection failed:" . mysqli_connect_error());
}

$sql='create database Dogs';

if ($conn->query($sql)) {
    echo 'successfully created database';
}else{
    echo ' Error with the query' . $conn->error;
}


$sql='create table Info(
    id int(6) auto_increment,
    Breed varchar(255) not null,
    LifeSpan int(8) not null,
    Size varchar(255) not null,
    personality varchar(255) not null,
    primary key (id)
);
';
if ($conn->query($sql)) {
    echo 'successfully created table';
}else{
    echo ' Error with the query' . $conn->error;
}

$sql = '
insert into Info(Breed,LifeSpan,Size,personality)
values 
("Yorki",15,"small","companion"),
("Eskimo",15,"medium","affectionate"),
("GermanShepard",14,"large","guarding"),
("Labsky",12,"large","loving"),
("Pomsky",15,"small","playful");
';
if ($conn->query($sql)) {
    echo 'successfully inserted data';
}else{
    echo ' Error with the query' . $conn->error;
}

$sql = 
"select * from Info;";
$result =$conn->query($sql);
if($result->num_rows > 0){
    echo "these are the dogs: \n";
foreach ($result as $Info){
 echo "ID: " . $Info ['id'];
 echo "Breed: " . $Info ['Breed'];
echo "LifeSpan:" . $Info ['LifeSpan'];
echo "Size:" . $Info ['Size'];
echo "personality:" . $Info['personality'];
}
}else{
    echo "There are 0 results";
}

?>

</body>
</html>
