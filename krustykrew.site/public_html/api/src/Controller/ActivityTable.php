<?php
namespace Src\Controller;

class ActivityTable {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
            id, time, inactiveTime, moveInd, clickInd, clickCount, keydownInd, keyUpInd, scrollInd, cursorCoordX, cursorCoordY, whichButton, scrollCoordX, scrollCoordY, keyup, keydown, breakTimes, breakDuration, enterTime, exitTime, page
            FROM
                activity;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($id)
    {
        $statement = "
            SELECT 
            id, time, inactiveTime, moveInd, clickInd, clickCount, keydownInd, keyUpInd, scrollInd, cursorCoordX, cursorCoordY, whichButton, scrollCoordX, scrollCoordY, keyup, keydown, breakTimes, breakDuration, enterTime, exitTime, page
            FROM 
                activity
            WHERE id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function insert(Array $input)
    {
        $statement = "
            INSERT INTO activity
                (time, inactiveTime, moveInd, clickInd, clickCount, keydownInd, keyUpInd, scrollInd, cursorCoordX, cursorCoordY, whichButton, scrollCoordX, scrollCoordY, keyup, keydown, breakTimes, breakDuration, enterTime, exitTime, page)
            VALUES
                (:time, :inactiveTime, :moveInd, :clickInd, :clickCount, :keydownInd, :keyUpInd, :scrollInd, :cursorCoordX, :cursorCoordY, :whichButton, :scrollCoordX, :scrollCoordY, :keyup, :keydown, :breakTimes, :breakDuration, :enterTime, :exitTime, :page)
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'time' => $input['time'] ?? null,
                'inactiveTime'  => $input['inactiveTime'] ?? null,
                'moveInd'  => $input['moveInd']?? null,
                'clickInd'  => $input['clickInd']?? null,
                'clickCount'  => $input['clickCount']?? null,
                'keydownInd'  => $input['keydownInd']?? null,
                'keyUpInd'  => $input['keyUpInd']?? null,
                'scrollInd'  => $input['scrollInd']?? null,
                'cursorCoordX'  => $input['cursorCoordX']?? null,
                'cursorCoordY'  => $input['cursorCoordY']?? null,
                'whichButton'  => $input['whichButton']?? null,
                'scrollCoordX'  => $input['scrollCoordX']?? null,
                'scrollCoordY'  => $input['scrollCoordY']?? null,
                'keyup'  => $input['keyup']?? null,
                'keydown'  => $input['keydown']?? null,
                'breakTimes'  => $input['breakTimes']?? null,
                'breakDuration'  => $input['breakDuration']?? null,
                'enterTime'  => $input['enterTime']?? null,
                'exitTime'  => $input['exitTime']?? null,
                'page'  => $input['page']?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE activity
            SET 
                time = :time,
                inactiveTime  = :inactiveTime,
                moveInd  = :moveInd,
                clickInd  = :clickInd,
                clickCount  = :clickCount,
                keydownInd  = :keydownInd,
                keyUpInd  = :keyUpInd,
                scrollInd  = :scrollInd,
                cursorCoordX  = :cursorCoordX,
                cursorCoordY  = :cursorCoordY,
                whichButton  = :whichButton,
                scrollCoordX  = :scrollCoordX,
                scrollCoordY  = :scrollCoordY,
                keyup  = :keyup,
                keydown  = :keydown,
                breakTimes  = :breakTimes,
                breakDuration  = :breakDuration,
                enterTime  = :enterTime,
                exitTime  = :exitTime,
                page  = :page
            WHERE id = :id;
        ";


        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'id' => (int) $id,
                'time' => $input['time'] ?? null,
                'inactiveTime'  => $input['inactiveTime'] ?? null,
                'moveInd'  => $input['moveInd']?? null,
                'clickInd'  => $input['clickInd']?? null,
                'clickCount'  => $input['clickCount']?? null,
                'keydownInd'  => $input['keydownInd']?? null,
                'keyUpInd'  => $input['keyUpInd']?? null,
                'scrollInd'  => $input['scrollInd']?? null,
                'cursorCoordX'  => $input['cursorCoordX']?? null,
                'cursorCoordY'  => $input['cursorCoordY']?? null,
                'whichButton'  => $input['whichButton']?? null,
                'scrollCoordX'  => $input['scrollCoordX']?? null,
                'scrollCoordY'  => $input['scrollCoordY']?? null,
                'keyup'  => $input['keyup']?? null,
                'keydown'  => $input['keydown']?? null,
                'breakTimes'  => $input['breakTimes']?? null,
                'breakDuration'  => $input['breakDuration']?? null,
                'enterTime'  => $input['enterTime']?? null,
                'exitTime'  => $input['exitTime']?? null,
                'page'  => $input['page']?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM activity
            WHERE id = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array('id' => $id));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }
}