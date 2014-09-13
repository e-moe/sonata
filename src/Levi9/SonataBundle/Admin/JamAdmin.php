<?php

namespace Levi9\SonataBundle\Admin;

use Levi9\SonataBundle\Service\JamService;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class JamAdmin extends Admin
{
    /** @var  JamService */
    protected $jamService;

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('type', 'entity', array('class' => 'Levi9\SonataBundle\Entity\JamType'))
            ->add('year', 'entity', array('class' => 'Levi9\SonataBundle\Entity\JamYear'))
            ->add('comment')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('type.name')
            ->add('year.year')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('type.name')
            ->add('year.year')
            ->add('comment')
        ;
    }

    /**
     * JamService setter for DI
     *
     * @param JamService $jamService
     */
    public function setJamService(JamService $jamService)
    {
        $this->jamService = $jamService;
    }

    /**
     * @inheritdoc
     */
    public function postPersist($entity)
    {
        $this->jamService->duplicate($entity, 0);
    }
}