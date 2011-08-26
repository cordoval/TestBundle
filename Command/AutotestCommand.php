<?php

namespace Cordova\Bundle\TestBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand as Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;

/*
 * This file is part of the TestBundle.
 * (c) Luis Cordova <cordoval@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * TestBundle's Autotest console command.
 *
 * @author      Luis Cordova <cordoval@gmail.com>
 */
class AutotestCommand extends Command
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('test:auto')
            ->setDescription('It will run PHPAutotest on given input')
            ->setDefinition(array(
                new InputArgument('filename', InputArgument::REQUIRED, 'The file input given')
            ))
            ->setHelp(<<<EOT
The <info>test:auto <filename></info> will run PHPAutotest on <filename>

  According to framework:
  <info>php app/console test:auto *Test.php</info>
  <info>php app/console test:auto *Spec.php</info>
  <info>php app/console test:auto *.feature</info>
EOT
            );
    }

    /**
     * @see Command
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('filename');

        if (null == $filename) {
            throw new \InvalidOptionsException('You need to specify a filename.');
        }

        $stringCommand = 'vendor/PHPAutotest/autotest.phar '.$filename;

        exec($stringCommand, $text);
        $output_text = trim(implode("\n", $text));
        $output->writeln($output_text);
    }

}