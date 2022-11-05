<?php
class UserModel extends AbstractModel
{

    public function getAllUsers(): array
    {
        $sql = "SELECT*
        FROM users use;";


        return $this->db->getAllResults($sql);
    }


    function getOneUser(int $idUser): bool|array
    {
        $sql = 'SELECT *
                FROM user AS U
                WHERE idUser = ?';

        return $this->db->getOneResult($sql, [$idUser]);
    }
}