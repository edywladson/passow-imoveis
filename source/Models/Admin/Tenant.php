<?php


namespace Source\Models\Admin;


use Source\Core\Model;

class Tenant extends Model
{

    public function __construct()
    {
        parent::__construct("tenants", ["id"], ["name", "email", "phone"]);
    }

    public function findByEmail(string $email, string $columns = '*'): ?Tenant
    {
        $find = $this->find('email = :email', "email={$email}", $columns);

        return $find->fetch();
    }

    /**
     * save.
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning('Nome, e-mail e telefone são obrigatórios');

            return false;
        }

        if (!is_email($this->email)) {
            $this->message->warning('O e-mail informado não tem um formato válido');

            return false;
        }

        // Tenant Update
        if (!empty($this->id)) {
            $tenantId = $this->id;

            $verifyEmail = $this->findByEmail($this->email, 'id,email');

            if ($verifyEmail->id != $tenantId && $verifyEmail) {
                $this->message->warning('O e-mail informado já está cadastrado');

                return false;
            }

            $this->update($this->safe(), 'id = :id', "id={$tenantId}");
            if ($this->fail()) {
                $this->message->error('Erro ao atualizar, verifique os dados');

                return false;
            }
        }

        // Tenant Create
        if (empty($this->id)) {
            if ($this->findByEmail($this->email, 'id')) {
                $this->message->warning('O e-mail informado já está cadastrado');

                return false;
            }

            $tenantId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error('Erro ao cadastrar, verifique os dados');

                return false;
            }
        }

        $this->data = ($this->findById($tenantId))->data();

        return true;
    }

}