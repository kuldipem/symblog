<?php

namespace Blogger\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\TaskBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends Controller {

    public function newAction(Request $request) {
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $user=  $this->getUser();
        
        $form = $this->createFormBuilder($task)
                ->add('user_id','hidden',array("data"=>$user->getId()))
                ->add('task', 'text')
                ->add('dueDate', 'date')
                ->add('save', 'submit')
                ->add('saveAndAdd','submit')
                ->getForm();
        
        $form->handleRequest($request);
        
        if($form->isValid()){
            
            $em=  $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            
            
            $nextAction=$form->get('saveAndAdd')->isClicked()?'BloggerTaskBundle_task':'BloggerTaskBundle_task_success';
            
            $this->redirect($this->generateUrl($nextAction));
        }
        
        return $this->render('BloggerTaskBundle:Task:new.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
