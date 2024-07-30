<?php include 'header.php'; ?>
<?php include 'menu.php';



if (isset($_POST['contactbtn'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $message = $_POST['message'];

    $sorgu = $db->prepare("INSERT INTO tblcontact SET
      name = ?,
      phone = ?,
      email = ?,
      message = ?
    ");
    $kaydet = $sorgu->execute([
    $name,$phone,$email,$message
    ]);
    if ($kaydet) {
      echo "<script>window.location='contact.php';alert('İletiniz başarıyla iletildi, yakında size döneceğiz.');</script>";
    }else{
      echo "<script>window.location='contact.php';alert('Bir hata oluştu.');</script>";
    }



}

?>


  </div>


  <!-- contact section -->
  <section class="contact_section layout_padding-bottom" style="margin-top:30px;">
    <div class="container">
      <div class="heading_container">
        <h2 style="color:#00c6a9;">
          İletişim..
        </h2>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form_container">
            <form action="" method="post">
              <div>
                <input required  name="name" type="text" placeholder="Ad-Soyad.." />
              </div>
              <div>
                <input required name="email" type="email" placeholder="E-mail.." />
              </div>
              <div>
                <input required name="phone" type="tel" placeholder="Telefon numarası.." />
              </div>
              <div>
                <input required type="text" name="message" class="message-box" placeholder="Mesajınız.." />
              </div>
              <div class="btn_box">
                <button name="contactbtn" type="submit">
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
