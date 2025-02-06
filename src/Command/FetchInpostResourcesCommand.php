<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Serializer\SerializerInterface;
use App\DTO\InpostResourcesResponse;

#[AsCommand(
    name: 'app:fetch-inpost-resources',
    description: 'Fetches Inpost resources for given city.',
)]
class FetchInpostResourcesCommand extends Command
{
    private HttpClientInterface $httpClient;
    private SerializerInterface $serializer;

    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializer)
    {
        parent::__construct();
        $this->httpClient = $httpClient;
        $this->serializer = $serializer;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('resource', InputArgument::REQUIRED, 'Name of resources (e.g. points)')
            ->addArgument('city', InputArgument::REQUIRED, 'Name of city (e.g. Kozy)');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $resourceType = $input->getArgument('resource');
        $city = $input->getArgument('city');
        $url = "https://api-shipx-pl.easypack24.net/v1/{$resourceType}?city={$city}";

        try {
            $response = $this->httpClient->request('GET', $url);
            
            $output->writeln("HTTP Status: {$response->getStatusCode()}");

            $data = $response->getContent();
            $pointsResponse = $this->serializer->deserialize($data, InpostResourcesResponse::class, 'json');

            dump($pointsResponse);

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('<error>Error: ' . $e->getMessage() . '</error>');
            return Command::FAILURE;
        }
    }
}