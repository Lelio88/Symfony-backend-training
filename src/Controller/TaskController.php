<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Config\Doctrine\Orm\EntityManagerConfig;

final class TaskController extends AbstractController
{

    private TaskRepository $repository;
    private EntityManagerInterface $manager;
    public function __construct(TaskRepository $taskRepository, EntityManagerInterface $manager)
    {
        $this->repository = $taskRepository;
        $this->manager = $manager;
    }

    #[Route('/task', name: 'app_task')]
    public function index(): Response
    {
        //Réccupération de l'utilisateur connecté
        $user = $this->getUser();

        //Dans le repository de Task, je réccupère toutes les données
        $tasks = $this->repository->findAll();
        //Affichage des données dans le var_dumper
        // dd($tasks);

        return $this->render('task/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }

    #[Route('/task/create', name: 'app_task_create')]
    #[Route('/task/update/{id}', name: 'app_task_update', requirements: ['id' => '\d+'])]
    public function task(?Task $task, Request $request): Response
    {
        $flag = false;
        if (!$task) {
            $task = new Task();
            $task->setCreatedAt(new \DateTimeImmutable());
            $flag = true;
        }
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->persist($task);
            $this->manager->flush();
            if ($flag) {
                $this->addFlash('success', 'Tâche créée avec succès !');
            } else {
                $this->addFlash('success', 'Tâche modifiée avec succès !');
            }
            return $this->redirectToRoute('app_task');
        }
        return $this->render('task/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/task/delete/{id}', name: 'app_task_delete', requirements: ['id' => '\d+'])]
    public function deleteTask(Task $task): Response {
        $this->manager->remove($task);
        $this->manager->flush();
        $this->addFlash('success', 'Tâche supprimée avec succès !');
        return $this->redirectToRoute('app_task');
    }
}
