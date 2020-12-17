<?php

$sql = "SELECT * FROM slogin";
$query = mysqli_query($conn,$sql);
if (!$query) {
    echo mysqli_error($conn);
    exit();
}
$row = mysqli_fetch_row($query);

echo ('<div class="content_deck">
    <a href="./userconfig?userID='.$row[0].'" class="content_inside">
        <div class="content_vside content_topside">
            '.$row[1].'
        </div>
        <div class="content_vside content_botside">
            '.$row[2].'
        </div>
    </a>
</div>');
