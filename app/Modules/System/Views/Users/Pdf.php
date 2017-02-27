<h1>Users</h1>
<table class='table table-striped table-hover'>
    <tr>
        <th>Username</th>
        <th>Tel</th>
        <th>Mobile</th>
        <th>Role</th>
        <th>E-mail</th>
        <th>Office Login Only</th>
        <th>Last Logged In</th>
    </tr>
    <?php
    foreach ($users as $user) {

        if ($user->lastLoggedIn == null) {
            $lastLoggedIn = 'Never';
        } else {
            $lastLoggedIn = date('jS M Y H:i A', strtotime($user->lastLoggedIn));
        }

        echo "
        <tr>
            <td><img src='".resource_url($user->imagePath)."' style='border-radius:50%; width:40px;' alt=''> $user->username</td>
            <td><a href='tel:$user->tel'>$user->tel</a></td>
            <td><a href='tel:$user->mobile'>$user->mobile</a></td>
            <td>".$user->role->name."</td>
            <td>$user->email</td>
            <td>$user->officeLoginOnly</td>
            <td>$lastLoggedIn</td>
        </tr>";

    }
    ?>
</table>
