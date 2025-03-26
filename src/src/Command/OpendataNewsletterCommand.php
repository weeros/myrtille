<?php

namespace App\Command;

use App\Message\UserEmailMessage;
use App\Repository\ParkingRepository;
use App\Repository\StationRepository;
use App\Repository\TraficRepository;
use App\Repository\UserRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'opendata:newsletter',
    description: 'Commande pour générer une newsletter des données opendata',
)]
class OpendataNewsletterCommand extends Command
{
    public function __construct(private readonly UserRepository $userRepository,
                                private readonly MessageBusInterface $bus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        foreach ($this->userRepository->findAll() as $user) {
            $this->bus->dispatch(new UserEmailMessage($user));
        }
        $io->success('Commande d\'envoi de Newsletter Exécutée.');
        return Command::SUCCESS;
    }
}
