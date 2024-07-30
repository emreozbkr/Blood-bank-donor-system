<?php include 'header.php'; ?>
<?php include 'menu.php';


?>

    <section class="slider_section ">
      <div class="dot_design">
        <img src="images/dots.png" alt="">
      </div>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">

                    <h1>
                      Güvenilir <br>
                      <span>
                        Kan Bankası Hizmetleri..
                      </span>
                    </h1>

                    <a href="contact.php">
                      Bize ulaşın.
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">

                    <h1>
                      Bir Kan Bağışı <br>
                      <span>
                        Günde 3 Hayat Kurtarır..
                      </span>
                    </h1>

                    <a href="contact.php">
                      Bize ulaşın.
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">

                    <h1>
                      Her Bir Bağış <br>
                      <span>
                        Yeni Bir Hayat..
                      </span>
                    </h1>

                    <a href="contact.php">
                      Bize ulaşın.
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <img src="images/prev.png" alt="">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <img src="images/next.png" alt="">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </section>
    <!-- end slider section -->











  </div>


  <!-- book section -->



  <!-- end book section -->


  <!-- about section -->

  <section class="about_section" style="margin-top:25px;">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Kan <span>Grupları</span>

              </h2>
              <p>Kan gruplarınızı tanıyın.</p>
            </div>
            <ul style="color:#999;" >
              <li >Olumlu veya olumsuz</li>
              <li>B pozitif veya B negatif</li>
              <li>O pozitif veya O negatif</li>
              <li>AB pozitif veya AB negatif.</li>
            </ul>
            <h4>
              Evrensel bağışçılar <span>ve alıcılar..</span>

            </h4>
            <p>En yaygın kan grubu O'dur ve bunu A grubu takip eder. O grubu bireylere genellikle "evrensel bağışçı" denir, çünkü kanları herhangi bir kan grubuna sahip kişilere nakledilebilir. AB tipi kana sahip olanlara "evrensel alıcılar" denir çünkü onlar her türden kanı alabilirler.

</p>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


  <!-- treatment section -->

  <!-- end treatment section -->

  <!-- team section -->

  <section class="team_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2 style="font-size:3rem;">
          Bazı  <span>Donörler</span>
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel team_carousel">
          <?php
          $query = $db->prepare("SELECT * FROM tblblooddonars order by rand() limit 5");
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
        <div style="text-align:center;">
          <a style="color:#00c6a9;background:white;padding:15px;border-radius:15px;" href="donorlist.php">Tümünü gör</a>

        </div>

      </div>
    </div>
  </section><br><br><br>

  <!-- end team section -->


  <!-- end contact section -->
<?php include 'footer.php'; ?>
