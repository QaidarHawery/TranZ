 <!-- image -->       
 <?php 
 $sizeimage=0;
 $countimage=0;
 $sql5="select files_size from fileup1 where id_user=$id and files_type='image/jpeg' or  files_type='image/jpg' or  files_type='image/png' or  files_type='image/gif' " ;
 $anjam=mysqli_query($conn,$sql5);
if(mysqli_num_rows($anjam) > 0)
{
while($user=mysqli_fetch_assoc($anjam))
{  
$sizeimage+=$user['files_size'];
$countimage+=1;
}
}
?>
<!-- video -->
 <?php 
 $sizevideo=0;
 $countvideo=0;
 $sql5="select files_size from fileup1 where id_user=$id and files_type='video/mp4' or  files_type='video/ogg' " ;
 $anjam=mysqli_query($conn,$sql5);
if(mysqli_num_rows($anjam) > 0)
{
while($user=mysqli_fetch_assoc($anjam))
{  
$sizevideo+=$user['files_size'];
$countvideo+=1;
}
}
?>
<!-- audio -->
 <?php 
 $sizeaudio=0;
 $countaudio=0;
 $sql6="select files_size from fileup1 where id_user=$id and files_type='audio/mp3' or  files_type='audio/ogg' or files_type='audio/x-m4a' " ;
 $anjam=mysqli_query($conn,$sql6);
if(mysqli_num_rows($anjam) > 0)
{
while($user=mysqli_fetch_assoc($anjam))
{  
$sizeaudio+=$user['files_size'];
$countaudio+=1;
}
}
?>
<!-- files -->
 <?php 
 $sizefile=0;
 $countfile=0;
 $sql6="select files_size from fileup1 where id_user=$id and files_type!='audio/mp3' and  files_type!='audio/ogg' and files_type!='audio/x-m4a' and files_type!='video/mp4' and  files_type!='video/ogg' and files_type!='image/jpeg' and  files_type!='image/jpg' and  files_type!='image/png' and  files_type!='image/gif' " ;
 $anjam=mysqli_query($conn,$sql6);
if(mysqli_num_rows($anjam) > 0)
{
while($user=mysqli_fetch_assoc($anjam))
{  
$sizefile+=$user['files_size'];
$countfile+=1;

}
}
?>