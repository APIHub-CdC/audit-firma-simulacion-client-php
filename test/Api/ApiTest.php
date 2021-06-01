<?php

namespace AuditFirma\Simulacion\MX\Client;

use \GuzzleHttp\Client;
use \AuditFirma\Simulacion\MX\Client\Configuration;
use \AuditFirma\Simulacion\MX\Client\ApiException;
use \AuditFirma\Simulacion\MX\Client\ObjectSerializer;
use \AuditFirma\Simulacion\MX\Client\ApiClient;
use \AuditFirma\Simulacion\MX\Client\Api\SustFirmaApi as Instance;
use \AuditFirma\Simulacion\MX\Client\model\CatalogoEstados;
use \AuditFirma\Simulacion\MX\Client\model\CatalogoTipoPersona;
use \AuditFirma\Simulacion\MX\Client\model\Domicilio;
use \AuditFirma\Simulacion\MX\Client\model\Persona;
use \AuditFirma\Simulacion\MX\Client\model\SustitucionNIPPeticion;
use \AuditFirma\Simulacion\MX\Client\model\SustitucionNIPRespuesta;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $config = new Configuration();
        $config->setHost('the_url');
        $this->x_api_key = "your_x_api_key";
        $client = new Client();
        $this->apiInstance = new Instance($client,$config);
    }
    
    public function testNip()
    {
        try {
            $peticion = new SustitucionNIPPeticion();
            $persona = new Persona();
            $domicilio = new Domicilio();
            $catalogoEstados = new CatalogoEstados(); 
            $catalogoTipoPersona = new CatalogoTipoPersona();


            $domicilio->setCalleNumero("AV 535 84");
            $domicilio->setColonia("SAN JUAN DE ARAGON 1RA SECC");
            $domicilio->setCiudad( "CIUDAD DE MEXICO");
            $domicilio->setEstado($catalogoEstados::CDMX);
            
            $persona->setPrimerNombre("NOMBRE");
            $persona->setSegundoNombre("SEGUNDONOMBRE");
            $persona->setApellidoPaterno("PATERNO");
            $persona->setApellidoMaterno("MATERNO");
            $persona->setApellidoAdicional(null);
            $persona->setRFC("PUAP850316MI1");
            $persona->setDomicilio($domicilio);

            $peticion->setFolioCDC(763211111);
            $peticion->setFechaConsulta("2021/04/15");
            $peticion->setHoraConsulta("10/12/35");
            $peticion->setTipoConsulta($catalogoTipoPersona::PF);
            $peticion->setUsuario("NGA9915CC5");
            $peticion->setFechaAprobacionConsulta("2021/04/15");
            $peticion->setHoraAprobacionConsulta("10/12/35");
            $peticion->setIngresoNuevamenteNIP(true);
            $peticion->setRespuestaLeyendaAutorizacion(true);
            $peticion->setAceptaTerminosCondiciones(true);
            $peticion->setNumeroFirma("1234F");
            $peticion->setPersona($persona);

            $result = $this->apiInstance->nip($this->x_api_key, $peticion);
            print_r($result);
        } catch (ApiException | Exception $e) {
            echo 'Exception when calling ApiTest->testNip: ', $e->getMessage(), PHP_EOL;
        }          
    }
}
