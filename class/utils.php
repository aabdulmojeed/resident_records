<?php

class CRMSUtils
{
    public static function sanitizeData($rawData)
    {
        $rawDataType = gettype($rawData);

        switch($rawDataType){
            case "array":
                $cleanedData = array();
                foreach($rawData as $dataItem) {
                    $cleanItem = null;
                    $cleanItem = htmlspecialchars(strip_tags($dataItem));
                    array_push($cleanedData, $cleanItem);
                }
                break;

            case "string":
                $cleanedData = htmlspecialchars(strip_tags($rawData));
                break;

            default:
                return $rawData;
        }

        return $cleanedData;
    }
}