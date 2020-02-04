<?php
include 'functions.php';
$sql = "SELECT id, room_number, floor FROM stanze";
$result = esegui_query($sql);

?>

    <?php include 'partials-layout/head.php' ?>
    <body>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Stanze:</h1>
                    </div>
                    <div class="col-md-6">
                        <a id="btn-create" class="btn btn-primary" href="create.php"> Inserisci una nuova stanza </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Room Number</th>
                                  <th scope="col">Floor</th>
                                  <th scope="col">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  if ($result && $result->num_rows > 0) {
                                          // output data of each row
                                          while($row = $result->fetch_assoc()) { ?>
                                              <tr>
                                                  <td><?php echo $row['room_number']; ?></td>
                                                  <td><?php echo $row['floor']; ?></td>
                                                  <td>
                                                      <a class="btn btn-info" href="details.php?id=<?php echo $row['id'] ?>"> Visualizza </a>
                                                      <a class="btn btn-warning" href="edit.php?id=<?php echo $row['id'] ?>"> Modifica </a>
                                                      <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'] ?>"> Cancella </a>
                                                  </td>
                                              </tr>
                                              <?php
                                          }
                                      } elseif ($result) {  ?>
                                          <tr>
                                              <td> Non ci sono risultati </td>
                                          </tr>
                                          <?php
                                      } else {  ?>
                                          <tr>
                                              <td> Non ci sono risultati </td>
                                          </tr>
                                     <?php } ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </main>
    </body>
    <?php include 'partials-layout/footer.php' ?>
</html>
