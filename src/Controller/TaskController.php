<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TaskController extends AbstractController
{

    private TaskRepository $repository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    #[Route('/task', name: 'app_task')]
    public function index(): Response
    {
        //Dans le repository de Task, je réccupère toutes les données
        $tasks = $this->repository->findAll();
        //Affichage des données dans le var_dumper
        // dd($tasks);

        return $this->render('task/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }
    #[Route('/task/create', name: 'app_task_create')]
    public function createTask(Request $request) {
        $task = new Task();
        $task->setCreatedAt(new \DateTimeImmutable());
        $form = $this->createForm(TaskType::class, $task);

        return $this->render('task/create.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
