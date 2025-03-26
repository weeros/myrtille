<?php

namespace App\Controller;

use LimitIterator;
use SplFileObject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BatchController extends AbstractController
{
    private function readfile($filename = "/tmp/batch.0.txt", $number = 10)
    {
        $file = new SplFileObject($filename, 'r');
        $file->seek(PHP_INT_MAX);
        $last_line = $file->key();
        $lines = new LimitIterator($file, $last_line - $number, $last_line);
        return iterator_to_array($lines);
    }
    #[Route('/', name: 'batch_index')]
    public function index(): Response
    {
        return $this->render('batch/index.html.twig', [
            'batch0' => $this->readfile("/tmp/batch.0.txt", 10),
            'batch1' => $this->readfile("/tmp/batch.1.txt", 10),
            'batch2' => $this->readfile("/tmp/batch.2.txt", 10),
            'batch3' => $this->readfile("/tmp/batch.3.txt", 10),
        ]);
    }
}
