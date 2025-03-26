<?php

namespace App\Controller;

use App\Repository\StationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class StationController extends AbstractController
{
  #[Route('/station/{id}', name: 'station_show')]
  public function show(StationRepository $stationRepository, int $id): Response
  {
    return $this->render('carto/station.html.twig', [
        'station' => $stationRepository->find($id),
    ]);
  }

  #[Route('/api/stations', name: 'api_stations')]
  public function all(StationRepository $stationRepository): JsonResponse
  {
    return $this->json($stationRepository->findAll(), 200, [], ['groups' => ['public-view']]);
  }

  #[Route('/api/station/{id}', name: 'api_station_id')]
  public function single(StationRepository $stationRepository, int $id): JsonResponse
  {
    return $this->json($stationRepository->find($id));
  }

}
