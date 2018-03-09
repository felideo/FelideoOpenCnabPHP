<?php
/*
 * CnabPHP - Geração de arquivos de remessa e retorno em PHP
 *
 * LICENSE: The MIT License (MIT]
 *
 * Copyright (C] 2013 Ciatec.net
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this
 * software and associated documentation files (the "Software"], to deal in the Software
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
use Exception;

class Registro3R extends Generico3{
	protected $meta = [
		'codigo_banco' => [          // 1.3R
			'tamanho'  => 3,
			'default'  => '033',
			'tipo'     => 'int',
			'required' => true
		],
		'codigo_lote' => [           // 2.3R
			'tamanho'  => 4,
			'default'  => 1,
			'tipo'     => 'int',
			'required' => true
		],
		'tipo_registro' => [         // 3.3R
			'tamanho'  => 1,
			'default'  => '3',
			'tipo'     => 'int',
			'required' => true
		],
		'numero_registro' => [       // 4.3R
			'tamanho'  => 5,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],
		'seguimento' => [            // 5.3R
			'tamanho'  => 1,
			'default'  => 'R',
			'tipo'     => 'alfa',
			'required' => true
		],
		'filler24' => [               // 6.3R
			'tamanho'  => 1,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'codigo_movimento' => [      // 7.3R
			'tamanho'  => 2,
			'default'  => '01', // entrada de titulo
			'tipo'     => 'int',
			'required' => true
		],

			// - ------------------ até aqui é igual para todo registro tipo 3

		'codigo_desconto2' => [               // 8.3R
			'tamanho'  => 1,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],
		'data_desconto2' => [            // 9.3R
			'tamanho'  => 8,
			'default'  => '0',
			'tipo'     => 'date',
			'required' => true
		],
		'vlr_desconto2' => [       //10.3R
			'tamanho'   => 15,
			'default'   => '0',
			'tipo'      => 'decimal',
			'precision' => 2,
			'required'  => true
		],
		'filler21' => [               // 6.3R
			'tamanho'  => 24,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'codigo_multa' => [  //14.3R
			'tamanho'  => 1,
			'default'  => '0',
			'tipo'     => 'int',
			'required' => true
		],
		'data_multa' => [   //15.3R
			'tamanho'  => 8,
			'default'  => '0',
			'tipo'     => 'date',
			'required' => true
		],
		'vlr_multa' => [      //16.3R
			'tamanho'   => 15,
			'default'   => '0',
			'tipo'      => 'decimal',
			'precision' => 2,
			'required'  => true
		],
		'filler22' => [               // 6.3R
			'tamanho'  => 10,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'mensagem_3' => [          // 18.3
			'tamanho'  => 40,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'mensagem_4' => [        //19.3R
			'tamanho'  => 40,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
		'filler23' => [               // 6.3R
			'tamanho'  => 61,
			'default'  => ' ',
			'tipo'     => 'alfa',
			'required' => true
		],
	];
}