<?php 
$url='localhost';
$username='*********';
$password='***********';
$conn=mysqli_connect($url,$username,$password,"***********");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
$i=1;
$day='0';
$date=date('F j, Y', strtotime(" +$day day"));
$posts = $conn->query("SELECT * FROM `daily_story` where date = '$date' limit 1");
while($row = $posts->fetch_assoc()):
$day='0';
$date=date('F j, Y', strtotime(" +$day day"));
$postsn = $conn->query("SELECT * FROM `daily_news` where date = '$date' ORDER BY RAND() limit 1");
while($rown = $postsn->fetch_assoc()):
$day='0';
$date=date('F j, Y', strtotime(" +$day day"));
$postsm = $conn->query("SELECT * FROM `daily_otd` where date = '$date' ORDER BY RAND() limit 1");
while($rowm = $postsm->fetch_assoc()):    
//$day='0';
//$datey=date('F j', strtotime(" +$day day"));
$cd=date('F j, Y');
$d = date('d', strtotime($cd)); 
$m = date('m', strtotime($cd)); 
$postso = $conn->query("SELECT * FROM `daily_wish` WHERE DAY(STR_TO_DATE(date, '%d-%m-%Y')) = $d AND MONTH(STR_TO_DATE(date, '%d-%m-%Y')) = $m AND status NOT IN ('Demise', 'Death', 'EXPIRED') ORDER BY RAND() LIMIT 1");
while($rowo = $postso->fetch_assoc()):      
?> 
{
  "tfa": {
    "type": "standard",

    "pageid": 2,
   
    "originalimage": {
      "source": "https://internship.advocatepedia.com/upload/photos//daily/<?php echo $row['photo'] ?>",
      "width": 839,
      "height": 663
    },
    "description":"<?php echo $row['story'] ?>",
 "normalizedtitle": "<?php echo $row['name'] ?>",
 "nid":"<?php echo $rowm['event'] ?>",
"news": "<?php echo $rown['news'] ?>",
"wish": "Respected Member <?php echo $rowo['name']; ?> from <?php echo $rowo['court'] ?> is having a birthday today and was born on <?php echo $rowo['date'] ?>. I wish Happy Birthday.",
"num": "<?php $n=$rowo['number']; echo "+91.$n"; ?>"
}
 
}                                   
                                <?php endwhile; ?>
                                   <?php endwhile; ?>
                                   <?php endwhile; ?>
                                   <?php endwhile; ?>
