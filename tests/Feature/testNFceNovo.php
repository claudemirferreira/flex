<?php

namespace Tests\Feature;

error_reporting(E_ERROR);
ini_set('display_errors', 'On');
require_once '../bootstrap.php';

use NFePHP\NFe\Tools;
use NFePHP\NFe\Make;
use NFePHP\Common\Certificate;
use NFePHP\Common\Soap\SoapFake;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class testNFceNovo extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $arr = [
            "atualizacao" => "2017-02-20 09:11:21",
            "tpAmb"       => 2,
            "razaosocial" => "SUA RAZAO SOCIAL LTDA",
            "cnpj"        => "99999999999999",
            "siglaUF"     => "SP",
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
        $pfxcontent = file_get_contents('uuuuuu/fixtures/expired_certificate.pfx');        
        
        $tools = new Tools($configJson, Certificate::readPfx($pfxcontent, 'associacao'));
        $tools->disableCertValidation(true); //tem que desabilitar
        $tools->model('65');
        
        try {
        
            $make = new Make();        
        
            //infNFe OBRIGATÓRIA
            $std = new \stdClass();
            $std->Id = '';
            $std->versao = '4.00';
            $infNFe = $make->taginfNFe($std);
        
            //IDENTIFICAÇÃO OBRIGATÓRIA
            $stdIde = new \stdClass();
            $stdIde->cUF = 14;
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
            $stdDest->email = 'claudemir@cal-comp.com.br';
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
            //$std->cBenef = 'ab222222';
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
            //$std->vFrete = 0.00;
            //$std->vSeg = 0;
            //$std->vDesc = 0;
            //$std->vOutro = 0;
            $std->indTot = 1;
            $std->xPed = 'BV20200805';
            //$std->nItemPed = 1;
            //$std->nFCI = '12345678-1234-1234-1234-123456789012';
            $prod = $make->tagprod($stdProd);
        
            $tag = new \stdClass();
            $tag->item = 1;
            $tag->infAdProd = 'DE POLIESTER 100%';
            $make->taginfAdProd($tag);
        
            //Imposto 
            $stdImposto = new stdClass();
            $stdImposto->item = 1; //item da NFe
            $stdImposto->vTotTrib = 25.00;
            $make->tagimposto($std);
        
            $std = new stdClass();
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
            $std = new stdClass();
            $std->item = 1; //item da NFe
            $std->CST = '99';
            //$std->vBC = 1200;
            //$std->pPIS = 0;
            $std->vPIS = 0.00;
            $std->qBCProd = 0;
            $std->vAliqProd = 0;
            $pis = $make->tagPIS($std);
        
            //COFINS
            $std = new stdClass();
            $std->item = 1; //item da NFe
            $std->CST = '99';
            $std->vBC = null;
            $std->pCOFINS = null;
            $std->vCOFINS = 0.00;
            $std->qBCProd = 0;
            $std->vAliqProd = 0;
            $make->tagCOFINS($std);
        
            //icmstot OBRIGATÓRIA
            $std = new \stdClass();
            $icmstot = $make->tagicmstot($std);
        
            //transp OBRIGATÓRIA
            $std = new \stdClass();
            $std->modFrete = 0;
            $transp = $make->tagtransp($std);        
        
            //pag OBRIGATÓRIA
            $std = new \stdClass();
            $std->vTroco = 0;
            $pag = $make->tagpag($std);
        
            //detPag OBRIGATÓRIA
            $std = new \stdClass();
            $std->indPag = 1;
            $std->tPag = '01';
            $std->vPag = 100.00;
            $detpag = $make->tagdetpag($std);
        
            //infadic
            $std = new \stdClass();
            $std->infAdFisco = '';
            $std->infCpl = '';
            $info = $make->taginfadic($std);
        
            $std = new stdClass();
            $std->CNPJ = '60735090220'; //CNPJ da pessoa jurídica responsável pelo sistema utilizado na emissão do documento fiscal eletrônico
            $std->xContato = 'claudemir@cal-comp.com.br'; //Nome da pessoa a ser contatada
            $std->email = 'claudemir@cal-comp.com.br'; //E-mail da pessoa jurídica a ser contatada
            $std->fone = '1155551122'; //Telefone da pessoa jurídica/física a ser contatada
            //$std->CSRT = 'G8063VRTNDMO886SFNK5LDUDEI24XJ22YIPO'; //Código de Segurança do Responsável Técnico
            //$std->idCSRT = '01'; //Identificador do CSRT
            $make->taginfRespTec($std);
        
            $make->monta();
            $xml = $make->getXML();            
        
            $xml = $tools->signNFe($xml);
            
            header('Content-Type: application/xml; charset=utf-8');
            echo $xml;            

            $this->assertTrue(false);
            
        } catch (\Exception $e) {
            $this->assertTrue(false);
            echo $e->getMessage();
        } 
    }
}
