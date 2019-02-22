<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('ProdutoTableSeeder');
    }
}

class ProdutoTableSeeder extends Seeder {

    public function run() {
        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?, ?, ?, ?)',
                    array('Geladeira', 2, 5900.00, 'Side by Side com gelo na porta'));

        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?, ?, ?, ?)',
            array('Fogão', 5, 950.00, 'Painel automático e forno elétrico'));

        DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?, ?, ?, ?)',
            array('Micro-ondas', 1, 1520.00, 'Manda SMS quanto termina de esquentar'));
    }
}