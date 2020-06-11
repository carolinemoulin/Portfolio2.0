<?php

namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function contactForm(Contact $contact, Contact $object, Contact $message, Contact $email)
    {
        $notification = (new \Swift_Message('Nouveau contact :'.$contact->getObject()))
            ->setFrom('noreply@caroline-moulin.fr')
            ->setTo('contact@caroline-moulin.fr')
            ->setBody($this->renderer->render('accueil/emails/notification.html.twig', [
                'contact' => $contact,
                'object' => $object,
                'message' => $message, /*,
                'email' => $email*/
            ]), 'text/html');
        $this->mailer->send($notification);
    }

    public function notify(Contact $contact)
    {
        $notificationUser = (new \Swift_Message('Nouveau contact :'.$contact->getObject()))
            ->setFrom('noreply@caroline-moulin.fr')
            ->setTo($contact->getEmail())
            ->setBody($this->renderer->render('accueil/emails/email.html.twig', [
                'contact' => $contact,
            ]), 'text/html');
        $this->mailer->send($notificationUser);
    }
}
