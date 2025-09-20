<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\Pages\ViewUser;
use App\Filament\Resources\UserResource\RelationManagers\PostsRelationManager;
use App\Filament\Resources\UserResource\Schemas\UserForm;
use App\Models\User;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;

    public static function getNavigationGroup(): string
    {
        return __('admin.globals.social');
    }

    public static function getNavigationLabel(): string
    {
        return __('admin.users.users');
    }

    public static function getPluralLabel(): string
    {
        return __('admin.users.users');
    }

    public static function getLabel(): string
    {
        return __('admin.users.user');
    }

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                ->label(__('admin.globals.first_name'))
                ->searchable(),

                TextColumn::make('last_name')
                    ->label(__('admin.globals.last_name'))
                    ->searchable(),

                TextColumn::make('email')
                    ->label(__('admin.globals.email'))
                    ->searchable(),

                TextColumn::make('phone')
                    ->label(__('admin.globals.phone'))
                    ->searchable(),

                TextColumn::make('address')
                    ->label(__('admin.globals.address'))
                    ->searchable(),

                TextColumn::make('city')
                    ->label(__('admin.globals.city'))
                    ->searchable(),

                TextColumn::make('birthdate')
                    ->label(__('admin.globals.birthdate'))
                    ->date()
                    ->sortable(),

                TextColumn::make('email_verified_at')
                    ->label(__('admin.users.email_verified_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // TODO IMPLEMENT INPUT ROLES
                // TextColumn::make('roles.name')
                //     ->label(__('admin.globals.roles')),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ;
    }

    public static function getRelations(): array
    {
        return [
            PostsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'     =>  ListUsers::route('/'),
            'view'      =>  ViewUser::route('/show/{record}'),
            'create'    =>  CreateUser::route('/create'),
            'edit'      =>  EditUser::route('/{record}/edit'),
        ];
    }
}
