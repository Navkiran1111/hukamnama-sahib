<?php
include('intdep/config/dbcon.php');
include('header.php');
?>

    

  <!--Mukhwaak Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container flex">

      
            <div class="row col-12">
            <div class="text-center"><h3><b> ਸੱਚਖੰਡ ਸ੍ਰੀ ਹਰਿਮੰਦਰ ਸਾਹਿਬ ਸ੍ਰੀ ਅੰਮ੍ਰਿਤਸਰ  </b></h3>


                      <?php 
                            $userquery ="SELECT  `id`, `date`, `gheading1`, `gheading2`, `ghukamnama`, `eheading1`, `eheading2`, `ghukamnamadesc`, `efooter1`, `efooter2`, `month`, `year`, DATE_FORMAT(time, '%H:%i') AS formatted_time, `gfooter1`, `gfooter2`, `ehukamnamadesc`  
                            FROM dailyhukamnama
                            WHERE date = CASE  WHEN CURDATE() IN (SELECT DISTINCT date FROM dailyhukamnama) THEN CURDATE()ELSE DATE_SUB(CURDATE(), INTERVAL 1 DAY) END ";
                            $useryqueryrun = mysqli_query($con , $userquery);


                       if(mysqli_num_rows($useryqueryrun) > 0)
                       {
                        foreach($useryqueryrun as $row)
                        {
                            ?>
                           
                                
                            
                            
                       
                       <!-- <div class="text-center"><b><?php echo $row['formatted_time']; ?> <span> AM IST</span></b></div> -->
                       <div class="col-lg-14 col-sm-15"><t1><?php echo $row['date'] ?></t1></div>
                        <div class="text-center"><b2><b><?php echo $row['gheading1']; ?></b></b2></div><br>
                        <div class="text-center"><p1><b><?php echo $row['gheading2']; ?></b></p1></div> <br>     
                        <div><p ><?php echo $row['ghukamnama'];  ?></p></div><br>     
                        <div class="col-12 row">
                        <div class="col-lg-4 col-sm-12"> <c1><?php echo $row['gfooter1'];  ?></c1></div> 
                        <div class="col-lg-8 col-sm-12 text-end"> <c1><?php echo $row['gfooter2'];  ?></c1></div> 
                            </div>
                        <br> <div class="col-lg-1 col-sm-2"> <u><strong>ਪੰਜਾਬੀ ਵਿਆਖਿਆ: </strong></u></div> <br>   
                        <div class="text-center"><b2><b><?php echo $row['gheading1']; ?></b></b2></div>
                        <div class="text-center"><p1><b><?php echo $row['gheading2']; ?></b></p1></div>  <br>                
                        <div> <p> <?php echo $row['ghukamnamadesc'];  ?></p></div> 
                        
                        <div class="col-lg-1 col-sm-12"> <u><strong>English Translation:  </strong></u></div> 
                        <div  class="text-center"> <b2> <b><?php echo $row['eheading1'];  ?> </b2></b></div> 
                        <div  class="text-center"> <p1><b><?php echo $row['eheading2'];  ?></p1></b></div> <br> 
                        <div> <p><?php echo $row['ehukamnamadesc'];  ?></p></div> <br>

                        <div class="col-12 row">
                                <div class="col-lg-4 col-sm-12"> <c1><?php echo $row['efooter1'];  ?></c1></div> 
                                <div class="col-lg-8 col-sm-12 text-end"> <c1><?php echo $row['efooter2'];  ?></c1></div> 
                        </div> 
                    

                         <?php
                        }
                        }
                        else{
                        ?>


                     <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="container flex">
                            <div class="row">
                                    <?php 
                                        $userquery ="SELECT *  FROM dailyhukamnama WHERE date = IFNULL((SELECT MAX(date) 
                                            FROM dailyhukamnama WHERE date < CURDATE()), CURDATE() - INTERVAL 1 DAY );";
                                            $useryqueryrun = mysqli_query($con , $userquery);


                                        if(mysqli_num_rows($useryqueryrun) > 0)
                                        {
                                            foreach($useryqueryrun as $row)
                                            {
                                                ?>
                                            <div class="text-center"><p1>ਮੁੱਖਵਾਕ </p1></div>
                                            <div class="col-lg-14 col-sm-15"><p1><?php echo $row['date'] ?></p1></div>
                                            <div class="text-center"><b2><?php echo $row['gheading1']; ?></b2></div>
                                            <div class="text-center"><p1> <b><?php echo $row['gheading2']; ?></b></p1></div>      
                                            <div><p style="justify-content: center;"><?php echo $row['ghukamnama'];  ?></p></div>     
                                            <div class="col-12 row">
                                            <div class="col-lg-4 col-sm-12"> <c1><?php echo $row['gfooter1'];  ?></c1></div> 
                                            <div class="col-lg-8 col-sm-12 text-end"> <c1><?php echo $row['gfooter2'];  ?></c1></div> 
                                                </div>
                                            <div class="col-lg-1 col-sm-2"> <u><strong>ਪੰਜਾਬੀ ਵਿਆਖਿਆ: </strong></u></div> 
                                            <div class="text-center"><b2><b><?php echo $row['gheading1']; ?></b></b2></div>
                                            <div class="text-center"><p1><b><?php echo $row['gheading2']; ?></b></p1></div>  <br>                     
                                            <div> <p> <?php echo $row['ghukamnamadesc'];  ?></p></div> 
                                            <div class="col-lg-1 col-sm-12"> <u><strong>English Translation:  </strong></u></div> 
                                            <div><b2>  <?php echo $row['eheading1'];  ?></b2> </div> 
                                            <div> <p1><?php echo $row['eheading2'];  ?></p1></div> 
                                            <div> <p><?php echo $row['ehukamnamadesc'];  ?></p></div> 

                                            <div class="col-12 row">
                                                    <div class="col-lg-4 col-sm-12"> <c1><?php echo $row['efooter1'];  ?></c1></div> 
                                                    <div class="col-lg-8 col-sm-12 text-end"> <c1><?php echo $row['efooter2'];  ?></c1></div> 
                                            </div> 
                                        

                                            <?php
                                            }?>
                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2">
                               </div>
                            </div>
                             
                        </div>
                            
                       
                       <?php 
                       }
                    }
                       ?>
         

                      
                                            </div>
                                        </div>
   
        
    </div>
    </div>
     <!--Mukhwaak End -->

     <!-- <div> 
     <a href="snghukamnama.php" class="d-block b4-l fs-14 text-center text-uppercase border-black view-all-link pt-4 pb-4 mb-5 text-decoration-none"> <strong>Sangrand Hukamnama Sahib</strong> </a>
    </div>
      -->
               