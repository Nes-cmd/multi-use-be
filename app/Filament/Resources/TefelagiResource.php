<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TefelagiResource\Pages;
use App\Filament\Resources\TefelagiResource\RelationManagers;
use App\Models\Tefelagi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TefelagiResource extends Resource
{
    protected static ?string $model = Tefelagi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('name')->required()->maxLength(255),
                    Forms\Components\Toggle::make('found'),
                    Forms\Components\FileUpload::make('image')->image()->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                // Tables\Columns\TextColumn::make('supections')->searchable(),
                Tables\Columns\IconColumn::make('found')->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\Section::make([
                Infolists\Components\Grid::make()->schema([
                    Infolists\Components\ImageEntry::make('image'),
                    Infolists\Components\TextEntry::make('name'),
                    Infolists\Components\IconEntry::make('found')->boolean(),
                ])->columns(3),
                Infolists\Components\ImageEntry::make('supections'),
            ])
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
            'index' => Pages\ListTefelagis::route('/'),
            'create' => Pages\CreateTefelagi::route('/create'),
            'edit' => Pages\EditTefelagi::route('/{record}/edit'),
            'view' => Pages\ViewTefelagi::route('/{record}'),
        ];
    }
}
