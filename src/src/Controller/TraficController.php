<?php

namespace App\Controller;

use App\Repository\TraficRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class TraficController extends AbstractController
{

  #[Route('/api/trafics', name: 'api_trafics')]
  public function all(TraficRepository $traficRepository): JsonResponse
  {
    return $this->json($traficRepository->findAll());
  }

  #[Route('/api/trafic/{id}', name: 'api_trafic_id')]
  public function single(TraficRepository $traficRepository, int $id): JsonResponse
  {
    return $this->json($traficRepository->find($id));
  }

}
