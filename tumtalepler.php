<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>


  </div>

  <style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #00c6a9;
    color: white;
  }
  </style>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="heading_container heading_center">
      <h5 style="font-size:2.3rem;color:#00c6a9;">
        Tüm  <span style="color:black;">Talepler</span>
      </h5><br>
      
    </div>
    <div class="container  ">
      <div class="row">

        <div class="col-md-12">
          <div class="detail-box">
            <table id="customers">
              <thead>
                <tr>
                  <th>Donör ID</th>
                  <th>Ad-Soyad</th>
                  <th>Telefon</th>
                  <th>E-Mail</th>
                  <th>Kim için?</th>
                  <th>Mesaj</th>
                  <th>Talep gönderim tarihi</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $query = $db->prepare("SELECT * FROM tblbloodrequirer order by ApplyDate desc");
                $query->execute();
                while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <tr>
                    <td><?php echo $data['BloodDonarID']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['ContactNumber']; ?></td>
                    <td><?php echo $data['Email']; ?></td>

                    <td><?php echo $data['BloodRequirefor']; ?></td>
                    <td><?php echo $data['Message']; ?></td>
                    <td><?php echo $data['ApplyDate']; ?></td>

                  </tr>
                <?php   }?>

              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

<?php include 'footer.php'; ?>
