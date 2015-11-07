<?php

if ($_FILES['uplFotoDenuncia']['name']) {
    $uploadedUrl = 'uploads/' . $_FILES['uplFotoDenuncia']['name'];
    move_uploaded_file($_FILES['uplFotoDenuncia']['tmp_name'], $uploadedUrl);
}

echo  $_FILES['uplFotoDenuncia']['name'];
exit;
