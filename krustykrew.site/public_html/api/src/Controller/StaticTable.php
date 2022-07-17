<?php
namespace Src\Controller;

class StaticTable {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
            id, userAgent, userLanguage, cookiesEnabled, allowJavaScript, allowImage, allowCSS, screenWidth, screenHeight, windowHeight, windowWidth, networkInfo
            FROM
                static;
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
                id, userAgent, userLanguage, cookiesEnabled, allowJavaScript, allowImage, allowCSS, screenWidth, screenHeight, windowHeight, windowWidth, networkInfo
            FROM 
                static
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
            INSERT INTO static
                (userAgent, userLanguage, cookiesEnabled, allowJavaScript, allowImage, allowCSS, screenWidth, screenHeight, windowHeight, windowWidth, networkInfo)
            VALUES
                (:userAgent, :userLanguage, :cookiesEnabled, :allowJavaScript, :allowImage, :allowCSS, :screenWidth, :screenHeight, :windowHeight, :windowWidth, :networkInfo);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'userAgent' => $input['userAgent'] ?? null,
                'userLanguage'  => $input['userLanguage'] ?? null,
                'cookiesEnabled'  => (int)$input['cookiesEnabled']?? null,
                'allowJavaScript'  => (int)$input['allowJavaScript']?? null,
                'allowImage'  => (int)$input['allowImage']?? null,
                'allowCSS'  => (int)$input['allowCSS']?? null,
                'screenWidth'  => $input['screenWidth']?? null,
                'screenHeight'  => $input['screenHeight']?? null,
                'windowHeight'  => $input['windowHeight']?? null,
                'windowWidth'  => $input['windowWidth']?? null,
                'networkInfo'  => $input['networkInfo']?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE static
            SET 
                userAgent = :userAgent,
                userLanguage  = :userLanguage,
                cookiesEnabled  = :cookiesEnabled,
                allowJavaScript  = :allowJavaScript,
                allowImage  = :allowImage,
                allowCSS  = :allowCSS,
                screenWidth  = :screenWidth,
                screenHeight  = :screenHeight,
                windowHeight  = :windowHeight,
                windowWidth  = :windowWidth,
                networkInfo  = :networkInfo
            WHERE id = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'id' => (int) $id,
                'userAgent' => $input['userAgent'] ?? null,
                'userLanguage'  => $input['userLanguage'] ?? null,
                'cookiesEnabled'  => (int)$input['cookiesEnabled']?? null,
                'allowJavaScript'  => (int)$input['allowJavaScript']?? null,
                'allowImage'  => (int)$input['allowImage']?? null,
                'allowCSS'  => (int)$input['allowCSS']?? null,
                'screenWidth'  => $input['screenWidth']?? null,
                'screenHeight'  => $input['screenHeight']?? null,
                'windowHeight'  => $input['windowHeight']?? null,
                'windowWidth'  => $input['windowWidth']?? null,
                'networkInfo'  => $input['networkInfo']?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM static
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