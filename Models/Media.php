<?php

class Media
{
    public function __construct()
    {
        date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
    }

    public function upload($file)
    {

        $ext = strtolower(substr($file['name'],-4)); //Pegando extensão do arquivo
        $new_name = date("Y_m_d_H_i_s") .$ext; //Definindo um novo nome para o arquivo
        $dir = 'images/produtos/'; //Diretório para uploads
        $url = $dir.$new_name;

        move_uploaded_file($file['tmp_name'], '../' . $url);

        return $url;

    }
}