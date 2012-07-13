<?php
namespace ACSEO\PHPUnitShowcaseBundle\Tests\Entity;

use ACSEO\Bundle\PHPUnitShowcaseBundle\Entity\Humain;

class HumainTest extends \PHPUnit_Framework_TestCase
{
	public static $TEST_OK = 0;
	public static $TEST_KO = -1;

	public function dateNaissanceProvider() {
		$params = array();
    	//Cas de succès attendu 
    	$params[] = array ("02/10/1984", HumainTest::$TEST_OK);
    	$params[] = array ("1900-01-01", HumainTest::$TEST_OK);
    	$params[] = array ("15 January 2012", HumainTest::$TEST_OK);
    	$params[] = array (date("Y-m-d H:i:s"), HumainTest::$TEST_OK);
    	//Cas d'échec attendu
    	$params[] = array ("Nicolas", HumainTest::$TEST_KO);
    	$params[] = array ("01/01/2040", HumainTest::$TEST_KO);
    	$params[] = array ("01/01/1830", HumainTest::$TEST_KO);

    	return $params;
	}

	/**
	 * @dataProvider dateNaissanceProvider
	 */
    public function testSetDateNaissance($dateNaissance, $resultatAttendu)
    {
    	$humain = new Humain();
		echo "\n teste la méthode setDateNaissance avec le paramètre : ".$dateNaissance."...";
		try {
			$result = $humain->setDateNaissance($dateNaissance);
			if (HumainTest::$TEST_KO == $resultatAttendu) {
        		$this->fail("L'exception n'a pas été levée alors que ".$dateNaissance." doit être considéré comme mauvais");
			}
		}
		catch (\InvalidArgumentException $expected) {
			echo "\n\t Une exception a été levée pour le paramètre : ".$dateNaissance."...";
        	if (HumainTest::$TEST_OK == $resultatAttendu) {
        		$this->fail("Une exception a été levée alors que le paramètre ".$dateNaissance." doit être considéré comme bon");
			}
    	}
    	echo "OK";
    }

    public function sexeProvider() {
        $params = array();
        //Cas de succès attendu 
        $params[] = array (Humain::$SEXE_MASCULIN, HumainTest::$TEST_OK);
        $params[] = array (Humain::$SEXE_FEMININ, HumainTest::$TEST_OK);
        //Cas d'échec attendu
        $params[] = array ("25", HumainTest::$TEST_KO);
        $params[] = array (3, HumainTest::$TEST_KO);

        return $params;
    }

    /**
     * @dataProvider sexeProvider
     */
    public function testSetSexe($sexe, $resultatAttendu)
    {
        $humain = new Humain();
        echo "\n teste la méthode setSexe avec le paramètre : ".$sexe."...";
        try {
            $result = $humain->setSexe($sexe);
            if (HumainTest::$TEST_KO == $resultatAttendu) {
                $this->fail("L'exception n'a pas été levée alors que ".$sexe." doit être considéré comme mauvais");
            }
        }
        catch (\InvalidArgumentException $expected) {
            echo "\n\t Une exception a été levée pour le paramètre : ".$sexe."...";
            if (HumainTest::$TEST_OK == $resultatAttendu) {
                $this->fail("Une exception a été levée alors que le paramètre ".$sexe." doit être considéré comme bon");
            }
        }
        echo "OK";
    }

    public function orientationProvider() {
        $params = array();
        //Cas de succès attendu 
        $params[] = array (Humain::$ORIENTATION_BI, HumainTest::$TEST_OK);
        $params[] = array (Humain::$ORIENTATION_HOMO, HumainTest::$TEST_OK);
        $params[] = array (Humain::$ORIENTATION_HETERO, HumainTest::$TEST_OK);
        //Cas d'échec attendu
        $params[] = array ("25", HumainTest::$TEST_KO);
        $params[] = array (3, HumainTest::$TEST_KO);

        return $params;
    }

    /**
     * @dataProvider orientationProvider
     */
    public function testSetOrientation($orientation, $resultatAttendu)
    {
        $humain = new Humain();
        echo "\n teste la méthode setOrientation avec le paramètre : ".$orientation."...";
        try {
            $result = $humain->setOrientationSexuelle($orientation);
            if (HumainTest::$TEST_KO == $resultatAttendu) {
                $this->fail("L'exception n'a pas été levée alors que ".$orientation." doit être considéré comme mauvais");
            }
        }
        catch (\InvalidArgumentException $expected) {
            echo "\n\t Une exception a été levée pour le paramètre : ".$orientation."...";
            if (HumainTest::$TEST_OK == $resultatAttendu) {
                $this->fail("Une exception a été levée alors que le paramètre ".$orientation." doit être considéré comme bon");
            }
        }
        echo "OK";
    }


}

