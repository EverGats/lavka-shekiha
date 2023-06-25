<?php return array(
    'root' => array(
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => NULL,
        'name' => '__root__',
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => NULL,
            'dev_requirement' => false,
        ),
        'artemsway/exchange1c' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'type' => 'library',
            'install_path' => __DIR__ . '/../artemsway/exchange1c',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'reference' => '4dcd9248e393b9df030c7c654a241234c995f9b8',
            'dev_requirement' => false,
        ),
        'artemsway/parser1c' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'type' => 'library',
            'install_path' => __DIR__ . '/../artemsway/parser1c',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'reference' => 'f7fd51a8e9caed0bf2b088735adbf2b89bbefe55',
            'dev_requirement' => false,
        ),
    ),
);
