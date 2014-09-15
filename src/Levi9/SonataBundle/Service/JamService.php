<?php

namespace Levi9\SonataBundle\Service;

use Doctrine\ORM\EntityManager;
use Levi9\SonataBundle\Entity\Jam;
use Levi9\SonataBundle\Service\CloneService;

class JamService
{
    /** @var EntityManager */
    protected $em;

    /** @var CloneService */
    protected $cloneService;

    public function __construct(EntityManager $entityManager, CloneService $cloneService)
    {
        $this->em = $entityManager;
        $this->cloneService = $cloneService;
    }

    /**
     * Duplicate Jam entities
     *
     * For details see
     * {@link http://stackoverflow.com/questions/9071094/how-to-re-save-the-entity-as-another-row-in-doctrine-2}
     *
     * @param Jam $entity
     * @param integer $count
     */
    public function duplicate(Jam $entity, $count = 0)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->em->persist($this->cloneService->cloneObject($entity));
        }
        $this->em->flush();
    }
}
