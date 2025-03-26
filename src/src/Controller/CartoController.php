<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

final class CartoController extends AbstractController
{
  #[Route('/carto', name: 'carto_index')]
  public function index(): Response
  {
    return $this->render('carto/index.html.twig');
  }
}
