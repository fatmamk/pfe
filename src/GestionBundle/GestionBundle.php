<?php

namespace GestionBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GestionBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
