<?php
include 'functions.php';
include 'partials-layout/head.php'; ?>

   <div class="container">
       <div class="row">
           <div class="col-md-6">
               <h1>Crea una nuova stanza</h1>
           </div>
           <div class="col-md-3 col-md-offset-3 d-flex align-items-center">
               <a class="btn btn-primary" href="index.php"> Torna alla home</a>
           </div>
       </div>
       <?php
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
      <?php }  ?>
       <div class="row">
           <div class="col-md-12">
               <form method="post" action="insert.php">
                 <div class="form-group">
                   <label for="numero_stanza">Numero Stanza</label>
                   <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="Inserisci qui il numero della stanza">
                 </div>
                 <div class="form-group">
                   <label for="piano">Piano</label>
                   <input name="piano" type="text" class="form-control" id="piano" placeholder="Inserisci qui il piano">
                 </div>
                 <div class="form-group">
                   <label for="letti">Numero letti</label>
                   <input name="letti" type="text" class="form-control" id="letti" placeholder="Inserisci qui il numero dei letti">
                 </div>
                 <button type="submit" class="btn btn-primary">Invia</button>
               </form>
           </div>
       </div>
   </div>

   <?php include 'partials-layout/footer.php'; ?>
