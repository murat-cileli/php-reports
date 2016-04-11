<?php
//require_once __DIR__ . '/../vendor/autoload.php';

require_once '../src/PHPReports.php';

use PHPReports\PHPReports;

$pr = new PHPReports('123456789012345678901234');
$pr->setTemplateId(1);
$pr->setTemplateVariables(
    array(
        'company_name' => 'Apple Inc.',
        'address'      => 'Istanbul / Turkey',
        'client_name'  => 'Murat Çileli',
        'products'     => array('Computer', 'Smart Phone', 'Book'),
        'quantities'   => array('4', '2', '3'),
        'prices'       => array('1290', '499', '10'),
        'totals'       => array('5160', '998', '30'),
        'total'        => '6.188',
    ));

$pr->generateReport();
