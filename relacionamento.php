<?php
class OrigemProduto{
	private $pais;
	private $uf;
	private $ceep;
	private $rua;

	public function __construct($pais, $ceep, $uf, $rua)
	{
		$this->pais = $pais;
		$this->uf = $uf;
		$this->ceep = $ceep;
		$this->rua = $rua;
	}
}

class Produto {
	//Informações sobre algum produto
	private string $nome;
	private float $valor;
	private OrigemProduto $origem;

	public function __construct(string $nome, int $valor, callable $origem)
	{
		$this->nome = $nome;
		$this->valor = $valor;
		$this->origem = $origem();
	}
}

class Carrinho {
	/**
	 * Class "Carrinho" possui em seu atributo produtos uma lista de arrays contendo instancias de "Produto" que por sua vez é o objeto contendo todas as informações de algum produto em específico
	 */
	private array $produtos;

	public function setProduto($produto):void
	{
		$this->produtos[] = $produto;
	}

	public function getProdutos():array
	{
		return $this->produtos;
	}
}
/**
 * INSTANCIAS
 */ 
//Criando os produtos
$baixo = new Produto('baixo', 3600.00, function(){
	//Adcionando informações de origem à classe e retornando-a para um atributo em "Produto"
	return new OrigemProduto('belgica', 'hilkio', '45284-855', 'dosmont');
});

$bateria = new Produto('bateria', 7500.00, function(){
	return new OrigemProduto('EUA', 'Texas', '452-855', 'city');
});

$guitarra = new Produto('guitarra', 4999.00, function(){
	return new OrigemProduto('Japan', 'Toquio', '528255-55', 'xiang');
});

$carrinho = new Carrinho();

//Inserindo produtos ao carrinho
$carrinho->setProduto($baixo);
$carrinho->setProduto($bateria);
$carrinho->setProduto($guitarra);

//Obtendo todos os produtos
print_r($carrinho->getProdutos());

//QUAL TIPO DE RELACIONAMENTO ENTRE ESSAS CLASSES/OBJETOS?
//QUAL MELHORIA OU SUGESTÃO VC FARIA?
//ACHOU UTIL?
