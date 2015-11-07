<?php

if ($_FILES['uplFotoPerfil']['name']) {
    $uploadedUrl = 'uploads/' . $_FILES['uplFotoPerfil']['name'];
    move_uploaded_file($_FILES['uplFotoPerfil']['tmp_name'], $uploadedUrl);
}

echo  $_FILES['uplFotoPerfil']['name'];
exit;
