<?php


namespace Box\Mod\Page\Api;


class AdminTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \Box\Mod\Page\Api\Admin
     */
    protected $api = null;

    public function setup()
    {
        $this->api = new \Box\Mod\Page\Api\Admin();
    }


    public function testgetDi()
    {
        $di = new \Box_Di();
        $this->api->setDi($di);
        $getDi = $this->api->getDi();
        $this->assertEquals($di, $getDi);
    }

    public function testget_pairs()
    {
        $serviceMock = $this->getMockBuilder('\Box\Mod\Page\Service')->getMock();

        $serviceMock->expects($this->atLeastOnce())
            ->method('getPairs')
            ->will($this->returnValue(array()));

        $this->api->setService($serviceMock);
        $result = $this->api->get_pairs();
        $this->assertInternalType('array', $result);
    }

}
 