<?php

namespace App\Entity;

class Subject {

    // Propriétés
    private ?int $id_subject;
    private string $subject_label;
 

    /**
     * Constructeur
     */
    public function __construct(?int $id_subject, string $subject_label)
    {
        $this->id_subject = $id_subject;
        $this->subject_label = $subject_label;
    }

    /**
     * Get the value of id_subject
     */ 
    public function getIdSubject(): ?int
    {
        return $this->id_subject;
    }

    /**
     * Set the value of id_subject
     *
     * @return  self
     */ 
    public function setIdSubject(?int $id_subject): self
    {
        $this->id_subject = $id_subject;

        return $this;
    }

    /**
     * Get the value of subject_label
     */ 
    public function getSubjectLabel(): string
    {
        return $this->subject_label;
    }

    /**
     * Set the value of subject_label
     *
     * @return  self
     */ 
    public function setSubjectLabel(string $subject_label): self
    {
        $this->subject_label = $subject_label;

        return $this;
    }

}