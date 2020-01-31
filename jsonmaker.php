<?php

$skilltemplate = ['naam' => [
    'cooldown' => 1, //in seconden
    'statMultiplier' => 1.5,
    'description' => "Blabla",
    'levelUnlocked' => 4,
    'maxLevel' => 5,
    'pointsNeededForLevelUp' => 10,
    'castingTime' => 3,// in seconden
    'damageOverTime' => [1 /*damage*/,2 /*time in seconden*/],
    'attackRange' => 2 // In vage godot waarde
]];

$array = ['knight' => [
    'damageMultiplier' => 1,
    'staminaMultiplier' => 1,
    'speedMultiplier' => 1,
    'magicMultiplier' => 1,
    'skills' => [
        'Twister' => [ // Bedacht door Jari
            /**
             * Player draait rond en slaat twee keer, na level 2 drie keer.
             * 
             * Tijd in seconden
             */
            'cooldown' => 10,
            'statMultiplier' => 1,
            'description' => "Perform a spinning attack that hits your enemy 2 times, 3 times when leveled up.",
            'levelUnlocked' => 5,
            'maxLevel' => 2,
            'pointsNeededForLevelUp' => 1,
            'castingTime' => 0,
            'immobilityTime' => 1, 
            'damageOverTime' => [0 /*damage*/,0 /*time*/],
            'attackRange' => 0,  // In vage godot waarde
            'shieldBreakChance' => 0
        ],
        'Power hit' => [ //Bedacht door Jari
            /**
             * Player slaat 1 keer iets sterker
             */
            'cooldown' => 1, 
            'statMultiplier' => 1.5,
            'description' => "Blabla",
            'levelUnlocked' => 4,
            'maxLevel' => 5,
            'pointsNeededForLevelUp' => 10,
            'castingTime' => 3,
            'damageOverTime' => [1, 2 ],
            'attackRange' => 2, 
            'shieldBreakChance' => 0.05
        ]

    ],
]];

echo json_encode($array);
?>