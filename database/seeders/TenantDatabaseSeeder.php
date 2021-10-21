<?php

namespace Database\Seeders;


use App\Models\Tenant\Role;
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class TenantDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        ini_set('max_input_time', 60 * 5);
//        ini_set('max_execution_time', 60 * 5);
//        ini_set('default_socket_timeout', 60 * 5);
//        ini_set('exit_on_timeout', 60 * 5);
//        ini_set('mysql.connect_timeout', 60 * 5);
        $this->createRoles();
        $this->createNationalites();
        $this->createUsers();
        $this->createUniteOfMesure();
        $this->createBaseCategories();
//        (new \App\Models\Tenant([
//            'slug' => 'stock_test_1',
//            'display' => 'test', 'descri' => 'test', 'tel1' => '774659453',
//            'tel2' => '774659453', 'adresse' => 'hlm', 'mail' => 'a@gmail.com']))->save();
        Artisan::call('passport:install', [
            '--tenant' => config('app.tenant_id'),
        ]);
    }

    public function createRoles()
    {
        $roles = [
            [
                'nom' => 'super administrateur',
                'description' => 'Utilisateur disposant d\'acces ilimites',
                'active' => 1
            ],
            [
                'nom' => 'administrateur',
                'description' => 'Propietaire du systeme',
                'active' => 1
            ],
            [
                'nom' => 'gerant',
                'description' => 'Utilisateur interne au accees limites',
                'active' => 1
            ],
            [
                'nom' => 'utilisateur',
                'description' => 'Utilisateur externe',
                'active' => 1
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role)->save();
        }
    }

    private function createNationalites()
    {

        DB::connection('tenant')->insert(\Storage::disk('local')->get('sql/nationalites.sql'));
    }


    private function createUsers()
    {
        \App\Models\Tenant\Personne::create([
            'nom' => "ADMIN ADMIN",
            'date_de_naiss' => null,
            'cni' => null,
            'contact_1' => null,
            'sexe' => null,
            'email' => null,
            'contact_2' => null,
            'adresse_1' => null,
            'adresse_2' => null,
        ])->user()->create([
            'username' => "ADMIN",
            'password' => Hash::make('admin'),
        ])->roles()->attach(\App\Models\Tenant\Role::where('slug', 'ADMINISTRATEUR')->firstOrFail()->id);
        \App\Models\Tenant\Personne::create([
            'nom' => "MUBAYTECH",
            'date_de_naiss' => null,
            'cni' => null,
            'contact_1' => null,
            'sexe' => null,
            'email' => null,
            'contact_2' => null,
            'adresse_1' => null,
            'adresse_2' => null,
        ])->user()->create([
            'username' => "MUBAYTECH",
            'password' => Hash::make('mubaytech'),
        ])->roles()->attach(\App\Models\Tenant\Role::where('slug', 'SUPER_ADMINISTRATEUR')->firstOrFail()->id);
    }

    public function createUniteOfMesure()
    {

        $nodes = [
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'quantite',
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'longueur',
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'largeur',
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'diametre',
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'epaisseur',
            ]), new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'poids',
            ]), new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'volume',
            ]),

        ];

        foreach ($nodes as $node) {
            $node->save();
        }

        $nodes = [
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'millimetre long',
                'symbole' => 'mm',
                'parent_id' => 2,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'centimetre long',
                'symbole' => 'cm',
                'parent_id' => 2,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'pouce long',
                'symbole' => 'po',
                'parent_id' => 2,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'metre long',
                'symbole' => 'm',
                'parent_id' => 2,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'millimetre lar',
                'symbole' => 'mm',
                'parent_id' => 3,
            ]), new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'centimetre lar',
                'symbole' => 'cm',
                'parent_id' => 3,
            ]),

            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'pouce lar',
                'symbole' => 'po',
                'parent_id' => 3,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'metre lar',
                'symbole' => 'm',
                'parent_id' => 3,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'millimetre diam',
                'symbole' => 'mm',
                'parent_id' => 4,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'centimetre diam',
                'symbole' => 'cm',
                'parent_id' => 4,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'pouce diam',
                'symbole' => 'po',
                'parent_id' => 4,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'metre diam',
                'symbole' => 'm',
                'parent_id' => 4,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'jauge epa',
                'symbole' => 'jau',
                'parent_id' => 5,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'millimetre epa',
                'symbole' => 'mm',
                'parent_id' => 5,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'gram poi',
                'symbole' => 'g',
                'parent_id' => 6,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'killogram poi',
                'symbole' => 'kg',
                'parent_id' => 6,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'livres poi',
                'symbole' => 'lb',
                'parent_id' => 6,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'millilitre vol',
                'symbole' => 'ml',
                'parent_id' => 7,
            ]),
            new  \App\Models\Tenant\UnitesDeMesure([
                'nom' => 'litre vol',
                'symbole' => 'l',
                'parent_id' => 7,
            ]),

        ];
        foreach ($nodes as $node) {
            $node->save();
        }


    }

    private function createBaseCategories()
    {
        \App\Models\Tenant\Categorie::reguard();
        $ca =
            [
                [
                    "nom" => "VEHICULE",
                    "description" => "",
                    "children" => [
                        [
                            "nom" => "VOITURE",
                            "description" => "",
                        ],
                        [
                            "nom" => "CAR & CAMION",
                            "description" => "",
                        ],
                        [
                            "nom" => "MOTO & SCOOTER",
                            "description" => "",
                        ],
                        [
                            "nom" => "EQUIPEMENT & PIECE",
                            "description" => "",
                        ],
                        [
                            "nom" => "BATEAU",
                            "description" => "",
                        ]
                    ]
                ],
                [
                    "nom" => "DOMESTIQUE",
                    "description" => "",
                    "children" => [
                        [
                            "nom" => "ELECTROMENAGER",
                            "description" => "",
                        ],
                        [
                            "nom" => "MICRO-ONDE",
                            "description" => "",
                        ],
                        [
                            "nom" => "MACHINE A  LAVER",
                            "description" => "",
                        ],
                        [
                            "nom" => "CUISINIERE ET FOUR",
                            "description" => "",
                        ],
                        [
                            "nom" => "FRIGIDAIRE & CONGELATEUR",
                            "description" => "",
                        ],
                        [
                            "nom" => "CLIMATISATION",
                            "description" => "",
                        ],
                        [
                            "nom" => "MACHINE A CAFE",
                            "description" => "",
                        ],
                        [
                            "nom" => "AUTRE ELECTROMENAGER",
                            "description" => "",
                        ],
                        [
                            "nom" => "VAISSELLE",
                            "description" => "",
                        ],
                        [
                            "nom" => "MOBILIER",
                            "description" => "",
                        ],
                        [
                            "nom" => "TABLE",
                            "description" => "",
                        ],
                        [
                            "nom" => "CANAPE",
                            "description" => "",
                        ],
                        [
                            "nom" => "FAUTEUIL",
                            "description" => "",
                        ],
                        [
                            "nom" => "ARMOIRE",
                            "description" => "",
                        ],
                        [
                            "nom" => "RANGEMENT",
                            "description" => "",
                        ],
                        [
                            "nom" => "MOBILIER DE BUREAU",
                            "description" => "",
                        ],
                        [
                            "nom" => "AUTRE MOBILIER",
                            "description" => "",
                        ],
                        [
                            "nom" => "DECORATION",
                            "description" => "",
                        ]
                    ]
                ],
                [
                    "nom" => "IMMOBILIER",
                    "description" => "",
                    "children" => [
                        [
                            "nom" => "AUTRE",
                            "description" => "",
                        ],
                        [
                            "nom" => "MAISON",
                            "description" => "",
                        ],
                        [
                            "nom" => "APPARTEMENT",
                            "description" => "",
                        ],
                        [
                            "nom" => "CHAMBRE",
                            "description" => "",
                        ],
                        [
                            "nom" => "TERRAIN",
                            "description" => "",
                        ],
                        [
                            "nom" => "APPARTEMENT MEUBLE",
                            "description" => "",
                        ],
                        [
                            "nom" => "IMMEUBLE",
                            "description" => "",
                        ]
                    ]
                ],
                [
                    "nom" => "MULTIMEDIA",
                    "description" => "",
                    "children" => [
                        [
                            "nom" => "ORDINATEUR",
                            "description" => "",
                        ],
                        [
                            "nom" => "TELEPHONE & TABLETTE",
                            "description" => "",
                        ],
                        [
                            "nom" => "TV & HOME CINEMA",
                            "description" => "",
                        ],
                        [
                            "nom" => "APPAREIL PHOTO",
                            "description" => "",
                        ],
                        [
                            "nom" => "EQUIPEMENT AUDIO ET VIDEO",
                            "description" => "",
                        ],
                        [
                            "nom" => "IMPRIMENTE ET PHOTOCOPIEUR",
                            "description" => "",
                        ],
                        [
                            "nom" => "ACCESSOIRE MULTIMEDIA",
                            "description" => "",
                        ],
                        [
                            "nom" => "JEUX VIDEO",
                            "description" => "",
                        ],
                        [
                            "nom" => "Consoles",
                            "description" => "",
                        ]
                    ]
                ],
                [
                    "nom" => "VESTIMENTAIRE",
                    "description" => "",
                    "children" => [
                        [
                            "nom" => "VETEMENT HOMME",
                            "description" => "",
                        ],
                        [
                            "nom" => "VETEMENT FEMME",
                            "description" => "",
                        ],
                        [
                            "nom" => "CHAUSSURE HOMME",
                            "description" => "",
                        ],
                        [
                            "nom" => "CHAUSSURE FEMME",
                            "description" => "",
                        ]
                    ]
                ],
                [
                    "nom" => "LOISIRS",
                    "description" => "",
                    "children" => [
                        [
                            "nom" => "INSTRUMENT DE MUSIQUE",
                            "description" => "",
                        ],
                        [
                            "nom" => "MATERIEL DE SPORT",
                            "description" => "",
                        ],
                        [
                            "nom" => "CD/DVD ET LIVRE",
                            "description" => "",
                        ]
                    ]
                ],
                [
                    "nom" => "MATERIAUX & EQUIPEMENTS",
                    "description" => "",
                    "children" => [
                        [
                            "nom" => "EQUIPEMENT MEDICAL",
                            "description" => "",
                        ],
                        [
                            "nom" => "MATERIEL DE CONTRUCTION",
                            "description" => "",
                        ],
                        [
                            "nom" => "EQUIPEMENT DE RESTAURATION",
                            "description" => "",
                        ],
                        [
                            "nom" => "ENERGIE ET GROUPE ELECTROGENE",
                            "description" => "",
                        ],
                        [
                            "nom" => "MATERIEL PRO",
                            "description" => "",
                        ]
                    ]
                ],
                [
                    "nom" => "ANIMAUX",
                    "description" => "",
                    "children" => [
                        [
                            "nom" => "CHIEN",
                            "description" => "",
                        ]
                    ]
                ]
            ];
        \App\Models\Tenant\Categorie::createFromArray($ca);
    }

}
