<?php

namespace AppBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Security\Core\SecurityContext;
use AppBundle\Entity\Curriculum;

class CurriculumManager {

    private $repository;
    private $context;
    private $em;

    public function __construct(Container $container)
    {
        $this->em = $container->get('doctrine')->getManager();
    }

    public function findCurriculumById($id)
    {
        return $this->repository->findBy(array("id" => $id ));
    }

    public function createCurriculum(Curriculum $curriculum)
    {
        $this->em->persist($curriculum);
        $this->em->flush();
    }

    public function deleteCurriculum(Curriculum $curriculum)
    {
        $this->em->remove($curriculum);
        $this->em->flush();

    }

}