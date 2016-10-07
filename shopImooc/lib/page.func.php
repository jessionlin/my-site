<?php
require_once '../include.php';
// $sql = "select * from imooc_admin";
// $totalRows = getResultNum($sql);
// // echo $totalRows;
// $pageSize = 2;
// $totalPage = ceil($totalRows / $pageSize);
// $page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
// if ($page < 1 || $page == null || ! is_numeric($page)) {
//     $page = 1;
// }
// if ($page >= $totalPage)
//     $page = $totalPage;
// $offset = ($page - 1) * $pageSize;
// $sql = "select * from imooc_admin limit {$offset},{$pageSize}";
// $rows = fetchAll($sql);
// // print_r($rows);
// foreach ($rows as $row) {
//     echo "���:" . $row['id'], "<br/>";
//     echo "����Ա������" . $row['username'], "<hr/>";
// }
// echo showPage($page, $totalPage);

function showPage($page, $totalPage, $where = null, $sep = "&nbsp;")
{
    $where = ($where = null) ? null : "&" . $where;
    $url = $_SERVER['PHP_SELF'];
    $index = ($page == 1) ? "��ҳ" : "<a href='{$url}?page=1{$where}'>��ҳ</a>";
    $last = ($page == $totalPage) ? "βҳ" : "<a href='{$url}?page={$totalPage}{$where}'>βҳ</a>";
    $prevPage=($page>=1)?$page-1:1;
    $nextPage=($page<=$totalPage)?$totalPage:$page+1;
    $prev = ($page == 1) ? "��һҳ" : "<a href='{$url}?page={$prevPage}{$where}'>��һҳ</a>";
    $next = ($page == $totalPage) ? "��һҳ" : "<a href='{$url}?page={$nextPage}{$where}'>��һҳ</a>";
    $str = "�ܹ�{$totalPage}ҳ/��ǰ{$page}ҳ";
    for ($i = 1; $i <= $totalPage; $i ++) {
        if ($page == $i) {
            $p .= "[{$i}]";
        } else {
            $p .= "<a href='{$url}?page = {$i}{$where}'>[{$i}]</a>";
        }
    }
    $pageStr = $str . "<br/>" . $index . $sep . $prev . $sep . $p . $sep . $next . $sep . $last;
    return $pageStr;
}
