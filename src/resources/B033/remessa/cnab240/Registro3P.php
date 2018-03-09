<?php
/*
 * CnabPHP - Geração de arquivos de remessa e retorno em PHP
 *
 * LICENSE: The MIT License (MIT)
 *
 * Copyright (C) 2013 Ciatec.net
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this
 * software and associated documentation files (the "Software"), to deal in the Software
 * without restriction, including without limitation the rights to use, copy, modify,
 * merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following
 * conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies
 * or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace CnabPHP\resources\B033\remessa\cnab240;
use CnabPHP\resources\generico\remessa\cnab240\Generico3;
use CnabPHP\RegistroRemAbstract;
use CnabPHP\RemessaAbstract;
use Exception;

class Registro3P extends Generico3{
	protected $meta = [
		'codigo_banco' => [          // 1.3P
			'tamanho'  => 3,
			'default'  => '033',
			'tipo'     => 'int',
			'required' => true
		],
		'codigo_lote' => [           // 2.3P
			'tamanho'  => 4,
			'default'  => 1,
			'tipo'     => 'int',
			'required' => true
		],
		'tipo_registro' => [         // 3.3P
			'tamanho'  => 1,
			'default'  => '3',
			'tipo'     => 'int',
			'required' => true
		],
		'numero_registro' => [       // 4.3P
			'tamanho'  => 5,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],
		'seguimento' => [ // 5.3P
			'tamanho'  => 1,
			'default'  => 'P',
			'tipo'     => 'alfa',
			'required' => true
		],
		'filler11' => [ // 6.3P
			'tamanho'  => 1,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'codigo_movimento' => [      // 7.3P
			'tamanho'  => 2,
			'default'  => '01', // entrada de titulo
			'tipo'     => 'int',
			'required' => true
		],

		// - ------------------ até aqui é igual para todo registro tipo 3

		'agencia' => [               // 8.3P
			'tamanho'  => 4,
			'default'  => '',
			'tipo'     => 'int',
			'required' => true
		],
		'agencia_dv' => [            // 9.3P
			'tamanho'  => 1,
			'default'  => '',
			'tipo'     => 'int',
			'required' => true
		],
		'conta' => [               // 11.3P
			'tamanho'  => 9,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],
        'conta_dv' => [               //12.3P
			'tamanho'  => 1,
			'default'  => '',
			'tipo'     => 'int',
			'required' => true
		],


   		'conta_fidc' => [               // Conta cobrança Destinatária FIDC ????
			'tamanho'  => 9,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],
   		'conta_dv_fidc' => [               // Dígito da conta cobrança Destinatária FIDC ???
			'tamanho'  => 1,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],


		'filler12' => [               // 11.3P
			'tamanho'  => 2,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'nosso_numero' => [  //13.3P
			'tamanho'  => 13,
			'default'  => '',
			'tipo'     => 'int',
			'required' => true
		],

		// Tipo de cobrança ???
		'tipo_cobranca' => [      //15.3P
			'tamanho'  => 1,
			'default'  => '1',  // combrança com registro
			'tipo'     => 'int',
			'required' => true
		],
		// Forma de Cadastramento ???
		'forma_cadastramento' => [      //15.3P
			'tamanho'  => 1,
			'default'  => '1',  // '1' = Cobrança Registrada (Rápida e Eletrônica com Registro) '2' = Cobrança sem Registro ‘3’ = Cobrança Simples (Sem Registro sem pré-impresso e com pré-impresso)
			'tipo'     => 'int',
			'required' => true
		],

		'tipo_documento' => [        //16.3P
			'tamanho'  => 1,
			'default'  => '2',
			'tipo'     => 'int',
			'required' => true
		],
		'filler13' => [               //12.3P
			'tamanho'  => 1,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'filler14' => [               //19.3P
			'tamanho'  => 1,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'seu_numero' => [            //19.3P   Campo de preenchimento obrigatório; preencher com Seu Número de controle do título
			'tamanho'  => 15,
			'default'  => ' ',      // este espaço foi colocado para passa a validação para os seters do generico
			'tipo'     => 'alfa',
			'required' => true
		],
		'data_vencimento' => [            //20.3
			'tamanho'  => 8,
			'default'  => '',
			'tipo'     => 'date',
			'required' => true
		],
		'valor' => [                 //21.3P
			'tamanho'   => 15,
			'default'   => '0',
			'tipo'      => 'int',
			'required'  => true
		],
		'agencia_cobradora' => [    //22.3P
			'tamanho'  => 4,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],
		'agencia_cobradora_dv' => [    //23.3P
			'tamanho'  => 1,
			'default'  => '0',
			'tipo'     => 'int', // originalmente no manual esta alfa mas foi mudado para int para funcionar
			'required' => true
		],
		'filler15' => [            //41.3P
			'tamanho'  => 1,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'especie_titulo' => [    //24.3P
			'tamanho'  => 2,
			'default'  => '02',
			'tipo'     => 'int',
			'required' => true
		],
		'aceite' => [ //25.3P
			'tamanho'  => 1,
			'default'  => 'N',
			'tipo'     => 'alfa',
			'required' => true
		],
		'data_emissao' => [            //26.3P
			'tamanho'  => 8,
			'default'  => '',
			'tipo'     => 'date',
			'required' => true
		],
		'codigo_juros' => [            //27.3P
			'tamanho'  => 1,
			'default'  => '3',
			'tipo'     => 'int',
			'required' => true
		],
		'data_juros' => [            //28.3P
			'tamanho'  => 8,
			'default'  => '0',
			'tipo'     => 'date',
			'required' => true
		],
		'vlr_juros' => [            //29.3P
			'tamanho'   => 13,
			'default'   => '0',
			'tipo'      => 'decimal',
			'precision' => 2,
			'required'  => true
		],
		'codigo_desconto' => [            //30.3P
			'tamanho'  => 1,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],
		'data_desconto' => [            //31.3P
			'tamanho'  => 8,
			'default'  => '0',
			'tipo'     => 'date',
			'required' => true
		],
		'vlr_desconto' => [            //32.3P
			'tamanho'   => 13,
			'default'   => '0',
			'tipo'      => 'decimal',
			'precision' => 2,
			'required'  => true
		],
		'vlr_IOF' => [            //33.3P
			'tamanho'   => 10,
			'default'   => '0',
			'tipo'      => 'decimal',
			'precision' => 5,
			'required'  => true
		],
		'vlr_abatimento' => [            //34.3P
			'tamanho'   => 13,
			'default'   => '0',
			'tipo'      => 'decimal',
			'precision' => 2,
			'required'  => true
		],
		'seu_numero2' => [            //35.3P
			'tamanho'  => 25,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'protestar' => [            //36.3P
			'tamanho'  => 1,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],
		'prazo_protesto' => [            //37.3P
			'tamanho'  => 2,
			'default'  => '00',
			'tipo'     => 'int',
			'required' => true
		],
		'baixar' => [ //38.3P
			'tamanho'  => 1,
			'default'  => '1',
			'tipo'     => 'int',
			'required' => true
		],
		'filler16' => [            //42.3P
			'tamanho'  => 1,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],
		'prazo_baixar' => [            //39.3P
			'tamanho'  => 2,
			'default'  => '90',
			'tipo'     => 'int',
			'required' => true
		],
		'codigo_moeda' => [ //40.3P
			'tamanho'  => 2,
			'default'  => '00',
			'tipo'     => 'int',
			'required' => true
		],
		'filler17' => [            //42.3P
			'tamanho'  => 11,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
	];
	public function __construct($data = null){
		if(empty($this->data))parent::__construct($data);
		$this->inserirDetalhe($data);
	}

	public function inserirDetalhe($data){
		$class = 'CnabPHP\resources\\B'.RemessaAbstract::$banco.'\remessa\\'.RemessaAbstract::$layout.'\Registro3Q';
		$this->children[] = new $class($data);

		if(isset($data['codigo_desconto2'])
			|| isset($data['codigo_desconto3'])
			|| isset($data['codigo_multa'])
			|| isset($data['mensagem'])
			|| isset($data['email_pagador'])
		){
			$class = 'CnabPHP\resources\\B'.RemessaAbstract::$banco.'\remessa\\'.RemessaAbstract::$layout.'\Registro3R';
			$this->children[] = new $class($data);
		}

		// debug2('ok');
		// exit;

		if($data['emissao_boleto']==1){
			if(isset($data['mensagem_frente'])){
				$data['mensagem_140'] = $data['mensagem_frente'];
				$data['tipo_impressao'] = 1;
				$class = 'CnabPHP\resources\\B'.RemessaAbstract::$banco.'\remessa\\'.RemessaAbstract::$layout.'\Registro3S1e2';
				$this->children[] = new $class($data);
			}
			if(isset($data['mensagem_verso'])){
				$data['mensagem_140'] = $data['mensagem_verso'];
				$data['tipo_impressao'] = 2;
				$class = 'CnabPHP\resources\\B'.RemessaAbstract::$banco.'\remessa\\'.RemessaAbstract::$layout.'\Registro3S1e2';
				$this->children[] = new $class($data);
			}
			if(isset($data['mensagem'])){
				if(count(explode(PHP_EOL,$data['mensagem']))>4){
					$class = 'CnabPHP\resources\\B'.RemessaAbstract::$banco.'\remessa\\'.RemessaAbstract::$layout.'\Registro3S3';
					$this->children[] = new $class($data);
				}
			}
		}
	}
}