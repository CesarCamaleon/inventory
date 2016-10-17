<?php
  header("Access-Control-Allow-Origin:*");
  require_once('/../models/inventory/Movement.php');
  require_once('/../models/inventory/Warehouse.php');
  require_once('/../models/inventory/Ingredient.php');
  require_once('/../models/inventory/Stock.php');
  require_once('/../models/inventory/Measurement.php');
  require_once('/../models/inventory/MovementConcept.php');

  $m = new Movement();
  $json = "";

  if (count($m->get_all_movements()) > 0) {
    $json .= '{
      "status":0,
      "movements":[';
        $banner = true;
        foreach ($m->get_all_movements() as $key => $value) {
          if (!$banner) { $json .= ',';} else { $banner = false; }
          $json .= '{
          "id":'.$value->get_id().',
          "date":"'.$value->get_date().'",
          "quantity":'.$value->get_quantity().',
          "warehouse":{';
            $w = new Warehouse($value->get_warehouse());
            $json .= '
            "id":"'.$w->get_id().'",
            "description":"'.$w->get_description().'"
          },';
          $s = new Stock($value->get_stock());
          $json .= '
          "stock":{
            "id":'.$s->get_stock().',';
            $i = new Ingredient($s->get_ingredient());
            $json .= '
            "ingredient":{
              "id":'.$i->get_id().',
              "description":"'.$i->get_description().'",';
              $measurement = new Measurement($i->get_measurement());
              $json .= '
              "measurement":{
                "id":"'.$measurement->get_id().'",
                "description":"'.$measurement->get_description().'"
              }';
              $json .= '},';
              $warehouse = new Warehouse($s->get_warehouse());
              $json .= '"warehouse": {
                "id":"'.$warehouse->get_id().'",
                "description":"'.$warehouse->get_description().'"
              }';
              $json .= '},';
              $concept = new MovementConcept($value->get_movement_concept());
              $json .= '"movement_concept":{
                "id":'.$concept->get_id().',
                "description":"'.$concept->get_description().'",
                "type":"'.$concept->get_type().'"
              }
          }';
        }
        $json .= ']}';
  } else {
      $json = '{
        "status":1,
        "message": "There Are Not Movements"
      }';
  }
  echo $json;
 ?>
