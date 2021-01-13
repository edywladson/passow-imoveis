<?php


namespace Source\Support;


/**
 * Class Vista
 * @package Source\Support
 */
class Vista
{

    /** @var string */
    private $apiUrl;
    /** @var string */
    private $apiKey;
    /** @var */
    private $endpoint;
    /** @var */
    private $build;
    /** @var */
    private $callback;

    /**
     * Vista constructor.
     */
    public function __construct()
    {
        $this->apiUrl = CONF_VISTA_API_URL;
        $this->apiKey = CONF_VISTA_API_KEY;
    }

    /**
     * @param string|null $category
     * @param string|null $neighborhoods
     * @param int|null $dorms
     * @param string|null $value
     * @param string|null $code
     * @param string $goal
     * @return $this
     */
    public function all(int $page = 1): ?Vista
    {
        $this->endpoint = "/imoveis/listar?key={$this->apiKey}";
        $this->build = [
            "fields" => [
                "Codigo",
                "FotoDestaque",
                "Categoria",
                "Endereco",
                "Bairro",
                "Cidade",
                "UF",
                "ValorVenda",
                "ValorLocacao",
                "Dormitorios",
                "Suites",
                "Vagas",
                "BanheiroSocialQtd",
                "AreaTotal",
                "AreaPrivativa"
            ],
            'filter' => [
                "Cidade" => urlencode("Porto Alegre")
            ],
            'paginacao' => [
                'pagina' => $page,
                'quantidade' => 6
            ]
        ];
        $this->get();
        return $this;
    }

    public function find(array $filter, int $page = 1): ?Vista
    {
        $this->endpoint = "/imoveis/listar?key={$this->apiKey}";
        $this->build = [
            "fields" => [
                "Codigo",
                "Categoria",
                "Endereco",
                "Bairro",
                "Cidade",
                "UF",
                "ValorVenda",
                "ValorLocacao",
                "Dormitorios",
                "Suites",
                "Vagas",
                "BanheiroSocialQtd",
                "AreaTotal",
                "AreaPrivativa"
            ],
            'filter' => [
                "Cidade" => urlencode("Porto Alegre"),
                $filter
            ],
            'paginacao' => [
                'pagina' => $page,
                'quantidade' => 6
            ]
        ];
        $this->get();
        return $this;
    }

    public function findProperty(string $code): ?Vista
    {
        $this->endpoint = "/imoveis/detalhes?key={$this->apiKey}&imovel={$code}";
        $this->build = [
            "fields" => [
                "Codigo",
                "Categoria",
                "Endereco",
                "Bairro",
                "Cidade",
                "UF",
                "ValorVenda",
                "ValorLocacao",
                "Dormitorios",
                "Suites",
                "Vagas",
                "BanheiroSocialQtd",
                "AreaTotal",
                "AreaPrivativa",
                "Caracteristicas",
                "InfraEstrutura",
                ['Foto' => [
                    'Foto',
                    'FotoPequena',
                    'Destaque'
                ]
                ]
            ],

        ];
        $this->get();
        return $this;
    }

    /**
     * @return mixed
     */
    public function callback()
    {
        return $this->callback;
    }

    /**
     *
     */
    public function get()
    {
        $url = $this->apiUrl . $this->endpoint;
        $postFields = json_encode($this->build);
        $url .= '&pesquisa=' . $postFields;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);
    }

}