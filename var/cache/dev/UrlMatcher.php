<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/beneficiaire' => [[['_route' => 'beneficiaire_index', '_controller' => 'App\\Controller\\BeneficiaireController::index'], null, ['GET' => 0], null, true, false, null]],
        '/beneficiaire/new' => [[['_route' => 'beneficiaire_new', '_controller' => 'App\\Controller\\BeneficiaireController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api' => [
            [['_route' => 'compte_index', '_controller' => 'App\\Controller\\CompteController::index'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'depot_index', '_controller' => 'App\\Controller\\DepotController::index'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'partenaire_index', '_controller' => 'App\\Controller\\PartenaireController::index'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'transaction_index', '_controller' => 'App\\Controller\\TransactionController::index'], null, ['GET' => 0], null, true, false, null],
            [['_route' => 'user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null],
        ],
        '/api/compte' => [[['_route' => 'compte_new', '_controller' => 'App\\Controller\\CompteController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/contrat' => [[['_route' => 'contrat', '_controller' => 'App\\Controller\\ContratController::index'], null, null, null, false, false, null]],
        '/expediteur' => [[['_route' => 'expediteur_index', '_controller' => 'App\\Controller\\ExpediteurController::index'], null, ['GET' => 0], null, true, false, null]],
        '/expediteur/new' => [[['_route' => 'expediteur_new', '_controller' => 'App\\Controller\\ExpediteurController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/partenaire/liste' => [[['_route' => 'liste_partenaire', '_controller' => 'App\\Controller\\ListePartenaireController::index'], null, ['GET' => 0], null, false, false, null]],
        '/profil' => [[['_route' => 'profil_index', '_controller' => 'App\\Controller\\ProfilController::index'], null, ['GET' => 0], null, true, false, null]],
        '/profil/new' => [[['_route' => 'profil_new', '_controller' => 'App\\Controller\\ProfilController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/users/bloquer' => [[['_route' => 'userBlock', '_controller' => 'App\\Controller\\XokamController::userBloquer'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/users/debloquer' => [[['_route' => 'userDeblock', '_controller' => 'App\\Controller\\XokamController::userBloquer'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/beneficiaire/([^/]++)(?'
                    .'|(*:67)'
                    .'|/edit(*:79)'
                    .'|(*:86)'
                .')'
                .'|/api(?'
                    .'|/(?'
                        .'|([^/]++)(?'
                            .'|(*:116)'
                            .'|/edit(*:129)'
                            .'|(*:137)'
                        .')'
                        .'|depot(*:151)'
                        .'|([^/]++)(?'
                            .'|(*:170)'
                            .'|/edit(*:183)'
                            .'|(*:191)'
                        .')'
                        .'|ajoutpartenaire(*:215)'
                        .'|([^/]++)(?'
                            .'|(*:234)'
                            .'|/edit(*:247)'
                            .'|(*:255)'
                        .')'
                        .'|transaction(*:275)'
                        .'|([^/]++)(?'
                            .'|(*:294)'
                            .'|/edit(*:307)'
                            .'|(*:315)'
                        .')'
                        .'|new(*:327)'
                        .'|([^/]++)(?'
                            .'|(*:346)'
                            .'|/edit(*:359)'
                            .'|(*:367)'
                        .')'
                        .'|xokam(*:381)'
                        .'|re(?'
                            .'|gister(*:400)'
                            .'|trait(*:413)'
                        .')'
                        .'|addpartuser(*:433)'
                        .'|login_check(*:452)'
                        .'|profil(*:466)'
                        .'|compte(*:480)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:517)'
                    .'|/(?'
                        .'|d(?'
                            .'|ocs(?:\\.([^/]++))?(*:551)'
                            .'|epots(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:585)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:623)'
                                .')'
                            .')'
                        .')'
                        .'|co(?'
                            .'|ntexts/(.+)(?:\\.([^/]++))?(*:665)'
                            .'|mptes(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:699)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:737)'
                                .')'
                            .')'
                        .')'
                        .'|transactions(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:781)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:819)'
                            .')'
                        .')'
                        .'|p(?'
                            .'|rofils(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:860)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:898)'
                                .')'
                            .')'
                            .'|artenaires(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:939)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:977)'
                                .')'
                            .')'
                        .')'
                        .'|users(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1014)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1053)'
                            .')'
                        .')'
                        .'|login_check(*:1075)'
                    .')'
                .')'
                .'|/expediteur/([^/]++)(?'
                    .'|(*:1109)'
                    .'|/edit(*:1123)'
                    .'|(*:1132)'
                .')'
                .'|/profil/([^/]++)(?'
                    .'|(*:1161)'
                    .'|/edit(*:1175)'
                    .'|(*:1184)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        67 => [[['_route' => 'beneficiaire_show', '_controller' => 'App\\Controller\\BeneficiaireController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        79 => [[['_route' => 'beneficiaire_edit', '_controller' => 'App\\Controller\\BeneficiaireController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        86 => [[['_route' => 'beneficiaire_delete', '_controller' => 'App\\Controller\\BeneficiaireController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        116 => [[['_route' => 'compte_show', '_controller' => 'App\\Controller\\CompteController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        129 => [[['_route' => 'compte_edit', '_controller' => 'App\\Controller\\CompteController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        137 => [[['_route' => 'compte_delete', '_controller' => 'App\\Controller\\CompteController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        151 => [[['_route' => 'depot_new', '_controller' => 'App\\Controller\\DepotController::new'], [], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        170 => [[['_route' => 'depot_show', '_controller' => 'App\\Controller\\DepotController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        183 => [[['_route' => 'depot_edit', '_controller' => 'App\\Controller\\DepotController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        191 => [[['_route' => 'depot_delete', '_controller' => 'App\\Controller\\DepotController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        215 => [[['_route' => 'partenaire_new', '_controller' => 'App\\Controller\\PartenaireController::new'], [], ['POST' => 0], null, false, false, null]],
        234 => [[['_route' => 'partenaire_show', '_controller' => 'App\\Controller\\PartenaireController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        247 => [[['_route' => 'partenaire_edit', '_controller' => 'App\\Controller\\PartenaireController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        255 => [[['_route' => 'partenaire_delete', '_controller' => 'App\\Controller\\PartenaireController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        275 => [[['_route' => 'transaction_new', '_controller' => 'App\\Controller\\TransactionController::new'], [], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        294 => [[['_route' => 'transaction_show', '_controller' => 'App\\Controller\\TransactionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        307 => [[['_route' => 'transaction_edit', '_controller' => 'App\\Controller\\TransactionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        315 => [[['_route' => 'transaction_delete', '_controller' => 'App\\Controller\\TransactionController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        327 => [[['_route' => 'user_new', '_controller' => 'App\\Controller\\UserController::new'], [], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        346 => [[['_route' => 'user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        359 => [[['_route' => 'user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        367 => [[['_route' => 'user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        381 => [[['_route' => 'xokam', '_controller' => 'App\\Controller\\XokamController::index'], [], null, null, false, false, null]],
        400 => [[['_route' => 'register', '_controller' => 'App\\Controller\\XokamController::register'], [], ['POST' => 0], null, false, false, null]],
        413 => [[['_route' => 'retrait', '_controller' => 'App\\Controller\\XokamController::retrait'], [], ['POST' => 0], null, false, false, null]],
        433 => [[['_route' => 'add', '_controller' => 'App\\Controller\\XokamController::addpartuser'], [], ['POST' => 0], null, false, false, null]],
        452 => [[['_route' => 'login', '_controller' => 'App\\Controller\\XokamController::login'], [], ['POST' => 0], null, false, false, null]],
        466 => [[['_route' => 'profil', '_controller' => 'App\\Controller\\XokamController::addprofil'], [], ['POST' => 0], null, false, false, null]],
        480 => [[['_route' => 'compte', '_controller' => 'App\\Controller\\XokamController::addcompte'], [], ['POST' => 0], null, false, false, null]],
        517 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        551 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        585 => [
            [['_route' => 'api_depots_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_depots_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        623 => [
            [['_route' => 'api_depots_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_depots_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_depots_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        665 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        699 => [
            [['_route' => 'api_comptes_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_comptes_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        737 => [
            [['_route' => 'api_comptes_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_comptes_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_comptes_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Compte', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        781 => [
            [['_route' => 'api_transactions_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_transactions_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        819 => [
            [['_route' => 'api_transactions_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_transactions_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_transactions_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Transaction', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        860 => [
            [['_route' => 'api_profils_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profils_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        898 => [
            [['_route' => 'api_profils_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_profils_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_profils_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Profil', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        939 => [
            [['_route' => 'api_partenaires_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_partenaires_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        977 => [
            [['_route' => 'api_partenaires_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_partenaires_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_partenaires_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Partenaire', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1014 => [
            [['_route' => 'api_users_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1053 => [
            [['_route' => 'api_users_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_users_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1075 => [[['_route' => 'api_login_check'], [], null, null, false, false, null]],
        1109 => [[['_route' => 'expediteur_show', '_controller' => 'App\\Controller\\ExpediteurController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1123 => [[['_route' => 'expediteur_edit', '_controller' => 'App\\Controller\\ExpediteurController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1132 => [[['_route' => 'expediteur_delete', '_controller' => 'App\\Controller\\ExpediteurController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        1161 => [[['_route' => 'profil_show', '_controller' => 'App\\Controller\\ProfilController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1175 => [[['_route' => 'profil_edit', '_controller' => 'App\\Controller\\ProfilController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1184 => [
            [['_route' => 'profil_delete', '_controller' => 'App\\Controller\\ProfilController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
