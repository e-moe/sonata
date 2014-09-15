<?php

namespace Levi9\SonataBundle\Service;

class CloneService
{
    /**
     * Clone object
     *
     * @param mixed $object Object instance to clone
     * @return mixed Cloned $object instance
     */
    public function cloneObject($object)
    {
        return clone $object;
    }
}
