<?php
/**
 * Task controller.
 */

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Class TaskController.
 */
#[Route('/task')]
class TaskController extends AbstractController
{
    /**
     * Index action.
     *
     * @param TaskRepository $taskRepository Task repository
     *
     * @return Response HTTP response
     */
    #[Route(
        name: 'task_index',
        methods: 'GET'
    )]
    public function index(TaskRepository $taskRepository): Response
    {
        $tasks = $taskRepository->findAll();

        return $this->render(
            'task/index.html.twig',
            ['tasks' => $tasks]
        );
    }

    /**
     * Show action.
     *
     * @param Task $task Task entity
     *
     * @return Response HTTP response
     */
    #[Route(
        '/{id}',
        name: 'task_show',
        requirements: ['id' => '[1-9]\d*'],
        methods: 'GET',
    )]
    public function show(Task $task): Response
    {
        return $this->render(
            'task/show.html.twig',
            ['task' => $task]
        );
    }
}
