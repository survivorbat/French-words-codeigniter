<?php
Class CreateList extends CI_Model
{
  function __construct()
  {
      parent::__construct();
      $this->load->helper('url');
  }
  function getList($data){
    $return = array();
    $lijsten = simplexml_load_file("woorden.xml");
    $tablerow=0;
    $hoofdstukken = range($data['van'],$data['tot']);
    $listwords = array();
    $overload=0;
    for($u=0;$u<$data['amount'];$u++){
      $amount=0;
      while($amount==0){
        $overload++;
        if(min($hoofdstukken)==max($hoofdstukken)){
          $randomlist=$hoofdstukken[0]-1;
        } else {
          $randomlist = rand(min($hoofdstukken),max($hoofdstukken))-1;
        }
        if($overload>$data['amount']+60){
          $amount=1;
        }
        $randomword = rand(0,$lijsten->hoofdstuk[$randomlist]->count());
        $word = $lijsten->hoofdstuk[$randomlist]->woord[$randomword];
        if(isset($lijsten->hoofdstuk[$randomlist]->woord[$randomword]->frans) && !in_array($word,$listwords)){
          if($tablerow==0){$return[] = '<tr>';}
          $return[] = '<td class="list'.$tablerow.'" >'.$lijsten->hoofdstuk[$randomlist]->woord[$randomword]->frans;
          if($data['type']==='overhoren'){
            $return[] = '<input ans=\''.$lijsten->hoofdstuk[$randomlist]->woord[$randomword]->nederlands.'\' type="text" placeholder="Antwoord" class="antwoordveld" id="word'.$u.'"/>';
          }
          $return[] = '</td>';
          array_push($listwords,$word);
          $amount++;
          if($tablerow==3){$return[] = '</tr>';}
          if($tablerow<2){$tablerow++;} else {$tablerow=0;}
        }
      }
    }
    return $return;
  }
}
?>
