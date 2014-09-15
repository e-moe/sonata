<?php

namespace Levi9\SonataBundle\Tests\Service;

use Levi9\SonataBundle\Service\JamService;

class JamServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider duplicateProvider
     */
    public function testDuplicate($count, $expectedCount)
    {
        $jam = $this->getMock('\Levi9\SonataBundle\Entity\Jam');

        $cloneService = $this->getMock('\Levi9\SonataBundle\Service\CloneService');
        $cloneService->expects($this->exactly($expectedCount))
            ->method('cloneObject')
            ->with($jam);

        $em = $this->getMockBuilder('\Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();
        $em->expects($this->exactly($expectedCount))
            ->method('persist');
        $em->expects($this->once())
            ->method('flush');


        $jamService = new JamService($em, $cloneService);
        $jamService->duplicate($jam, $count);

    }

    public function duplicateProvider()
    {
        return array(
            array(0, 0),
            array(1, 1),
            array(2, 2),
            array(10, 10),
        );
    }
}
