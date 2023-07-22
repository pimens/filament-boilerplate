<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Phpsa\FilamentPasswordReveal\Password;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\HtmlString;
use XliteDev\FilamentImpersonate\Tables\Actions\ImpersonateAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('username')
                        ->required()
                        ->maxLength(255),
                    Password::make('password')->autocomplete('new_password')->minLength(8)
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn ($state) => !empty($state) ? Hash::make($state) : "")
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn (Page $livewire) => ($livewire instanceof CreateRecord)),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->unique(ignorable: fn ($record) => $record)
                        ->maxLength(255),
                    Forms\Components\Select::make('roles')
                        ->multiple()
                        ->relationship('roles', 'name')
                        ->preload()
                        ->label('Roles'),
                    Forms\Components\Toggle::make('status')->default(1)->inline(false)
                        ->required()
                        ->helperText('Status aktif tidaknya akun pengguna'),
                    Forms\Components\Textarea::make('alamat')
                        ->required()
                        ->maxLength(65535)
                        ->columnSpan([
                            'sm' => 2,
                        ]),
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),



            ])
            ->columns([
                'sm' => 3,
                'lg' => null,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                // Tables\Columns\TextColumn::make('username')
                //     ->sortable()
                //     ->toggleable()
                //     ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TagsColumn::make('roles.name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at','desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                ImpersonateAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
