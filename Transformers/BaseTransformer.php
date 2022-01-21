<?php

namespace App\EdiTransformer\Transformers;

abstract class BaseTransformer
{
    public static abstract function transform($data);

    public static function dynamicTags(): array
    {
        return [
            'Interchange' => [
                '@attributes' => [
                    'type' => 'type',
                    'auth-qual' => 'auth-qual',
                    'security-qual' => 'security-qual',
                    'sender-qual' => 'sender-qual',
                    'sender-id' => 'sender-id',
                    'receiver-qual' => 'receiver-qual',
                    'receiver-id' => 'receiver-id',
                    'date' => 'date',
                    'time' => 'time',
                    'standard' => 'standard',
                    'version' => 'version',
                    'control' => 'control',
                    'ack' => 'ack',
                    'test' => 'test',
                ],
                'FunctionalGroup' => [
                    '@attributes' => [
                        'type' => 'type',
                        'group' => 'group',
                        'sender' => 'sender',
                        'receiver' => 'receiver',
                        'date' => 'date',
                        'time' => 'time',
                        'control' => 'control',
                        'standard' => 'standard',
                        'version' => 'version',
                    ],
                    'Document' => [
                        'RepeatingSegment' => [
                            'array' => [
                                'Segment' => [
                                    'Element' => 'Element'
                                ]
                            ]
                        ],
                        'Loop' => [
                            'array' => [
                                'RepeatingSegment' => [
                                    'array' => [
                                        'Segment' => [
                                            'Element' => 'Element'
                                        ]
                                    ],
                                    'Segment' => [
                                        'Element' => 'Element'
                                    ],
                                ],
                                'Loop' => [
                                    'array' => [
                                        'RepeatingSegment' => [
                                            'array' => [
                                                'Segment' => [
                                                    'Element' => 'Element'
                                                ]
                                            ],
                                            'Segment' => [
                                                'Element' => 'Element'
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
