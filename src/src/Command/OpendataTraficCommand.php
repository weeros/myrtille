<?php

namespace App\Command;

use App\Message\TraficMessage;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'opendata:trafic',
    description: 'Commande pour importer les données de trafic via le Messenger Bus',
)]
class OpendataTraficCommand extends Command
{
    public function __construct(private HttpClientInterface $client,   protected readonly MessageBusInterface $bus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $url = 'https://opendata.bordeaux-metropole.fr/api/explore/v2.1/catalog/datasets/ci_trafi_l/exports/json?lang=fr&timezone=Europe%2FBerlin';
        $response = $this->client->request('GET', $url, [
            'verify_peer' => false,
        ]);
        $parsedResponse = $response->toArray();
        foreach ($parsedResponse as $response) {
            $this->bus->dispatch(new TraficMessage($response));
        }
        $io->success('Commande Import des Trafics Exécutée.');
        return Command::SUCCESS;
    }
}
