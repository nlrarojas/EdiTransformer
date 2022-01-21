<?php

namespace App\EdiTransformer\Transformers;

class ToEDITransformer extends BaseTransformer
{
    public static function transform($data): string
    {
        $dynamicTags = self::dynamicTags();

        $data = json_decode(json_encode($data), true);
        return self::buildTree($dynamicTags, $data);
    }

    public static function buildTree($elements, $tree): string
    {
        return str_replace('*~', '~', self::buildTreeAux($elements, $tree));
    }

    private static function buildTreeAux($elements, $tree): string
    {
        $output = '';
        if (is_array($tree) && is_array($elements)) {
            foreach ($elements as $key => $element) {
                if (isset($tree[$key]))
                {
                    if ($key === 'Element') {
                        foreach ($tree as $item) {
                            if (is_array($item)) {
                                foreach ($item as $value) {
                                    $output .= $value . '*';
                                }
                            } else {
                                $output .= $tree[$key] . '*';
                            }
                        }
                    }
                    if (!is_array($tree[$key])) {
                        $output .= $tree[$key] . '*';
                    } else {
                        $output .= self::buildTree($element, $tree[$key]);
                    }
                } elseif ($key === 'array') {
                    foreach ($tree as $item) {
                        $output .= self::buildTree($element, $item);
                    }
                }
            }
        }
        $output .= str_ends_with($output, '>') || empty($output) ? '' : '~<br/>';

        return $output;
    }
}
