<?php
echo "id, Title, Date Created\n";
if ($depts) {
    foreach ($depts as $row) {
        echo "$row->id, $row->title, $row->created_at\n";
    }
}
