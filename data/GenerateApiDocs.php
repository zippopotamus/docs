<?php

namespace App\Data;

use cebe\openapi\Reader;
use Illuminate\View\Factory;

class GenerateApiDocs
{
    protected $view;

    public function __construct(Factory $view)
    {
        $this->view = $view;
    }

    public function generate($version) {
        $spec = Reader::readFromYamlFile($version['spec']);

        return $this->view->file("source/_api/spec.blade.php", ['paths' => $spec->paths])->render();
    }

}