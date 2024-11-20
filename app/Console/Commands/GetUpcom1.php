<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetUpcom1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upcom1:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data upcom1';
    
    protected $url = 'https://bgapidatafeed.vps.com.vn/getliststockdata/ATD,ATG,AUM,AVC,AVF,B82,BAL,BBH,BBM,BBT,BCA,BCB,BCO,BCP,BCR,BCV,BDC,BDG,BDP,BDT,BDW,BEL,BGW,BHA,BHC,BHG,BHI,BHK,BHP,BHT,BHV,BIG,BII,BIO,BLF,BLI,BLN,BLT,BLW,BM9,BMD,BMF,BMG,BMJ,BMN,BMS,BMV,BNW,BOT,BQB,BRR,BRS,BSA,BSD,BSG,BSH,BSL,BSP,BSQ,BSR,BT1,BT6,BTB,BTC,BTD,BTG,BTH,BTN,BTU,BTV,BVB,BVG,BVL,BVN,BWA,BWS,C12,C21,C22,C36,C4G,C92,CAB,CAD,CAM,CAR,CAT,CBC,CBI,CBS,CC1,CC4,CCA,CCM,CCP,CCT,CCV,CDG,CDH,CDO,CDP,CDR,CE1,CEG,CEN,CFM,CFV,CGL,CGV,CH5,CHC,CHS,CI5,CID,CIP,CK8,CKA,CKD,CLG,CLX,CMD,CMF,CMI,CMK,CMM,CMN,CMP,CMT,CMW,CNA,CNC,CNN,CNT,CPA,CPH,CPI,CQN,CQT,CSI,CST,CT3,CT6,CTA,CTN,CTW,CTX,CVC,CVH,CVP,CXH,CYC,D17,DAC,DAN,DAR,DAS,DBM,DC1,DCF,DCG,DCH,DCR,DCS,DCT,DDH,DDM,DDN,DDV,DFC,DFF,DFS,DGT,DHB,DHD,DHN,DIC,DID,DKC,DKH,DKP,DLD,DLM,DLR,DLT,DM7,DMN,DMS,DNA,DNB,DND,DNE,DNH,DNL,DNM,DNN,DNT,DNW,DNY,DOC,DOP,DP1,DP2,DPH,DPP,DPS,DRG,DRI,DSC,DSD,DSG,DSP,DSV,DT4,DTB,DTE,DTH,DTI,DTP,DTV,DUS,DVC,DVN,DVW,DWC,DWS,DXL,DZM,E12,E29,EFI,EIC,EIN,EME,EMG,EMS,EPC,EPH,FBA,FBC,FCC,FCS,FDG,FGL,FHN,FHS,FIC,FLC,FOC,FOX,FRC,FRM,FSO,FT1,FTI,FTM,G20,G36,GAB,GCB,GCF,GDA,GEE,GER,GGG,GGS,GH3,GHC,GLC,GLW,GND,GPC,GQN,GSM,GTC,GTD,GTK,GTS,GTT,GVT,H11,HAC,HAF,HAI,HAM,HAN,HAV,HBD,HBH,HC1,HC3,HCB,HCI,HD2,HD6,HD8,HDM,HDO,HDP,HDW,HEC,HEJ,HEM,HEP,HES,HFB,HFC,HFX,HGA,HGT,HGW,HHG,HHN,HHR,HIG,HIO,HJC,HKB,HKP,HLA,HLB,HLE,HLG,HLR,HLS,HLT,HLY,HMG,HMS,HNB,HND,HNF,HNI,HNM,HNP,HNR,HOT,HPB,HPD,HPH,HPI,HPM,HPP,HPT,HPW,HRB,HRT,HSA,HSI,HSM,HSP,HSV,HTE,HTH,HTM,HTR,HTT,HTU,HTW,HU3,HU4,HU6,HUG,HVA,HVG,HWS,I10,IBC,IBD,IBN,ICC,ICF,ICI,ICN,IDP,IFS,IHK,IKH,ILA,ILC,ILS,IME,IN4,IRC,ISG,ISH,IST,ITS,JOS,KAC,KCB,KCE,KGM,KHB,KHD,KHL,KHW,KIP,KLB,KLF,KLM,KSH,KTB,KTC,KTL,KTW,KVC,L12,L35,L44,L45,L63,LAI,LAW,LBC,LCC,LCM,LCS,LDW,LG9,LGM,LIC,LKW,LLM,LM3,LM7,LMC,LMH,LMI,LNC,LO5,LPT,LQN,LSG,LTC,LTG,LUT,LYF,M10,MA1,MAI,MBN,MCD,MCG,MCH,MCM,MDA,MDF,MEC,MEF,MES,MFS,MGC,MGG,MGR,MH3,MHP,MHY,MIC,MIE,MIM,MKP,MLC,MLS,MML,MNB,MND,MPC,MPT,MPY,MQB,MQN,MRF,MSR,MTA,MTB,MTC,MTG,MTH,MTL,MTM,MTP,MTS,MTV,MVC,MVN,NAC,NAS,NAU,NAW,NBE,NBT,NCG,NCS,ND2,NDC,NDF,NDP,NDT,NDW,NED,NEM,NGC,NHP,NHV,NJC,NLS,NNT,NOS,NPH,NQB,NQN,NQT,NS2,NSG,NSL,NSS,NTB,NTC,NTF,NTT,NTW,NUE,NVP,NWT,NXT,ODE,OIL,ONW,PAI,PAP,PAS,PAT,PBC,PBT,PCC,PCF,PCM,PCN,PDC,PDV,PEC,PEG,PEQ,PFL,PGB,PHH,PHP,PHS,PID,PIS,PIV,PJS,PLA,PLE,PLO,PMJ,PMT,PMW,PND,PNG,PNP,PNT,POB,POS,POV,PPH,PPI,PQN,PRO,PRT,PSB,PSG,PSL,PSN,PSP,PTE,PTG,PTH,PTO,PTP,PTT,PTV,PTX,PVA,PVE,PVH,PVL,PVM,PVO,PVR,PVV,PVX,PVY,PWA,PWS,PX1,PXA,PXC,PXI,PXL,PXM,PXS,PXT,PYU,QCC,QHW,QLD,QNC,QNS,QNT,QNU,QNW,QPH,QSP,QTP,RAT,RBC,RCC,RCD,RHN,RIC,RTB,S12,S27,S72,S74,S96,SAC,SAL,SAP,SAS,SB1,SBB,SBD,SBH,SBL,SBM,SBR,SBS,SCA,SCC,SCJ,SCL,SCO,SCY,SD1,SD2,SD3,SD4,SD7,SD8,SDB,SDD,SDE,SDJ,SDK,SDP,SDT,SDV,SDX,SDY,SEA,SEP,SGB,SGI,SGO,SGP,SGS,SHC,SHG,SHX,SID,SIG,SII,SIV,SJC,SJG,SJM,SKH,SKN,SKV,SNC,SNZ,SP2,SPB,SPD,SPH,SPV,SQC,SRB,SRT,SSF,SSG,SSH,SSN,STH,STL,STS,STT,STW,SVG,SVH,SVL,SWC,SZE,SZG,TA3,TA6,TAG,TAL,TAN,TAW,TB8,TBD,TBH,TBR,TBT,TBW,TCJ,TCK,TCW,TDB,TDF,TDI,TDS,TEC,TED,TEL,TGG,TGP,TH1,THM,THN,THP,THR,THU,THW,TID,TIE,TIN,TIS,TKA,TKC,TL4,TLI,TLP,TLT,TMG,TMW,TNB,TNM,TNP,TNS,TNW,TOP,TOS,TOW,TPS,TQN,TQW,TR1,TRS,TRT,TS3,TS4,TSD,TSG,TSJ,TST,TTB,TTD,TTG,TTJ,TTN,TTP,TTS,TTZ,TUG,TV1,TV6,TVA,TVG,TVH,TVM,TVN,TW3,UCT,UDC,UDJ,UDL,UEM,UMC,UPC,UPH,USC,USD,V11,V15,VAB,VAT,VAV,VBB,VBG,VBH,VC5,VCE,VCP,VCR,VCT,VCW,VCX,VDB,VDN,VDT,VE2,VE9,VEA,VEC,VEF,VES,VET,VFC,VFR,VGG,VGI,VGL,VGR,VGT,VGV,VHD,VHF,VHG,VHH,VIE,VIH,VIM,VIN,VIR,VIW,VKC,VKD,VKP,VLB,VLC,VLF,VLG,VLP,VLW,VMA,VMG,VMK,VMT,VNA,VNB,VNH,VNI,VNP,VNX,VNY,VNZ,VOC,VPA,VPC,VPK,VPR,VPW,VQC,VRG,VSE,VSF,VSG,VSN,VSP,VST,VT1,VTA,VTD,VTE,VTG,VTI,VTK,VTL,VTM,VTQ,VTR,VTS,VTX,VUA,VVN,VVS,VW3,VWS,VXB,VXP,VXT,WSB,WTC,WTN,X18,X26,X77,XDH,XHC,XLV,XMC,XMD,XMP,XPH,YBC,YTC';

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

                            Redis::set('UPCOM_'.$item['sym'], json_encode($item));    
                                                                                      }
                        }
                    }
                }
            }
            sleep(1);
        }
    }
}
