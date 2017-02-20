<?php
function postTime($time) {

    $format = "F m, Y g:i a";

    $timeyear = 365 * 24 * 60 * 60;
    $timemonth = 30 * 24 * 60 * 60;
    $timeweek = 7 * 24 * 60 * 60;
    $timeday = 24 * 60 * 60;
    $timehour = 60 * 60;
    $timemins = 60;
    $timeseconds = 1;

    $today = time();

    $x = $today - strtotime($time);

    if($x >= $timeyear){$x = date($format, $x); $dformat=""; $pre ="On the date: ";
    }elseif($x >= $timemonth){$x = date($format, $x); $dformat=""; $pre ="On the date: ";
    }elseif($x >= $timeday){$x = round($x / $timeday); $dformat="days ago"; $pre =" "; $x = round($x);
    }elseif($x >= $timehour){$x = round($x / $timehour); $dformat="hours ago"; $pre =" ";
    }elseif($x >= $timemins){$x = round($x / $timemins); $dformat="minutes ago"; $pre =" ";
    }elseif($x >= $timeseconds){$x = round($x / $timeseconds); $dformat="seconds ago"; $pre =" ";
    }
    return $pre." ".$x." ".$dformat;
}

echo "<table class='table table-striped table-hover table-bordered'>";

if(count($notifications) > 0 ){
foreach($notifications as $row){

    $date = postTime($row->created_at);
    $name = $row->assignedFromUser->username;
    $pic = resource_url($row->assignedFromUser->imagePath);

    echo "<tr>
        <td><a href='".site_url($row->link)."'><img src='".$pic."' width='40' alt='$name'></a></td>
        <td><a href='".site_url($row->link)."'>$row->title<small class='pull-right'><i class='fa fa-clock-o'></i>".$date."</small></a></td>
    </tr>";
}
} else {
    echo "<tr><td>No Notifications</td></tr>";
}

echo "</table>";
?>
