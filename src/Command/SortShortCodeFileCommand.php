<?php

namespace App\Command;

use App\Service\Application\ShortCodeSortingApplicationService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


/**
 * SortShortCodeFileCommand class
 * @package App\Service\Application\ShortCodeSortingApplicationService
 * @author Ateeb <muhammad_ateeb_hussain@hotmail.com>
 */
class SortShortCodeFileCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:generate-sorted-short-code-file';
    protected static $defaultDescription = 'It will generate a sorted file in the directory config';

    public function __construct(ShortCodeSortingApplicationService $service)
    {
        // best practices recommend to call the parent constructor first and
        // then set your own properties. That wouldn't work in this case
        // because configure() needs the properties set in this constructor

        $this->service = $service;

        parent::__construct();
    }

    /**
     * configure function
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setHelp('This command will sort .properties file in aseending order with comments using merge sort alogrthm');
    }


    /**
     * execute function
     * Note:- it will generate a sorted file in the directory config with prefix sort
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->service->execute();
        return Command::SUCCESS;
    }
}
