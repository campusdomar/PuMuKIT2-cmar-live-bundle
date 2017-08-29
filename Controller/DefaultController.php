<?php

namespace Pumukit\Cmar\LiveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pumukit\LiveBundle\Controller\DefaultController as Base;
use Pumukit\LiveBundle\Document\Live;

class DefaultController extends Base
{
    /**
     * @Route("/live/iframe/{id}", name="pumukit_live_iframe_id")
     * @Template("PumukitLiveBundle:Default:iframe.html.twig")
     */
    public function iframeAction(Live $live, Request $request, $iframe = true)
    {
        $parameters = parent::iframeAction($live, $request, $iframe);

        $parameters['enable_chat'] = $this->container->getParameter('pumukit_cmar_live.chat.enable');

        return $parameters;
    }
}
