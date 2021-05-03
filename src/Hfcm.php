<?php

namespace Abhij89\Hfcm;

use Abhij89\Hfcm\Models\HfcmSnippet as HfcmModel;

class Hfcm
{
    public function header()
    {
        return HfcmModel::getHeader();
    }

    public function footer()
    {
        return RandomableModel::getFoooter();
    }

    public function body()
    {
        return RandomableModel::getBody();
    }
}
