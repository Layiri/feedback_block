<?php

include_once 'ConnectDatabase.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

$conn = ConnectDatabase::connectDb($config);
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 25;
$offset = ($pageno - 1) * $no_of_records_per_page;
$total_pages_sql = "";
$result = $conn->query("SELECT COUNT(*) FROM `otzivi` WHERE `product_id`=1")->fetch();
$total_rows = $result[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sort = '';
$queryDateTime = $_GET;
$queryRatings = $_GET;
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
}
if ($sort == 'datetime') {
    $sql_sort = "ORDER BY created_at ASC";
    $queryDateTime['sort'] = "-datetime";
    $queryRatings['sort'] = "ratings";
} elseif ($sort == "-datetime") {
    $sql_sort = "ORDER BY created_at DESC";
    $queryDateTime['sort'] = "datetime";
    $queryRatings['sort'] = "ratings";
} elseif ($sort == "ratings") {
    $sql_sort = "ORDER BY ratings ASC";
    $queryRatings['sort'] = "-ratings";
    $queryDateTime['sort'] = "datetime";
} elseif ($sort == "-ratings") {
    $sql_sort = "ORDER BY ratings DESC";
    $queryRatings['sort'] = "ratings";
    $queryDateTime['sort'] = "datetime";
} else {
    $sql_sort = "ORDER BY created_at DESC";
    $queryRatings['sort'] = "ratings";
    $queryDateTime['sort'] = "datetime";

}
$qdate = http_build_query($queryDateTime);
$qrating = http_build_query($queryRatings);

$reviews = $conn->query("SELECT * FROM otzivi WHERE `product_id`=1 $sql_sort LIMIT $offset, $no_of_records_per_page ")->fetchAll();
