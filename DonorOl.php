<?php include 'header.php'; ?>
<?php include 'menu.php';

if (isset($_POST['signupbtn'])) {
  $FullName = $_POST['FullName'];
  $MobileNumber = $_POST['MobileNumber'];
  $Age = $_POST['Age'];
  $Gender = $_POST['Gender'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  $Password2 = $_POST['Password2'];
  $BloodGroup = $_POST['BloodGroup'];
  $Address = $_POST['Address'];
  $Message = $_POST['Message'];
  if ($Password == $Password2) {
    $sorgu = $db->prepare("INSERT INTO tblblooddonars SET
      FullName = ?,
      MobileNumber = ?,
      Age = ?,
      Gender = ?,
      BloodGroup = ?,
      Email = ?,
      Password = ?,
      Address = ?,
      Message = ?
    ");
    $kaydet = $sorgu->execute([
    $FullName,$MobileNumber,$Age,$Gender,$BloodGroup,$Email,$Password,$Address,$Message
    ]);
    if ($kaydet) {
      echo "<script>window.location='donorlist.php';alert('Başvurunuz başarıyla tamamlandı. Artık bir bağışçısınız!');</script>";
    }else{
      echo "<script>window.location='DonorOl.php';alert('Bir şeyler ters gitti.');</script>";
    }
  }else{
    echo "<script>window.location='DonorOl.php';alert('Şifreleriniz uyuşmuyor.');</script>";

  }


}

?>


  </div>
  <style media="screen">
.select{  width: 100%;
  border: 1px solid #00c6a9;
  height: 50px;
  margin-bottom: 25px;
  padding-left: 15px;
  background-color: transparent;
  outline: none;
  color: #00c6a9;
}
  </style>


  <!-- contact section -->
  <section class="contact_section layout_padding-bottom" style="margin-top:30px;">
    <div class="container">
      <div class="heading_container">
        <h2 style="color:#00c6a9;">
          Donör Ol!
        </h2>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form_container">
            <form action="" method="post">
              <div>
                <input name="FullName" type="text" placeholder="Ad-Soyad.." />
              </div>
              <div>
                <input type="tel" name="MobileNumber" placeholder="Telefon Numarası.." />
              </div>
              <div>
                <input name="Email" type="email" placeholder="E-Mail.." />
              </div>
              <div>
                <input name="Age"  type="text" placeholder="Yaşınız.." />
              </div>
              <div>
                <select required name="Gender" class="select" >
                  <option> Cinsiyet.. </option>

                  <option value="Erkek">Erkek</option>
                  <option value="Kadin">Kadin</option>

                </select><br><br>
                <select required name="BloodGroup" class="select" >

                  <option value="Erkek">Kan grubunuz..</option>
                  <?php
                  $query = $db->prepare("SELECT  * FROM tblbloodgroup");
                  $query->execute();
                  while ($data = $query->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $data['BloodGroup'];?>"><?php echo $data['BloodGroup'];?></option>
                  <?php  } ?>
                </select><br><br>
              </div>
              <div>
                <input required type="text" name="Address" placeholder="Adresiniz.." />
              </div>
              <div>
                <input required type="password" name="Password" placeholder="Şifreniz.." />
              </div>
              <div>
                <input required type="password" name="Password2" placeholder="Şifre tekrar.." />
              </div>

              <div>
                <input name="Message" type="text" class="message-box" placeholder="Mesajınız.." />
              </div>
              <div class="btn_box">
                <button name="signupbtn" type="submit">
                  Gönder
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-5">
          <div class="img-box">
            <img src="images/contact-img.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->
<?php include 'footer.php'; ?>
