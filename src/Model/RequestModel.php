<?php

class RequestModel extends AbstractModel {

    /**
     * Récupère tous les articles triés par date de création décroissante
     */
    public function getAllRequests(): array
    {
        $sql = "SELECT*
        FROM request req
        INNER JOIN subject sub ON sub.id_subject = req.subject_id
        INNER JOIN status sta ON sta.id_status = req.status_id;
        ORDER BY createdAt desc";

        return $this-> db -> getAllResults($sql);
    }

    public function addRequest(string $firstname, string $lastname, string $email, string $phone, int $idSubject, string $content){

        $sql = 'INSERT INTO request (createdAt, firstname, lastname, email, phone,subject_id, content, status_id)
                VALUES (NOW(),?, ?, ?, ?, ?, ?, 1)';
        $db = new Database();
        $db-> executeQuery($sql, [$firstname, $lastname, $email, $phone, $idSubject, $content]);
    }




    public function getOneRequest($idRequest){

        $sql = 'SELECT      req.*, sta.status_label, sub.subject_label
                FROM        request req
                INNER JOIN  status sta ON sta.id_status = req.status_id
                INNER JOIN  subject sub ON sub.id_subject = req.subject_id
                WHERE       req.id_request = ?';

        $db = new Database();
        $request = $db-> getOneResult($sql, [$idRequest]);
        return $request;
    }


    public function deleteRequest($idRequest){

        $sql = 'DELETE FROM request
                WHERE       id_request = ?';

        $db = new Database();

        $db->executeQuery($sql, [$idRequest]);

    }




}