<?php

namespace App\Controller;

use App\Entity\Empilhadeira;
use App\Form\EmpilhadeiraType;
use App\Repository\EmpilhadeiraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/empilhadeira")
 */
class EmpilhadeiraController extends AbstractController
{
    /**
     * @Route("/", name="app_empilhadeira_index", methods={"GET"})
     */
    public function index(EmpilhadeiraRepository $empilhadeiraRepository): Response
    {
        return $this->render('empilhadeira/index.html.twig', [
            'empilhadeiras' => $empilhadeiraRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_empilhadeira_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EmpilhadeiraRepository $empilhadeiraRepository): Response
    {
        $empilhadeira = new Empilhadeira();
        $form = $this->createForm(EmpilhadeiraType::class, $empilhadeira);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $empilhadeiraRepository->add($empilhadeira);
            return $this->redirectToRoute('app_empilhadeira_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('empilhadeira/new.html.twig', [
            'empilhadeira' => $empilhadeira,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_empilhadeira_show", methods={"GET"})
     */
    public function show(Empilhadeira $empilhadeira): Response
    {
        return $this->render('empilhadeira/show.html.twig', [
            'empilhadeira' => $empilhadeira,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_empilhadeira_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Empilhadeira $empilhadeira, EmpilhadeiraRepository $empilhadeiraRepository): Response
    {
        $form = $this->createForm(EmpilhadeiraType::class, $empilhadeira);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $empilhadeiraRepository->add($empilhadeira);
            return $this->redirectToRoute('app_empilhadeira_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('empilhadeira/edit.html.twig', [
            'empilhadeira' => $empilhadeira,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_empilhadeira_delete", methods={"POST"})
     */
    public function delete(Request $request, Empilhadeira $empilhadeira, EmpilhadeiraRepository $empilhadeiraRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$empilhadeira->getId(), $request->request->get('_token'))) {
            $empilhadeiraRepository->remove($empilhadeira);
        }

        return $this->redirectToRoute('app_empilhadeira_index', [], Response::HTTP_SEE_OTHER);
    }
}
