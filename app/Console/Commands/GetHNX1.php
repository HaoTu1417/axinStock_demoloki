<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetHNX1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hnx1:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data hnx1';
    
    protected $url = 'https://bgapidatafeed.vps.com.vn/getliststockdata/BID121028,BID122003,BID122004,BID122005,BID123002,BID123003,BID123004,BKC,BNA,BPC,BSC,BST,BTS,BTW,BVB121034,BVB122028,BVB123025,BVS,BXH,C69,CAG,CAN,CAP,CCR,CDN,CEO,CET,CIA,CII120018,CII121006,CII121029,CII42013,CII424002,CJC,CKV,CLH,CLM,CMC,CMS,CPC,CSC,CTB,CTC,CTD122015,CTG121030,CTG121031,CTG123018,CTG123019,CTG123033,CTG123034,CTP,CTT,CVN,CVT122007,CVT122008,CVT122009,CX8,D11,DAD,DAE,DC2,DDG,DHP,DHT,DIH,DL1,DNC,DNP,DP3,DPC,DS3,DST,DTC,DTD,DTG,DTK,DVG,DVM,DXP,EBS,ECI,EID,EVS,FDT,FID,GDW,GEG121022,GIC,GKM,GLH121019,GLH121026,GLT,GMA,GMX,HAD,HAT,HBS,HCC,HCT,HDA,HDG121001,HEV,HGM,HHC,HJS,HKT,HLC,HLD,HMH,HMR,HOM,HTC,HTP,HUT,HVT,ICG,IDC,IDJ,IDV,INC,INN,IPA,ITQ,IVS,KBC121020,KDM,KHS,KKC,KMT,KSD,KSF,KSQ,KST,KSV,KTS,KTT,L14,L18,L40,L43,L61,L62,LAS,LBE,LCD,LDP,LHC,LIG,LPB121035,LPB121036,LPB122010,LPB122011,LPB122012,LPB122013,LPB123015,LPB123016,MAC,MAS,MBG,MBS,MCC,MCF,MCO,MDC,MED,MEL,MHL,MKV,MML121021,MSC,MSN120007,MSN120008,MSN120009,MSN12001,MSN120010,MSN120011,MSN120012,MSN12002,MSN12003,MSN12005,MSN121013,MSN121014,MSN121015,MSN123008,MSN123009,MSN123010,MSN123014,MSR11808,MST,MVB,NAG,NAP,NBC,NBP,NBW,NDN,NDX,NET,NFC,NHC,NPM11907,NPM11910,NPM11911,NPM123021,NPM123022,NPM123023,NPM123024,NRC,NSH,NST,NTH,NTP,NVB,NVL122001,OCH,ONE,PBP,PCE,PCG,PCH,PCT,PDB,PEN,PGN,PGS,PGT,PHN,PIA,PIC,PJC,PLC,PMB,PMC,PMP,PMS,POT,PPE,PPP,PPS,PPT,PPY,PRC,PRE,PSC,PSD,PSE,PSI,PSW,PTD,PTI,PTS,PV2,PVB,PVC,PVG,PVI,PVS,QHD,QST,QTC,RCL,S55,S99,SAF,SBT121002,SCG,SCI,SD5,SD6,SD9,SDA,SDC,SDG,SDN,SDU,SEB,SED,SFN,SGC,SGD,SGH,SHE,SHN,SHS,SHT119008,SJ1,SJE,SLS,SMN,SMT,SPC,SPI,SRA,SSM,STC,STP,SVN,SZB,TA9,TAR,TBX,TC6,TDN,TDT,TET,TFC,THB,THD,THS,THT,TIG,TJC,TKG,TKU,TMB,TMC,TMX,TN1122016,TNG,TNG119007,TNG122017,TOT,TPH,TPP,TSB,TTC,TTH,TTL,TTT,TV3,TV4,TVC,TVD,TXM,UNI,V12,V21,VBA121033,VBA122001,VBB122033,VBC,VC1,VC2,VC3,VC6,VC7,VC9,VCC,VCM,VCS,VDL,VE1,VE3,VE4,VE8,VFS,VGP,VGS,VHE,VHL,VHM121024,VHM121025,VIC121003,VIC121004,VIC121005,VIC123028,VIC123029,VIF,VIG,VIT,VLA,VMC,VMS,VNC,VND122012,VND122013,VND122014,VNF,VNG122002,VNR,VNT,VNT421032,VRE12007,VSA,VSM,VTC,VTH,VTJ,VTV,VTZ,WCS,WSS,X20';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        while (true) {
            if (date('D') != 'Sat' && date('D') != 'Sun') {
                $isRun = true;
                if(date('H') < 9 || date('H') > 15){
                    $isRun = false;
                }
                else if(date('H') >= 9 && date('H') <= 11){
                    if(date('i') > 30){
                        $isRun = false;
                    }
                }
                else if(date('H') == 12){
                    $isRun = false;
                }
                else if(date('H') >= 13 && date('H') <= 15){
                    $isRun = true;
                }
                else{
                    $isRun = false;
                }
                if($isRun){
                                  $dataStockEdit = DB::table('stocks')->where('status_update','1')->pluck('stock');

                    $dataStock = Http::get($this->url);
                    if ($dataStock->successful()) {
                        $data = $dataStock->json();
                        
                        foreach ($data as $item){
                            if (!in_array($item['sym'], $dataStockEdit)) {
                                Redis::set('HNX_'.$item['sym'], json_encode($item));    
                            }
                        }
                    }
                }
            }
            sleep(1);
        }
    }
}
