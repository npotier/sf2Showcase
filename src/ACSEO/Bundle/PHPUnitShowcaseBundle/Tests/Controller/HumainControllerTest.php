<?php

namespace ACSEO\Bundle\PHPUnitShowcaseBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ACSEO\Bundle\PHPUnitShowcaseBundle\Entity\Humain;

class HumainControllerTest extends WebTestCase
{
    public static $log = true;
    public static $humainFormPrefix = "acseo_bundle_phpunitshowcasebundle_humaintype";

    public static $TEST_OK = 0;
    public static $TEST_KO = -1;
    
    public function log ($message) {
        if (self::$log) {
            echo "\n HumainControllerTest : \t";
            echo $message;
        }
    }

    private function random_str($nbr)
    {
        $str = "";
        $chaine = "abcdefghijklmnpqrstuvwxy";
        srand((double)microtime()*1000);

        for($i=0; $i<$nbr; $i++) {
            $str .= $chaine[rand()%strlen($chaine)];
        }

        return $str;
    }

    public function humainFormProvider()
    {
        $dataSet = array();

        //Crée un jeu de données OK
        $goodData = array(
                        self::$humainFormPrefix.'[prenom]'                      => 'Nicolas',
                        self::$humainFormPrefix.'[nom]'                         => 'Potier',
                        self::$humainFormPrefix.'[dateNaissance][date][year]'   => '2007',
                        self::$humainFormPrefix.'[dateNaissance][date][month]'  => '10',
                        self::$humainFormPrefix.'[dateNaissance][date][day]'    => '2',
                        self::$humainFormPrefix.'[dateNaissance][time][hour]'   => '21',
                        self::$humainFormPrefix.'[dateNaissance][time][minute]' => '49',
                        self::$humainFormPrefix.'[sexe]'                        => Humain::$SEXE_MASCULIN,
                        self::$humainFormPrefix.'[orientationSexuelle]'         => Humain::$ORIENTATION_HETERO,
                    );
        $dataSet[] = array($goodData, self::$TEST_OK);


        $alterGoodData = array();
        $alterGoodData[] = array("column" => self::$humainFormPrefix.'[prenom]', "value" => $this->random_str(1000) );
        $alterGoodData[] = array("column" => self::$humainFormPrefix.'[nom]', "value" => $this->random_str(1000) );
        $alterGoodData[] = array("column" => self::$humainFormPrefix.'[dateNaissance][date][year]', "value" => 1542 );
        $alterGoodData[] = array("column" => self::$humainFormPrefix.'[dateNaissance][date][month]', "value" => 13 );
        $alterGoodData[] = array("column" => self::$humainFormPrefix.'[dateNaissance][date][day]', "value" => 40 );
        $alterGoodData[] = array("column" => self::$humainFormPrefix.'[dateNaissance][date][hour]', "value" => 100 );
        $alterGoodData[] = array("column" => self::$humainFormPrefix.'[dateNaissance][date][minute]', "value" => 100 );
        $alterGoodData[] = array("column" => self::$humainFormPrefix.'[sexe]', "value" => Humain::$SEXE_MASCULIN."TOTO" );
        $alterGoodData[] = array("column" => self::$humainFormPrefix.'[orientationSexuelle]', "value" => Humain::$ORIENTATION_HETERO."BAD");
        

        foreach ($alterGoodData as $key => $badData) {
            $badDataSample = $goodData;
            $badDataSample[$badData["column"]] = $badData["value"];
            $dataSet[] = array($badDataSample, self::$TEST_KO);
        }

        return $dataSet;
    }
   
   /**
     * @dataProvider humainFormProvider
     */
    public function testCompleteScenario($humainFormData, $resultatAttendu)
    {
        try {        
            // Create a new client to browse the application
            $client = static::createClient();

            // Create a new entry in the database
            $crawler = $client->request('GET', '/admin/humain/');
            $this->assertTrue(200 === $client->getResponse()->getStatusCode());
            $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

            // Fill in the form and submit it
            $form = $crawler->selectButton('Create')->form($humainFormData);

            $client->submit($form);
            
            // Si une erreur 500 est levée alors que le test devait être OK
            if (500 == $client->getResponse()->getStatusCode() && self::$TEST_OK == $resultatAttendu) {
                if (preg_match('/<title>([^>]*)<\/title>/si', $client->getResponse()->getContent(), $matches)) {
                    $this->log($matches[1]);
                }
                $this->fail("La soumission du formulaire a entrainé une erreur");
            }
            // Si un code 200 est affiché alors que le test devrait être OK (et donc entrainer une redirection 302)
            if (200 == $client->getResponse()->getStatusCode() && self::$TEST_OK == $resultatAttendu) {
                $this->fail("La soumission du formulaire a entrainé une erreur");
            }
            // Si on s'attend à un résultat OK, on s'attend à une redirection
            else if (self::$TEST_OK == $resultatAttendu){
                $crawler = $client->followRedirect();
                $this->assertTrue($crawler->filter('td:contains("'.$humainFormData[self::$humainFormPrefix.'[prenom]'].'")')->count() > 0);
            }
        }
        catch (\InvalidArgumentException $expected) {
            if (self::$TEST_OK == $resultatAttendu) {
                $this->fail($expected);
            }
        }

    }
    
}