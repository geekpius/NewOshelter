<?php
    
    class Notify_AutoLoader{
        public function __construct() {
            if (function_exists('__autoload')) {
                //    Register any existing autoloader function with SPL, so we don't get any clashes
                spl_autoload_register('__autoload');
            }
            spl_autoload_register(array($this, 'Loader'));
        }
        
        public function Loader($className){
            $file = __DIR__.'/../../'.str_replace('\\', '/', $className).'.php';
            
            if (file_exists($file))
                include_once ($file);
        }
    }
    
    $loader = new Notify_AutoLoader();