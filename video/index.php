<?php
require "/xampp/htdocs/xlxx/lib/connect.php";
require "/xampp/htdocs/xlxx/database/getAllmenu.php";
include "/xampp/htdocs/xlxx/database/handle_actress.php";
$pagi = paginates();
$limit = 24;
$total_page = ceil($pagi / $limit);
$crpage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$start = ($crpage - 1) * $limit;
$categories = mysqli_query($conn, "SELECT * FROM movies limit $start,$limit")
?>
<!DOCTYPE html>
<html lang="vi">
<!-- head -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/xlxx/style/general_web_site/style2.css">
    <link rel="stylesheet" type="text/css" href="/xlxx/style/section1menu/style1.css">
    <link rel="shortcut icon" type="image/x-icon" href="/xlxx/icon/icon-removebg-preview.png">
    <link rel="stylesheet" type="text/css" href="/xlxx/style/fix_parse_3/style.css">
    <link rel="stylesheet" type="text/css" href="/xlxx/style/fix_parse_4/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title><?php

            if ((isset($_GET["vd"]) && isset($_GET["id"]) && !isset($_GET["video"])) || (isset($_GET['id']) && !isset($_GET["video"]))) {
                $getname = mysqli_query($conn, "SELECT * from movies order by id asc");
                while ($row = mysqli_fetch_array($getname)) {
                    if ($row["id"] === $_GET["id"]) {
                        echo $row["title"];
                    }
                }
            } else if (isset($_GET["vd"]) && isset($_GET["id"]) && isset($_GET["video"])) {
                $getname2 = mysqli_query($conn, "SELECT * from featured_video order by id_featured asc");
                while ($row = mysqli_fetch_array($getname2)) {
                    if ($row["id_featured"] === $_GET["id"]) {
                        echo $row["photo"];
                    }
                }
            }
            ?> - XLXX</title>
    <style>
        /* set css body */
        body {
            background-color: #000 !important;
        }

        /* set css all li */
        li {
            list-style-type: none !important;
            position: relative;
        }

        /* set css all img */
        img {
            object-fit: cover;
        }

        /* set css main */
        .main {
            background-color: #000 !important;
        }

        /* set css title */
        .title_menu_suv a {
            text-decoration: none;
            color: currentColor;
        }

        /* set css menu */
        .nav-menu .row li.col:nth-of-type(1) {
            color: #ff0000 !important;
        }

        .nav-menu .row li {
            overflow: visible !important;
        }

        /* set css wrapper */
        .wrapper {
            position: relative !important;
            padding-top: 5px !important;
            background-color: #0D0D0E !important;
        }

        .wrapper li.show-list,
        .wrapper .nav-menu li {
            width: 320px !important;
            height: 300px !important;
            cursor: pointer;
            background-color: #000;
            color: #fff;
            margin-bottom: 10px !important;

        }



        .wrapper li img,
        .wrapper li span {
            user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .wrapper li p {
            text-align: center;
            font-weight: 600;
        }

        .wrapper li span {
            position: absolute !important;
            font-weight: 400 !important;
            opacity: 0.65;
            background: #ff0000;
            padding: 0 10px;
            top: 0 !important;
            left: 0 !important;
        }

        .wrapper li.show-list:hover span {
            opacity: 1 !important;
        }

        /* set css search */
        .search {
            height: 30px;
        }

        .search_and_new_film {
            border: none !important;
        }

        .search_and_new_film p {
            font-size: 1vw !important;
        }

        .search button {
            display: flex !important;
            align-items: center !important;
        }

        /* set css home */
        .home {
            border: none !important;
        }

        .home a {
            font-size: 3.25vw !important;
        }

        /* set css row */
        .row {
            margin: 0 !important;
            background-color: #000 !important;
            border: none !important;
            box-shadow:
                inset 0px 11px 8px -10px #CCC,
                inset 0px -11px 8px -10px #CCC !important;
        }

        .row {
            border-top: 0 !important;
            box-shadow: 0 0 10px #fff;
            margin: 0 !important;
            border: none !important;
        }

        /* set css pagination */
        .pagination {
            width: 100%;
            background-color: #6c757d;
            display: inline-flex;
            justify-content: center;
            background-color: #0D0D0E !important;
        }

        /* footer */
        .footer {
            color: #fff;
            font-weight: 300;
            font-size: 12px;
            user-select: none !important;
        }

        .footer p a {
            text-decoration: none;
        }

        .search_and_new_film p {
            color: #fff !important;
            display: flex;
            justify-content: center;
            margin: 0 !important;
            text-indent: 10px;
            font-weight: 600;
        }

        /* set main-video */
        .main-video {
            display: flex;
            flex-direction: row;
            width: 100%;
            margin-top: 10px;
            height: auto;
        }

        .main-video .info-video {
            width: 67%;
            height: auto;
            margin: 0;
        }

        .main-video .info-video iframe {
            margin-bottom: 5px;
        }

        .main-video .featured-video {
            width: 33%;
            height: auto;
            margin: 0 5px;
        }

        .ftt {
            position: relative;
            gap: 10px;
        }

        .ftt img {
            width: 50%;
            height: auto;
        }

        .ftt p {
            color: #fff;
            font-weight: 550;
            font-size: 15px;
        }

        .ftt span {
            position: absolute;
            top: 0;
            left: 0;
            padding: 4px 6px;
            color: #fff;
            background-color: #ff0000;
            opacity: 0.65;
        }

        .featured-video {
            gap: 10px;
        }

        .ftt:hover span {
            opacity: 1 !important;
        }

        .info-video {
            padding: 10px;
        }

        .info-video {
            background-color: #1A1717;
        }

        .info-video button {
            background-color: #2E2B2B;
            border: none !important;
            outline: none !important;
            color: #fff;
            padding: 4px 6px;
        }

        img {
            user-select: none;
        }

        .bar {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between
        }

        .wrapper {
            gap: 10px
        }

        /* responsive */
        @media screen and (max-width:1000px) {
            .featured-video {
                display: none !important;
            }

            .info-video {
                width: 100% !important;

            }

            .info-video iframe {
                width: 100% !important;

            }

        }

        .suggest-video {
            display: flex;
            flex-direction: column;
        }

        .suggest-video p.suggest {
            font-size: 15px;
            color: #fff;
            font-weight: 550;
            border-top: 1px solid #50555555;
            padding-top: 5px;
            border-bottom: 1px solid #50555555;
            padding-bottom: 5px;
            animation-name: flicker;
            animation-duration: 0.85s;
            animation-iteration-count: infinite;
        }

        @keyframes flicker {
            from {
                color: white;
            }

            to {
                color: red;
            }
        }

        .wrapper li.show-list {
            margin: 0 !important;
        }

        .footer {
            font-size: 14px !important;
        }

        .wrapper a {
            text-decoration: none;
        }

        .featured-video a {
            text-decoration: none;
        }

        .title_2_version {
            display: flex !important;
            align-items: center !important;
            margin: 10px 0;
            padding: 7px 0;
            border-top: 1px solid #75555555;
            border-bottom: 1px solid #75555555
        }

        .title_2_version p {
            margin: 0 !important;
            align-self: center !important;
            color: #fff !important;
            font-size: 14px;
        }

        .content .btn-actress:hover {
            background-color: #D31414;
        }

        .content .btn-actress {
            font-size: 14px;
        }

        .content {
            gap: 10px;
            display: flex;
            justify-content: start;
            align-items: start;
        }

        .content img {
            min-width: 160px;
            height: auto;
        }

        .actress {
            color: #fff !important;
            text-align: justify !important;
            font-size: 14px;
            margin-top: 20px;
            margin-bottom: 35px;
        }

        @media screen and (min-width: 1350px) {
            .info-video {
                position: relative;
            }

            .content {
                position: relative !important;
                bottom: 0 !important;

            }
        }

        .boss-wrapper {
            display: flex;
            justify-content: center !important;
        }

        @media screen and (max-width: 900px) {}

        .content {
            flex-direction: column-reverse;
        }

        @media screen and (max-width: 450px) {
            .content img {
                width: 160px;
                height: auto
            }
        }

        .featured-video {
            display: flex;
            flex-direction: column;
        }

        .content img {
            position: unset !important;
            bottom: 0 !important;

        }

        .btn-show {
            margin-bottom: 20px;
        }

        .btn-show:hover {
            background-color: #ff0000;
        }

        @media screen and (max-width: 748px) {
            * {
                font-size: 12px;
            }

            .show-list img {
                width: 160px;
                height: 120px;
            }

            .wrapper li.show-list,
            .wrapper .nav-menu li {
                font-size: 8.5px !important;
                width: 160px !important;
                height: 150px !important;
                cursor: pointer;
                background-color: #000;
                color: #fff;
                margin-bottom: 10px !important;
            }

            .wrapper .nav-menu {
                font-size: 8.5px !important;
            }

            .align-items-center {
                font-size: 9px !important;
            }

            .actress {
                font-size: 12px;
            }

            .content img {
                width: 160px !important;
                height: 120px !important;
            }

            .search_and_new_film p {
                font-size: 10px !important;
            }

            form.search {
                width: 200px !important;
                height: 20px;
            }

            .footer {
                padding: 7px;
            }

            iframe {
                height: 300px;
            }

            .search_and_new_film p {
                color: #fff !important;
                display: flex;
                justify-content: center;
                margin: 0 !important;
                /* text-indent: 10px; */
                text-indent: 0 !important;
                font-weight: 600;
                padding-left: 10px;
            }
        }

        .content img {
            width: 320px;
            height: 240px;
        }

        @media screen and (max-width:500px) {
            .function-video {
                height: 300px !important;
            }
        }

        .bar button:hover {
            background-color: #ff0000;
        }

        .bar {
            margin-top: 10px;
        }

        .bar .task1,
        .bar .task2 {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="container-sm h-100 main p-0 bg-dark">
        <!-- Title XLXX -->
        <div class="home py-3 d-flex align-items-center justify-start px-3">
            <div>
                <a href="/xlxx/abc/index.php">XLXX.COM</a>
            </div>
        </div>
        <!-- Menu categories -->
        <div class="nav-menu">
            <ul class="row p-0 mb-0">
                <?php
                $gett = getAll();
                while ($row_gett = mysqli_fetch_array($gett)) {
                ?>
                    <li class="col px-0 mx-4 py-2 title_menu_suv">
                        <a href="<?php echo $row_gett['link'] ?>">
                            <?php
                            echo $row_gett['categories_detail'];
                            ?>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- Javascript effect -->
        <noscript type="text/javascript">
            $(document).ready(function() {
            $(".nav-menu .row li.col").on("click", function() {
            $(this).addClass("active").siblings().removeClass("active")
            $(".nav-menu .row li.col:nth-of-type(1)").css("color", "#fff")
            })
            $(".nav-menu .row li.col:ntn-of-type(1)").on("click", function() {
            $(".nav-menu .row li.col:nth-of-type(1)").css("color", "red")
            })
            })
        </noscript>
        <!-- Search -->
        <div class="search_and_new_film d-flex flex-row justify-content-between align-items-center">
            <p>
                <?php

                if ((isset($_GET["vd"]) && isset($_GET["id"]) && !isset($_GET["video"])) || isset($_GET['id']) && !isset($_GET["video"])) {
                    $getname = mysqli_query($conn, "SELECT * from movies order by id asc");
                    while ($row = mysqli_fetch_array($getname)) {
                        if ($row["id"] === $_GET["id"]) {
                            echo $row["title"];
                        }
                    }
                } else if (isset($_GET["vd"]) && isset($_GET["id"]) && isset($_GET["video"])) {
                    $getname2 = mysqli_query($conn, "SELECT * from featured_video order by id_featured asc");
                    while ($row = mysqli_fetch_array($getname2)) {
                        if ($row["id_featured"] === $_GET["id"]) {
                            echo $row["photo"];
                        }
                    }
                }
                ?>
            </p>
            <form class="search d-flex flex-row mx-3" method="GET" action="/xlxx/search/">
                <input type="text" name="result" id="find" class="form-control mx-2" autocomplete="off" placeholder="Search...">
                <button type="submit" id="sent" class="btn btn-info text-nowrap">Tìm kiếm</button>
            </form>
        </div>
        <!-- display video -->
        <div class="main-video">
            <div class="info-video">
                <div class="function-video">
                
                    <iframe frameborder=0 marginwidth=10 marginheight=10 scrolling=no class="display-video" width="100%" height="100%" src="<?php if ((isset($_GET["vd"]) && isset($_GET["id"]) && !isset($_GET["video"])) || (isset($_GET['id']) && !isset($_GET["video"]))) {
                $getname = mysqli_query($conn, "SELECT * from movies order by id asc");
                while ($row = mysqli_fetch_array($getname)) {
                    if ($row["id"] === $_GET["id"]) {
                        echo $row["video"];
                    }
                }
            } else if (isset($_GET["vd"]) && isset($_GET["id"]) && isset($_GET["video"])) {
                $getname2 = mysqli_query($conn, "SELECT * from featured_video order by id_featured asc");
                while ($row = mysqli_fetch_array($getname2)) {
                    if ($row["id_featured"] === $_GET["id"]) {
                        echo $row["video"];
                    }
                }
            }?>" allowFullScreen controls>

        </iframe>

                    <div class="first-play"><i class="fas fa-play"></i></div>
                    <style>
                        .function-video .first-play {
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            top: 0;
                            background-color: #000;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            z-index: 999;
                        }

                        .function-video .first-play .fa-play {
                            font-size: 50px;
                            color: #fff;
                            cursor: pointer;
                        }

                        .function-video .first-play .fa-play:hover {
                            color: #ff0000;
                        }

                        .function-video {
                            position: relative;
                            width: 100% !important;
                            height: 500px;
                        }

                        .funtion-video .display-video {
                            width: 100%;
                            margin: 0 !important;
                        }

                        .function-video button {
                            background-color: inherit;
                            display: block;
                            color: #fff !important;
                            right: 18%;
                            cursor: pointer;
                            padding: 0;

                            transition: all 0.5s ease-in-out;
                        }

                        .content_and_actress {
                            display: block;
                        }

                        .refoo {
                            gap: 10px;
                            margin-top: 10px;
                            display: flex;
                        }
                    </style>
                </div>


                <div class="refoo">
                    <button title="rewind 5s" class="trigger"><i class="fas fa-undo"></i></button>
                    <button title="forward 5s" class="trigger2"><i class="fas fa-redo"></i></button>
                </div>
                <script>
                    const rewin = document.querySelector(".display-video")
                    const trigger = document.querySelector(".trigger")
                    const trigger2 = document.querySelector(".trigger2")
                    const play_1 = document.querySelector(".fa-play")
                    const comple = document.querySelector(".first-play")

                    trigger.addEventListener("click", function() {
                        rewin.currentTime -= 10
                    })
                    trigger2.addEventListener("click", function() {
                        rewin.currentTime += 10
                    })
                    play_1.addEventListener("click", function() {
                        comple.style.display = "none"
                        rewin.play()
                    })
                    rewin.addEventListener("click", function() {

                    })
                    let i = 1
                    let j = 1
                    document.addEventListener("keydown", function(event) {
                        let x = event.key

                        if ((x == "k" || x == "K") && i == 1) {
                            rewin.pause()
                            i++
                        } else if (i == 2 && (x == "k" || x == "K")) {
                            rewin.play()
                            i--
                        } else if (x == "ArrowLeft") {
                            rewin.currentTime -= 5
                        } else if (x == "ArrowRight") {
                            rewin.currentTime += 5
                        } else if (x == "f" || x == "F") {
                            if (rewin.requestFullscreen && j == 1) {
                                rewin.requestFullscreen()
                                j++
                            } else if (rewin.webkitRequestFullscreen && j == 1) {
                                rewin.webkitRequestFullscreen()
                                j++
                            } else if (rewin.msRequestFullscreen && j == 1) {
                                rewin.msRequestFullscreen()
                                j++
                            } else if (rewin.exitFullscreen && j == 2) {
                                rewin.exitFullscreen()
                                j--
                            } else if (rewin.webkitExitFullscreen) {
                                rewin.webkitExitFullscreen()
                                j--
                            } else if (rewin.msRequestFullscreen) {
                                rewin.msRequestFullscreen()
                                j--
                            }
                        }
                    })
                </script>
                <div class="bar">
                    <div class="task1">
                        <button class="server2">#2</button>
                        <a href="/xlxx/data-video/video1.mp4" download="<?php echo $_GET['vd'] ?>" target="_blank"><button title="tải xuống video" type="button" id="d-video"><i class="fas fa-download"></i></button></a>
                        <button type="button" id="z-video">Zoom+ </button>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $(".server2").click(function() {
                                location.reload();
                            })
                        })
                    </script>
                    <div class="task2">
                        <button title="Thích" type="button" id="like" class="react"><i class="far fa-thumbs-up"></i></button>
                        <button title="Không thích" type="button" id="dislike" class="react"><i class="far fa-thumbs-down"></i></button>
                        <button title="Yêu thích" type="button" id="favorite" class="react"><i class="far fa-heart"></i></button>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $(document).on('click','.react',function() {
                                $(this).addClass('super-active').siblings().removeClass('super-active');
                            })
                        })

                    </script>
                    <style>
                        .super-active {
                            background-color: #ff0000 !important;
                        }
                        .react {
                            position: relative;
                        }

                        .react:active::after {
                            padding: 5px;
                            border: 1px solid #ccc;
                            top: 5px;
                            right: 10%;
                            background: #bada55;
                        }
                        #like:active::after {
                            content: attr("Bạn thích video này")
                        }
                        #dislike:active::after {
                            content: attr("Bạn không thích video này")
                        }
                        #favorite:active::after {
                            content: attr("Bạn yêu thích video này")
                        }
                    </style>
                </div>
                <div class="content_and_actress">
                    <div class="title_2_version d-flex align-items-center">
                        <p>
                            <?php
                            if ((isset($_GET["vd"]) && isset($_GET["id"]) && !isset($_GET["video"])) || isset($_GET['id']) && !isset($_GET["video"])) {
                                $getname = mysqli_query($conn, "SELECT * from movies order by id asc");
                                while ($row = mysqli_fetch_array($getname)) {
                                    if ($row["id"] === $_GET["id"]) {
                                        echo $row["title"];
                                    }
                                }
                            } else if (isset($_GET["vd"]) && isset($_GET["id"]) && isset($_GET["video"])) {
                                $getname2 = mysqli_query($conn, "SELECT * from featured_video order by id_featured asc");
                                while ($row = mysqli_fetch_array($getname2)) {
                                    if ($row["id_featured"] === $_GET["id"]) {
                                        echo $row["photo"];
                                    }
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <button class="btn-show">Hide</button>
                    <div class="actress">
                        <?php
                        if ((isset($_GET["vd"]) && isset($_GET["id"]) && !isset($_GET["video"])) || isset($_GET['id']) && !isset($_GET["video"])) {
                            $getname = mysqli_query($conn, "SELECT * from movies order by id asc");
                            while ($row = mysqli_fetch_array($getname)) {
                                if ($row["id"] === $_GET["id"]) {
                                    $myfile = fopen('/xampp/htdocs/xlxx/description_video/' . $row['content_video'] . '.txt', "r") or die("Unable to open file!");
                                    echo fread($myfile, filesize('/xampp/htdocs/xlxx/description_video/' . $row['content_video'] . '.txt'));
                                }
                            }
                        } else if (isset($_GET["vd"]) && isset($_GET["id"]) && isset($_GET["video"])) {
                            $getname2 = mysqli_query($conn, "SELECT * from featured_video order by id_featured asc");
                            while ($row = mysqli_fetch_array($getname2)) {
                                if ($row["id_featured"] === $_GET["id"]) {
                                    $myfile = fopen('/xampp/htdocs/xlxx/featured_content/' . $row['text'] . '.txt', "r") or die("Unable to open file!");
                                    echo fread($myfile, filesize('/xampp/htdocs/xlxx/featured_content/' . $row['text'] . '.txt'));
                                }
                            }
                        }

                        ?>
                    </div>
                    <div class="content">
                        <img src="/xlxx/<?php
                                        if ((isset($_GET["vd"]) && isset($_GET["id"]) && !isset($_GET["video"])) || isset($_GET['id']) && !isset($_GET["video"])) {
                                            $getname = mysqli_query($conn, "SELECT * from movies order by id asc");
                                            while ($row = mysqli_fetch_array($getname)) {
                                                if ($row["id"] === $_GET["id"]) {
                                                    echo "image/" . $row["image"];
                                                }
                                            }
                                        } else if (isset($_GET["vd"]) && isset($_GET["id"]) && isset($_GET["video"])) {
                                            $getname2 = mysqli_query($conn, "SELECT * from featured_video order by id_featured asc");
                                            while ($row = mysqli_fetch_array($getname2)) {
                                                if ($row["id_featured"] === $_GET["id"]) {
                                                    echo "featured_image/" . $row["title"];
                                                }
                                            }
                                        }
                                        ?>.jpg" alt="Can't display">
                        <button class="btn-actress">
                            <?php
                            $getname = mysqli_query($conn, "SELECT * from movies order by id asc");
                            if ((isset($_GET["vd"]) && isset($_GET["id"]) && !isset($_GET["video"])) || isset($_GET['id']) && !isset($_GET["video"])) {
                                while ($row = mysqli_fetch_array($getname)) {
                                    if ($row["id"] === $_GET["id"]) {
                                        echo $row["actress_movies"];
                                    }
                                }
                            } else if (isset($_GET["vd"]) && isset($_GET["id"]) && isset($_GET["video"])) {
                                $getname2 = mysqli_query($conn, "SELECT * from featured_video order by id_featured asc");
                                while ($row = mysqli_fetch_array($getname2)) {
                                    if ($row["id_featured"] === $_GET["id"]) {
                                        echo $row["actress_2"];
                                    }
                                }
                            }
                            ?>
                        </button>
                    </div>

                </div>
            </div>
            <!-- zoom video -->

            <!-- featured video -->
            <div class="featured-video">
                <?php
                $ft = featured();
                while ($row = mysqli_fetch_array($ft)) {

                ?>
                    <a title="<?php echo $row['photo'] ?>" href="/xlxx/video?video=featured&vd=<?php $cove = convert_vi_to_en($row['title']);
                                                                                                $dash = replaceAll($cove);
                                                                                                $rmcm = str_replace(',', '', $dash);
                                                                                                $fly = str_replace('.', '', $rmcm);
                                                                                                echo $fly; ?>&id=<?php echo $row['id_featured'] ?>">
                        <li class="d-flex flex-row ftt">
                            <img src="/xlxx/featured_image/<?php echo $row['title'] ?>.jpg" alt="can't display">
                            <p class=title-vd><?php echo $row['photo'] ?></p>
                            <span><?php echo $row['category'] ?></span>
                        </li>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- zoom -->
        <script>
            const zoom = document.querySelector("#z-video")
            const zoom_plus = document.querySelector(".info-video")
            const zoom_subtract = document.querySelector(".featured-video")
            const btn = document.querySelector(".btn-show")
            const des = document.querySelector(".actress")
            const ftn = document.querySelector(".function-video")
            const pts = document.querySelector(".function-video button")
            zoom.addEventListener('click', function() {
                if (zoom.innerHTML == "Zoom-") {
                    zoom.innerHTML = "Zoom+"
                    zoom_subtract.style.display = "flex"
                    zoom_plus.style.width = "67%"
                    ftn.style.height = "500px"
                    zoom_plus.style.transition = "all 0.35s linear"
                } else {
                    zoom.innerHTML = "Zoom-"
                    zoom_subtract.style.display = "none"
                    zoom_plus.style.width = "100%"
                    ftn.style.height = "748px"
                    zoom_plus.style.transition = "all 0.35s linear"
                    pts.style.bottom = "5%"
                }
            })
            btn.onclick = function() {
                if (this.innerHTML === "Hide") {
                    this.innerHTML = "Show"
                } else {
                    this.innerHTML = "Hide"
                }
            }
            $(document).ready(function() {
                $(btn).on('click', function() {
                    $(des).slideToggle('0.35s')

                })
            })
        </script>
        <br>
        <style>
            .content {
                flex-direction: row !important;
            }
        </style>
        <!-- suggest video -->
        <div class="suggest-video">
            <p class="suggest">Có thể bạn thích</p>
            <div class="boss-wrapper d-flex">
                <div class="wrapper gx-2 gy-2 d-flex flex-row flex-wrap justify-content-center align-items-center m-0 bg-secondary">
                    <?php
                    $gettt = random_8();
                    while ($row_2 = mysqli_fetch_array($gettt)) {

                    ?>
                        <a title="<?php echo $row_2['title'] ?>" href="/xlxx/video?vd=<?php $cove = convert_vi_to_en($row_2['title']);
                                                                                        $dash = replaceAll($cove);
                                                                                        $rmcm = str_replace(',', '', $dash);
                                                                                        $fly = str_replace('.', '', $rmcm);
                                                                                        echo $fly; ?>&id=<?php echo $row_2['id'] ?>">
                            <li class="d-flex flex-column justify-content-start align-items-center show-list">
                                <img src="/xlxx/image/<?php
                                                        echo $row_2['image'];
                                                        ?>.jpg" alt="can't display" width="320" height="240">
                                <p class="align-items-center">
                                    <?php
                                    echo $row_2['title']
                                    ?>
                                </p>
                                <span>
                                    <?php
                                    echo $row_2['state'];
                                    ?>
                                </span>
                            </li>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <br>
        <hr style="color: #555555">
        <br>
        <!-- footer web -->
        <div class="footer">
            <p>Xlxx &copy; 2021 |</p>
            <p>Xlxx.com là web xem <a style="color:#ff0000" href="/xlxx/phimsex">phim sex</a> cho người trên 18 tuổi, chỉ có một mục đích đó là giúp bạn giải trí và thỏa mãn sinh lý, nếu bạn dưới 18 tuổi vui lòng quay ra.</p>
            <p>Trang web này không đăng tải các video sex Việt Nam hay clip sex trẻ em, tất cả các video đều là cảnh dàn dựng và không có thật, người xem không được bắt chước bất kì nào hành động nào trong phim nếu không chúng tôi sẽ không chịu trách nhiệm dưới mọi hình thức</p>
        </div>
    </div>
    <!-- check whether current url is page 1 -->
</body>

</html>