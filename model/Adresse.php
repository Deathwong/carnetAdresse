<?php

namespace model;

class Adresse
{
    private int $id;
    private ?int $numeroRue;
    private ?string $nomRue;
    private string $ville;
    private string $pays;
    private string $codePostal;
    private ?string $region;
    private ?string $departement;
    private ?string $lieuDit;
    private ?string $complementUn;
    private ?string $complementDeux;
    private ?string $complementTrois;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Adresse
     */
    public function setId(int $id): Adresse
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumeroRue(): ?int
    {
        return $this->numeroRue;
    }

    /**
     * @param int|null $numeroRue
     * @return Adresse
     */
    public function setNumeroRue(?int $numeroRue): Adresse
    {
        $this->numeroRue = $numeroRue;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomRue(): ?string
    {
        return $this->nomRue;
    }

    /**
     * @param string|null $nomRue
     * @return Adresse
     */
    public function setNomRue(?string $nomRue): Adresse
    {
        $this->nomRue = $nomRue;
        return $this;
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     * @return Adresse
     */
    public function setVille(string $ville): Adresse
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * @return string
     */
    public function getPays(): string
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     * @return Adresse
     */
    public function setPays(string $pays): Adresse
    {
        $this->pays = $pays;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodePostal(): string
    {
        return $this->codePostal;
    }

    /**
     * @param string $codePostal
     * @return Adresse
     */
    public function setCodePostal(string $codePostal): Adresse
    {
        $this->codePostal = $codePostal;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @param string|null $region
     * @return Adresse
     */
    public function setRegion(?string $region): Adresse
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    /**
     * @param string|null $departement
     * @return Adresse
     */
    public function setDepartement(?string $departement): Adresse
    {
        $this->departement = $departement;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLieuDit(): ?string
    {
        return $this->lieuDit;
    }

    /**
     * @param string|null $lieuDit
     * @return Adresse
     */
    public function setLieuDit(?string $lieuDit): Adresse
    {
        $this->lieuDit = $lieuDit;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComplementUn(): ?string
    {
        return $this->complementUn;
    }

    /**
     * @param string|null $complementUn
     * @return Adresse
     */
    public function setComplementUn(?string $complementUn): Adresse
    {
        $this->complementUn = $complementUn;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComplementDeux(): ?string
    {
        return $this->complementDeux;
    }

    /**
     * @param string|null $complementDeux
     * @return Adresse
     */
    public function setComplementDeux(?string $complementDeux): Adresse
    {
        $this->complementDeux = $complementDeux;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComplementTrois(): ?string
    {
        return $this->complementTrois;
    }

    /**
     * @param string|null $complementTrois
     * @return Adresse
     */
    public function setComplementTrois(?string $complementTrois): Adresse
    {
        $this->complementTrois = $complementTrois;
        return $this;
    }
}