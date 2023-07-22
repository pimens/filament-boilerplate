<x-filament::page>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
 
<div class="relative overflow-x-auto">
    <input wire:model='query' wire:change='cari()' class="mb-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Pencarian Data Dasar">
    <div style="overflow-y: scroll; height:400px;">

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Deskripsi Data Dasar
                </th>
                <th scope="col" class="px-6 py-3">
                    OPD
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataDasar as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->id}}
                </th>
                <td class="px-6 py-4">
                    {{$item->deskripsi}}

                </td>
                <td class="px-6 py-4">
                    {{$item->opd->nama_opd}}

                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    </div>
</div>


    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <div class="m-5" style="margin-top:30px">
            <x-forms::button type="submit" class="">
                Simpan
            </x-forms::button>
        </div>
    </form>
</x-filament::page>