<?php

namespace AppBundle\Controller;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Controller\ChangePasswordController as BaseController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ChangePasswordController extends BaseController
{

	private $formFactory;
	private $userManager;
	private $eventDispatcher;

	public function __construct(EventDispatcherInterface $eventDispatcher, UserManagerInterface $userManager, FactoryInterface $formFactory)
	{
		parent::__construct($eventDispatcher, $formFactory, $userManager);
		$this->formFactory = $formFactory;
		$this->userManager = $userManager;
		$this->eventDispatcher = $eventDispatcher;
	}

	public function changePasswordAction(Request $request)
	{

		$user = $this->getUser();

		if (!is_object($user) || !$user instanceof UserInterface) {
			throw new AccessDeniedException('This user does not have access to this section.');
		}

		$event = new GetResponseUserEvent($user, $request);

		$this->eventDispatcher->dispatch(FOSUserEvents::CHANGE_PASSWORD_INITIALIZE, $event);


		if (null !== $event->getResponse()) {
			return $event->getResponse();
		}
    
		$form = $this->formFactory->createForm();
		$form->setData($user);

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$event = new FormEvent($form, $request);
			$this->eventDispatcher->dispatch(FOSUserEvents::CHANGE_PASSWORD_SUCCESS, $event);

			$this->userManager->updateUser($user);

			if (null === $response = $event->getResponse()) {
				$url = $this->generateUrl('accueil');
				$response = new RedirectResponse($url);
			}
      
			$this->eventDispatcher->dispatch(FOSUserEvents::CHANGE_PASSWORD_COMPLETED, new FilterUserResponseEvent($user, $request, $response));
			return $response;
		}

		return $this->render('@FOSUser/ChangePassword/change_password.html.twig', array(
			'form' => $form->createView(),
		));
	}

}
