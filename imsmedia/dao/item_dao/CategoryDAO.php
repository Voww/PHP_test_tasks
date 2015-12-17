<?php
include_once("dao/item_dao/AbstractItemDAO.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 17.12.2015
 * Time: 0:55
 */
class CategoryDAO extends AbstractItemDAO
{
    public function insertItem(Item $item)
    {
        $con = self::openConnection();
        mysqli_begin_transaction($con);
        $code = $item->getCode();
        $name = $item->getName();
        $parent = $item->getParent() == null ? '' : $item->getParent()->getCode();
        $sql = "INSERT INTO category (code, name, parent_category_id) VALUE ('$code', '$name', '$parent')";
        mysqli_query($con, $sql);
        $affected = mysqli_affected_rows($con);
        if ($affected == 1) {
            mysqli_commit($con);
        } else {
            mysqli_rollback($con);
        }
        return $affected;
    }

    public function insertItems(Items $items)
    {
        $con = self::openConnection();
        $affected = 0;
        mysqli_begin_transaction($con);
        $stm = mysqli_stmt_init($con);
        $sql = "INSERT INTO category VALUES (?, ?, ?)";
        mysqli_stmt_prepare($stm, $sql);
        foreach ($items->getItems() as $item) {
            $code = $item->getCode();
            $name = $item->getName();
            $parent = $item->getParent() == null ? null : $item->getParent()->getCode();
            mysqli_stmt_bind_param($stm, 'sss', $code, $name, $parent);
            mysqli_stmt_execute($stm);
            if (mysqli_affected_rows($con) == 1) {
                $affected++;
            }
        }
        if ($affected > 0) {
            mysqli_commit($con);
        } else {
            mysqli_rollback($con);
        }
        return $affected;
    }

    public function readItems()
    {

    }
}