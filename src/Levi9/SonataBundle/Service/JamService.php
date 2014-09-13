<?php

namespace Levi9\SonataBundle\Service;

use Doctrine\ORM\EntityManager;
use Levi9\SonataBundle\Entity\Jam;

class JamService {
    /** @var EntityManager */
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Duplicate Jam entities
     *
     * @param Jam $entity
     * @param integer $count
     */
    public function duplicate(Jam $entity, $count = 0)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->em->persist(clone $entity);
        }
        $this->em->flush();
    }

} 