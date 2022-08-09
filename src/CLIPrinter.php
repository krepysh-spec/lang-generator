<?php

namespace KrepyshSpec\LangGenerator;

class CLIPrinter
{
    public const FOREGROUND_BLACK = '';
    public const FOREGROUND_DARK_GREY = ';1;30';
    public const FOREGROUND_RED = ';0;30';
    public const FOREGROUND_LIGHT_RED = ';1;31';
    public const FOREGROUND_GREEN = ';0;32';
    public const FOREGROUND_LIGHT_GREEN = ';1;32';
    public const FOREGROUND_BROWN = ';0;33';
    public const FOREGROUND_YELLOW = ';1;33';
    public const FOREGROUND_BLUE = ';0;34';
    public const FOREGROUND_LIGHT_BLUE = ';1;34';
    public const FOREGROUND_MAGENTA = ';0;35';
    public const FOREGROUND_LIGHT_MAGENTA = ';1;35';
    public const FOREGROUND_CYAN = ';0;36';
    public const FOREGROUND_GRAY = ';1;36';
    public const FOREGROUND_LIGHT_GREY = ';0;37';
    public const FOREGROUND_WHITE = '';
    //
    public const BACKGROUND_BLACK = '';
    public const BACKGROUND_RED = '41';
    public const BACKGROUND_GREEN = '42';
    public const BACKGROUND_YELLOW = '43';
    public const BACKGROUND_BLUE = '44';
    public const BACKGROUND_MAGENTA = '45';
    public const BACKGROUND_CYAN = '46';
    public const BACKGROUND_LIGHT_GREY = '47';

    public static function print($message, $foreground = self::FOREGROUND_WHITE, $background = self::BACKGROUND_BLACK)
    {
        echo "\e[{$background}{$foreground}m {$message} \e[0m\n";
    }

    public static function clear()
    {
        echo chr(27) . chr(91) . 'H' . chr(27) . chr(91) . 'J';
    }
}
