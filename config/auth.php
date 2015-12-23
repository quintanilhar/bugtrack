<?php

return [

    'driver' => 'activeDirectory',

    'activeDirectory' => [
        'catho' => [
            'server' => '172.16.200.118',
            //'server' => 'srv-catho01.catho.boh.inc',
            'base_dn' => 'DC=Catho,DC=BOH,DC=INC',
            'account_suffix' => '@catho.boh.inc',
            'groupFilter' => '(&(memberOf=Grupos Diversos,OU=Catho,DC=Catho,DC=BOH,DC=INC)(company=Catho)(userprincipalname=%s@Catho.BOH.INC))',
        ],
        'manager' => [
            'server' => '172.16.200.110',
            //'server' => 'srv-manager01.manager.boh.inc',
            'base_dn' => 'DC=Manager,DC=BOH,DC=INC',
            'account_suffix' => '@manager.boh.inc',
            'groupFilter' => '(&(memberOf=Grupos Diversos,OU=Catho,DC=Catho,DC=BOH,DC=INC)(userprincipalname=%s@MANAGER.BOH.INC)(company=Manager))',
        ],
    ],
];
