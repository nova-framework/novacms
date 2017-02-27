<?php
echo "id, Name, Slug, Description, Date Created\n";
if ($roles) {
    foreach ($roles as $row) {
        echo "$row->id, $row->name, $row->slug, $row->description, $row->created_at\n";
    }
}
