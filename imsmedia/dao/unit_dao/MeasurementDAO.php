<?php
include_once("dao/unit_dao/AbstractUnitDAO.php");
/**
 * Created by IntelliJ IDEA.
 * User: Voww
 * Date: 17.12.2015
 * Time: 0:55
 */
class MeasurementDAO extends AbstractUnitDAO
{
    public function insertUnit(Unit $unit)
    {
        $con = self::openConnection();
        mysqli_begin_transaction($con);
        $code = $unit->getCode();
        $sql = "INSERT INTO measurement (code) VALUE ('$code')";

        var_dump($sql);

        mysqli_query($con, $sql);
        $affected = mysqli_affected_rows($con);
        var_dump($affected);
        if ($affected == 1) {
            mysqli_commit($con);
        } else {
            mysqli_rollback($con);
        }
        return $affected;
    }

    public function insertUnits(Units $units)
    {
        $con = self::openConnection();
        $affected = 0;
        mysqli_begin_transaction($con);
        $stm = mysqli_stmt_init($con);
        $sql = "INSERT INTO measurement (code) VALUE (?)";
        mysqli_stmt_prepare($stm, $sql);
        foreach ($units->getUnits() as $unit) {
            $code = $unit->getCode();
            mysqli_stmt_bind_param($stm, 's', $code);
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

    public function readUnits()
    {
        $con = self::openConnection();
        $measurements = new Measurements();
        mysqli_begin_transaction($con);
        $sql = "SELECT * FROM measurement WHERE 1";
        $res = mysqli_query($con, $sql);
        while ($arrRes = mysqli_fetch_assoc($res)) {
            $measurement = new Measurement();
            $measurement->setId($arrRes['id']);
            $measurement->setCode($arrRes['code']);
            $measurements->setUnit($measurement);
        }
        return $measurements;
    }
}