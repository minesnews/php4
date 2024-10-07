<?php

namespace App\Oop;

class App {
    
    public static Config $config;

    public function __construct() 
    {
        self::$config = new Config();
    }

    public function run() {
        return App::$config->get()['storage']['address'];
    }
    ///////////////////////////////////////////////////
    function main(string $configFileAddress) : string {
        $config = readConfig($configFileAddress);
    
        if(!$config){
            return handleError("Невозможно подключить файл настроек");
        }
    
        $functionName = parseCommand();
    
        if(function_exists($functionName)) {
            $result = $functionName($config);
        }
        else {
            $result = handleError("Вызываемая функция не существует");
        }
    
        return $result;
    }
    
    function parseCommand() : string {
        $functionName = 'helpFunction';
        
        if(isset($_SERVER['argv'][1])) {
            $functionName = match($_SERVER['argv'][1]) {
                'read-all' => 'readAllFunction',
                'add' => 'addFunction',
                'clear' => 'clearFunction',
                'read-profiles' => 'readProfilesDirectory',
                'read-profile' => 'readProfile',
                'help' => 'helpFunction',
                'search' => 'searchBy',
                'clear-line' => 'deleteFileLine',
                default => 'helpFunction'
            };
        }
    
        return $functionName;
    }

    ///////////////////////////////////////////////////
}