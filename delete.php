<?php

include 'functions.php';
$sql = "SELECT * FROM stanze WHERE id =" . $_GET['id'];
$result = esegui_query($sql);
include 'partials-layout/head.php' ?>
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
        <?php
        }
        $row = $result->fetch_assoc() ?>
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"> Dettagli stanza N° <?php echo $row['id']; ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> Numero Stanza: <?php echo $row['room_number'] ?></li>
                    <li class="list-group-item"> Piano: <?php echo $row['floor'] ?></li>
                    <li class="list-group-item"> N° Letti: <?php echo $row['beds'] ?></li>
                    <li class="list-group-item"> Data Creazione: <?php echo $row['created_at'] ?></li>
                    <li class="list-group-item"> Ultima Modifica: <?php echo $row['updated_at'] ?></li>
                </ul>
                <p>Desideri cancellare questa stanza?</p>
                <form method="post" action="dump.php">
                    <div class="form-group">
                    <input type="hidden" name="id_stanza" value="<?php echo $row['id'] ?>">
                    <input type="submit" class="btn btn-danger" value="Si, confermo la cancellazione">
                </div>
                <a href="index.php" class="btn btn-primary"> No, torna indietro</a>
            </form>
            </div>
        </div>
            <?php
        } elseif ($result) {  ?>
        <p>Non ci sono risultati</p>
        <?php }
        else {  ?>
        <p>Non ci sono risultati</p>
   <?php } ?>
