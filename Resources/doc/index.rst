TheodoEvolution: Legacy Model Bundle
====================================

This bundle allows access to the legacy models.
Available Model :

- Doctrine 1 (Symfony 1.4)
- That's all for the moment.

Prerequisites
-------------

This version requires Symfony 2.1

Configuration
-------------

1. Add the following lines in your composer.json::

    {
        "repositories": 
        [
            {
                "type":"vcs",
                "url":"git@github.com:theodo/theodo-evolution.git"
            }
        ],
        "require": {
            "theodo/evolution-legacy-model-bundle": "*"
        }
    }

2. [Doctrine 1 Symfony 1.4] add database configuration in your config.yml::

    theodo_evolution_legacy_model:
        path:       'path/to/the/Doctrine.php/file'
        user:       user
        password:   pwd
        host:       localhost
        dbname:     mydatabase

3. You can add repository to the autoload register if necessary. This is an example to load SfThumbnail plugin. config.yml::

    theodo_evolution_legacy_model:
        autoload:
            - { path: '../legacy/plugins/sfThumbnailPlugin/lib/'}
            - { path: '../legacy/plugins/sfDoctrineThumbnailablePlugin/lib/', prefix: 'Doctrine'}  


