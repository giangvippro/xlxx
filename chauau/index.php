<?php
require "/xampp/htdocs/xlxx/lib/connect.php";
require "/xampp/htdocs/xlxx/database/getAllmenu.php";
include "/xampp/htdocs/xlxx/database/handle_actress.php";
function paginates_6() {
    $conn= mysqli_connect("localhost","root","","data_menu");
    $categories= mysqli_query($conn,"SELECT * FROM movies where state='chauau' ");
    $total= mysqli_num_rows($categories);
    return $total;
};
$pagi= paginates_6();
$limit = 24;
$total_page = ceil($pagi / $limit);
// echo $total_page;
$crpage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$start = ($crpage - 1) * $limit;
$categories = mysqli_query($conn, "SELECT * FROM movies where state='chauau' ");
?>
<!DOCTYPE html>
<html lang="vi">
<!-- head -->

<head>
    <title>XLXX</title>
    <meta charset="UTF-8">
    <base href="http://localhost/xlxx/chauau">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        function pagination(c, m) {
            var current = c,
                last = m,
                delta = 2,
                left = current - delta,
                right = current + delta + 1,
                range = [],
                rangeWithDots = [],
                l;

            for (let i = 1; i <= last; i++) {
                if (i == 1 || i == last || i >= left && i < right) {
                    range.push(i);
                }
            }

            for (let i of range) {
                if (l) {
                    if (i - l === 2) {
                        rangeWithDots.push(l + 1);
                    } else if (i - l !== 1) {
                        rangeWithDots.push('...')
                    }
                }
                rangeWithDots.push(i);
                l = i;
            }

            return rangeWithDots;
        }
    </script>
    <style>
        /* set css body */
        body {
            background-color: #000 !important;
        }

        /* set link */
        a {
            text-decoration: none !important;
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
        .wrapper {
            gap: 10px !important;
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
            font-size: 14px;
            user-select: none !important;
        }

        .footer p a {
            text-decoration: none;
            color: #ff0000;
        }

        .not-selected {
            cursor: not-allowed !important;
        }

        .pagination {
            user-select: none !important;
            
        }
        .page-item .page-link {
            background-color: #000000 !important;
            color: #fff !important; 
        }
        .active {
            background-color: #ff0000 !important;

        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #ff0000 !important;
            border-color: #ff0000 !important;
        }
        .page-item.active .page-link:active {
            border-color: #ff0000 !important;
        }
        .nav-menu .row li.col:nth-of-type(6) {
            color: #ff0000 !important;
        }
        .nav-menu .row li.col:not(:nth-of-type(6)) {
            color: #fff !important;
        }
        .nav-menu .row li.col:hover {
            color: #ff0000 !important;
        }
    </style>
</head>
<!-- du ma ti thi mat web thi an cut huhuhu -->
<body>
    <div class="container-sm h-100 main p-0 bg-dark">
        <!-- Title XLXX -->
        <div class="home py-3 d-flex align-items-center px-3">
            <div>
                <a href="/xlxx/">XLXX.COM</a>
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
            <div class="new_film d-flex align-items-center h-100">
                <p>Phim sex mới</p>
            </div>
            <form class="search d-flex flex-row mx-3" method="GET" action="/xlxx/search/">
                <input type="text" name="result" id="find" class="form-control mx-2" autocomplete="off" placeholder="Search...">
                <button type="submit" id="sent" class="btn btn-info text-nowrap">Tìm kiếm</button>
            </form>
        </div>
        <style>
            @media screen and (max-width: 760px) {
                .wrapper {
                    display: flex;
                    justify-content: center !important;
                }
            }
        </style>
        <!-- Display video as grid -->
        <div class="wrapper gx-2 gy-2 d-flex flex-row flex-wrap justify-content-between align-items-center m-0 bg-secondary">
            <?php
            while ($row = mysqli_fetch_array($categories)) {
            ?>
                <a title="<?php echo $row['title'] ?>" href="/xlxx/video?vd=<?php $cove = convert_vi_to_en($row['title']);
                                                                            $dash = replaceAll($cove);
                                                                            $rmcm = str_replace(',', '', $dash);
                                                                            $fly = str_replace('.', '', $rmcm);
                                                                            echo $fly; ?>&id=<?php echo $row['id'] ?>">
                    <li class="d-flex flex-column justify-content-start align-items-center show-list">
                        <img src="/xlxx/image/<?php
                                                echo $row['image'];
                                                ?>.jpg" alt="can't display" width="320" height="240">
                        <p class="align-items-center">
                            <?php
                            echo $row['title']
                            ?>
                        </p>
                        <span>
                            <?php
                            echo $row['state'];
                            ?>
                        </span>
                    </li>
                </a>
            <?php
            }
            ?>
        </div>
        <!-- Pagination -->
        <ul class="pagination m-0 position-relative bottom-0 bg-dark">
            <li class="page-item <?php echo (($crpage == 1) ? "disabled not-selected" : "") ?>">
                <a class="page-link" tabindex="-1" href="/xlxx/chauau?page=<?php
                                                                            if ($crpage > 1) {
                                                                                echo $crpage - 1;
                                                                            } else {
                                                                                echo 1;
                                                                            }
                                                                            ?>">
                    Previous
                </a>
            </li>
            <?php
            for ($i = 1; $i <= $total_page; $i++) {
            ?>
                <li class="page-item <?php echo (($crpage == $i) ? "active" : "") ?>" <?php ?>><a class="page-link" href="/xlxx/chauau?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
            }
            ?>
            <li class="page-item <?php echo (($crpage == $total_page || $crapge== 0) ? "disabled not-selected" : "") ?>"><a tabindex="-1" class="page-link" href="/xlxx/chauau?page=<?php echo ($crpage + 1) ?>">Next</a></li>
        </ul>
        <br><br>
        <div class="footer">
            <p>Xlxx &copy; 2021 |</p>
            <p>Xlxx.com là web xem <a href="/xlxx/">phim sex</a> cho người trên 18 tuổi, chỉ có một mục đích đó là giúp bạn giải trí và thỏa mãn sinh lý, nếu bạn dưới 18 tuổi vui lòng quay ra.</p>
            <p>Trang web này không đăng tải các video sex Việt Nam hay clip sex trẻ em, tất cả các video đều là cảnh dàn dựng và không có thật, người xem không được bắt chước bất kì nào hành động nào trong phim nếu không chúng tôi sẽ không chịu trách nhiệm dưới mọi hình thức</p>
        </div>
    </div>
    
    <!-- check whether current url is page 1 -->
</body>

</html>