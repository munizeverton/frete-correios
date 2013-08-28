<?php

/*
 * Classe para calculo de frete junto ao webservice dos correios
 *
 * 2013
 *
 * A documentação do webservice se encontra disponível em 
 * http://www.correios.com.br/webServices/PDF/SCPP_manual_implementacao_calculo_remoto_de_precos_e_prazos.pdf
 */

/**
 * Desenvolvida por
 *
 * @author Everton Muniz <munizeverton@gmail.com>
 */

class Frete{

    /**
     * WebService dos Correios
     * @type string
     */
    const WEBSERVICE = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';


    /**
     * Seu código administrativo junto aos Correios
     * @type string
     */
    private $nCdEmpresa = '';


    /**
     * Senha de acesso junto ao código administrativo
     * @type string
     */
    private $sDsSenha   = '';


    /**
     * CEP de origem do frete
     * @type int
     */
    private $sCepOrigem = '';


    /**
     * Indica se a encomenda será entregue com o serviço 
     * adicional mão própria.
     * s ou n
     * @type string
     */
    private $sCdMaoPropria = 's';


    /**
     * Indica se a encomenda será entregue com o serviço 
     * adicional aviso de recebimento
     * s ou n
     * @type string
     */
    private $sCdAvisoRecebimento = 'n';


    /**
     * Indica a forma de retorno da consulta
     * XML, Popuo ou <URL>
     * @type string
     */
    private $StrRetorno = 'xml';


    /**
     * Indica o código do serviço
     * Pode ser mais de um separado por vírgula
     * @type string
     */
    private $nCdServico = '40010,40215,40290,41106';


    /**
     * Formato da encomenda (incluindo embalagem)
     * Pode ser 1, 2 ou 3
     * @type int
     */
    private $nCdFormato = '3';
    

    /**
     * CEP destino da encomenda
     * @type int
     */
    private $sCepDestino;


    /**
     * Peso da encomenda (incluindo embalagem)
     * @type float
     */
    private $nVlPeso;


    /**
     * Comprimento da encomenda (incluindo embalagem)
     * @type float
     */
    private $nVlComprimento;


    /**
     * Altura da encomenda (incluindo embalagem)
     * @type float
     */
    private $nVlAltura;


    /**
     * Largura da encomenda (incluindo embalagem)
     * @type float
     */
    private $nVlLargura;


    /**
     * Diametro da encomenda (incluindo embalagem)
     * @type float
     */
    private $nVlDiametro;


    /**
     * Indica se a encomenda será entregue com o serviço 
     * adicional valor declarado
     * Se não for usar o serviço deverá ser 0
     * @type float
     */
    private $nVlValorDeclarado = '0';

    
    /**
     * Sets the value of nCdEmpresa.
     *
     * @param mixed $nCdEmpresa the nCdEmpresa
     *
     * @return self
     */
    public function setNCdEmpresa($nCdEmpresa)
    {
        $this->nCdEmpresa = $nCdEmpresa;

        return $this;
    }

    /**
     * Sets the value of sDsSenha.
     *
     * @param mixed $sDsSenha the sDsSenha
     *
     * @return self
     */
    public function setSDsSenha($sDsSenha)
    {
        $this->sDsSenha = $sDsSenha;

        return $this;
    }

    /**
     * Sets the value of sCepOrigem.
     *
     * @param mixed $sCepOrigem the sCepOrigem
     *
     * @return self
     */
    public function setCepOrigem($sCepOrigem)
    {
        $this->sCepOrigem = $sCepOrigem;

        return $this;
    }

    /**
     * Sets the value of sCdMaoPropria.
     *
     * @param mixed $sCdMaoPropria the sCdMaoPropria
     *
     * @return self
     */
    public function setSCdMaoPropria($sCdMaoPropria)
    {
        $this->sCdMaoPropria = $sCdMaoPropria;

        return $this;
    }

    /**
     * Sets the value of sCdAvisoRecebimento.
     *
     * @param mixed $sCdAvisoRecebimento the sCdAvisoRecebimento
     *
     * @return self
     */
    public function setSCdAvisoRecebimento($sCdAvisoRecebimento)
    {
        $this->sCdAvisoRecebimento = $sCdAvisoRecebimento;

        return $this;
    }

