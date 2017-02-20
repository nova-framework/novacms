<div class="content-header">
    <div class="col-sm-12">
        <h2>Notifications</h2>
    </div>
</div>

<div class="content">

    <?= Session::getMessages(); ?>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Notifications</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">Notification</th>
                <th scope="col">Date</th>
                <th scope="col">From</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($notifications as $row) {
                $date = date('jS M Y H:i:s', strtotime($row->created_at));

                if ($row->link !='') {
                    $link = "<a href='".site_url($row->link)."' class='btn btn-small btn-success'><i class='fa fa-share-alt'></i> View</a>";
                } else {
                    $link = null;
                }

                echo "<tr>";
                    echo "<td data-label='Notification'>$row->title</td>";
                    echo "<td data-label='Date'>$date</td>";
                    echo "<td data-label='From'>".$row->assignedFromUser->username."</td>";
                    echo "<td data-label='Action'>$link</td>";
                echo "</tr>";

            }
            ?>
            </tbody>
            </table>
            <?=$notifications->links();?>

        </div>
    </div>

</div>
