<?php

namespace usuarios\login;

interface LoginInterface {

    public function verificarLogin(LoginUsuario $obj);

}