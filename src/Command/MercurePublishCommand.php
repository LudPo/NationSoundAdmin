<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

#[AsCommand(
    name: 'app:mercure-publish',
    description: 'Add a short description for your command',
)]
class MercurePublishCommand extends Command
{
    private HubInterface $hub;

    public function __construct(HubInterface $hub)
    {
        // Best practice is to call the parent constructor first in Symfony commands
        parent::__construct();

        $this->hub = $hub;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('topic', InputArgument::REQUIRED, 'The topic URL to publish the updates to.')
            ->addArgument('data', InputArgument::REQUIRED, 'The data to publish as JSON string.')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $topic = $input->getArgument('topic');
        $data = $input->getArgument('data');

        $update = new Update(
            $topic,
            $data
        );

        $this->hub->publish($update);

        $io->success('Message published to Mercure Hub on topic: ' . $topic);

        return Command::SUCCESS;
    }}
