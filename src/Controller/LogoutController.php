<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LogoutController extends AbstractController
{

    #[Route('/logout', name: 'app_logout')]
    public function logout(AuthenticationUtils $authenticationUtils)
    {
        // Este método se ejecutará cuando un usuario inicie sesión y luego haga clic en el enlace de cierre de sesión.

        // No es necesario agregar ninguna lógica aquí, ya que Symfony manejará automáticamente el cierre de sesión.

        // Redirigir al usuario a una página de inicio de sesión o a cualquier otra página que desees después de cerrar sesión.
        return $this->redirectToRoute('app_login');
    }
}
