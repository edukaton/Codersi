<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="extDesc", type="string", length=255)
     */
    private $extDesc;

    /**
     *
     * @ORM\ManyToOne(targetEntity="DictType", inversedBy="question")
     * @ORM\JoinColumn(name="dict_type_id", referencedColumnName="id")
     */
    private $type;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Review", inversedBy="question")
     * @ORM\JoinColumn(name="review_id", referencedColumnName="id")
     */
    private $review;

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
     * Set title
     *
     * @param string $title
     *
     * @return Question
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Question
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
     * Set extDesc
     *
     * @param string $extDesc
     *
     * @return Question
     */
    public function setExtDesc($extDesc)
    {
        $this->extDesc = $extDesc;

        return $this;
    }

    /**
     * Get extDesc
     *
     * @return string
     */
    public function getExtDesc()
    {
        return $this->extDesc;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\DictType $type
     *
     * @return Question
     */
    public function setType(\AppBundle\Entity\DictType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\DictType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set review
     *
     * @param \AppBundle\Entity\Review $review
     *
     * @return Question
     */
    public function setReview(\AppBundle\Entity\Review $review = null)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return \AppBundle\Entity\Review
     */
    public function getReview()
    {
        return $this->review;
    }
}
