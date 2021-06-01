<?php

namespace AuditFirma\Simulacion\MX\Client\Model;
use \AuditFirma\Simulacion\MX\Client\ObjectSerializer;

class CatalogoTipoPersona
{
    
    const PF = 'PF';
    const PM = 'PM';
    
    
    public static function getAllowableEnumValues()
    {
        return [
            self::PF,
            self::PM,
        ];
    }
}
