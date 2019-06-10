<?php

namespace App\Helpers;


class FileHelpers
{
    /**
     * @var array Available css classes
     */
    static $classes = [
        "doc", "docx", "pdf", "xls", "xlsx", "ppt", "pptx", "zip", "rar"
    ];

    /**
     * Get css class associated to a given file ext
     *
     * @param $ext string The file extension
     * @return string
     */
    public static function cssClass($ext)
    {
        if (in_array($ext, static::$classes))
            return $ext;
        return 'doc';
    }

    /**
     * @param $bytes
     * @return string
     */
    public static function bytesToHuman($bytes)
    {
        $units = ['b', 'Kb', 'Mb', 'Gb', 'Tb', 'Pb'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public static function faIcon($extension)
    {
        switch ($extension){
            case 'doc':
            case 'docx':
                return 'fa-file-word-o';
                break;
            case 'xls':
            case 'xlsx':
                return 'fa-file-excel-o';
                break;
            case 'pdf':
                return 'fa-file-pdf-o';
                break;
            case 'zip':
            case 'rar':
                return 'fa-file-archive-o';
                break;
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                return 'fa-file-picture-o';
                break;
            case 'ppt':
            case 'pptx':
                return 'fa-file-powerpoint-o';
                break;
            default:
                return 'fa-file-o';
                break;
        }
    }
}