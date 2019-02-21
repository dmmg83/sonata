<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Admin\Listeners\AddDepartamentoFieldSubscriber;

class MunicipioAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper

            ->add('nombre')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper

            ->add('nombre')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $builder = $formMapper->getFormBuilder();
        $formOptions = array(
            'placeholder' => 'Selecciona...',
            'choices'  => [
                'Maybe' => null,
                'Yes' => true,
                'No' => false,
            ],
            'choice_attr' => function() {
                // adds a class like attending_yes, attending_no, etc
                return ['aux' => '123'];
            },
        );

        
        
        $builder
            ->addEventSubscriber(new AddDepartamentoFieldSubscriber())
            ->add('deptmuni')
            ->add('nombre')
            //->add('pais', ChoiceType::class, $formOptions)
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper

            ->add('nombre')
        ;
    }

}
