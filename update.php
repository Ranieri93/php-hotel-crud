<?php
include 'functions.php';
if (!empty($_POST) &&
controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'],intval($_POST['letti']))) {
    // mi recupero i dati dall'array restituitomi
    $numeroStanza = intval($_POST['numero_stanza']);
    $piano = intval($_POST['piano']);
    $letti = intval($_POST['letti']);
    $id_stanza = intval($_POST['id_stanza']);

    $sql= "UPDATE stanze SET room_number = $numeroStanza, floor = $piano, beds = $letti, created_at = NOW(), updated_at = NOW()) WHERE id = $id_stanza";

    $result= esegui_query($sql);
} else {
    $result = false;
}
// mi creo una variabile alla risposta del result, questa andrò ad inserirla nella url. Nel create.php poi vado a controllare effettivamente il caso della riuscita o meno dell'operazione.
if ($result) {
    $get_message = '?success=true';
} else {
    $get_message = '?success=false';
}
// faccio il redirect al create, di modo da ovviare al problema della continua scrittura dei dati salvati nell'url, in caso di refresh della pagina. Così facendo avrei inserito tante volte la stessa stanza, mentre con questa soluzione, ad ogni inserimento ritorno alla pagina di creazione e lì gestisco il successo o meno dell'operazione.
header ('Location: create.php' . $get_message);
