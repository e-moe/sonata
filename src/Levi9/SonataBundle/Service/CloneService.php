<?php

namespace Levi9\SonataBundle\Service;

class CloneService
{
    public function cloneObject($object)
    {
        return clone $object;
    }
}
