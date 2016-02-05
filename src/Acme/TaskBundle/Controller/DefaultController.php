<?php

namespace Acme\TaskBundle\Controller;

use Acme\TaskBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DefaultController extends Controller
{
    public function newAction(Request $request)
    {
        // crea una task y le asigna algunos datos ficticios para este ejemplo
        $task = new Task();
        $task->setTask('Nombre');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('save', 'submit')
            ->add('saveAndAdd', 'submit')
            ->getForm();

        if ($form->isValid()) {
            // ... hacemos algo con los datos, guardarlos en BD... lo que sea...

            $nextAction = $form->get('saveAndAdd')->isClicked()
                ? 'task_new'
                : 'task_success';

            return $this->redirect($this->generateUrl($nextAction));
        }



        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                alert ("MENSAJE");

                return $this->redirect($this->generateUrl('task_success'));
            }
        }

        return $this->render('AcmeTaskBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('registration')
        ));
    }
}