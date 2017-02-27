<h1>Roles</h1>

<table class='table table-striped table-hover'>
    <tr>
        <th>Role</th>
        <th>Description</th>
    </tr>
    <?php
    foreach ($roles as $row) {

        echo "
        <tr>
            <td>$row->name</td>
            <td>$row->description</td>
        </tr>";

    }
    ?>
</table>
