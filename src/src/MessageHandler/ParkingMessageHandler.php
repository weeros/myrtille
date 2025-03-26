<?php

namespace App\MessageHandler;

use App\Entity\Parking;
use App\Message\ParkingMessage;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Serializer\SerializerInterface;

#[AsMessageHandler]
class ParkingMessageHandler
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private HubInterface  $hub,
        private LoggerInterface $logger,
        private SerializerInterface $serializer,
    )
    {
    }

    public function __invoke(ParkingMessage $parkingMessage): void
    {
        $response = $parkingMessage->getResponse();
        $parking = $this->entityManager->getRepository(Parking::class)->findOneBy(['gid' => $response['gid']]);
        if (!$parking) {
            $parking = new Parking();
        }
        else if ($parking->getPlacesVoitures() == $response['libres']) {
            return;
        }
        $parking->setGid($response['gid']);
        $parking->setNom($response['nom']);
        $parking->setAdresse($response['adresse'] ?? "");
        $parking->setInsee($response['insee']);
        $parking->setLatitude($response['geo_point_2d']['lat']);
        $parking->setLongitude($response['geo_point_2d']['lon']);
        $parking->setPlacesTotal($response['total'] ?? 0);
        $parking->setPlacesVelos($response['np_veltot'] ?? 0);
        $parking->setPlacesVoitures($response['libres'] ?? 0);
        $parking->setEtat($response['etat']);
        $parking->setTarifType($response['ta_type'] ?? '');
        $parking->setInformations($response['infor'] ?? '');
        $parking->setCdate(new \DateTimeImmutable($response['cdate']));
        $parking->setMdate(new \DateTimeImmutable($response['mdate']));
        $this->entityManager->persist($parking);
        $this->entityManager->flush();

        $jsonContent = $this->serializer->serialize($parking, 'json');
        $update = new Update(
            'http://localhost:8000/parkings' , $jsonContent
        );

        try {
            $this->hub->publish($update);
        } catch (\Throwable $e) {
            $this->logger->error(
                'Failed to publish update. parking: {parking} - message: {message}',
                [
                    'parking' => $parking->getId(),
                    'message' => $e->getMessage(),
                ]
            );
        }

    }
}