    /**
     * Sets the value of StrRetorno.
     *
     * @param mixed $StrRetorno the StrRetorno
     *
     * @return self
     */
    public function setStrRetorno($StrRetorno)
    {
        $this->StrRetorno = $StrRetorno;

        return $this;
    }

    /**
     * Sets the value of nCdServico.
     *
     * @param mixed $nCdServico the nCdServico
     *
     * @return self
     */
    public function setNCdServico($nCdServico)
    {
        $this->nCdServico = $nCdServico;

        return $this;
    }

    /**
     * Sets the value of nCdFormato.
     *
     * @param mixed $nCdFormato the nCdFormato
     *
     * @return self
     */
    public function setNCdFormato($nCdFormato)
    {
        $this->nCdFormato = $nCdFormato;

        return $this;
    }

    /**
     * Sets the value of sCepDestino.
     *
     * @param mixed $sCepDestino the sCepDestino
     *
     * @return self
     */
    public function setCepDestino($sCepDestino)
    {
        $this->sCepDestino = $sCepDestino;

        return $this;
    }

    /**
     * Sets the value of nVlPeso.
     *
     * @param mixed $nVlPeso the nVlPeso
     *
     * @return self
     */
    public function setPeso($nVlPeso){
        $this->nVlPeso = $nVlPeso;

        return $this;
    }

    /**
     * Sets the value of nCdFormato.
     *
     * @param mixed $nCdFormato the nCdFormato
     *
     * @return self
     */
    public function setFormato($nCdFormato){
        $this->nCdFormato = $nCdFormato;

        return $this;
    }

    /**
     * Sets the value of nVlComprimento].
     *
     * @param mixed $nVlComprimento] the nVlComprimento]
     *
     * @return self
     */
    public function setComprimento($nVlComprimento){
        $this->nVlComprimento = $nVlComprimento;

        return $this;
    }

    /**
     * Sets the value of nVlAltura.
     *
     * @param mixed $nVlAltura the nVlAltura
     *
     * @return self
     */
    public function setAltura($nVlAltura){
        $this->nVlAltura = $nVlAltura;

        return $this;
    }

    /**
     * Sets the value of nVlLargura.
     *
     * @param mixed $nVlLargura the nVlLargura
     *
     * @return self
     */
    public function setLargura($nVlLargura){
        $this->nVlLargura = $nVlLargura;

        return $this;
    }

    /**
     * Sets the value of nVlDiametro.
     *
     * @param mixed $nVlDiametro the nVlDiametro
     *
     * @return self
     */
    public function setDiametro($nVlDiametro){
        $this->nVlDiametro = $nVlDiametro;

        return $this;
    }

    /**
     * Sets the value of nVlValorDeclarado.
     *
     * @param mixed $nVlValorDeclarado the nVlValorDeclarado
     *
     * @return self
     */
    public function setValorDeclarado($nVlValorDeclarado){
        $this->nVlValorDeclarado = $nVlValorDeclarado;

        return $this;
    }

    public function calculaFrete($tipo = false){
        
        if ($tipo){

        }else{

            $data = array(     
                    'nCdEmpresa'          => $this->nCdEmpresa,
                    'sDsSenha'            => $this->sDsSenha,
                    'sCepOrigem'          => $this->sCepOrigem,
                    'sCdMaoPropria'       => $this->sCdMaoPropria,
                    'sCdAvisoRecebimento' => $this->sCdAvisoRecebimento,
                    'StrRetorno'          => $this->StrRetorno,
                    'nCdServico'          => $this->nCdServico,
                    'nCdFormato'          => $this->nCdFormato,
                    'sCepDestino'         => $this->sCepDestino,
                    'nVlPeso'             => $this->nVlPeso,
                    'nVlComprimento'      => $this->nVlComprimento,
                    'nVlAltura'           => $this->nVlAltura,
                    'nVlLargura'          => $this->nVlLargura,
                    'nVlDiametro'         => $this->nVlDiametro,
                    'nVlValorDeclarado'   => $this->nVlValorDeclarado,
                );
            

            $data = http_build_query($data);
            
            $curl = curl_init(self::WEBSERVICE . '?' . $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            $result = simplexml_load_string($result);

            return $result;

        }
    }

}