<?php

namespace App\MessageHandler;

use App\Entity\Trafic;
use App\Message\TraficMessage;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Serializer\SerializerInterface;

#[AsMessageHandler]
class TraficMessageHandler
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private HubInterface  $hub,
        private LoggerInterface $logger,
        private SerializerInterface $serializer
    )
    {
    }

    public function __invoke(TraficMessage $traficMessage): void
    {
        $response = $traficMessage->getResponse();
        $trafic = $this->entityManager->getRepository(Trafic::class)->findOneBy(['gid' => $response['gid']]);
        if (!$trafic) {
            $trafic = new Trafic();
        }
        else if ($trafic->getEtat() == $response['etat']) {
            return;
        }
        $trafic->setGid($response['gid']);
        $trafic->setGeoShape($response['geo_shape']);
        $trafic->setEtat($response['etat']);
        $trafic->setTypevoie($response['typevoie']);
        $trafic->setCdate(new \DateTimeImmutable($response['cdate']));
        $trafic->setMdate(new \DateTimeImmutable($response['mdate']));
        $this->entityManager->persist($trafic);
        $this->entityManager->flush();


        $jsonContent = $this->serializer->serialize($trafic, 'json');
        $update = new Update(
            'http://localhost:8000/trafics' , $jsonContent
        );

        try {
            $this->hub->publish($update);
        } catch (\Throwable $e) {
            $this->logger->error(
                'Failed to publish update. trafic: {trafic} - message: {message}',
                [
                    'trafic' => $trafic->getId(),
                    'message' => $e->getMessage(),
                ]
            );
        }

    }
}