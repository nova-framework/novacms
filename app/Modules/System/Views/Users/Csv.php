<?php
echo "ID, Role id, Username, Email, Personal Email, Image Path, Tel, Mobile, Date Created, Last Logged in\n";
if ($users) {
    foreach ($users as $row) {
        echo "$row->id, $row->role_id, $row->username, $row->email, $row->personalEmail, $row->imagePath, $row->tel, $row->mobile, $row->created_at, $row->lastLoggedIn\n";
    }
}
