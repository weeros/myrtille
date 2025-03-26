<?php

namespace App\MessageHandler;

use App\Message\UserEmailMessage;
use App\Repository\ParkingRepository;
use App\Repository\StationRepository;
use App\Repository\TraficRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

#[AsMessageHandler]
class UserEmailMessageHandler
{
  public function __construct(
      private readonly StationRepository $stationRepository,
      private readonly ParkingRepository $parkingRepository,
      private readonly TraficRepository  $traficRepository,
      private readonly MailerInterface   $mailer
  ) {
  }

  public function __invoke(UserEmailMessage $userEmailMessage): void
  {
    $email = (new TemplatedEmail())
        ->from('opendata@example.com')
        ->to($userEmailMessage->getUser()->getEmail())
        ->subject('Opendata - Newsletter')
        ->htmlTemplate('emails/notification.html.twig')
        ->locale('fr')
        ->context([
            'user' => $userEmailMessage->getUser(),
            'stations' => $this->stationRepository->getLastElements(),
            'parkings' => $this->parkingRepository->getLastElements(),
            'trafics' => $this->traficRepository->getLastElements(),
        ]);
    $this->mailer->send($email);
  }
}