<?php
  if (strpos($id,"HT") !== false)  //Hotel
  {  
    $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
    
    $hasil=mysqli_query($conn, $querysearch);
    
    while($baris = mysqli_fetch_assoc($hasil))
    {
      if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']==''))
      {
        echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
      }
      else
      {
        echo "<a href='../_foto/".$baris['gallery_tourism']."'><img src='../_foto/".$baris['gallery_tourism']."'></a>";
      }
    }
  } 
  elseif (strpos($id,"TM") !== false) //Tourism
  {  
    $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id'";       
    
    $hasil=mysqli_query($conn, $querysearch);
    
    while($baris = mysqli_fetch_assoc($hasil))
    {
      if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']==''))
      {
        echo "<a href='../_foto/mugen.jpg'><img src='../_foto/mugen.jpg' ></a>";
      }
      else
      {
        echo "<a href='../_foto/".$baris['gallery_tourism']."'><img src='../_foto/".$baris['gallery_tourism']."'></a>";
      }
    }
  } 
  elseif (strpos($id,"SO") !== false) //Souvenir
  {  
    $querysearch  ="SELECT a.id, b.gallery_souvenir FROM souvenir as a left join souvenir_gallery as b on a.id=b.id where a.id='$id' ";       
    
    $hasil=mysqli_query($conn, $querysearch);
    
    while($baris = mysqli_fetch_assoc($hasil))
    {
      if(($baris['gallery_souvenir']=='-')||($baris['gallery_souvenir']==''))
      {
        echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
      }
      else
      {
        echo "<a href='../_foto/".$baris['gallery_souvenir']."'><img src='../_foto/".$baris['gallery_souvenir']."'></a>";
      }
    }
  } 
  elseif (strpos($id,"RM") !== false) //Kuliner
  {  
    $querysearch  ="SELECT a.id, b.gallery_culinary FROM culinary_place as a left join culinary_gallery as b on a.id=b.id where a.id='$id' ";       

    $hasil=mysqli_query($conn, $querysearch);
    while($baris = mysqli_fetch_assoc($hasil))
    {
      if(($baris['gallery_culinary']=='-')||($baris['gallery_culinary']==''))
      {
        echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
      }
      else
      {
        echo "<a href='../_foto/".$baris['gallery_culinary']."'><img src='../_foto/".$baris['gallery_culinary']."'></a>";
      }
    }
  } 
  elseif (strpos($id,"M") !== false) 
  {  //Worship

    $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";       
    
    $hasil=mysqli_query($conn, $querysearch);
    
    while($baris = mysqli_fetch_assoc($hasil))
    {
      if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']==''))
      {
        echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
      }
      else{
        echo "<a href='../_foto/".$baris['gallery_worship_place']."'><img src='../_foto/".$baris['gallery_worship_place']."'></a>";
      }
    }
  } 
  elseif (strpos($id,"IK") !== false) //Industry
  {  

    $querysearch  ="SELECT a.id, b.gallery_industry FROM small_industry as a left join industry_gallery as b on a.id=b.id where a.id='$id' "; 

    $hasil=mysqli_query($conn, $querysearch);
    while($baris = mysqli_fetch_assoc($hasil))
    {
      if(($baris['gallery_industry']=='-')||($baris['gallery_industry']==''))
      {
        echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
      }
      else
      {
        echo "<a href='../_foto/".$baris['gallery_industry']."'><img src='../_foto/".$baris['gallery_industry']."'></a>";
      }
    }
  } 
  elseif (strpos($id,"R") !== false) //Restoran
  {  
    $querysearch  ="SELECT a.id, b.gallery_restaurant FROM restaurant as a left join restaurant_gallery as b on a.id=b.id where a.id='$id' "; 

    $hasil=mysqli_query($conn, $querysearch);
    while($baris = mysqli_fetch_assoc($hasil))
    {
      if(($baris['gallery_restaurant']=='-')||($baris['gallery_restaurant']==''))
      {
        echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
      }
      else{
        echo "<a href='../_foto/".$baris['gallery_restaurant']."'><img src='../_foto/".$baris['gallery_restaurant']."'></a>";
      }
    }
  } 
  else //Angkot
  {  

    $querysearch  ="SELECT a.id, b.gallery_angkot FROM angkot as a left join angkot_gallery as b on a.id=b.id where a.id='$id' "; 

    //echo "$querysearch";     
    echo "<script language='javascript'>alert('$querysearch');</script>";   
    $hasil=mysqli_query($conn, $querysearch);
    while($baris = mysqli_fetch_assoc($hasil))
    {
      if(($baris['gallery_angkot']=='-')||($baris['gallery_angkot']==''))
      {
        echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
      }
      else{
        echo "<a href='../_foto/".$baris['gallery_angkot']."'><img src='../_foto/".$baris['gallery_angkot']."'></a>";
      }
    }
  }
?>