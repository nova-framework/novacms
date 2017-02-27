<h1>Depts</h1>

<table class='table table-striped table-hover'>
<tr>
    <th>Dept</th>
</tr>
<?php
foreach ($depts as $row) {

    echo "
    <tr>
        <td>$row->title</td>
    </tr>";

}
?>
</table>
