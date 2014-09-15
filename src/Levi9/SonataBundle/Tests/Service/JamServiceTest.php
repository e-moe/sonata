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
        //todo: actually, this test is not testing, whether Jam was cloned or not.
        //To test clone method: create "clone" factory. It will have only one method with "clone" operator.
        // inject that service into Jam service. Expect, that clone method was called N times.
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
            //todo: this case is not real. You may not test it
            array(-5, 0),
            array(0, 0),
            array(1, 1),
            array(2, 2),
            array(10, 10),
        );
    }
}
