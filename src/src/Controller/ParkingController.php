<?php

namespace App\Controller;

use App\Repository\ParkingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

final class ParkingController extends AbstractController
{
  #[Route('/parking/{id}', name: 'parking_show')]
  public function show(ParkingRepository $parkingRepository, int $id): Response
  {
    return $this->render('carto/parking.html.twig', [
        'parking' => $parkingRepository->find($id),
    ]);
  }

  #[Route('/api/parkings', name: 'api_parkings')]
  public function all(ParkingRepository $parkingRepository): JsonResponse
  {
    return $this->json($parkingRepository->findAll());
  }

  #[Route('/api/parking/{id}', name: 'api_parking_id')]
  public function single(ParkingRepository $parkingRepository, int $id): JsonResponse
  {
    return $this->json($parkingRepository->find($id));
  }

}
