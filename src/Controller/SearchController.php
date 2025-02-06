<?php

namespace App\Controller;

use App\Form\SearchFormType;
use App\ValueObject\Search;
use App\Service\InpostService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    private InpostService $inpostService;

    public function __construct(InpostService $inpostService)
    {
        $this->inpostService = $inpostService;
    }

    #[Route('/', name: 'search')]
    public function search(Request $request): Response
    {
        $address = new Search();
        $form = $this->createForm(SearchFormType::class, $address);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $pointsResponse = $this->inpostService->getInpostResources('points', $address->getCity());
            } catch (Exception) {
                $this->addFlash('error', 'Error fetching data.');

                return $this->redirectToRoute('search');
            }

            return $this->render('results.html.twig', [
                'points' => $pointsResponse,
            ]);
        }

        return $this->render('search.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
