<?php
include 'functions.php';

var_dump($_POST['id_stanza']);

if (!empty($_POST['id_stanza'])) {
    $id_stanza = $_POST['id_stanza'];
    $sql = "DELETE FROM stanze WHERE id = $id_stanza";
    $result = esegui_query($sql);
} else {
    $result = false;
}

if ($result) {
    $get_message = '?success=true';
} else {
    $get_message = '?success=false';
}

header('Location: delete.php' . $get_message);

 ?>
