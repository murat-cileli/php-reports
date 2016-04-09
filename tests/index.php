<?php
//require_once __DIR__ . '/../vendor/autoload.php';

require_once '../src/PHPReportz.php';

use PHPReportz\PHPReportz;

$pr = new PHPReportz('123456789012345678901234');
$pr->setTemplateId(1);
$pr->setParameters(
    array(
        'company_name' => 'Apple Inc.',
        'address' => 'Istanbul / Turkey',
        'client_name' => 'Murat Çileli',
        'total' => '0.55'
    ));

echo json_encode($pr);
