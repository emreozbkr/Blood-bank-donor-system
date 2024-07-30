<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>


  </div>

  <section class="team_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2 style="font-size:3rem;">
          Tüm  <span>Donörler</span>
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel team_carousel">
          <?php
          $query = $db->prepare("SELECT * FROM tblblooddonars order by PostingDate desc");
          $query->execute();

          while ($data = $query->fetch(PDO::FETCH_ASSOC)) {


            ?>

          <div class="item">
            <div class="box">
              <div class="img-box">


                  <?php  if($data['Gender'] == 'Erkek'){?>
                    <img src="images/man.png" alt="donör" />

                <?php   }else{?>
                  <img src="images/woman.png" alt="donör" />

                <?php   }?>

              </div>
              <div class="detail-box">
                <h5>
                  <?php echo $data['FullName'];?>
                </h5>
                <h6><b>Cinsiyet: </b><?php echo $data['Gender']; ?> </h6>
                <h6><b>Kan Grubu: </b><?php echo $data['BloodGroup']; ?> </h6>
                <h6><b>Tarih: </b><?php echo $data['PostingDate']; ?> </h6>
                <h6><b>Adres: </b><?php echo $data['Address']; ?> </h6><br>


                  <a style="background:#00c6a9;color:white;padding:15px;border:none;" href="talep.php?id=<?php echo hash('sha256',rand(1,1000)).$data['id'].hash('sha256',rand(1,1000));?>"> Talep göder</a><br><br>
              </div>
            </div>
          </div>
        <?php } ?>


        </div>


      </div>
    </div>
  </section><br><br><br>

  <!-- end team section -->


  <!-- end contact section -->
<?php include 'footer.php'; ?>
