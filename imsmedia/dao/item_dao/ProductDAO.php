<?php
include_once("dao/item_dao/AbstractItemDAO.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 17.12.2015
 * Time: 0:55
 */
class ProductDAO extends AbstractItemDAO
{

    public function insertItem(Item $item)
    {
        $con = self::openConnection();
        mysqli_begin_transaction($con);
        $code = $item->getCode();
        $name = $item->getName();
        $parent = $item->getParent() == null? '' : $item->getParent()->getCode();
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
        $sql = "INSERT INTO product VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        mysqli_stmt_prepare($stm, $sql);
        foreach ($items->getItems() as $item) {
            $code = $item->getCode();
            $articul = $item->getArticul();
            $name = $item->getName();
            $bmuID = $item->getBasicMeasurementUnit() == null ? null : $item->getBasicMeasurementUnit()->getId();
            $price = $item->getPrice();
            $curID = $item->getCurrency() == null ? null : $item->getCurrency()->getId();
            $muID = ($item->getMeasurementUnit() == null ? null : $item->getMeasurementUnit()->getId());
            $parent = ($item->getParent() == null ? null : $item->getParent()->getCode());
            mysqli_stmt_bind_param($stm, 'sssdddds', $code, $articul, $name, $bmuID, $price, $curID, $muID, $parent);
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