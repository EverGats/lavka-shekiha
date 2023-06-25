<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => 'dev-master',
        'version' => 'dev-master',
        'reference' => '3cdad1631caaec2bddf57443ea35f180afa7b40a',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '3cdad1631caaec2bddf57443ea35f180afa7b40a',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'artemsway/exchange1c' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '4dcd9248e393b9df030c7c654a241234c995f9b8',
            'type' => 'library',
            'install_path' => __DIR__ . '/../artemsway/exchange1c',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => false,
        ),
        'artemsway/parser1c' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => 'f7fd51a8e9caed0bf2b088735adbf2b89bbefe55',
            'type' => 'library',
            'install_path' => __DIR__ . '/../artemsway/parser1c',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => false,
        ),
        'monolog/monolog' => array(
            'pretty_version' => '2.9.1',
            'version' => '2.9.1.0',
            'reference' => 'f259e2b15fb95494c83f52d3caad003bbf5ffaa1',
            'type' => 'library',
            'install_path' => __DIR__ . '/../monolog/monolog',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/log' => array(
            'pretty_version' => '1.1.4',
            'version' => '1.1.4.0',
            'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0.0 || 2.0.0 || 3.0.0',
            ),
        ),
        'twbs/bootstrap' => array(
            'pretty_version' => 'v5.3.0',
            'version' => '5.3.0.0',
            'reference' => '60098ac499d30aa50575b0b7137391c06ef25429',
            'type' => 'library',
            'install_path' => __DIR__ . '/../twbs/bootstrap',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'twitter/bootstrap' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v5.3.0',
            ),
        ),
    ),
);
