<?php
class Lighting extends Connection {


    public function __construct()
    {
        parent::__construct(); 
        
    }

    public function getAllLamps(): array {
        $sql = "SELECT 
                lamps.lamp_id AS id, 
                lamps.lamp_name AS nombre, 
                lamps.lamp_on AS encendida, 
                lamp_models.model_part_number AS modelo, 
                lamp_models.model_wattage AS vatios, 
                zones.zone_name AS zona 
                FROM lamps 
                INNER JOIN lamp_models 
                ON lamps.lamp_model = lamp_models.model_id 
                INNER JOIN zones 
                ON lamps.lamp_zone = zones.zone_id 
                ORDER BY lamps.lamp_id;";

        $lamps = []; 

        $rows = $this->conn->query($sql);
        

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $lamps[] = new Lamp(
                $row['id'],
                $row['nombre'],
                $row['encendida'],
                $row['modelo'],
                $row['vatios'],
                $row['zona']
            );
        }

        return $lamps;
    }

    public function drawLampsList() {
        $lamps = $this->getAllLamps();

        foreach ($lamps as $lamp) 
        echo "<tr>
                <td>{$lamp->getId()}</td>
                <td>{$lamp->getNombre()}</td>
                <td>" . ($lamp->getEncendida() ? 'Sí' : 'No') . "</td>
                <td>{$lamp->getModelo()}</td>
                <td>{$lamp->getVatios()}</td>
                <td>{$lamp->getZona()}</td>
              </tr>";
    }

    public function potenciadorZona(): array {
        $sql = "SELECT 
                    zones.zone_name AS zona,
                    SUM(lamp_models.model_wattage) AS potencia 
                FROM lamps 
                INNER JOIN lamp_models 
                ON lamps.lamp_model = lamp_models.model_id 
                INNER JOIN zones 
                ON lamps.lamp_zone = zones.zone_id 
                WHERE lamps.lamp_on = 1
                GROUP BY zones.zone_name;"; 
        
        $result = $this->conn->query($sql);
        $potenciadorZona = [];
    
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $potenciadorZona[] = [
                'zona' => $row['zona'],
                'potencia' => $row['potencia']
            ];
        }
    
        return $potenciadorZona;
    }

   
}



    




