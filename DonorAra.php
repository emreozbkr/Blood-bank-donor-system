<?php include 'header.php'; ?>
<?php include 'menu.php';

$query = $db->prepare("SELECT * FROM tblblooddonars");
$query->execute();

?>


<section class="book_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col">
        <form method="post" action="">
          <h4 class="text-center">
            Donör <span>Arayın..</span>
          </h4>
          <b style="color:#00c6a9;" class="text-center">
            Filitre elemanlarından birini seçerek işlem yapabilirsiniz.
          </b><br><br>
          <div class="form-row ">

            <div class="form-group col-lg-6">
              <select class="form-control" name="BloodGroup">
                <option value="">Kan grubu seçiniz..</option>
                <?php
                $query = $db->prepare("SELECT  * FROM tblblooddonars");
                $query->execute();
                while ($data = $query->fetch(PDO::FETCH_ASSOC)) {?>
                  <option value="<?php echo $data['BloodGroup'];?>"><?php echo $data['BloodGroup'];?></option>
                <?php  } ?>
              </select>
            </div>
            <div class="form-group col-lg-6">
              <select class="form-control" name="Address">
                <option value="">Adres seçiniz..</option>
                <?php
                $query = $db->prepare("SELECT  * FROM tblblooddonars");
                $query->execute();
                while ($data = $query->fetch(PDO::FETCH_ASSOC)) {?>
                  <option value="<?php echo $data['Address'];?>"><?php echo $data['Address'];?></option>
                <?php  } ?>
              </select>
            </div>
          </div>

          <div class="btn-box text-right">
            <button type="submit" class="btn " name="resultbtn">Ara</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>





















  <div class="row">
    <div class="col-md-12">
          <?php
          if (isset($_POST['resultbtn'])) {
            $BloodGroup = $_POST['BloodGroup'];
            $Address = $_POST['Address'];

            if (!$BloodGroup && !$Address) {
              echo "<script>alert('Lütfen herhangi bir filitre elemanı seçiniz.');</script>";

            }else{
              $query = $db->prepare("SELECT * FROM tblblooddonars WHERE BloodGroup LIKE :BloodGroup AND Address LIKE :Address");
              $query->execute(array(
                ':BloodGroup' =>'%'.$BloodGroup.'%',
                ':Address' =>'%'.$Address.'%'
              ));
              if ($query->rowCount()) {
                echo "<script>window.location='#donor';</script>";
                echo "<script>alert('".$query->rowCount()." sonuç bulundu.');</script>";
                ?>

            <?php } else if($query->rowCount() == 0){ ?>
              <script>alert('Böyle bir sonuç yok.');</script>

          <?php  }?>

            <div id="donor" class="container-fluid">
              <div class="row ">

                <?php while ($data = $query->fetch(PDO::FETCH_ASSOC)) {?>

                <div class="col-sm-4 col-xs-12" >
                  <div class="panel panel-default text-center"  style="border: 1px solid #00c6a9;padding:30px;margin:30px;">
                    <div class="panel-heading">
                      <h3 style="color:#00c6a9;"><?php echo $data['FullName'];?></h3>
                      <?php if($data['Gender'] == "Erkek" ){ ?>
                        <img style="width:150px;" src="./images/man.png" alt="">
                      <?php  }else{ ?>
                      <img style="width:150px;" src="./images/woman.png" alt="">
                      <?php  } ?>
                    </div>

                    <div class="panel-body">
                      <p><strong style="color:#00c6a9;">Gender: </strong> <?php echo $data['Gender'];?></p>
                      <p><strong style="color:#00c6a9;">Blood Group: </strong> <?php echo $data['BloodGroup'];?></p>
                      <p><strong style="color:#00c6a9;">Date: </strong> <?php echo $data['PostingDate'];?></p>
                      <p><strong style="color:#00c6a9;">Adress: </strong> <?php echo $data['Address'];?></p>
                    </div>
                    <div class="panel-footer">

                      <a style="background-color:#00c6a9;color:white;padding:10px;border-radius:16px;margin-top:10px;" href="talep.php?id=<?php echo hash('sha256',rand(1,1000)).$data['id'].hash('sha256',rand(1,1000));?>" class="btn btn-lg">Talep gönder!</a><br><br>
                    </div>
                  </div>
                </div>
              <?php } ?>
              </div>
            </div>
            <?php } ?>
        <?php } ?>

    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
