<?php
namespace Theodo\Evolution\LegacyModelBundle\Service;

class AutoloadService {

    public function register($path, array $option = null)
    {
        ($option['prefix'] === null) ? $prefix = '' : $prefix = $option['prefix'];
        ($option['extension'] === null) ? $extension = '.class.php' : $extension = $option['extension'];

        spl_autoload_register(function ($class) use ($path, $prefix, $extension) {
            $rdi = new \RecursiveDirectoryIterator($path);
            foreach (new \RecursiveIteratorIterator($rdi) as $file => $meta)
            {
                if(($prefix . $class . $extension) === $meta->getFileName()) {
                    if(file_exists($file)) require_once $file;
                    break;
                }
            }
        });
    }
}