<?php

namespace App\Controller;

use App\Entity\ListaEmpilhadeira;
use App\Form\ListaEmpilhadeiraType;
use App\Repository\ListaEmpilhadeiraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lista/empilhadeira")
 */
class ListaEmpilhadeiraController extends AbstractController
{
    /**
     * @Route("/", name="lista_empilhadeira_index", methods={"GET"})
     */
    public function index(ListaEmpilhadeiraRepository $listaEmpilhadeiraRepository): Response
    {
        return $this->render('lista_empilhadeira/index.html.twig', [
            'lista_empilhadeiras' => $listaEmpilhadeiraRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lista_empilhadeira_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ListaEmpilhadeiraRepository $listaEmpilhadeiraRepository): Response
    {
        $listaEmpilhadeira = new ListaEmpilhadeira();
        $form = $this->createForm(ListaEmpilhadeiraType::class, $listaEmpilhadeira);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $listaEmpilhadeiraRepository->add($listaEmpilhadeira);
            return $this->redirectToRoute('lista_empilhadeira_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('lista_empilhadeira/new.html.twig', [
            'lista_empilhadeira' => $listaEmpilhadeira,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lista_empilhadeira_show", methods={"GET"})
     */
    public function show(ListaEmpilhadeira $listaEmpilhadeira): Response
    {
        return $this->render('lista_empilhadeira/show.html.twig', [
            'lista_empilhadeira' => $listaEmpilhadeira,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lista_empilhadeira_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ListaEmpilhadeira $listaEmpilhadeira, ListaEmpilhadeiraRepository $listaEmpilhadeiraRepository): Response
    {
        $form = $this->createForm(ListaEmpilhadeiraType::class, $listaEmpilhadeira);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $listaEmpilhadeiraRepository->add($listaEmpilhadeira);
            return $this->redirectToRoute('lista_empilhadeira_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('lista_empilhadeira/edit.html.twig', [
            'lista_empilhadeira' => $listaEmpilhadeira,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lista_empilhadeira_delete", methods={"POST"})
     */
    public function delete(Request $request, ListaEmpilhadeira $listaEmpilhadeira, ListaEmpilhadeiraRepository $listaEmpilhadeiraRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$listaEmpilhadeira->getId(), $request->request->get('_token'))) {
            $listaEmpilhadeiraRepository->remove($listaEmpilhadeira);
        }

        return $this->redirectToRoute('lista_empilhadeira_index', [], Response::HTTP_SEE_OTHER);
    }
}
