<?php

namespace App\Entity;

class Status {

    // Propriétés
    private ?int $id_status;
    private string $status_label;
 

    /**
     * Constructeur
     */
    public function __construct(?int $id_status, string $status_label)
    {
        $this->id_status = $id_status;
        $this->status_label = $status_label;
    }

    /**
     * Get the value of id_status
     */ 
    public function getIdStatus(): ?int
    {
        return $this->id_status;
    }

    /**
     * Set the value of id_status
     *
     * @return  self
     */ 
    public function setIdStatus(?int $id_status): self
    {
        $this->id_status = $id_status;

        return $this;
    }

    /**
     * Get the value of status_label
     */ 
    public function getStatusLabel(): string
    {
        return $this->status_label;
    }

    /**
     * Set the value of status_label
     *
     * @return  self
     */ 
    public function setStatusLabel(string $status_label): self
    {
        $this->status_label = $status_label;

        return $this;
    }

}