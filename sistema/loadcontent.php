<?php
if ($title == "") {
    if (sizeof($rows) <= 0) {
        exit();
    }
    echo ('
    <section>
        <div class="div-title_margin">
            <div class="div-title div-center_self">
                <h1>Mais vendidos</h1>
            </div>
        </div>
        <div class="div-content div-center">');
    for ($j = 0; $j < min(4,sizeof($rows)); $j++) {
        $images = $rows[$j][3];
        $split = explode(",", $images);
        echo ('
        <div class="content_padding ">
            <a class="content_acess" href="./product?tenisID=' . $rows[$j][0] . '">
                <img src="imgs/database/' . $split[0] . '" alt="">
                <div class="content_desc">
                    <div class="content_desc-inner content_desc-left">
                        <span>' . $rows[$j][1] . '</span>
                        <div class="content_desc-subleft">
                        ' . $gender[$rows[$j][5]] . '
                        </div>
                    </div>
                    <div class="content_desc-inner content_desc-right">
                    $' . $rows[$j][4] . '
                    </div>
                </div>
            </a>
        </div>');
    }
    echo '</section>';

    echo ('
    <section>
        <div class="div-title_margin">
            <div class="div-title div-center_self">
                <h1>Ultimos lançamentos</h1>
            </div>
        </div>
        <div class="div-content div-center">');
    $minus = min(4,sizeof($rows));
    for ($j = sizeof($rows) - 1; $j > sizeof($rows) - 1 - ($minus); $j--) {
        $images = $rows[$j][3];
        $split = explode(",", $images);
        echo ('
        <div class="content_padding ">
            <a class="content_acess" href="./product?tenisID=' . $rows[$j][0] . '">
                <img src="imgs/database/' . $split[0] . '" alt="">
                <div class="content_desc">
                    <div class="content_desc-inner content_desc-left">
                        <span>' . $rows[$j][1] . '</span>
                        <div class="content_desc-subleft">
                        ' . $gender[$rows[$j][5]] . '
                        </div>
                    </div>
                    <div class="content_desc-inner content_desc-right">
                    $' . $rows[$j][4] . '
                    </div>
                </div>
            </a>
        </div>');
    }
    echo '</section>';
} elseif ($title == "Ultimos Lançamentos") {
    echo ('
    <section>
        <div class="div-title_margin">
            <div class="div-title div-center_self">
                <h1>' . $title . '</h1>
            </div>
        </div>
        <div class="div-content div-center">');
    for ($j = sizeof($rows)-1; $j >= 0; $j--) {
        $images = $rows[$j][3];
        $split = explode(",", $images);
        echo ('
        <div class="content_padding ">
            <a class="content_acess" href="./product?tenisID=' . $rows[$j][0] . '">
                <img src="imgs/database/' . $split[0] . '" alt="">
                <div class="content_desc">
                    <div class="content_desc-inner content_desc-left">
                        <span>' . $rows[$j][1] . '</span>
                        <div class="content_desc-subleft">
                        ' . $gender[$rows[$j][5]] . '
                        </div>
                    </div>
                    <div class="content_desc-inner content_desc-right">
                    $' . $rows[$j][4] . '
                    </div>
                </div>
            </a>
        </div>');
    }
    echo '</section>';
} else {
    echo ('
    <section>
        <div class="div-title_margin">
            <div class="div-title div-center_self">
                <h1>' . $title . '</h1>
            </div>
        </div>
        <div class="div-content div-center">');
    for ($j = 0; $j < sizeof($rows); $j++) {
        $images = $rows[$j][3];
        $split = explode(",", $images);
        echo ('
        <div class="content_padding ">
            <a class="content_acess" href="./product?tenisID=' . $rows[$j][0] . '">
                <img src="imgs/database/' . $split[0] . '" alt="">
                <div class="content_desc">
                    <div class="content_desc-inner content_desc-left">
                        <span>' . $rows[$j][1] . '</span>
                        <div class="content_desc-subleft">
                        ' . $gender[$rows[$j][5]] . '
                        </div>
                    </div>
                    <div class="content_desc-inner content_desc-right">
                    $' . $rows[$j][4] . '
                    </div>
                </div>
            </a>
        </div>');
    }
    echo '</section>';
}
