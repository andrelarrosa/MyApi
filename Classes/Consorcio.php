<?php 
header('Content-Type: application/json');
class Consorcio
{
    public function mostrar()
    {
        $con = new PDO('mysql:host=localhost; dbname=consorcio;', 'root', '');
        $sql = 'SELECT * FROM consorcio';
        $sql = $con->prepare($sql);
        $sql->execute();

        $result = array();

        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }

        if(!$result){
            throw new Exception("Nenhum consorcio encontrado");
        }else{
            return json_encode($result);
            
        }

    }

    public function create($pessoa, $valor)
    {   
        try{
            $con = new PDO('mysql:host=localhost; dbname=consorcio;', 'root', '');
            $sql = "INSERT INTO consorcio (pessoa, valor) VALUES (:pessoa, :valor)";
            $sql = $con->prepare($sql);
            $sql->bindValue(":pessoa", $pessoa);
            $sql->bindValue(":valor", $valor);
            $sql->execute();
            return json_encode("works");
        } catch(Exception $e){
            throw new Exception("Não foi possível cadastrar esse consórcio");
        }

        
    }

    public function delete($id){
        try{
            $con = new PDO('mysql:host=localhost; dbname=consorcio;', 'root', '');
            $sql = "DELETE FROM consorcio WHERE consorcio_id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();
            $result = array();
        
            while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
            }
            
            return json_encode($result);
        }catch(Exception $e){
            throw new Exception("Não foi possível deletar esse consórcio");
        }

        
    }
}




?>