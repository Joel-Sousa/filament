<?php

namespace App\Filament\Resources\Tst1Resource\Pages;

use App\Filament\Resources\Tst1Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTst1 extends CreateRecord
{
    protected static string $resource = Tst1Resource::class;

            // $data['date'] = Carbon::createFromFormat('d/m/Y H:i:s', $data['date'])->format('Y-m-d H:i:s');

}
