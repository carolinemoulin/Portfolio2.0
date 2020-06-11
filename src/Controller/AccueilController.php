<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Projects;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use App\Repository\JobsRepository;
use App\Repository\ProjectsRepository;
use App\Repository\SkillsRepository;
use App\Repository\TrainingsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index()
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(ProjectsRepository $projectsRepository)
    {
        $projects = $projectsRepository->findAll();

        return $this->render('accueil/home.html.twig', [
            'projects' => $projects,
        ]);
    }

    /**
     * @Route("/project/{id}", name="project_view")
     */
    public function show(Projects $projects)
    {
        return $this->render('accueil/view/project.html.twig', [
            'id' => $projects->getId(),
            'project' => $projects,
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(JobsRepository $repoJobs, TrainingsRepository $trainingsRepository, SkillsRepository $skillsRepository)
    {
        $jobs = $repoJobs->findAll();
        $trainings = $trainingsRepository->findAll();
        $skills = $skillsRepository->findAll();

        return $this->render('accueil/view/about.html.twig', [
            'jobs' => $jobs,
            'trainings' => $trainings,
            'skills' => $skills,
        ]);
    }

    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function portfolio(ProjectsRepository $projectsRepository)
    {
        $projects = $projectsRepository->findAll();

        return $this->render('accueil/view/portfolio.html.twig', [
            'projects' => $projects,
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, ContactNotification $notificationUser, ContactNotification $notification)
    {
        $contact = new Contact();
        $object = new Contact();
        $message = new Contact();
        $email = new Contact();
        $form = $this->createForm(ContactType::class, $contact)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($request->isMethod('POST')) {
                $notificationUser->notify($contact);
                $notification->contactForm($contact, $object, $message, $email);
                $this->addFlash('success', 'Votre email a bien été envoyé');

                return $this->redirectToRoute('contact');
            }
        }

        return $this->render('accueil/view/contact.html.twig', [
                'form' => $form->createView(),
            ]);
    }
}
