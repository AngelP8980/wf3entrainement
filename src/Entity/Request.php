<?php

namespace App\Entity;

class Request {

    // Propriétés
    private ?int $id_request;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $content;
    private string $phone;
    private string $filename;
    private Subject $subject;
    private Status $status;
    private string $createdAt;

    /**
     * Constructeur
     */
    public function __construct(?int $id_request, string $createdAt, string $firstname, string $lastname, string $email, string $content, string $phone, string $filename, Subject $subject, Status $status)
    {
        $this->id_request = $id_request;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->content = $content;
        $this->phone = $phone;
        $this->filename = $filename;
        $this->subject = $subject;
        $this->status = $status;
        $this->createdAt = $createdAt;
    }

    /**
     * Get the value of id_request
     */ 
    public function getIdRequest(): ?int
    {
        return $this->id_request;
    }

    /**
     * Set the value of id_request
     *
     * @return  self
     */ 
    public function setIdRequest(?int $id_request): self
    {
        $this->id_request = $id_request;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Conca.....
     */ 
    public function getFullname(): string
    {
        return $this->lastname . " " . $this->firstname;
    }



    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of filename
     */ 
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * Set the value of filename
     *
     * @return  self
     */ 
    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get the value of subject
     */ 
    public function getSubject(): Subject
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */ 
    public function setSubject(Subject $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus(Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

}