<?php

namespace Command;

use Faker\Factory;
use Faker\Generator;
use Helper\ListHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FakerCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('fake')
            ->setDescription('Simple CLI implementation of Faker library')
            ->addArgument('property', InputArgument::OPTIONAL, 'The Faker formatter property')
            ->addArgument('arguments', InputArgument::IS_ARRAY | InputArgument::OPTIONAL, 'Arguments of the faker property. Separated by spaces')
            ->addOption('seed', null, InputOption::VALUE_OPTIONAL, 'Seed. If provided, the result will be the same over time.', null)
            ->addOption('n', null, InputOption::VALUE_OPTIONAL, 'Number of result', 1)
            ->addOption('local', null, InputOption::VALUE_OPTIONAL, 'Local of the faker Factory', Factory::DEFAULT_LOCALE)
            ->addOption('list', null, InputOption::VALUE_OPTIONAL, 'Print all Faker\'s formatters.', false)
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $showList = $input->getOption('list');
        if (false !== $showList) {
            if (null === $showList) {
                $this->printFormatters($output);

                return;
            }

            $output->writeln(sprintf('Listing %s generators :', $showList));
            $table = ListHelper::listGenerators($showList, $output);
            $table->render();

            return;
        }

        $faker = Factory::create($input->getOption('local'));
        $property = $input->getArgument('property');
        $arguments = $input->getArgument('arguments');

        if (null !== $seed = $input->getOption('seed')) {
            $faker->seed($seed);
        }

        $n = $input->getOption('n');
        if ($n <= 1) {
            $output->writeln($this->callFakerFunction($faker, $property, $arguments));

            return;
        }

        $table = new Table($output);
        $table->setHeaders(['#', 'data']);
        for ($i = 0; $i < $n; $i++) {
            $table->addRow([$i + 1, $this->callFakerFunction($faker, $property, $arguments)]);
        }

        $table->render();
    }

    /**
     * @param Generator $faker
     * @param $property
     * @param array $arguments
     *
     * @return mixed
     */
    private function callFakerFunction(Generator $faker, $property, array $arguments = array())
    {
        return call_user_func_array(array($faker, $property), $arguments);
    }

    /**
     * Print Faker's formatters.
     */
    private function printFormatters(OutputInterface $output)
    {
        $table = new Table($output);
        $table->setRows(ListHelper::$formatters);
        $table->render();
    }
}
