<?php

namespace App\Controller;

use App\Entity\Proveedor;
use App\Form\ProveedorType;
use App\Repository\ProveedorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProveedorController extends AbstractController
{
    #[Route('/', name: 'app_proveedor_index')]
    public function index(ProveedorRepository $repository): Response
    {
        $proveedores = $repository->findAll();

        return $this->render('proveedor/index.html.twig', [
            'proveedores' => $proveedores,
        ]);
    }

    #[Route('/proveedor/new', name: 'app_proveedor_new')]
    public function new(Request $request, EntityManagerInterface $em) : Response
    {
        $proveedor = new Proveedor();
        $form = $this->createForm(ProveedorType::class, $proveedor);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $proveedor->setCreateAt(new \DateTimeImmutable());
            $em->persist($proveedor);
            $em->flush();
            $this->addFlash('success', 'Proveedor creado exitosamente.');
            return $this->redirectToRoute('app_proveedor_index');
            
            }
        return $this->render('proveedor/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/proveedor/{id}/edit', name: 'app_proveedor_edit')]
    public function edit(Request $request, Proveedor $proveedor, EntityManagerInterface $em): Response
{
    $form = $this->createForm(ProveedorType::class, $proveedor);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $proveedor->setUpdateAt(new \DateTimeImmutable());
        $em->flush(); 
        $this->addFlash('success', 'Proveedor actualizado exitosamente.');
        return $this->redirectToRoute('app_proveedor_index');
    }

    return $this->render('proveedor/edit.html.twig', [
        'form' => $form,
        'proveedor' => $proveedor,
    ]);
}

#[Route('/proveedor/{id}/delete', name: 'app_proveedor_delete', methods: ['POST'])]
public function delete(Request $request, Proveedor $proveedor, EntityManagerInterface $em): Response
{
    $em->remove($proveedor);
    $em->flush();
    $this->addFlash('success', 'Proveedor eliminado exitosamente.');
    return $this->redirectToRoute('app_proveedor_index');
}

#[Route('/proveedor/{id}', name: 'app_proveedor_show')]
public function show(Proveedor $proveedor): Response
{
    return $this->render('proveedor/show.html.twig', [
        'proveedor' => $proveedor,
    ]);
}

}
