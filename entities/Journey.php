<?php

class Journey
{
    private int $id_journey;
    private string $title;
    private string $content;
    private string $abstract;
    private int $category_id;
    private string $category_label;
    private int $period_id;
    private string $period_label;
    private int $country_id;
    private string $country_label;


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    public function __construct(array $donnees = null)
    {
        if($donnees !== null)
            $this->hydrate($donnees);
    }

    public function isValid() {

    }

    /**
     * @return mixed
     */
    public function getId_journey()
    {
        return $this->id_journey;
    }

    /**
     * @param mixed $id_journey
     */
    public function setId_journey($id_journey): void
    {
        $this->id_journey = $id_journey;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }


    public function getExtraitContent()
    {
        $contenu = mb_substr(strip_tags($this->content), 0, 100, 'UTF-8');
        return $contenu . (strlen($contenu) === 100 ? "..." : "");
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * @param mixed $abstract
     */
    public function setAbstract($abstract): void
    {
        $this->abstract = $abstract;
    }

    /**
     * @return mixed
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategory_id($category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getPeriod_id()
    {
        return $this->period_id;
    }

    /**
     * @param mixed $period_id
     */
    public function setPeriod_id($period_id): void
    {
        $this->period_id = $period_id;
    }

    /**
     * @return mixed
     */
    public function getCountry_id()
    {
        return $this->country_id;
    }

    /**
     * @param mixed $country_id
     */
    public function setCountry_id($country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return mixed
     */
    public function getCategory_label()
    {
        return $this->category_label;
    }

    /**
     * @param mixed $category_label
     */
    public function setCategory_label($category_label): void
    {
        $this->category_label = $category_label;
    }

    /**
     * @return mixed
     */
    public function getPeriod_label()
    {
        return $this->period_label;
    }

    /**
     * @param mixed $period_label
     */
    public function setPeriod_label($period_label): void
    {
        $this->period_label = $period_label;
    }

    /**
     * @return mixed
     */
    public function getCountry_label()
    {
        return $this->country_label;
    }

    /**
     * @param mixed $country_label
     */
    public function setCountry_label($country_label): void
    {
        $this->country_label = $country_label;
    }




}