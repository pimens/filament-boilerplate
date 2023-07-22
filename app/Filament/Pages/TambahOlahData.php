<?php

namespace App\Filament\Pages;

use App\Models\BidangUrusan;
use App\Models\DataDasar;
use App\Models\Olahan;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

use Illuminate\Contracts\View\View;
use Filament\Forms;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Auth;

    use Forms\Concerns\InteractsWithForms;
class TambahOlahData extends Page
{
    use HasPageShield;
    protected static ?string $navigationIcon = 'heroicon-o-plus-circle';
    protected static string $view = 'filament.pages.olah-data';
    protected static bool $shouldRegisterNavigation = true;
    public $dataDasar,$query;
    public function mount(): void
    {
        $this->dataDasar = DataDasar::get();
        $this->form->fill();
    }
    public function cari(): void
    {
        $this->dataDasar = DataDasar::where('deskripsi', 'like', '%'.$this->query.'%')->get();
    }
    protected function getActions(): array
    {
        return [
            // Action::make('submit')->action('submitttt'),
        ];
    }
    public function getUrusan(){
        $options = [];
        if(!auth()->user()->hasRole('super_admin')){
            $bidang = BidangUrusan::where('opd_id', auth()->user()->opd_id)->get();
        }else{
            $bidang = BidangUrusan::get();
        }
        foreach($bidang as $item){
            $options [$item->id] = $item->nama_urusan.'-'.$item->opd->nama_opd;
        }
        return $options;
    }
    protected function getFormSchema(): array
    {
        return [
            Card::make()
            ->schema([    
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Select::make('bidang_urusan_id')
                    ->options(function(){
                        $urusan = self::getUrusan();
                        return $urusan;
                    })
                    ->label('Bidang Urusan')
                    ->placeholder('Pilih Bidang Urusan')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('rumus')
                    ->required()
                    ->maxLength(255),
            ])
        ];
    }
    public function hitung($rumus)
    {
        $data = explode(':',$rumus);
                
        // dd($data);
        for($i=0;$i<count($data);$i++){
            
            $this->cekKonstanta($data[$i]);

        }
      

    }
    public function cekKonstanta($rumus)
    {
        $data = str_split($rumus);
        if($data[0]=='*' && count($data)>1){
            return true;
        }
        return false;
    }
    public function submit(): void
    {
        $var = $this->form->getState();
        // dd($var['rumus']);
        $olah = new Olahan();
        $olah->opd_id = auth()->user()->opd_id;
        $olah->rumus = $var['rumus'];
        $olah->deskripsi = $var['deskripsi'] ?? '';
        $olah->bidang_urusan_id = $var['bidang_urusan_id'] ?? '';
        $olah->judul = $var['judul'];
        $this->hitung($var['rumus']);
        $olah->save();
        
        Notification::make()
        ->title('Saved successfully')
        ->success()
        ->send();
    }
}


