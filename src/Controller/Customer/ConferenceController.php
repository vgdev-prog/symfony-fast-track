<?php

namespace App\Controller\Customer;

use App\Entity\Conference;
use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(name: 'customer.')]
final class ConferenceController extends AbstractController
{
    #[Route('/conference', name: 'conference.index', methods: ['GET'])]
    public function index(Request $request, ConferenceRepository $conferenceRepository): Response
    {
        if ($name = $request->query->get('hello')) {
            $greet = sprintf('<h1>Hello %s!</h1>', htmlspecialchars($name));
        }

        return $this->render('customer/conference/index.html.twig', [
            'conferences' => $conferenceRepository->findAll(),
        ]);
    }

    #[Route(path: '/conference/{id}', name: 'conference.show', methods: ['GET'])]
    public function show(string $id, Conference $conference, CommentRepository $commentRepository, Request $request): Response
    {
        $offset = (int) $request->query->get('offset', '0');

        $paginator = $commentRepository->getCommentPaginator(conference: $conference, offset: $offset);

        return $this->render('customer/conference/show.html.twig', [
            'conference' => $conference,
            'comments' => $paginator,
            'previous' => $offset - CommentRepository::COMMENTS_PER_PAGE,
            'next' => min(count($paginator), $offset + CommentRepository::COMMENTS_PER_PAGE),
            'total' => $paginator->count(),
        ]);
    }
}
