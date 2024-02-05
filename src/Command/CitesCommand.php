<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\ORM\TableRegistry;

/**
 * Cites command.
 */
class CitesCommand extends Command
{
    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);



        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return int|null|void The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $TableRegions = TableRegistry::getTableLocator()->get('Regions');
        $TableDepartements = TableRegistry::getTableLocator()->get('Departements');
        $TableVilles = TableRegistry::getTableLocator()->get('Villes');
        ini_set("memory_limit", "-1");
        $regions = [];
        $departements = [];
        $villes = [];
        $csv = ROOT . DIRECTORY_SEPARATOR . 'tmp'. DIRECTORY_SEPARATOR . 'villes.csv';
        $lines = explode("\n", file_get_contents($csv));
        foreach ($lines as $k => $line) {
            $line = explode(';', $line);
            if (count($line) > 10 && $k > 0) {
                if (!key_exists($line[3], $regions)) {
                $region = $TableRegions->newEmptyEntity();
                $data_region = [
                    'code' => $line[3],
                    'name' => $line[4]
                ];
                $TableRegions->patchEntity($region, $data_region);
                $TableRegions->save($region);
                $regions[$line[3]] = $region;
                } else {
                    $region = $regions[$line[3]];
                }

                if (!key_exists($line[5], $departements)) {
                $departement = $TableDepartements->newEmptyEntity();
                $data_departement = [
                    'code' => $line[5],
                    'name' => $line[6],
                    'region_id' => $region->id
                ];
                $TableDepartements->patchEntity($departement, $data_departement);
                $TableDepartements->save($departement);
                $departements[$line[5]] = $departement;
                } else {
                    $departement = $departements[$line[5]];
                }


                $ville = $TableVilles->newEmptyEntity();
                $data_ville = [
                    'code' => $line[7],
                    'name' => $line[8],
                    'departement_id' => $departement->id
                ];
                $TableVilles->patchEntity($ville, $data_ville);
                $TableVilles->save($ville);
                $villes[] = $line[7];


            }
        }
        $io->out(count($villes) .' villes importées');

    }
}
