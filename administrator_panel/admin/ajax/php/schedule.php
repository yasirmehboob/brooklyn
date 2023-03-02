<?php
$path="../../orna/";
require_once('../../orna/db.php');

function number_word($num) {
    if (!in_array(($num % 100),array(11,12,13))){
      switch ($num % 10) {
        // Handle 1st, 2nd, 3rd
        case 1:  return $num.'st';
        case 2:  return $num.'nd';
        case 3:  return $num.'rd';
      }
    }
    return $num.'th';
  }

if($_POST['type']=='down_payment' && $_POST['noi']>=1){
    print "
        <td colspan=\"2\"></td>
                    <td colspan=\"4\">
                        <div class=\"col-md-12 box\">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\">
                            <b style='color:red'>Due Date</b>
                        </div>  
                        <div class=\"col-md-3\">
                            <b>Amount</b>
                        </div>  ";
                        $tot_amt = 0;
                        for($x=1;$x<=$_POST['noi'];$x++){
                         print"
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-3 valign\">".number_word($x)." Downpaymet Installment</div>
                            <div class=\"col-md-3\">
                                <input type=\"date\" name=\"instal_dt[]\" id=\"dp_dt_".str_pad($x,3,"0",STR_PAD_LEFT)."\" class=\"form-control\" required>
                            </div>  
                            <div class=\"col-md-3\">
                                <input type=\"number\" name=\"amount[]\" id=\"dp_amt_".str_pad($x,3,"0",STR_PAD_LEFT)."\" class=\"form-control amt\" value=\"".$_POST['amount']."\" placeholder=\"Amount\">
                                
                                <input type=\"hidden\" name=\"instal_type[]\" value=\"down_payment\">
                                <input type=\"hidden\" name=\"mul[]\">
                                <input type=\"hidden\" name=\"status[]\" value=\"unpaid\">
                            </div>
                            " ; 
                            $tot_amt+=$_POST['amount'];
                        }
                        
                        print "
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\" style=\"text-align:right;font-weight:bold;padding-right:1em;\">
                            Total Amount:
                        </div>  
                        <div class=\"col-md-3\" style=\"margin-bottom:2em;padding-left: 1em;\" id=\"dp_tot_amt\" data-amt=\"".$tot_amt."\">
                            ".number_format($tot_amt)."/-
                        </div>
                        </div>
                    </td>
    ";
}else if($_POST['type']=='annual_installment' && $_POST['noi']>=1){
    print "
        <td colspan=\"2\"></td>
                    <td colspan=\"4\">
                        <div class=\"col-md-12 box\">
                            <div class=\"col-md-6\"></div>
                        <div class=\"col-md-3\">
                            <b style='color:red'>Due Date</b>
                        </div>  
                        <div class=\"col-md-3\">
                            <b>Amount</b>
                        </div>  ";
                        $tot_amt = 0;
                        for($x=1;$x<=$_POST['noi'];$x++){
                                        
                            $due_date=date('d-M-Y', strtotime('+'.$x.' year', strtotime($_POST['plan_dt'])));
                         print"
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-3 valign\">".number_word($x)." Annual Installment</div>
                            <div class=\"col-md-3\">
                                <h4>".$due_date."</h4>
                                <input type=\"hidden\" name=\"instal_dt[]\" id=\"ai_dt_".str_pad($x,3,"0",STR_PAD_LEFT)."\" value=\"".date('Y-m-d',strtotime($due_date))."\">
                            </div>  
                            <div class=\"col-md-3\">
                                <input type=\"number\" name=\"amount[]\" id=\"ai_amt_".str_pad($x,3,"0",STR_PAD_LEFT)."\" class=\"form-control amt\" value=\"".$_POST['amount']."\" class=\"form-control\" value=\"".$_POST['amount']."\" placeholder=\"Amount\">
                                
                                <input type=\"hidden\" name=\"instal_type[]\" value=\"annual\">
                                <input type=\"hidden\" name=\"mul[]\">
                                <input type=\"hidden\" name=\"status[]\" value=\"unpaid\">
                            </div>
                            " ; 
                            $tot_amt+=$_POST['amount'];
                        }
                        
                        print "
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\" style=\"text-align:right;font-weight:bold;padding-right:1em;\">
                            Total Amount:
                        </div>  
                        <div class=\"col-md-3\" style=\"margin-bottom:2em;padding-left: 1em;\" id=\"ai_tot_amt\" data-amt=\"".$tot_amt."\">
                            ".number_format($tot_amt)."/-
                        </div>
                        </div>
                    </td>
    ";
    
}else if($_POST['type']=='semi_annual_installment' && $_POST['noi']>=1){
    print "
        <td colspan=\"2\"></td>
                    <td colspan=\"4\">
                        <div class=\"col-md-12 box\">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\">
                            <b style='color:red'>Due Date</b>
                        </div>  
                        <div class=\"col-md-3\">
                            <b>Amount</b>
                        </div>  ";
                        $tot_amt = 0;
                        for($x=1;$x<=$_POST['noi'];$x++){
                             $due_date=date('d-M-Y', strtotime('+'.(6*$x).' month', strtotime($_POST['plan_dt'])));
                         print"
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-3 valign\">".number_word($x)." Semi Annual Installment</div>
                            <div class=\"col-md-3\">
                                <h4>".$due_date."</h4>
                                <input type=\"hidden\" name=\"instal_dt[]\" id=\"sai_dt_".str_pad($x,3,"0",STR_PAD_LEFT)."\" value=\"".date('Y-m-d',strtotime($due_date))."\">
                            </div>  
                            <div class=\"col-md-3\">
                                <input type=\"number\" name=\"amount[]\" id=\"sai_amt_".str_pad($x,3,"0",STR_PAD_LEFT)."\" class=\"form-control  amt\" value=\"".$_POST['amount']."\" class=\"form-control\" value=\"".$_POST['amount']."\" placeholder=\"Amount\">
                                <input type=\"hidden\" name=\"instal_type[]\" value=\"semi_anual\">
                                <input type=\"hidden\" name=\"mul[]\">
                                <input type=\"hidden\" name=\"status[]\" value=\"unpaid\">
                            </div>
                            " ; 
                            $tot_amt+=$_POST['amount'];
                        }
                        
                        print "
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\" style=\"text-align:right;font-weight:bold;padding-right:1em;\">
                            Total Amount:
                        </div>  
                        <div class=\"col-md-3\" style=\"margin-bottom:2em;padding-left: 1em;\" id=\"sai_tot_amt\" data-amt=\"".$tot_amt."\">
                            ".number_format($tot_amt)."/-
                        </div>
                        </div>
                    </td>
    ";
    
}else if($_POST['type']=='quaterly_installment' && $_POST['noi']>=1){
    print "
        <td colspan=\"2\"></td>
                    <td colspan=\"4\">
                        <div class=\"col-md-12 box\">
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\">
                            <b style='color:red'>Due Date</b>
                        </div>  
                        <div class=\"col-md-3\">
                            <b>Amount</b>
                        </div>  ";
                        $tot_amt = 0;
                        for($x=1;$x<=$_POST['noi'];$x++){
                            $due_date=date('d-M-Y', strtotime('+'.(3*$x).' month', strtotime($_POST['plan_dt'])));
                         print"
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-3 valign\">".number_word($x)." Quaterly Installment</div>
                            <div class=\"col-md-3\">
                                <h4>".$due_date."</h4>
                                <input type=\"hidden\" name=\"instal_dt[]\" id=\"qi_dt_".str_pad($x,3,"0",STR_PAD_LEFT)."\" value=\"".date('Y-m-d',strtotime($due_date))."\">
                            </div>  
                            <div class=\"col-md-3\">
                                <input type=\"number\" name=\"amount[]\" id=\"qi_amt_".str_pad($x,3,"0",STR_PAD_LEFT)."\" class=\"form-control amt\" value=\"".$_POST['amount']."\" class=\"form-control\" value=\"".$_POST['amount']."\" placeholder=\"Amount\">
                                <input type=\"hidden\" name=\"instal_type[]\" value=\"quaterly\">
                                <input type=\"hidden\" name=\"mul[]\">
                                <input type=\"hidden\" name=\"status[]\" value=\"unpaid\">
                            </div>
                            " ; 
                            $tot_amt+=$_POST['amount'];
                        }
                        
                        print "
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\" style=\"text-align:right;font-weight:bold;padding-right:1em;\">
                            Total Amount:
                        </div>  
                        <div class=\"col-md-3\" style=\"margin-bottom:2em;padding-left: 1em;\" id=\"qi_tot_amt\" data-amt=\"".$tot_amt."\">
                            ".number_format($tot_amt)."/-
                        </div>
                        </div>
                    </td>
    ";
    
}else if($_POST['type']=='monthly_installment' && $_POST['noi']>=1){
    print "
        <td colspan=\"2\"></td>
                    <td colspan=\"4\">
                        <div class=\"col-md-12 box\">
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\">
                            <b style='color:red'>Due Date</b>
                        </div>  
                        <div class=\"col-md-3\">
                            <b>Amount</b>
                        </div>  ";
                        $tot_amt = 0;
                        for($x=1;$x<=$_POST['noi'];$x++){
                            $due_date=date('d-M-Y', strtotime('+'.$x.' month', strtotime($_POST['plan_dt'])));
                         print"
                            <div class=\"col-md-3\"></div>
                            <div class=\"col-md-3 valign\">".number_word($x)." Monthly Installment</div>
                            <div class=\"col-md-3\">
                                <h4>".$due_date."</h4>
                                <input type=\"hidden\" name=\"instal_dt[]\" id=\"mi_dt_".str_pad($x,3,"0",STR_PAD_LEFT)."\" value=\"".date('Y-m-d',strtotime($due_date))."\">
                            </div>  
                            <div class=\"col-md-3\">
                                <input type=\"number\" name=\"amount[]\" id=\"mi_amt_".str_pad($x,3,"0",STR_PAD_LEFT)."\" class=\"form-control amt\" value=\"".$_POST['amount']."\" class=\"form-control\" value=\"".$_POST['amount']."\" placeholder=\"Amount\">
                                <input type=\"hidden\" name=\"instal_type[]\" value=\"monthly\">
                                <input type=\"hidden\" name=\"mul[]\">
                                <input type=\"hidden\" name=\"status[]\" value=\"unpaid\">
                            </div>
                            " ; 
                            $tot_amt+=$_POST['amount'];
                        }
                        
                        print "
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\"></div>
                        <div class=\"col-md-3\" style=\"text-align:right;font-weight:bold;padding-right:1em;\">
                            Total Amount:
                        </div>  
                        <div class=\"col-md-3\" style=\"margin-bottom:2em;padding-left: 1em;\" id=\"mi_tot_amt\" data-amt=\"".$tot_amt."\">
                            ".number_format($tot_amt)."/-
                        </div>
                        </div>
                    </td>
    ";
    
}

?>