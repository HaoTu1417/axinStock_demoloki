<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetHose1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hose1:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data hose1';
    
    protected $url = 'https://bgapidatafeed.vps.com.vn/getliststockdata/BHN,BIC,BID,BKG,BMC,BMI,BMP,BRC,BSI,BTP,BTT,BVH,BWE,C32,C47,CAV,CCI,CCL,CDC,CHP,CIG,CII,CKG,CLC,CLL,CLW,CMG,CMV,CMX,CNG,COM,CRC,CRE,CSM,CSV,CTD,CTF,CTG,CTI,CTR,CTS,CVT,D2D,DAG,DAH,DAT,DBC,DBD,DBT,DC4,DCL,DCM,DGC,DGW,DHA,DHC,DHG,DHM,DIG,DLG,DMC,DPG,DPM,DPR,DQC,DRC,DRH,DRL,DSN,DTA,DTL,DTT,DVP,DXG,DXS,DXV,EIB,ELC,EMC,EVE,EVF,EVG,FCM,FCN,FDC,FIR,FIT,FMC,FPT,FRT,FTS,GAS,GDT,GEG,GEX,GIL,GMC,GMD,GMH,GSP,GTA,GVR,HAG,HAH,HAP,HAR,HAS,HAX,HBC,HCD,HCM,HDB,HDC,HDG,HHP,HHS,HHV,HID,HII,HMC,HNA,HNG,HPG,HPX,HQC,HRC,HSG,HSL,HT1,HTG,HTI,HTL,HTN,HTV,HU1,HUB,HVH,HVN,HVX,ICT,IDI,IJC,ILB,IMP,ITA,ITC,ITD,JVC,KBC,KDC,KDH,KHG,KHP,KMR,KOS,KPF,KSB,L10,LAF,LBM,LCG,LDG,LEC,LGC,LGL,LHG,LIX,LM8,LPB,LSS,MBB,MCP,MDG,MHC,MIG,MSB,MSH,MSN,MWG,NAB,NAF,NAV,NBB,NCT,NHA,NHH,NHT,NKG,NLG,NNC,NO1,NSC,NT2,NTL,NVL,NVT,OCB,OGC,OPC,ORS,PAC,PAN,PC1,PDN,PDR,PET,PGC,PGD,PGI,PGV,PHC,PHR,PIT,PJT,PLP,PLX,PMG,PNC,PNJ,POM,POW,PPC,PSH,PTB,PTC,PTL,PVD,PVP,PVT,QBS,QCG,QNP,RAL,RDP,REE,ROS,S4A,SAB,SAM,SAV,SBA,SBG,SBT,SBV,SC5,SCD,SCR,SCS,SFC,SFG,SFI,SGN,SGR,SGT,SHA,SHB,SHI,SHP,SIP,SJD,SJF,SJS,SKG,SMA,SMB,SMC,SPM,SRC,SRF,SSB,SSC,SSI,ST8,STB,STG,STK,SVC,SVD,SVI,SVT,SZC,SZL,TBC,TCB,TCD,TCH,TCI,TCL,TCM,TCO,TCR,TCT,TDC,TDG,TDH,TDM,TDP,TDW,TEG,THG,THI,TIP,TIX,TLD,TLG,TLH,TMP,TMS,TMT,TN1,TNA,TNC,TNH,TNI,TNT,TPB,TPC,TRA,TRC,TSC,TTA,TTE,TTF,TV2,TVB,TVS,TVT,TYA,UIC,VAF,VCA,VCB,VCF,VCG,VCI,VDP,VDS,VFG,VGC,VHC,VHM,VIB,VIC,VID,VIP,VIX,VJC,VMD,VND,VNE,VNG,VNL,VNM,VNS,VOS,VPB,VPD,VPG,VPH,VPI,VPS,VRC,VRE,VSC,VSH,VSI,VTB,VTO,VTP,YBM,YEG';

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
                            Redis::set('HOSE_'.$item['sym'], json_encode($item));    
                              }
                        }
                    }
                }
            }
            sleep(1);
        }
    }
}
