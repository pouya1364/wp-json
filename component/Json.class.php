<?php
class Json {

   public function callAPI($url){
      $curl = curl_init();
      // OPTIONS:
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'
      ));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      // EXECUTE:
      $result = curl_exec($curl);
      if(!$result){die("Connection Failure");}
      curl_close($curl);
      return $result;
   }


   public function build_table($array){
      // start table
      $html = "<table id=myTable class=tableView>";
      // header row
      $html .= '<tr>';
      $i = 0;
      foreach($array[0] as $key=>$value){
         if (!is_array($value)){
                  $html .= '<th onclick="sortTable('.$i.')">' . htmlspecialchars($key) . '<i class="arrow down"></i></th>';
               $i += 1;
         }
      }
      $html .= '</tr>';

      // show data rows 
      foreach( $array as $key=>$value){
         $html .= "<tr id=$value[id] onclick='showMoreInfo(this)'>";
         foreach($value as $key2=>$value2){
               if (!is_array($value2))
                  $html .= "<td  class=tableView >" . htmlspecialchars($value2) . "</td>";
         }
         $html .= '</tr>';
      }

      // finish table and return data

      $html .= '</table>';
      return $html;
   }
}


