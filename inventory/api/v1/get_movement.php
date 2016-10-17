<?php
  header("Access-Control-Allow-Origin:*");
  require_once('/../models/inventory/Movement.php');
  require_once('/../models/inventory/Warehouse.php');
  require_once('/../models/inventory/Ingredient.php');
  require_once('/../models/inventory/Stock.php');
  require_once('/../models/inventory/Measurement.php');
  require_once('/../models/inventory/MovementConcept.php');
  $json = '';

  if (isset($_GET['id'])) {
    $m = new Movement($_GET['id']);
    $json .= '{
      "status":0,
      "movement":'.$m->get_id().',
      "date":"'.$m->get_date().'",
      "quantity":'.$m->get_quantity().',
      "warehouse":{';
      $w = new Warehouse($m->get_warehouse());
      $json .= '
        "id":"'.$w->get_id().'",
        "description":"'.$w->get_description().'"
      },';
      $s = new Stock($m->get_id());
      $json .= '
        "stock":{
          "id":'.$s->get_id().',';
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
      $concept = new MovementConcept($m->get_movement_concept());
      $json .= '"movement_concept":{
        "id":'.$concept->get_id().',
        "description":"'.$concept->get_description().'",
        "type":"'.$concept->get_type().'"
      }';
  } else {
    echo '{"status":1, "message":"Invalid Parameters"';
  }

  $json .= '}';

  echo $json;
 ?>
