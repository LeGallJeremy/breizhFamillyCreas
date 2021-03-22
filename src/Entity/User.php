<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields={"userMail"},
 * message="l'email existe déja")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $userFirstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $userMail;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="8 caractères minimum")
     * @Assert\EqualTo(propertyPath="confirm_password",message="Les deux mot de passe doivent etre identique")
     */
    private $userPassword;

    private $confirm_password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userCity;

    /**
     * @ORM\Column(type="integer")
     */
    private $UserPostalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userAdress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserFirstName(): ?string
    {
        return $this->userFirstName;
    }

    public function setUserFirstName(string $userFirstName): self
    {
        $this->userFirstName = $userFirstName;

        return $this;
    }

    public function getUserMail(): ?string
    {
        return $this->userMail;
    }

    public function setUserMail(string $userMail): self
    {
        $this->userMail = $userMail;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->userPassword;
    }

    public function setUserPassword(string $userPassword): self
    {
        $this->userPassword = $userPassword;

        return $this;
    }
public function getConfirmPassword(): ?string
    {
        return $this->confirm_password;
    }

    public function setConfirmPassword(string $confirm_password): self
    {
        $this->confirm_password = $confirm_password;

        return $this;
    }
    public function getUserCity(): ?string
    {
        return $this->userCity;
    }

    public function setUserCity(string $userCity): self
    {
        $this->userCity = $userCity;

        return $this;
    }

    public function getUserPostalCode(): ?int
    {
        return $this->UserPostalCode;
    }

    public function setUserPostalCode(int $UserPostalCode): self
    {
        $this->UserPostalCode = $UserPostalCode;

        return $this;
    }

    public function getUserAdress(): ?string
    {
        return $this->userAdress;
    }

    public function setUserAdress(string $userAdress): self
    {
        $this->userAdress = $userAdress;

        return $this;
    }

    public function eraseCredentials(){}

    public function getSalt(){}

    public function getRoles(){
        return ['ROLE_USER'];
    }

    public function getPassword(){
        return $this->getUserPassword();
    }

   
}