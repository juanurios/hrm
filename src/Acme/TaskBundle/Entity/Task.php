<?php
namespace Acme\TaskBundle\Entity;

/**
 * Created by PhpStorm.
 * User: Fujitsu
 * Date: 01/02/2016
 * Time: 16:56
 */
class Task
{
    /**
     * @Assert\NotBlank()
     */
    protected $task;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $dueDate;

    public function getTask()
    {
        return $this->task;
    }
    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }
    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }
}