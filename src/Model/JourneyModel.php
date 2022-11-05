<?php
class JourneyModel extends AbstractModel {

    public function getAllJourneys(): array
    {
        $sql = "SELECT*
        FROM journey jou
        ##INNER JOIN journey_picture pic ON pic.id_journey_picture = jou.journey_picture_id##
        INNER JOIN country cou ON cou.id_country = jou.country_id
        INNER JOIN period per ON per.id_period = jou.period_id
        INNER JOIN theme the ON the.id_category = jou.category_id;";

        return $this-> db -> getAllResults(
            $sql,
            [],
            Journey::class
        );

    }


    function getOneJourney(int $idJourney): bool|Journey
    {
        $sql = 'SELECT *
                FROM journey AS J
                INNER JOIN country cou ON cou.id_country = J.country_id
                INNER JOIN period per ON per.id_period = J.period_id
                INNER JOIN theme the ON the.id_category = J.category_id
                WHERE id_journey = ?';

        //return $this->db->getOneResult($sql, [$idJourney]);
        return $this->db->getOneResult(
            $sql,
            [$idJourney],
            Journey::class
        );
    }



    function getByTheme(int $idCategory): bool|array
    {
        $sql = 'SELECT *
                FROM theme AS T
                WHERE id_category = ?';

        return $this->db->getOneCategory($sql, [$idCategory]);
    }

    function getOnePeriod(int $idPeriod): bool|array
    {
        $sql = 'SELECT *
                FROM period AS P
                WHERE id_period= ?';

        return $this->db->getOnePeriod($sql, [$idPeriod]);
    }

    function getOneCountry(int $idCountry): bool|array
    {
        $sql = 'SELECT *
                FROM country AS C
                WHERE id_country= ?';

        return $this->db->getOneCountry($sql, [$idCountry]);
    }
}