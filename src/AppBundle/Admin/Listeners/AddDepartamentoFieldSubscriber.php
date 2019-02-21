<?php

namespace AppBundle\Admin\Listeners;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddDepartamentoFieldSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData'
        );
    }

    private function addDepartamentoForm($form)
    {
        $pais_id=1;


        //  $formOptions = array(
        //     'placeholder' => 'Selecciona...',
        //     'choices'  => [
        //         'Maybe' => null,
        //         'Yes' => true,
        //         'No' => false,
        //     ],
        //     'choice_attr' => function() {
        //         // adds a class like attending_yes, attending_no, etc
        //         return ['aux' => '123'];
        //     },
        // );

        // $form->add('pais', ChoiceType::class, $formOptions);

        $formOptions = array(
            'placeholder' => 'Selecciona...',
            'class' => \AppBundle\Entity\Pais::class,
            'choice_label' => 'nombre',
            'query_builder' => function (EntityRepository $repository) use ($pais_id) {
                $qb = $repository->createQueryBuilder('m');

                return $qb;
            }
        );

        $form->add('pais', EntityType::class, $formOptions);
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }
        

        //$accessor = PropertyAccess::createPropertyAccessor();

        // $departamento = $accessor->getValue($data, 'departamento');
        // $cliente_id = ($departamento) ? $departamento->getCliente()->getId() : null;

        $this->addDepartamentoForm($form);
        //$data->setDefault('hola');
    }

}