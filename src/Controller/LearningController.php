<?php

namespace App\Controller;

use App\Entity\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

#[Route('/learning')]
class LearningController extends AbstractController
{
    #[Route('/', name: 'index',)]
    public function index(Request $request): Response
    {
//        So today we learned we do NOT do this.
//        var_dump($request);
        //the next lines of code would redirect directly from the index to the change and show name functions.
        //they remain here, commented and forgotten, for those lone pilgrims seeking advice on their usage
        //+++praise the omnissiah+++
//        $check = false;
//        if ($check)
//        {
//            return $this->redirectToRoute('show_my_name');
//        }
//        return $this->redirectToRoute('change_my_name');

        $redirect = true;
        if ($redirect) return $this->redirectToRoute('show_my_name', ['request' => $request]);

        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    #[Route('/about-BeCode', name: 'about_me')]
    public function aboutMe(): Response
    {
        $session = new Session();
        $name = $session->get('name');
        if(empty($name)){
            return $this->forward('show_my_name');

        }

        $content = 'Ome Lorem Ipsum.';
        return $this->render(
            'learning/about-me.html.twig',
            [
                'controller_name' => 'LearningController',
                'content' => $content,
                'name' => $name,
            ]);
    }

    #[Route('/showmyname', name: 'show_my_name',)]
    public function showMyName(Request $request): Response
    {
        $session = new Session();
        $name = 'unknown';


        //name is initialized as unknown. if there is a name stored in the session, however, overwrite it with the stored name.
        if (!empty($session->get('name')))
        {
            $name = $session->get('name');
        }

        if ($request->request->get('newName') !== null)
        {
            return $this->redirectToRoute('change_my_name', ['request' => $request], 307);
        }
        return $this->render(
            'learning/show-my-name.html.twig',
            [
                'controller_name' => 'LearningController/ChangeMyName',
                'name' => $name,
            ]);
    }

    #[Route('/changemyname', name: 'change_my_name', methods: ['POST',])]
    public function changeMyName(Request $request): Response
    {
        //start new session to store data in
        $session = new Session();
        $name = $request->request->get('newName');
        //store name from POST in session
        $session->set('name', $name);


        return $this->redirectToRoute('show_my_name', ['request' => $request]);
        //render page
        //we will not be using this one
        return $this->render('learning/change-my-name.html.twig',
            [
                'name' => $name,
            ]);
    }

}
