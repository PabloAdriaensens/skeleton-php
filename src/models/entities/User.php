<?php

namespace App\models\entities;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="users)
 */

class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GenerateValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(
     *  message="Debes rellenar el nombre"
     * )
     * @Assert\Length(
     *  message="Mínimo dos carácteres"
     * )
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(
     *  message="Debes introducir un email"
     * )
     * @Assert\Email(
     *  message="Debes introducir un email válido"
     * )
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(
     *  message="Debes introducir una contraseña"
     * )
     * @Assert\Email(
     *  message="Debes introducir un mínimo de 6 carácteres"
     * )
     */
    protected $password;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;

    public function __construct()
    {
        $this->created_at = new \DateTime('now');
    }
}
