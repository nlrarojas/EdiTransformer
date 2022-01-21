<?php

namespace App\EdiTransformer;

use App\EdiTransformer\Exceptions\EdiTransformerNotValidOptionException;
use App\EdiTransformer\Transformers\ToEDITransformer;
use App\EdiTransformer\Transformers\ToJSONTransformer;

class Transformer
{
    const EDI_FORMAT = 'EDI_FORMAT';
    const JSON_FORMAT = 'JSON_FORMAT';

    /**
     * @throws EdiTransformerNotValidOptionException
     */
    public function transform($xmlString, $format = self::JSON_FORMAT)
    {
        $xml = simplexml_load_string($xmlString);

        switch ($format) {
            case self::EDI_FORMAT:
                return $this->convertToEDI($xml);
            case self::JSON_FORMAT:
                return $this->convertToJSON($xml);
            default:
                throw new EdiTransformerNotValidOptionException('Invalid input format type');
        }
    }

    private function convertToEDI($data): string
    {
        return ToEDITransformer::transform($data);
    }

    private function convertToJSON($data): string
    {
        return ToJSONTransformer::transform(self::convertToEDI($data));
    }
}
