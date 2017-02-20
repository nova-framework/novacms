<h1>User Logs</h1>

<table class='table table-striped table-hover'>
    <tr>
        <th>Title</th>
        <th>Reference id</th>
        <th>Section</th>
        <th>Type</th>
        <th>Source</th>
        <th>View</th>
        <th>Date Created</th>
    </tr>
    <?php
    foreach ($logs as $row) {

        echo "
        <tr>
            <td>".$row->user->username." $row->title</td>
            <td>$row->refID</td>
            <td>".ucwords($row->section)."</td>
            <td>$row->type</td>
            <td>$row->source</td>
            <td>";
                if ($row->link !='') {
                    echo " <a class='btn btn-xs btn-success' href='".site_url($row->link)."'><i class='fa fa-eye'></i> View</a>";
                }
            echo "
            </td>
            <td>".date('jS M Y H:i:s', strtotime($row->created_at))."</td>
        </tr>";
    }
    ?>
</table>
