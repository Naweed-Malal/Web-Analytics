<?php
namespace Src\Controller;

class UsersTable {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
            id, username, password, admin, email
            FROM
                users;
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
            id, username, password, admin, email
            FROM 
                users
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
            INSERT INTO users
                (username, password, admin, email)
            VALUES
                (:username, :password, :admin, :email);
        ";

        //$insert['password']
        //TODO: insert hash password

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'username'  => $input['username'] ?? null,
                'password'  => password_hash($input['password'], PASSWORD_DEFAULT)?? null,
                'admin'  => (int)$input['admin']?? null,
                'email'  => $input['email']?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE users
            SET 
                id = :id,
                username = :username,
                password  = :password,
                admin  = :admin,
                email  = :email
            WHERE id = :id;
        ";

        //$insert['password']
        //TODO: insert hash password

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'id' => $id,
                'username'  => $input['username'] ?? null,
                'password'  => password_hash($input['password'], PASSWORD_DEFAULT)?? null,
                'admin'  => (int)$input['admin']?? null,
                'email'  => $input['email']?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM users
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