<?php

namespace App\Controller;

use App\Entity\Maquina\Modelo;
use App\Form\ModeloEmpilhadeiraType;
use App\Repository\Maquina\ModeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/modelo/empilhadeira")
 */
class ModeloEmpilhadeiraController extends AbstractController
{
    /**
     * @Route("/", name="modelo_empilhadeira_index", methods={"GET"})
     */
    public function index(ModeloRepository $modeloEmpilhadeiraRepository): Response
    {
        return $this->render('modelo_empilhadeira/index.html.twig', [
            'modelo_empilhadeiras' => $modeloEmpilhadeiraRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="modelo_empilhadeira_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ModeloRepository $modeloEmpilhadeiraRepository): Response
    {
        $modeloEmpilhadeira = new Modelo();
        $form = $this->createForm(ModeloEmpilhadeiraType::class, $modeloEmpilhadeira);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $modeloEmpilhadeiraRepository->add($modeloEmpilhadeira);
            return $this->redirectToRoute('modelo_empilhadeira_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('modelo_empilhadeira/new.html.twig', [
            'modelo_empilhadeira' => $modeloEmpilhadeira,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="modelo_empilhadeira_show", methods={"GET"})
     */
    public function show(Modelo $modeloEmpilhadeira): Response
    {
        return $this->render('modelo_empilhadeira/show.html.twig', [
            'modelo_empilhadeira' => $modeloEmpilhadeira,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="modelo_empilhadeira_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Modelo $modeloEmpilhadeira, ModeloRepository $modeloEmpilhadeiraRepository): Response
    {
        $form = $this->createForm(ModeloEmpilhadeiraType::class, $modeloEmpilhadeira);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $modeloEmpilhadeiraRepository->add($modeloEmpilhadeira);
            return $this->redirectToRoute('modelo_empilhadeira_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('modelo_empilhadeira/edit.html.twig', [
            'modelo_empilhadeira' => $modeloEmpilhadeira,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="modelo_empilhadeira_delete", methods={"POST"})
     */
    public function delete(Request $request, Modelo $modeloEmpilhadeira, ModeloRepository $modeloEmpilhadeiraRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modeloEmpilhadeira->getId(), $request->request->get('_token'))) {
            $modeloEmpilhadeiraRepository->remove($modeloEmpilhadeira);
        }

        return $this->redirectToRoute('modelo_empilhadeira_index', [], Response::HTTP_SEE_OTHER);
    }
}
