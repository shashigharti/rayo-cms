<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */
    /* {package-name}.{model or object}.{action}*/
    'actions' => [
        'core.settings.edit' => "Edit Settings",
        'core.dashboards.manage' => 'Dashboard',

        'core.medias.manage' => "Manage Images",
        'core.medias.add' => "Add Image",
        'core.medias.edit' => "Image Edit",
        'core.medias.delete' => "Image Delete",

        'core.dashboards.manage' => "Manage Dashboard",
        'core.dashboards.add' => "Add Dashboard",
        'core.dashboards.edit' => "Dashboard Edit",
        'core.dashboards.delete' => "Dashboard Delete",

        'core.widgets.manage' => "Manage Widgets",
        'core.widgets.add' => "Add Widget",
        'core.widgets.edit' => "Widget Edit",
        'core.widgets.delete' => "Widget Delete",

        'core.schedules.manage' => 'Manage Schedules',
        'core.email-settings.manage' => 'Manage Email Settings'

    ]
];
