<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Filament Provider Path
    |--------------------------------------------------------------------------
    |
    | Chemin vers le fichier AdminPanelProvider de Filament qui sera mis à jour
    | avec les nouvelles couleurs générées.
    |
    */
    'provider_path' => 'app/Providers/Filament/AdminPanelProvider.php',

    /*
    |--------------------------------------------------------------------------
    | CSS Files to Update
    |--------------------------------------------------------------------------
    |
    | Liste des fichiers CSS qui seront automatiquement mis à jour avec les
    | palettes de couleurs générées. Chaque fichier doit contenir les marqueurs
    | appropriés pour que les couleurs puissent être injectées.
    |
    | Pour les fichiers front.css : 
    | color-schema-console-generated-start et color-schema-console-generated-end
    | 
    | Pour les autres fichiers CSS :
    | COLORS:START et COLORS:END
    |
    */
    'css_files' => [
        'resources/css/front/front.css',
        'resources/css/filament/admin/theme.css',
        // 'resources/css/pdf/pdf.css', // Décommenté si nécessaire
    ],

    /*
    |--------------------------------------------------------------------------
    | CSS Directories to Create
    |--------------------------------------------------------------------------
    |
    | Répertoires CSS qui seront créés automatiquement lors de l'installation
    | du package si ils n'existent pas déjà.
    |
    */
    'css_directories' => [
        'resources/css/filament/admin',
        'resources/css/front',
        // 'resources/css/pdf', // Décommenté si nécessaire
    ],

    /*
    |--------------------------------------------------------------------------
    | CSS Stubs Mapping
    |--------------------------------------------------------------------------
    |
    | Associe chaque fichier CSS à créer avec son stub source.
    | La clé est le chemin relatif du fichier à créer (dans le projet),
    | la valeur est le nom du stub dans le dossier stubs/ du package.
    |
    */
    'stubs' => [
        'resources/css/front/front.css'          => 'front.css',
        'resources/css/filament/admin/theme.css' => 'theme.css',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Color Modes
    |--------------------------------------------------------------------------
    |
    | Configuration des modes de génération de couleurs disponibles.
    |
    */
    'color_modes' => [
        'manuel' => 'Mode manuel - toutes les couleurs sont saisies manuellement',
        'split-comp' => 'Mode split-complémentaire - génère secondaire et tertiaire automatiquement',
        'simple' => 'Mode analogique simple - génère toutes les couleurs à partir de la primaire',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Colors
    |--------------------------------------------------------------------------
    |
    | Couleurs par défaut utilisées si aucune couleur n'est spécifiée.
    |
    */
    'default_colors' => [
        'primary' => '#3B82F6',
        'secondary' => null,
        'tertiary' => null,
    ],
];
