<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make()->columnSpanFull()->schema([
                    TextInput::make('name')
                        ->label(__('admin.users.fields.name'))
                        ->required(),
                    TextInput::make('email')
                        ->label(__('admin.users.fields.email'))
                        ->email()
                        ->required(),
                    TextInput::make('password')
                        ->label(__('admin.users.fields.password'))
                        ->password()
                        ->required(),
                ])
            ]);
    }
}
