<?php

namespace Levi9\SonataBundle\Admin;

use Levi9\SonataBundle\Service\JamService;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class JamAdmin extends Admin
{
    /** @var string route */
    protected $baseRoutePattern = 'jam';

    /** @var JamService */
    protected $jamService;

    const FIELD_AMOUNT = 'amount';

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('type', 'entity', array('class' => 'Levi9\SonataBundle\Entity\JamType'))
            ->add('year', 'entity', array('class' => 'Levi9\SonataBundle\Entity\JamYear'))
            ->add('comment')
        ;

        $subject = $this->getSubject();

        if (!$subject->getId()) {
            // The thumbnail field will only be added when the edited item is created
            $formMapper->add(static::FIELD_AMOUNT, 'integer', array(
                'mapped' => false,
                'data' => 1,
                'attr' => array('min' => 1),
            ));
        }
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('type.name')
            ->add('year.year')
            ->add('comment')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('type.name')
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
        $form = $this->getForm();
        if ($form->offsetExists(static::FIELD_AMOUNT)) {
            $amount = intval($form->get(static::FIELD_AMOUNT)->getData());
            $this->jamService->duplicate($entity, $amount - 1);
        }

    }
}
