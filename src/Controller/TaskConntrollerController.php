<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaskConntrollerController extends AbstractController
{

    public function __construct(TaskRepository $taskRepository, EntityManagerInterface $em)
    {
        $this->taskRepository = $taskRepository;
        $this->em = $em;
    }

    /**
     * @Route("/tasks", name="task.all")
     */
    public function getAllTasks(): Response
    {
        return $this->json([
            'tasks' => $this->taskRepository->transformAll(),
        ]);
    }

    /**
     * @Route("/tasks/{id}", name="task.delete", methods="DELETE")
     */
    public function deleteUser(Task $task)
    {
        $this->em->remove($task);
		$this->em->flush();
        return $this->json('task delete');
    }

}
