<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'ministerio' => [
        'title' => 'Ministerios',

        'actions' => [
            'index' => 'Ministerios',
            'create' => 'New Ministerio',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'lider' => 'Lider',
            'colider' => 'Colider',
            
        ],
    ],

    'curso' => [
        'title' => 'Cursos',

        'actions' => [
            'index' => 'Cursos',
            'create' => 'New Curso',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'membro' => [
        'title' => 'Membros',

        'actions' => [
            'index' => 'Membros',
            'create' => 'New Membro',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'data_nascimento' => 'Data nascimento',
            'celular' => 'Celular',
            'endereco' => 'Endereco',
            'estado_civil' => 'Estado civil',
            'batizado' => 'Batizado',
            'lider' => 'Lider',
            'pastor' => 'Pastor',
            'personalidade' => 'Personalidade',
            'linguagem_amor' => 'Linguagem amor',
            'enabled' => 'Enabled',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];