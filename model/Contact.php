<?php

namespace model;

class Contact
{
    private int $id;
    private ?int $idAdresse;
    private string $nom;
    private string $prenom;
    private ?string $surnom;
    private string $telephone;
    private ?string $email;
    private ?string $dateAnniversaire;
    private ?string $note;

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
     * @return int|null
     */
    public function getIdAdresse(): ?int
    {
        return $this->idAdresse;
    }

    /**
     * @param int|null $idAdresse
     * @return Contact
     */
    public function setIdAdresse(?int $idAdresse): Contact
    {
        $this->idAdresse = $idAdresse;
        return $this;
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
     * @return string|null
     */
    public function getSurnom(): ?string
    {
        return $this->surnom;
    }

    /**
     * @param string|null $surnom
     * @return Contact
     */
    public function setSurnom(?string $surnom): Contact
    {
        $this->surnom = $surnom;
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
     * @param string $telephone
     * @return Contact
     */
    public function setTelephone(string $telephone): Contact
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Contact
     */
    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    /**
     * @param string|null $adresse
     * @return Contact
     */
    public function setAdresse(?string $adresse): Contact
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDateAnniversaire(): ?string
    {
        return $this->dateAnniversaire;
    }

    /**
     * @param string|null $dateAnniversaire
     * @return Contact
     */
    public function setDateAnniversaire(?string $dateAnniversaire): Contact
    {
        $this->dateAnniversaire = $dateAnniversaire;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     * @return Contact
     */
    public function setNote(?string $note): Contact
    {
        $this->note = $note;
        return $this;
    }
}