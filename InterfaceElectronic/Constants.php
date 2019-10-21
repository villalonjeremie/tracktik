<?php

namespace Tracktik\InterfaceElectronic;

interface Constants {
    const QUESTION = <<<EOT
What Electronic Item you want in your cart ?
\r
EOT;

    const OPTION = <<<EOT
R.Get the list of my purchase and price
\r
EOT;

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_CONTROLLER = 'controller';


    const ELECTRONIC_ITEMS_MODEL = [
        [
            'label' => 'TV LG',
            'price' => 1000,
            'remote_price' => 20,
            'wired_price' => null,
            'maximum_extras' => -1,
            'type' => Constants::ELECTRONIC_ITEM_TELEVISION,
        ],
        [
            'label' => 'TV Samsung',
            'price' => 2000,
            'remote_price' => 20,
            'wired_price' => null,
            'maximum_extras' => -1,
            'type' => Constants::ELECTRONIC_ITEM_TELEVISION,
        ],
        [
            'label' => 'Playstation',
            'price' => 400,
            'remote_price' => 20,
            'wired_price' => 30,
            'maximum_extras' => 4,
            'type' => Constants::ELECTRONIC_ITEM_CONSOLE,
        ],
        [
            'label' => 'Microwave Phillips',
            'price' => 500,
            'remote_price' => null,
            'wired_price' => null,
            'maximum_extras' => 0,
            'type' => Constants::ELECTRONIC_ITEM_MICROWAVE,
        ]
    ];


    const TYPES = [
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE,
        self::ELECTRONIC_ITEM_TELEVISION,
        self::ELECTRONIC_ITEM_CONTROLLER
    ];

    const MAX_EXTRAS_TELEVISION = -1;
    const MAX_EXTRAS_CONSOLE = 4;
    const MAX_EXTRAS_MICROWAVE = 0;
    const MAX_EXTRAS_CONTROLLER = 0;


}