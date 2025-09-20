<?php

namespace App\Filament\Resources\UserResource\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->label(__('admin.globals.first_name'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->label(__('admin.globals.last_name'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label(__('admin.globals.email'))
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label(__('admin.globals.phone'))
                    ->tel()
                    ->maxLength(50),

                TextInput::make('address')
                    ->label(__('admin.globals.address'))
                    ->required()
                    ->maxLength(150),

                TextInput::make('city')
                    ->label(__('admin.globals.city'))
                    ->maxLength(50),

                TextInput::make('country')
                    ->label(__('admin.globals.country'))
                    ->maxLength(50),

                TextInput::make('postal_code')
                    ->label(__('admin.globals.postal_code')),

                DatePicker::make('birthdate')
                    ->label(__('admin.globals.birthdate')),

                TextInput::make('password')
                    ->label(__('admin.globals.password'))
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->visible(fn ($record) => blank($record?->id)),

                // TODO IMPLEMENT INPUT ROLES
                // Select::make('roles')
                // ->label(__('admin.globals.roles'))
                // ->required()
                // ->relationship('roles', 'name'),
            ]);
    }
}
