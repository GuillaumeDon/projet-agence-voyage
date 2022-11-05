<?php

class StatusModel {

    public function getAllStatus(){
        $db = new Database();

        $sql = 'SELECT  sta.*
                FROM    status sta
                ORDER BY sta.id_status ASC';


        $status = $db-> getAllResults($sql);
        return $status;

    }


    public function updateStatus($updatedStatus, $requestId){

        $sql = 'UPDATE request 
                SET    status_id = ?
                WHERE  id_request= ?';

        $db = new Database();
        $db->executeQuery($sql, [$updatedStatus, $requestId]);

    }
}