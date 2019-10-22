<?php

require_once __DIR__ . '/vendor/autoload.php';

session_start();

$config = [
'authentication' => [
    'ad' => [
      'client_id' => 'a7ebcb39-9996-41c7-b0e3-c3cc5f2a6da8',
      'client_secret' => '5nDrgzQBL@pxoFm:p0h-0m1/.[8BZ?9w',
      'enabled' => 'yes',
      'directory' => '8f48bc20-56b7-4115-b5aa-8b3937765179',
      'return_url' => 'http://localhost',
    ]
  ]
];

// $config = [
// 'authentication' => [
//     'ad' => [
//       'client_id' => '40ac261e-4f60-4371-bb33-c74f5845f506',
//       'client_secret' => 'Du-nV=o0Ev99:2bvRHwSJeNJttxf[AQ9',
//       'enabled' => 'yes',
//       'directory' => '8f48bc20-56b7-4115-b5aa-8b3937765179',
//       'return_url' => 'http://localhost',
//     ]
//   ]
// ];

$request = new \Zend\Http\PhpEnvironment\Request();

$ad = new \Magium\ActiveDirectory\ActiveDirectory(
  new \Magium\Configuration\Config\Repository\ArrayConfigurationRepository($config),
  Zend\Psr7Bridge\Psr7ServerRequest::fromZend(new \Zend\Http\PhpEnvironment\Request())
);

$entity = $ad->authenticate();

echo $entity->getName() . '<br />';
echo $entity->getOid() . '<br />';
echo $entity->getPreferredUsername() . '<br />';
