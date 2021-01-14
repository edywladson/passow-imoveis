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
     * @param int $page
     * @param bool $total
     * @param array $filter
     * @return $this|null
     */
    public function find(int $page = 1, bool $total = false, array $filter = []): ?Vista
    {
        if ($total) {
            $total = "&showtotal=1";
        } else {
            $total = '';
        }

        $this->endpoint = "/imoveis/listar?key={$this->apiKey}{$total}";
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

    /**
     * @param string $code
     * @return $this|null
     */
    public function findImmobile(string $code): ?Vista
    {
        $this->endpoint = "/imoveis/detalhes?key={$this->apiKey}&imovel={$code}";
        $this->build = [
            "fields" => [
                "Codigo",
                "Categoria",
                "Endereco",
                "Numero",
                "Complemento",
                "Bairro",
                "Cidade",
                "UF",
                "CEP",
                "ValorVenda",
                "ValorLocacao",
                "Dormitorios",
                "Suites",
                "Vagas",
                "BanheiroSocialQtd",
                "AreaTotal",
                "AreaPrivativa",
                "ValorIptu",
                "ValorCondominio",
                "ValorLocacao",
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
     * @return $this|null
     */
    public function findContent(): ?Vista
    {
        $this->endpoint = "/imoveis/listarConteudo?key={$this->apiKey}";
        $this->build = [
            "fields" => [
                "Bairro",
                "Categoria"
            ],
            'filter' => [
                "Cidade" => urlencode("Porto Alegre")
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