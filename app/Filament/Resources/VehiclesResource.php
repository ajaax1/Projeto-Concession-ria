<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehiclesResource\Pages;
use App\Filament\Resources\VehiclesResource\RelationManagers;
use App\Models\User;
use App\Models\Vehicles;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class VehiclesResource extends Resource
{
    protected static ?string $model = Vehicles::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->live(debounce:'1000')
                    ->afterStateUpdated(fn(Set $set,?string $state)=> $set ('slug',Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(Vehicles::class,'slug',ignoreRecord:true)
                    ->dehydrated(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->prefix('$'),
                Select::make('brand')
                ->options([
                    'Toyota' => 'Toyota',
                    'Volkswagen' => 'Volkswagen',
                    'Ford' => 'Ford',
                    'Honda' => 'Honda',
                    'General Motors' => 'General Motors',
                    'Nissan' => 'Nissan',
                    'BMW' => 'BMW',
                    'Mercedes-Benz' => 'Mercedes-Benz',
                    'Audi' => 'Audi',
                    'Hyundai' => 'Hyundai',
                    'Kia' => 'Kia',
                    'Fiat Chrysler' => 'Fiat Chrysler',
                    'Subaru' => 'Subaru',
                    'Peugeot' => 'Peugeot',
                    'Volvo' => 'Volvo',
                    'Tesla' => 'Tesla',
                    'Land Rover' => 'Land Rover',
                    'Mazda' => 'Mazda',
                    'Mitsubishi' => 'Mitsubishi',
                    'Porsche' => 'Porsche',
                    'Chevrolet' => 'Chevrolet',
                    'Yamaha'=>'Yamaha'
                ])
                    ->required(),
                Select::make('type')
                ->options([
                    'Car' => 'Car',
                    'Motorcycle' => 'Motorcycle',
                    'Truck' => 'Truck',
                ])
                    ->required(),
                Forms\Components\TextInput::make('year')
                    ->numeric()
                    ->required()
                    ->mask('9999'),
                Forms\Components\TextInput::make('mileage')
                    ->required()
                    ->numeric()
                    ->suffix('KM'),
                Select::make('fuel')
                    ->options([
                        'Electric' => 'Electric',
                        'Diesel' => 'Diesel',
                        'Ethanol' => 'Ethanol',
                        'Gasoline' => 'Gasoline',
                        'Flex' => 'Flex'
                    ])
                    ->required(),
                Select::make('users_id')
                    ->label('Create by')
                    ->options(User::all()->pluck('name','id'))
                    ->required(),
                Select::make('condition')
                    ->options([
                        'used' => 'Used',
                        'new' => 'New',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                CheckboxList::make('characteristics')
                    ->options([
                        'Air bag' => 'Air bag',
                        'Alarm' => 'Alarm',
                        'Air conditioning' => 'Air conditioning',
                        'Power lock' => 'Power lock',
                        'Power window' => 'Power window',
                        'Sound system' => 'Sound system',
                        'Reverse sensor' => 'Reverse sensor',
                        'Reverse camera' => 'Reverse camera',
                        'Armored' => 'Armored',
                    ])
                    ->columns(2)
                    ->gridDirection('row'),
                FileUpload::make('image')
                    ->directory('images')
                    ->image()
                    ->imageEditor()
                    ->imageEditorViewportWidth('1920')
                    ->imageEditorViewportHeight('1080'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->sortable(),
                Tables\Columns\TextColumn::make('mileage')
                    ->sortable(),
                Tables\Columns\TextColumn::make('fuel')
                    ->searchable(),
                Tables\Columns\TextColumn::make('condition')
                    ->searchable(),
                Tables\Columns\TextColumn::make('characteristics')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('users_id')
                    ->searchable(),
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicles::route('/create'),
            'edit' => Pages\EditVehicles::route('/{record}/edit'),
        ];
    }
}
