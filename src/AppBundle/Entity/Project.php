<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="target_amount", type="decimal", precision=15, scale=2)
     */
    private $targetAmount;

    /**
     * @var  string
     *
     * @ORM\Column(name="web", type="string")
     */
    private $web;
    
    /**
     * @var  date
     *
     * @ORM\Column(name="expired_on", type="date")
     */
    private $expired_on;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set targetAmount
     *
     * @param string $targetAmount
     *
     * @return Project
     */
    public function setTargetAmount($targetAmount)
    {
        $this->targetAmount = $targetAmount;

        return $this;
    }

    /**
     * Get targetAmount
     *
     * @return string
     */
    public function getTargetAmount()
    {
        return $this->targetAmount;
    }

    /**
     * Set web
     *
     * @param string $web
     *
     * @return Project
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set expiredOn
     *
     * @param \DateTime $expiredOn
     *
     * @return Project
     */
    public function setExpiredOn($expiredOn)
    {
        $this->expired_on = $expiredOn;

        return $this;
    }

    /**
     * Get expiredOn
     *
     * @return \DateTime
     */
    public function getExpiredOn()
    {
        return $this->expired_on;
    }
    
    public function isFree() {
        return $this->targetAmount == 0;
    }
}
