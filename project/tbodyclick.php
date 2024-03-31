<!-- display image file-->
<?php
if(isset($_GET['image']))
{
    $sql7="select * from fileup1 where id_user=$id and files_type='image/jpeg' or  files_type='image/jpg' or  files_type='image/png' or  files_type='image/gif' " ;
    $anjam=mysqli_query($conn,$sql7);
   if(mysqli_num_rows($anjam) > 0)
   {
   while($user=mysqli_fetch_assoc($anjam))
   {  

    echo    "<tr>
    
    <td>";

    echo "<a class='navbar-brand'  target='_self' href='uploaded\\$user[files_name]'>" ;
 echo  "<i class='bx bx-image'></i>";
 echo "</a>"; 

      echo "<p>".$user['files_name']."</p>
    </td>
    <td>". $user['files_type']."</td>
    <td> <P>". $user['files_size']."</P></td>
    
    <td> <a href='?id=$user[id_file]' class='btn btn-danger'>delete</a>  </td>
    <td> <input type='checkbox' name='editid[]' value='$user[id_file]'";
    
  if(!empty($_POST['editid']))  
foreach($_POST['editid'] as $val)
{
   if($val==$user['id_file']) 
  {echo "checked";}
}
echo "
>  </td>
</tr>";


   }
   }

  
    
}


// display docs file-->

elseif(isset($_GET['docs']))
{
    $sql7="select * from fileup1 where id_user=$id and files_type!='audio/mp3' and  files_type!='audio/ogg' and files_type!='audio/x-m4a' and files_type!='video/mp4' and  files_type!='video/ogg' and files_type!='image/jpeg' and  files_type!='image/jpg' and  files_type!='image/png' and  files_type!='image/gif' " ;
    $anjam=mysqli_query($conn,$sql7);
   if(mysqli_num_rows($anjam) > 0)
   {
   while($user=mysqli_fetch_assoc($anjam))
   {  

    echo    "<tr>
    
    <td>";

    echo "<a class='navbar-brand'  target='_self' href='uploaded\\$user[files_name]'>" ;
 echo  "<i class='bx bx-file'></i>";
 echo "</a>"; 

      echo "<p>".$user['files_name']."</p>
    </td>
    <td>". $user['files_type']."</td>
    <td> <P>". $user['files_size']."</P></td>
    
    <td> <a href='?id=$user[id_file]' class='btn btn-danger'>delete</a>  </td>
</tr>";


   }
   }

}



// display videos file-->


elseif(isset($_GET['video']))
{
    $sql7="select * from fileup1 where id_user=$id and files_type='video/mp4' or  files_type='video/ogg' " ;
    $anjam=mysqli_query($conn,$sql7);
   if(mysqli_num_rows($anjam) > 0)
   {
   while($user=mysqli_fetch_assoc($anjam))
   {  

    echo    "<tr>
    
    <td>";

    echo "<a class='navbar-brand'  target='_self' href='uploaded\\$user[files_name]'>" ;
 echo  "<i class='bx bx-video'></i>";
 echo "</a>"; 

      echo "<p>".$user['files_name']."</p>
    </td>
    <td>". $user['files_type']."</td>
    <td> <P>". $user['files_size']."</P></td>
    
    <td> <a href='?id=$user[id_file]' class='btn btn-danger'>delete</a>  </td>
</tr>";


   }
   }

}


 
 
// display audio file-->


elseif(isset($_GET['audio']))
{
    $sql7="select * from fileup1 where id_user=$id and files_type='audio/mp3' or  files_type='audio/ogg' or files_type='audio/x-m4a' " ;
    $anjam=mysqli_query($conn,$sql7);
   if(mysqli_num_rows($anjam) > 0)
   {
   while($user=mysqli_fetch_assoc($anjam))
   {  

    echo    "<tr>
    
    <td>";

  
   
  echo "<a class='navbar-brand'  target='_self' href='uploaded\\$user[files_name]'>" ;
 echo  "<i class='bx bx-music'></i>";
 echo "</a>"; 

      echo "<p>".$user['files_name']."</p>
    </td>
    <td>". $user['files_type']."</td>
    <td> <P>". $user['files_size']."</P></td>
    
    <td> <a href='?id=$user[id_file]' class='btn btn-danger'>delete</a>  </td>
</tr>";


   }
   }

   
  
}

