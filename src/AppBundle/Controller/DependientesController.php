<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DependientesController extends Controller
{

    /**
     * @Route("/ajax/departamentos/{pais_id}", name="ajax_departamentos")
     */
    public function DepartamentosAction($pais_id=0)
    {
        //header('Content-type: text/plain');
        $html = ""; // HTML as response
        
        $em=$this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT d FROM AppBundle\Entity\Departamento d JOIN d.paisdept p WHERE p.id = $pais_id");
        $deptos = $query->getResult();

        

        foreach($deptos as $depto){
            $html .= '<option value="'.$depto->getId().'" >'.$depto->getNombre().'</option>';
        }

        return new Response($html, 200);
        //echo $html;
        //die;
    }

}
