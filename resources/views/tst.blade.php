{{-- <x-filament-panels::page> --}}

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    {{-- toto: {{ $data[0]['tst'] ?? 'SN' }} --}}
    {{-- toto: {{$data['tst'] ?? 'SN'}} --}}
    toto: {{dd($data) ?? 'SN'}}

    {{-- toto:  --}}
    {{-- </x-filament-panels::page> --}}
    tst
</body>

</html>
