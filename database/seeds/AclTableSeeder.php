<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
use \App\Entities\StockCategory;
use \Silber\Bouncer\Database\Role;
use \Silber\Bouncer\Database\Ability;

class AclTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRuver = User::find(1);
        $userReginaldo = User::find(2);
        $userJonathan = User::find(3);

        $super = Bouncer::role()->create([
            'name' => 'super',
            'title' => 'Super Administrator',
        ]);

        $admin = Bouncer::role()->create([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);

        $user = Bouncer::role()->create([
            'name' => 'user',
            'title' => 'Usuário comum',
        ]);

        $requested = Bouncer::role()->create([
            'name' => 'requested',
            'title' => 'Usuário Solicitante',
        ]);

        $create = Bouncer::ability()->create([
            'name' => 'store.category.create',
            'title' => 'Criar categoria do estoque',
            'entity_type' => StockCategory::class
        ]);

        $edit = Bouncer::ability()->create([
            'name' => 'store.category.edit',
            'title' => 'Editar categoria do estoque',
            'entity_type' => StockCategory::class
        ]);

        $delete = Bouncer::ability()->create([
            'name' => 'store.category.delete',
            'title' => 'Apagar categoria do estoque',
            'entity_type' => StockCategory::class
        ]);

        $view = Bouncer::ability()->create([
            'name' => 'store.category.view',
            'title' => 'Visualizar categoria do estoque',
            'entity_type' => StockCategory::class
        ]);

        Bouncer::allow($super)->everything();
        Bouncer::allow($admin)->to([$create,$edit,$delete,$view]);
        Bouncer::allow($user)->to([$view]);

        Bouncer::assign($super)->to($userRuver);
        Bouncer::assign($user)->to($userReginaldo);
        Bouncer::assign($user)->to($userJonathan);

        Bouncer::disallow($userJonathan)->to($view);
        Bouncer::allow($userReginaldo)->to($edit);

//        $roleAdmin = Defender::createRole('Administrador');
//        $roleUser = Defender::createRole('Usuário');
//        $roleRequested = Defender::createRole('Solicitante');
//
//        $stockCategoriesCreate = Defender::createPermission('store.category.create', 'Criar categorias do estoque');
//        $stockCategoriesUpdate = Defender::createPermission('store.category.update', 'Atualizar categorias do estoque');
//        $stockCategoriesDelete = Defender::createPermission('store.category.delete', 'Deletar categorias do estoque');
//        $stockCategoriesView   = Defender::createPermission('store.category.view', 'Visualizar categorias do estoque');
//
//        $userRuver = User::find(1);
//        $userReginaldo = User::find(2);
//
//        $roleAdmin->attachPermission($stockCategoriesCreate);
//        $roleAdmin->attachPermission($stockCategoriesUpdate);
//        $roleAdmin->attachPermission($stockCategoriesDelete);
//        $userRuver->attachRole($roleAdmin);
//        $userReginaldo->attachRole($roleUser);
//        $userReginaldo->attachPermission($stockCategoriesView);
    }
}