// display all files
elseif(isset($_GET['all']))
{

   $sql="select * from fileup1 where id_user=$id";
   $anjam=mysqli_query($conn,$sql);
   if(mysqli_num_rows($anjam) > 0)
   {
   while($user=mysqli_fetch_assoc($anjam))
   {
   
     
       echo    "<tr>
       
                                   <td>";
                                   echo "<a class='navbar-brand'  target='_self' href='uploaded\\$user[files_name]'>" ;
                                 
                                   if($user['files_type']=="image/jpeg" || $user['files_type']=="image/jpg" || $user['files_type']=="image/png" || $user['files_type']=="image/gif")
                                   {
                                     echo  "<i class='bx bx-image'></i>";}
                                     elseif($user['files_type']=="video/mp4")
                                       {echo  "<i class='bx bx-video'></i>";}
                                       elseif($user['files_type']=="audio/mp3 "  || $user['files_type']=="audio/ogg" || $user['files_type']=="audio/x-m4a")
                                       {echo  "<i class='bx bx-music'></i>";}
                                     
                                     else
                                       {
                                           echo  "<i class='bx bx-file'></i>";
                                       }
                                       echo "</a>";  
                                     echo "<p>".$user['files_name']."</p>
                                   </td>
                                   <td>". $user['files_type']."</td>
                                   <td> <P>". $user['files_size']."</P></td>
                                   
                                   <td> <a href='?id=$user[id_file]' class='btn btn-danger'>delete</a>  </td>
                                   <td> <input type='checkbox' name='editid[]' value='$user[id_file]' ";
                                   
                                   if(!empty($_POST['editid']))  
                                   foreach($_POST['editid'] as $val)
                                   {
                                      if($val==$user['id_file']) 
                                     {echo "checked";}
                                   }
                                   
                                   
                                   
                               echo "    >  </td>
                                 
                               </tr>";
                      
                   
   }
   
   }

}
else{
  $sql="select * from fileup1 where id_user=$id";
  $anjam=mysqli_query($conn,$sql);
  if(mysqli_num_rows($anjam) > 0)
  {
  while($user=mysqli_fetch_assoc($anjam))
  {
  
    
      echo    "<tr>
      
                                  <td>";
                                  echo "<a class='navbar-brand'  target='_self' href='uploaded\\$user[files_name]'>" ;
                                
                                  if($user['files_type']=="image/jpeg" || $user['files_type']=="image/jpg" || $user['files_type']=="image/png" || $user['files_type']=="image/gif")
                                  {
                                    echo  "<i class='bx bx-image'></i>";}
                                    elseif($user['files_type']=="video/mp4")
                                      {echo  "<i class='bx bx-video'></i>";}
                                      elseif($user['files_type']=="audio/mp3 "  || $user['files_type']=="audio/ogg" || $user['files_type']=="audio/x-m4a")
                                      {echo  "<i class='bx bx-music'></i>";}
                                    
                                    else
                                      {
                                          echo  "<i class='bx bx-file'></i>";
                                      }
                                      echo "</a>";  
                                    echo "<p>".$user['files_name']."</p>
                                  </td>
                                  <td>". $user['files_type']."</td>
                                  <td> <P>". $user['files_size']."</P></td>
                                  
                                  <td> <a href='?id=$user[id_file]' class='btn btn-danger'>delete</a>  </td>
                                  <td> <input type='checkbox' name='editid[]' value='$user[id_file]' ";
                                  
                                  if(!empty($_POST['editid']))  
                                  foreach($_POST['editid'] as $val)
                                  {
                                     if($val==$user['id_file']) 
                                    {echo "checked";}
                                  }
                                  
                                  
                                  
                              echo "    >  </td>
                                
                              </tr>";
                     
                  
  }
  
  }








}



?>