<?php
namespace Src\Controller;

class PerformanceTable {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                *
            FROM
                performance;
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
                *
            FROM 
                performance
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
            INSERT INTO performance
                (name,entryType,startTime,duration,initiatorType,nextHopProtocol,workerStart,redirectStart,redirectEnd,fetchStart,domainLookupStart,domainLookupEnd,connectStart,connectEnd,secureConnectionStart,requestStart,responseStart,responseEnd,transferSize,encodedBodySize,decodedBodySize,unloadEventStart,unloadEventEnd,domInteractive,domContentLoadedEventStart,domContentLoadedEventEnd,domComplete,loadEventStart,loadEventEnd,type,redirectCount, startLoad, endLoad, total)
            VALUES
                (:name,:entryType,:startTime,:duration,:initiatorType,:nextHopProtocol,:workerStart,:redirectStart,:redirectEnd,:fetchStart,:domainLookupStart,:domainLookupEnd,:connectStart,:connectEnd,:secureConnectionStart,:requestStart,:responseStart,:responseEnd,:transferSize,:encodedBodySize,:decodedBodySize,:unloadEventStart,:unloadEventEnd,:domInteractive,:domContentLoadedEventStart,:domContentLoadedEventEnd,:domComplete,:loadEventStart,:loadEventEnd,:type,:redirectCount, :startLoad, :endLoad, :total);
        ";


        

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'name' => $input['timing']['name'] ?? null,
                'entryType' => $input['timing']['entryType'] ?? null,
                'startTime' => $input['timing']['startTime'] ?? null,
                'duration' => $input['timing']['duration'] ?? null,
                'initiatorType' => $input['timing']['initiatorType'] ?? null,
                'nextHopProtocol' => $input['timing']['nextHopProtocol'] ?? null,
                'workerStart' => $input['timing']['workerStart'] ?? null,
                'redirectStart' => $input['timing']['redirectStart'] ?? null,
                'redirectEnd' => $input['timing']['redirectEnd'] ?? null,
                'fetchStart' => $input['timing']['fetchStart'] ?? null,
                'domainLookupStart' => $input['timing']['domainLookupStart'] ?? null,
                'domainLookupEnd' => $input['timing']['domainLookupEnd'] ?? null,
                'connectStart' => $input['timing']['connectStart'] ?? null,
                'connectEnd' => $input['timing']['connectEnd'] ?? null,
                'secureConnectionStart' => $input['timing']['secureConnectionStart'] ?? null,
                'requestStart' => $input['timing']['requestStart'] ?? null,
                'responseStart' => $input['timing']['responseStart'] ?? null,
                'responseEnd' => $input['timing']['responseEnd'] ?? null,
                'transferSize' => $input['timing']['transferSize'] ?? null,
                'encodedBodySize' => $input['timing']['encodedBodySize'] ?? null,
                'decodedBodySize' => $input['timing']['decodedBodySize'] ?? null,
                'unloadEventStart' => $input['timing']['unloadEventStart'] ?? null,
                'unloadEventEnd' => $input['timing']['unloadEventEnd'] ?? null,
                'domInteractive'  => $input['timing']['domInteractive'] ?? null,
                'domContentLoadedEventStart'  => $input['timing']['domContentLoadedEventStart']?? null,
                'domContentLoadedEventEnd'  => $input['timing']['domContentLoadedEventEnd']?? null,
                'domComplete' => $input['timing']['domComplete'] ?? null,
                'loadEventStart' => $input['timing']['loadEventStart'] ?? null,
                'loadEventEnd' => $input['timing']['loadEventEnd'] ?? null,
                'type' => $input['timing']['type'] ?? null,
                'redirectCount' => $input['timing']['redirectCount'] ?? null,
                'startLoad'  => $input['startLoad'] ?? null,
                'endLoad'  => $input['endLoad']?? null,
                'total'  => $input['total']?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE performance
            SET
                name = :name, 
                entryType = :entryType,
                startTime = :startTime,
                duration = :duration,
                initiatorType = :initiatorType,
                nextHopProtocol = :nextHopProtocol,
                workerStart = :workerStart,
                redirectStart = :redirectStart,
                redirectEnd = :redirectEnd,
                fetchStart = :fetchStart,
                domainLookupStart = :domainLookupStart,
                domainLookupEnd = :domainLookupEnd,
                connectStart = :connectStart,
                connectEnd = :connectEnd,
                secureConnectionStart = :secureConnectionStart,
                requestStart = :requestStart,
                responseStart = :responseStart,
                responseEnd = :responseEnd,
                transferSize = :transferSize,
                encodedBodySize = :encodedBodySize,
                decodedBodySize = :decodedBodySize,
                unloadEventStart = :unloadEventStart,
                unloadEventEnd = :unloadEventEnd,
                domInteractive  = :domInteractive,
                domContentLoadedEventStart  = :domContentLoadedEventStart,
                domContentLoadedEventEnd  = :domContentLoadedEventEnd,
                domComplete = :domComplete,
                loadEventStart = :loadEventStart,
                loadEventEnd = :loadEventEnd,
                type = :type,
                redirectCount = :redirectCount,
                startLoad  = :startLoad,
                endLoad  = :endLoad,
                total  = :total
            WHERE id = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            if(gettype($input['timing']) == 'array'){
            $statement->execute(array(
                'id' => (int) $id,
                'name' => $input['timing']['name'] ?? null,
                'entryType' => $input['timing']['entryType'] ?? null,
                'startTime' => $input['timing']['startTime'] ?? null,
                'duration' => $input['timing']['duration'] ?? null,
                'initiatorType' => $input['timing']['initiatorType'] ?? null,
                'nextHopProtocol' => $input['timing']['nextHopProtocol'] ?? null,
                'workerStart' => $input['timing']['workerStart'] ?? null,
                'redirectStart' => $input['timing']['redirectStart'] ?? null,
                'redirectEnd' => $input['timing']['redirectEnd'] ?? null,
                'fetchStart' => $input['timing']['fetchStart'] ?? null,
                'domainLookupStart' => $input['timing']['domainLookupStart'] ?? null,
                'domainLookupEnd' => $input['timing']['domainLookupEnd'] ?? null,
                'connectStart' => $input['timing']['connectStart'] ?? null,
                'connectEnd' => $input['timing']['connectEnd'] ?? null,
                'secureConnectionStart' => $input['timing']['secureConnectionStart'] ?? null,
                'requestStart' => $input['timing']['requestStart'] ?? null,
                'responseStart' => $input['timing']['responseStart'] ?? null,
                'responseEnd' => $input['timing']['responseEnd'] ?? null,
                'transferSize' => $input['timing']['transferSize'] ?? null,
                'encodedBodySize' => $input['timing']['encodedBodySize'] ?? null,
                'decodedBodySize' => $input['timing']['decodedBodySize'] ?? null,
                'unloadEventStart' => $input['timing']['unloadEventStart'] ?? null,
                'unloadEventEnd' => $input['timing']['unloadEventEnd'] ?? null,
                'domInteractive'  => $input['timing']['domInteractive'] ?? null,
                'domContentLoadedEventStart'  => $input['timing']['domContentLoadedEventStart']?? null,
                'domContentLoadedEventEnd'  => $input['timing']['domContentLoadedEventEnd']?? null,
                'domComplete' => $input['timing']['domComplete'] ?? null,
                'loadEventStart' => $input['timing']['loadEventStart'] ?? null,
                'loadEventEnd' => $input['timing']['loadEventEnd'] ?? null,
                'type' => $input['timing']['type'] ?? null,
                'redirectCount' => $input['timing']['redirectCount'] ?? null,
                'startLoad'  => $input['startLoad'] ?? null,
                'endLoad'  => $input['endLoad']?? null,
                'total'  => $input['total']?? null,
            ));
        }
            else{
            $statement->execute(array(
                'id' => (int) $id,
                'name' => $input['name'] ?? null,
                'entryType' => $input['entryType'] ?? null,
                'startTime' => (float)$input['startTime'] ?? null,
                'duration' => (float)$input['duration'] ?? null,
                'initiatorType' => $input['initiatorType'] ?? null,
                'nextHopProtocol' => $input['nextHopProtocol'] ?? null,
                'workerStart' => (float)$input['workerStart'] ?? null,
                'redirectStart' => (float)$input['redirectStart'] ?? null,
                'redirectEnd' => (float)$input['redirectEnd'] ?? null,
                'fetchStart' => (float)$input['fetchStart'] ?? null,
                'domainLookupStart' => (float)$input['domainLookupStart'] ?? null,
                'domainLookupEnd' => (float)$input['domainLookupEnd'] ?? null,
                'connectStart' => (float)$input['connectStart'] ?? null,
                'connectEnd' => (float)$input['connectEnd'] ?? null,
                'secureConnectionStart' => (int)$input['secureConnectionStart'] ?? null,
                'requestStart' => (float)$input['requestStart'] ?? null,
                'responseStart' => (float)$input['responseStart'] ?? null,
                'responseEnd' => (float)$input['responseEnd'] ?? null,
                'transferSize' => (int)$input['transferSize'] ?? null,
                'encodedBodySize' => (int)$input['encodedBodySize'] ?? null,
                'decodedBodySize' => (int)$input['decodedBodySize'] ?? null,
                'unloadEventStart' => (float)$input['unloadEventStart'] ?? null,
                'unloadEventEnd' => (float)$input['unloadEventEnd'] ?? null,
                'domInteractive'  => (float)$input['domInteractive'] ?? null,
                'domContentLoadedEventStart'  => (float)$input['domContentLoadedEventStart']?? null,
                'domContentLoadedEventEnd'  => (float)$input['domContentLoadedEventEnd']?? null,
                'domComplete' => (float)$input['domComplete'] ?? null,
                'loadEventStart' => (float)$input['loadEventStart'] ?? null,
                'loadEventEnd' => (float)$input['loadEventEnd'] ?? null,
                'type' => $input['type'] ?? null,
                'redirectCount' => (int)$input['redirectCount'] ?? null,
                'startLoad'  => $input['startLoad'] ?? null,
                'endLoad'  => $input['endLoad']?? null,
                'total'  => (int)$input['total']?? null,
            ));
        }
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM performance
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