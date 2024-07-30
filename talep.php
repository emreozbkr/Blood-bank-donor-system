<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $id = substr($id,64);
  $hashid = substr($id,0,-64);

  $query = $db->prepare("SELECT * FROM tblblooddonars WHERE id={$hashid}");
  $query->execute();
  $data = $query->fetch(PDO::FETCH_ASSOC);
}


if (isset($_POST['ContactBloodBtn'])) {
      $name = $_POST['name'];
      $ContactNumber = $_POST['ContactNumber'];
      $Email = $_POST['Email'];
      $BloodRequirefor = $_POST['BloodRequirefor'];
      $Message = $_POST['Message'];
      $BloodDonarID = $_POST['BloodDonarID'];
      $query = $db->prepare("INSERT INTO tblbloodrequirer SET
        name = ?,
        ContactNumber = ?,
        Email = ?,
        BloodRequirefor = ?,
        Message = ?,
        BloodDonarID=?
      ");
      $save = $query->execute([$name,$ContactNumber,$Email,$BloodRequirefor,$Message,$BloodDonarID]);
      if ($save) {
        echo "<script>window.location='tumtalepler.php';alert('Talep gönderildi. Kısa süre içinde sizinle iletişime geçeceğiz.'); </script>";

      }else{
        echo "<script>window.location='talep.php';alert('Bir hata oluştu.'); </script>";
      }
}
 ?>
  <!-- contact section -->
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
  <section class="contact_section layout_padding-bottom" style="margin-top:50px;">
    <div class="container">
      <div class="heading_container">
        <h2>
          <?php echo $data['FullName'];?> Kişisine kan ihtiyaç talebi gönderin.
        </h2>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form_container">
            <form action="" method="post">
              <div>
                <input required type="text" placeholder="Ad-Soyad.." name="name"/>
              </div>
              <div>
                <input required type="number" placeholder="Telefon numarası.." name="ContactNumber"/>
              </div>
              <div>
                <input required type="email" placeholder="E-Mail.."  name="Email"/>
              </div>
              <div>
                <select required name="BloodRequirefor" class="select" >
                  <option> Kim için talep ediliyor? </option>
                  <option value="Kendim için">Kendim için</option>
                  <option value="Baba">Baba</option>
                  <option value="Anne">Anne</option>
                  <option value="Erkek Kardeş">Erkek Kardeş</option>
                  <option value="Kız Kardeş">Kız Kardeş</option>
                  <option value="Diğerleri">Diğerleri</option>

                </select><br><br>
              </div>
              <div>
                <input name="Message" type="text" class="message-box" placeholder="Herhangi bir mesajınız.." />
                <input type="hidden" name="BloodDonarID" value="<?php echo $data['id'];?>">

              </div>
              <div class="btn_box">
                <button type="submit" name="ContactBloodBtn">
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
