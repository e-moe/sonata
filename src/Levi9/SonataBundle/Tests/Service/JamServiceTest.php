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

        $em = $this->getMockBuilder('\Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();
        $em->expects($this->exactly($expectedCount))
            ->method('persist')
            ->withConsecutive(
                array($jam),
                array($jam),
                array($jam)
            );
        $em->expects($this->once())
            ->method('flush');


        $jamService = new JamService($em);
        $jamService->duplicate($jam, $count);

    }

    public function duplicateProvider()
    {
        return array(
            array(-5, 0),
            array(0, 0),
            array(1, 1),
            array(2, 2),
            array(10, 10),
        );
    }
}
