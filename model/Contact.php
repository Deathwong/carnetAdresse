<?php

namespace model;

class Contact
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $telephone;
    private mixed $email;
    private mixed $adresse;
    private mixed $date_anniversaire;
    private mixed $note;

    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Contact
     */
    public function setId(int $id): Contact
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Contact
     */
    public function setNom(string $nom): Contact
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom(string $prenom): Contact
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param int $telephone
     * @return Contact
     */
    public function setTelephone(int $telephone): Contact
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Contact
     */
    public function setEmail(mixed $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     * @return Contact
     */
    public function setAdresse(mixed $adresse): Contact
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateAnniversaire(): mixed
    {
        return $this->date_anniversaire;
    }

    /**
     * @param mixed $date_anniversaire
     * @return Contact
     */
    public function setDateAnniversaire(mixed $date_anniversaire): Contact
    {
        $this->date_anniversaire = $date_anniversaire;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNote(): mixed
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     * @return Contact
     */
    public function setNote(mixed $note): Contact
    {
        $this->note = $note;
        return $this;
    }
}