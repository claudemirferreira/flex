<?php

namespace App\Services;

use NFePHP\NFe\Common\Standardize;
use NFePHP\NFe\Make;
use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;
use NFePHP\Common\Soap\SoapCurl;

class NFeService {

    private $config;
    private $tools;

    public function _construct($config){      
        
        $this->config = $config;
        //$pfxcontent = file_get_contents('../app/fixtures/07200194000380.pfx');
        //$this->tools = new Tools( json_encode($config), Certificate::readPfx($pfxcontent, 'calcomp01'));
    }

    public function gerarNFe()
    {
        $arr = [
            "atualizacao" => "2017-02-20 09:11:21",
            "tpAmb"       => 2,
            "razaosocial" => "SUA RAZAO SOCIAL LTDA",
            "cnpj"        => "99999999999999",
            "siglaUF"     => "AM",
            "schemes"     => "PL_009_V4",
            "versao"      => '4.00',
            "tokenIBPT"   => "AAAAAAA",
            "CSC"         => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
            "CSCid"       => "000001",
            "proxyConf"   => [
                "proxyIp"   => "",
                "proxyPort" => "",
                "proxyUser" => "",
                "proxyPass" => ""
            ]
        ];
        $configJson = json_encode($arr);
        $pfxcontent = file_get_contents('../app/fixtures/07200194000380.pfx');
        
        $tools = new Tools( $configJson, Certificate::readPfx($pfxcontent, 'calcomp01'));
        //$tools->disableCertValidation(true); //tem que desabilitar
        $tools->model('65');
        try {        
            $make = new Make();        
        
            //infNFe OBRIGATÓRIA
            $stdInfNFe = new \stdClass();
            $stdInfNFe->Id = '';
            $stdInfNFe->versao = '4.00';
            $stdInfNFe->pk_nItem = null;
            $infNFe = $make->taginfNFe($stdInfNFe);
        
            //IDENTIFICAÇÃO OBRIGATÓRIA
            $stdIde = new \stdClass();
            $stdIde->cUF = 13;
            $stdIde->cNF = '21785364';
            $stdIde->natOp = 'RETORNO MERC.P/IND. NAO APLICD';
            $stdIde->mod = 55;
            $stdIde->serie = 11;
            $stdIde->nNF = 31187;
            $stdIde->dhEmi = (new \DateTime())->format('Y-m-d\TH:i:sP');
            $stdIde->dhSaiEnt = null;
            $stdIde->tpNF = 1;
            $stdIde->idDest = 1;
            $stdIde->cMunFG = 1302603;
            $stdIde->tpImp = 1;
            $stdIde->tpEmis = 1;
            $stdIde->cDV = 9;
            $stdIde->tpAmb = 2;
            $stdIde->finNFe = 1;
            $stdIde->indFinal = 1;
            $stdIde->indPres = 3;
            $stdIde->procEmi = 0;
            $stdIde->verProc = '4.00';
            $stdIde->dhCont = null;
            $stdIde->xJust = null;
            $ide = $make->tagIde($stdIde);
            
            //EMITENTE OBRIGATÓRIA
            $stdEmit = new \stdClass();
            $stdEmit->xNome = 'CAL-COMP  IND.COM.ELETR. INFORM LTDA';
            $stdEmit->xFant = 'CAL-COMP  IND.COM.ELETR. INFORM LTDA';
            $stdEmit->IE = '063007606';
            $stdEmit->IEST = null;
            //$std->IM = '95095870';
            $stdEmit->CNAE = '4642701';
            $stdEmit->CRT = 3;
            $stdEmit->CNPJ = '07200194000380';
            //$std->CPF = '12345678901'; //NÃO PASSE TAGS QUE NÃO EXISTEM NO CASO
            $emit = $make->tagemit($stdEmit);
        
            //enderEmit OBRIGATÓRIA
            $stdEnderEmit = new \stdClass();
            $stdEnderEmit->xLgr = 'AV.TORQUATO TAPAJOS, 7503 - GALPAO 2';
            $stdEnderEmit->nro = '7503';
            $stdEnderEmit->xCpl = 'LOJA 42';
            $stdEnderEmit->xBairro = 'TARUMA';
            $stdEnderEmit->cMun = 1302603;
            $stdEnderEmit->xMun = 'MANAUS';
            $stdEnderEmit->UF = 'AM';
            $stdEnderEmit->CEP = '69041025';
            $stdEnderEmit->cPais = 1058;
            $stdEnderEmit->xPais = 'BRASIL';
            $stdEnderEmit->fone = '55555555';
            $ret = $make->tagenderemit($stdEnderEmit);
        
            //DESTINATARIO OPCIONAL
            $stdDest = new \stdClass();
            $stdDest->xNome = 'ELECTROLUX DO BRASIL S.A';
            $stdDest->CNPJ = '76487032005437';
            //$std->CPF = '12345678901';
            //$std->idEstrangeiro = 'AB1234';
            $stdDest->indIEDest = 1;
            $stdDest->IE = '062000918';
            //$std->ISUF = '12345679';
            //$std->IM = 'XYZ6543212';
            $stdDest->email = 'claudemir@mail.com';
            $dest = $make->tagdest($stdDest);
        
            //enderDest OPCIONAL
            $enderDest = new \stdClass();
            $enderDest->xLgr = 'RUA JUTAI, 275 DISTRITO INDUSTRIAL';
            $enderDest->nro = '275';
            $enderDest->xCpl = null;
            $enderDest->xBairro = 'DISTRITO INDUSTRIAL';
            $enderDest->cMun = 1302603;
            $enderDest->xMun = 'MANAUS';
            $enderDest->UF = 'AM';
            $enderDest->CEP = '69075130';
            $enderDest->cPais = 1058;
            $enderDest->xPais = 'BRASIL';
            $enderDest->fone = '8007016674';
            $ret = $make->tagenderdest($enderDest);
        
            //prod OBRIGATÓRIA
            $stdProd = new \stdClass();
            $stdProd->item = 1;
            $stdProd->cProd = '64980358';
            $stdProd->cEAN = "SEM GTIN";
            $stdProd->xProd = 'RESISTOR C-FILME 330';
            $stdProd->NCM = 85332190;
            //$stdProd->cBenef = 'ab222222';
            $stdProd->EXTIPI = '';
            $stdProd->CFOP = 5903;
            $stdProd->uCom = 'PC';
            $stdProd->qCom = 65076.0000;
            $stdProd->vUnCom = 0.0030000000;
            $stdProd->vProd = 195.23;
            $stdProd->cEANTrib = "SEM GTIN"; //'6361425485451';
            $stdProd->uTrib = 'UN';
            $stdProd->qTrib = 65076.0000;
            $stdProd->vUnTrib = 0.0030000000;
            //$stdProd->vFrete = 0.00;
            //$stdProd->vSeg = 0;
            //$stdProd->vDesc = 0;
            //$stdProd->vOutro = 0;
            $stdProd->indTot = 1;
            $stdProd->xPed = 'BV20200805';
            //$stdProd->nItemPed = 1;
            //$stdProd->nFCI = '12345678-1234-1234-1234-123456789012';
            $prod = $make->tagprod($stdProd);
        
            $tag = new \stdClass();
            $tag->item = 1;
            $tag->infAdProd = 'DE POLIESTER 100%';
            $make->taginfAdProd($tag);
        
            //Imposto 
            $stdImposto = new \stdClass();
            $stdImposto->item = 1; //item da NFe
            $stdImposto->vTotTrib = 25.00;
            $make->tagimposto($stdImposto);
        
            $std = new \stdClass();
            $std->item = 1; //item da NFe
            $std->orig = 0;
            $std->CSOSN = '102';
            $std->pCredSN = 0.00;
            $std->vCredICMSSN = 0.00;
            $std->modBCST = null;
            $std->pMVAST = null;
            $std->pRedBCST = null;
            $std->vBCST = null;
            $std->pICMSST = null;
            $std->vICMSST = null;
            $std->vBCFCPST = null; //incluso no layout 4.00
            $std->pFCPST = null; //incluso no layout 4.00
            $std->vFCPST = null; //incluso no layout 4.00
            $std->vBCSTRet = null;
            $std->pST = null;
            $std->vICMSSTRet = null;
            $std->vBCFCPSTRet = null; //incluso no layout 4.00
            $std->pFCPSTRet = null; //incluso no layout 4.00
            $std->vFCPSTRet = null; //incluso no layout 4.00
            $std->modBC = null;
            $std->vBC = null;
            $std->pRedBC = null;
            $std->pICMS = null;
            $std->vICMS = null;
            $std->pRedBCEfet = null;
            $std->vBCEfet = null;
            $std->pICMSEfet = null;
            $std->vICMSEfet = null;
            $std->vICMSSubstituto = null;
            $make->tagICMSSN($std);
        
            //PIS
            $stdPis = new \stdClass();
            $stdPis->item = 1; //item da NFe
            $stdPis->CST = '99';
            //$std->vBC = 1200;
            //$std->pPIS = 0;
            $stdPis->vPIS = 0.00;
            $stdPis->qBCProd = 0;
            $stdPis->vAliqProd = 0;
            $pis = $make->tagPIS($stdPis);

            //COFINS
            $std = new \stdClass();
            $std->item = 1; //item da NFe
            $std->CST = '99';
            $std->vBC = null;
            $std->pCOFINS = null;
            $std->vCOFINS = 0.00;
            $std->qBCProd = 0;
            $std->vAliqProd = 0;
            $make->tagCOFINS($std);

            //icmstot OBRIGATÓRIA
            $stdIcmstot = new \stdClass();
            $icmstot = $make->tagicmstot($stdIcmstot);
        
            //transp OBRIGATÓRIA
            $stdTransp = new \stdClass();
            $stdTransp->modFrete = 0;
            $transp = $make->tagtransp($stdTransp);  

            $stdPag = new \stdClass();
            //$stdPag->vTroco = 0;
            $pag = $make->tagpag($stdPag);
        
            //detPag OBRIGATÓRIA
            $stdDetPag = new \stdClass();
            //$stdDetPag->indPag = 1;
            $stdDetPag->tPag = '90';
            $stdDetPag->vPag = 0.00;
            $detpag = $make->tagdetpag($stdDetPag); 
        
            //infadic
            $stdInfadic = new \stdClass();
            $stdInfadic->infAdFisco = '';
            $stdInfadic->infCpl = '';
            $info = $make->taginfadic($stdInfadic);
        
            $stdResp = new \stdClass();
            $stdResp->CNPJ = '07200194000118'; //CNPJ da pessoa jurídica responsável pelo sistema utilizado na emissão do documento fiscal eletrônico
            $stdResp->xContato = 'claudemir@gmail.com'; //Nome da pessoa a ser contatada
            $stdResp->email = 'claudemir@mail.com'; //E-mail da pessoa jurídica a ser contatada
            $stdResp->fone = '1155551122'; //Telefone da pessoa jurídica/física a ser contatada
            //$std->CSRT = 'G8063VRTNDMO886SFNK5LDUDEI24XJ22YIPO'; //Código de Segurança do Responsável Técnico
            //$std->idCSRT = '01'; //Identificador do CSRT
            $make->taginfRespTec($stdResp);    
        
            $make->monta();
            $xml = $make->getXML();        
            $xml = $tools->signNFe($xml);
            header('Content-Type: application/xml; charset=utf-8');

            $xmlAssinado = $tools->signNFe($xml);

            echo $xmlAssinado;
            /*
            try {
                $idLote = str_pad(100, 15, '0', STR_PAD_LEFT); 
                $resp = $tools->sefazEnviaLote([$xml], $idLote);

                $st = new Standardize();
                $std = $st->toStd($resp);

                echo $std;
            } catch (\Exception $e) {
                //aqui você trata possiveis exceptions do envio
                exit($e->getMessage());
            }
            */
                        
        } catch (\Exception $e) {
            echo $e->getMessage();
            
        } 
    }

    public function sign( $xml){
        return $this->tools->signNFe($xml);
    }

    public function transmitir( $xmlAssinado){
        $idLote = str_pad(100, 15, '0', STR_PAD_LEFT); // Identificador do lote
        $resp = $this->tools->sefazEnviaLote([$xmlAssinado], $idLote);
        $st = new Standardize();
        $std = $st->toStd($resp);
        
        if ($std->cStat != 103) {
            //erro registrar e voltar
            exit("[$std->cStat] $std->xMotivo");
         }
         $recibo = $std->infRec->nRec;

        $tools = new Tools($configJson, NFePHP\Common\Certificate::readPfx($certificadoDigital, 'senha do certificado'));
        return $tools->sefazEnviaLote();
    }

}