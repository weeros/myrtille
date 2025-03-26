<?php

namespace App\MessageHandler;

use App\Entity\Station;
use App\Message\StationMessage;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Serializer\SerializerInterface;

#[AsMessageHandler]
class StationMessageHandler
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private HubInterface           $hub,
        private LoggerInterface        $logger,
        private SerializerInterface    $serializer
    )
    {
    }

    public function __invoke(StationMessage $stationMessage): void
    {
        $response = $stationMessage->getResponse();
        $station = $this->entityManager->getRepository(Station::class)->findOneBy(['gid' => $response['gid']]);
        if (!$station) {
            $station = new Station();
        } else if ($station->getNbplaces() == $response['nbplaces']
            && $station->getNbvelos() == $response['nbvelos']
            && $station->getNbclassiq() == $response['nbclassiq']
        ) {
            return;

        }
        $station->setGid($response['gid']);
        $station->setNom($response['nom']);
        $station->setEtat($response['etat']);
        $station->setCommune($response['commune']);
        $station->setLatitude($response['geo_point_2d']['lat']);
        $station->setLongitude($response['geo_point_2d']['lon']);
        $station->setNbplaces($response['nbplaces']);
        $station->setNbvelos($response['nbvelos']);
        $station->setNbclassiq($response['nbclassiq']);
        $station->setNbelec($response['nbelec']);
        $station->setCdate(new \DateTimeImmutable($response['cdate']));
        $station->setMdate(new \DateTimeImmutable($response['mdate']));
        $this->entityManager->persist($station);
        $this->entityManager->flush();


        $jsonContent = $this->serializer->serialize($station, 'json', ['groups' => ['public-view']]);
        $update = new Update(
            'http://localhost:8000/stations', $jsonContent
        );

        try {
            $this->hub->publish($update);
        } catch (\Throwable $e) {
            $this->logger->error(
                'Failed to publish update. station: {station} - message: {message}',
                [
                    'station' => $station->getId(),
                    'message' => $e->getMessage(),
                ]
            );
        }

    }
}