<?php

include 'functions.php';
$sql = "SELECT * FROM stanze WHERE id =" . $_GET['id'];
$result = esegui_query($sql);
include 'partials-layout/head.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Modifica una stanza</h1>
        </div>
        <div class="col-md-3 col-md-offset-3 d-flex align-items-center">
            <a class="btn btn-primary" href="index.php"> Torna alla home</a>
        </div>
    </div>
    <?php if ($result && $result->num_rows > 0) {
        if (!empty($_GET['success'])) { ?>
            <div class="row">
                <div class="col-md-6 col-md-offset-3"> <?php if ($_GET['success'] == 'true') { ?>
                    <div class="alert alert-success" role="alert">
                        Stanza inserita con successo!
                    </div> <?php
                } else { ?>
                    <div class="alert alert-danger" role="alert">
                        C'è un errore!
                    </div> <?php
                }   ?>
                </div>
            </div>
        <?php }
     $row = $result->fetch_assoc() ?>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="update.php">
              <div class="form-group">
                <label for="numero_stanza">Numero Stanza</label>
                <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="Inserisci qui il numero della stanza" required value="<?php echo $row['room_number']; ?>">
              </div>
              <div class="form-group">
                <label for="piano">Piano</label>
                <input name="piano" type="text" class="form-control" id="piano" placeholder="Inserisci qui il piano" required value="<?php echo $row['floor']; ?>">
              </div>
              <div class="form-group">
                <label for="letti">Numero letti</label>
                <input name="letti" type="text" class="form-control" id="letti" placeholder="Inserisci qui il numero dei letti" required value="<?php echo $row['beds']; ?>">
              </div>
              <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
    <?php } elseif ($result) {  ?>
        <p>Non ci sono risultati</p>
        <?php } else {  ?>
        <p>Non ci sono risultati</p>
   <?php } ?>
</div>

<?php include 'partials-layout/footer.php' ?>
