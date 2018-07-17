<?php


namespace App\Model;

use App\Lib\Response,
    App\Lib\Auth;

class TestModel {
    private $db;
    private $table = 'clientes';
    private $response;

    public function __CONSTRUCT($db) {
        $this->db = $db;
        $this->response = new Response();
    }

    public function getAllDatas(){
      try{
        $users = $this->db->prepare("SELECT * FROM $this->table");
        $users->execute();
        return $users->fetchAll();
      }catch(Exception $e){
        die($e->getMessage());
      }
    }

    public function getData($id){
      try{
        $user = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id");
        $user->execute(['id' => $id]);
        return $user->fetch();
      }catch(Exception $e){
        die($e->getMessage());
      }
    }
    
    public function deleteData($data){
      try{
              $stm = $this->db->prepare("DELETE FROM ".$this->table." WHERE test_id = :id");
              $status = $stm->execute(['id' => $data['id']]);
              if(!$status){
                return $this->response->SetResponse(false);
              }else{
                return $this->response->SetResponse(true);
              }
      } catch (Exception $e){
          die($e->getMessage());
	    }
    }

    public function updateData($data){
      try{
          $sql = "UPDATE ".$this->table." SET test_date_upd = :date_upd WHERE test_id = :id";
          $status = $this->db->prepare($sql)->execute(['date_upd' => $data['date_upd'], 'id' => $data['idd']]);
          if(!$status){
            return $this->response->SetResponse(false);
          }else{
            return $this->response->SetResponse(true);
          }
        } catch (Exception $e){
          die($e->getMessage());
        }
    }

    public function insertData($data){
      try{
        $sql = "INSERT INTO $this->table (nombre, apellido, telefono, email, direccion, ciudad, departamento) 
                VALUES (:nombre, :apellido, :telefono, :email, :direccion, :ciudad, :departamento)";
        $status = $this->db->prepare($sql)->execute(
            [
                'nombre' => $data['nombre'], 
                'apellido' => $data['apellido'],
                'telefono' => $data['telefono'],
                'email' => $data['email'],
                'direccion' => $data['direccion'],
                'ciudad' => $data['ciudad'],
                'departamento' => $data['departamento'],
            ]
        );
        if(!$status){
          return $this->response->SetResponse(false);
        }else{
          return $this->response->SetResponse(true, 'cliente agregado con exito');
        }
      } catch (Exception $e){
        die($e->getMessage());
      }
    }
}