<?php


namespace Source\Models\Admin;


use Source\Core\Model;

class Proprietary extends Model
{

    public function __construct()
    {
        parent::__construct("proprietaries", ["id"], ["name", "email", "phone", "transfer_day"]);
    }

    public function findByEmail(string $email, string $columns = '*'): ?Proprietary
    {
        $find = $this->find('email = :email', "email={$email}", $columns);

        return $find->fetch();
    }

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

        // Proprietary Update
        if (!empty($this->id)) {
            $proprietaryId = $this->id;

            $verifyEmail = $this->findByEmail($this->email, 'id,email');

            if ($verifyEmail->id != $proprietaryId && $verifyEmail) {
                $this->message->warning('O e-mail informado já está cadastrado');

                return false;
            }

            $this->update($this->safe(), 'id = :id', "id={$proprietaryId}");
            if ($this->fail()) {
                $this->message->error('Erro ao atualizar, verifique os dados');

                return false;
            }
        }

        // Proprietary Create
        if (empty($this->id)) {
            if ($this->findByEmail($this->email, 'id')) {
                $this->message->warning('O e-mail informado já está cadastrado');

                return false;
            }

            $proprietaryId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error('Erro ao cadastrar, verifique os dados');

                return false;
            }
        }

        $this->data = ($this->findById($proprietaryId))->data();

        return true;
    }

}