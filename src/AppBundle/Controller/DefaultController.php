<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;

class DefaultController extends Controller
{
    /**
     * @Rest\View()
     * @Get("/version")
     */
    public function getHomeAction(Request $request)
    {

        $bundles = $this->get('kernel')->getBundles();
        // replace this example code with whatever you need
        $data =  [
            'framework' => "Symfony",
            'version' => Kernel::VERSION,
            'implemented-bundles' => array_keys($bundles),
        ];

        return new JsonResponse($data);
    }

    /**
     * @Rest\View()
     * @Rest\Get("/")
     */
    public function getDashBoardAction()
    {
        $formatted[] = [
            'Title' => 'Welcome to dashboard',
            'categories' => [
                'sites-scrapped' => [
                    'amazon' => [
                        'url' => 'www.amazon.fr',
                        'sysname' => 'amazon',
                        'label' => 'Amazon'
                    ],
                    'c-discount' => [
                        'url' => 'www.cdiscount.fr',
                        'sysname' => 'c',
                        'label' => "c-discount"
                    ]
                ],
            ],
            'powered' => 'Laurent BRAU',
        ];

        return  new JsonResponse($formatted);
    }
}
