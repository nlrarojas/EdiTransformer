<?php

namespace App\EdiTransformer\Transformers;

class ToJSONTransformer extends BaseTransformer
{
    public static function transform($data)
    {
        $data = explode('~', $data);
        $output = [];

        foreach ($data as $datum)
        {
            $datum = str_replace('<br/>', '', $datum);
            if (!empty($datum))
            {
                $datum = explode('*', $datum);
                $row = [];
                $row['type'] = $datum[0];
                for ($i = 1; $i < count($datum); $i = $i + 1)
                {
                    $row['attributes'][] = $datum[$i];
                }
                $output[] = $row;
            }
        };
        return json_encode($output);
    }
}
