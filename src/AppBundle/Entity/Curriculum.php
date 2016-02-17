<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Curriculum
 *
 * @ORM\Table(name="curriculum")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CurriculumRepository")
 */
class Curriculum
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
     * @ORM\Column(name="education", type="string", length=255)
     */
    private $education;

    /**
     * @var string
     *
     * @ORM\Column(name="jobExperience", type="string", length=255)
     */
    private $jobExperience;


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
     * Set education
     *
     * @param string $education
     *
     * @return Curriculum
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return string
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set jobExperience
     *
     * @param string $jobExperience
     *
     * @return Curriculum
     */
    public function setJobExperience($jobExperience)
    {
        $this->jobExperience = $jobExperience;

        return $this;
    }

    /**
     * Get jobExperience
     *
     * @return string
     */
    public function getJobExperience()
    {
        return $this->jobExperience;
    }
}

