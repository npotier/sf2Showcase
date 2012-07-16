<?php

namespace ACSEO\Bundle\PHPUnitShowcaseBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testSecurisationAdmin()
    {
        $client = static::createClient();

        // Tente d'accéder à un espace protégé
        $crawler = $client->request('GET', '/admin/humain');
        // On s'attend à une redirection
        $this->assertTrue(302 == $client->getResponse()->getStatusCode());
      
        $crawler = $client->followRedirect();
        // Nous sommes bien sur une page de connexion
        $this->assertTrue($crawler->filter('html:contains("Connexion")')->count() > 0);

        // Valide le formulaire de connexion
        $form = $crawler->selectButton('Connexion')->form(array("_username"=> "npotier", "_password" => "c1secret"));
		$crawler = $client->submit($form);
		$this->assertTrue(302 == $client->getResponse()->getStatusCode());
        $crawler = $client->followRedirect();
		$this->assertTrue($crawler->filter('html:contains("admin/humain")')->count() > 0);
		
		//Connecté
		$crawler = $client->request('GET', '/admin/humain');
		$crawler = $client->followRedirect();
		$this->assertTrue(200 == $client->getResponse()->getStatusCode());
		$this->assertTrue($crawler->filter('html:contains("Humain list")')->count() > 0);
    }
}
