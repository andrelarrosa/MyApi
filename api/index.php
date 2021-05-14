<?php
header('Content-Type: application/json; charset=utf-8');
require_once('../Classes/Consorcio.php');

class Rest
{
    public static function open($request){
        $url = explode('/', $request['url']);

        $classe = ucfirst($url[0]);
        array_shift($url);

        $metodo = $url[0];
        array_shift($url);

        $parametros = array();
        $parametros = $url;
        
        try{
            if(class_exists($classe)){
                if(method_exists($classe, $metodo)){
                    $retorno = call_user_func_array(array(new $classe, $metodo), $parametros);
    
                    return $retorno;
                }else{
                    return json_encode(array('status' => 'Erro', 'dados' => 'Método não encontrado'));
                }
            }else{
                return json_encode(array('status' => 'Erro', 'dados' => 'Classe não encontrada!'));
            }
        }catch(Exception $e){
            return json_encode(array('status' => 'Erro', 'dados' => $e->getMessage()));
        }
        

    }
}

if(isset($_REQUEST)){
    echo Rest::open($_REQUEST);
}


?>