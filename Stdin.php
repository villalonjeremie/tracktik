<?php
namespace Tracktik;

include_once("InterfaceElectronic/Constants.php");

use Tracktik\InterfaceElectronic\Constants;

class Stdin {

    private static $question;

    public static function stdinType($type) : array
    {
        $countType = null;
        $countRemote = null;
        $countWired = null;

        echo <<< EOT
How many $type do you want ? 
\r
EOT;

        $countType = fgets(STDIN);

        if ($type == Constants::ELECTRONIC_ITEM_TELEVISION || $type == Constants::ELECTRONIC_ITEM_CONSOLE) {
            echo <<<EOT
How many Remote Controller for $type ? 
\r
EOT;
            $countRemote = fgets(STDIN);
        }

        if ($type == Constants::ELECTRONIC_ITEM_CONSOLE) {
            echo <<<EOT
How many Wired Controller for $type ? 
\r
EOT;
            $countWired = fgets(STDIN);
        }

        return [
            'count' => (int)trim($countType),
            'countRemote'=> (int)trim($countRemote),
            'countWired' => (int)trim($countWired)
        ];
    }

    public static function buildMainQuestion() : string {
        if (!is_null(self::$question))
            return self::$question;

        $string = Constants::QUESTION;

        foreach (Constants:: ELECTRONIC_ITEMS_MODEL as $k=>$v) {
            $name = $v['label'];
            $string .=  <<<EOT
$k.$name
\r
EOT;
        }

        return $string.Constants::OPTION;

    }
}


