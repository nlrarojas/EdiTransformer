# EdiTransformer
Formatted xml to EDI 204 and 204 JSON

There is a transformer class with a transform method with is expecting the input (xml) and 
the type of output to produce that can be ``Transformer::EDI_FORMAT`` or ``Transformer::JSON_FORMAT``

Expected input to produce response:

``'Interchange' => [
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
]``