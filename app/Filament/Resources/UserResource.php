<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\Pages\ViewUser;
use App\Filament\Resources\UserResource\RelationManagers\PostsRelationManager;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    public static function getNavigationGroup(): string
    {
        return __('admin.globals.social');
    }

    public static function getNavigationLabel(): string
    {
        return __('admin.users.users');
    }

    public static function getSlug(): string
    {
        return 'users';
    }

    public static function getPluralLabel(): string
    {
        return __('admin.users.users');
    }

    public static function getLabel(): string
    {
        return __('admin.users.user');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                    ->visible(fn (User $user): bool => empty($user->id)),

                // TODO IMPLEMENT INPUT ROLES

                // Select::make('roles')
                // ->label(__('admin.globals.roles'))
                // ->required()
                // ->relationship('roles', 'name'),
            ]);
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
                    ->label(__('admin.globals.first_name'))
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
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                ViewAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
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
