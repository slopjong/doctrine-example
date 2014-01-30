<?php

namespace Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="example")
 */
class Example
{
    /**
     * Primary Identifier
     *
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned"=true})
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer
     * @access public
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $domain;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @return int / null
     */
    public function getId()
    {
        return $this->id;
    }
}
