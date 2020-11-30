<?php

namespace usuarios\cadastro;

interface CadastroInterface {

    public function verificarEmail($email);
    public function cadastrarUsuario(CadastroUsuario $obj);

}