<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_FAQ1
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Frontend Action frontName/index/index
 *
 * @category    Webinse
 * @package     Webinse_FAQ1
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ2\Controller\Index;

use Magento\Framework\App\Action\Action;

class Translate extends Action
{
    /**
     * This method has been created to show output to screen
     *
     * for example you may visit the following URL http://example.com/frontName/index/index/
     * frontName - you must set in etc/frontend/routes.xml file
     */
    public function execute()
    {
//        echo 'translate';
        $input_catsays = json_decode($this->getRequest()->getParam("catsays"));
        $todo=$input_catsays->todo;
        $shift=$input_catsays->shift;
        $you_say=$input_catsays->a_input_text;
//Shift direction and quantity recalc
        if ($shift<999 and $shift>-99)
        {
            if ($shift>0)
            {
                while ($shift >26):
                    $shift-=26;
                endwhile;
            }
            else
            {
                while ($shift <0):
                    $shift+=26;
                endwhile;
            }
        }
        else {$shift=0;}
        $ChartArray=array();//en(de)code message
        $statistic_array=array(0.08167,0.01492,0.02782,0.04253,0.12702,0.02288,0.02015,0.06094,0.06966,0.00153,0.00772,0.04025,0.02406,0.06749,0.07507,0.01929,0.00095,0.05987,0.06327,0.09056,0.02758,0.00978,0.02360,0.00150,0.01974,0.00074);

        $arr1 = str_split($you_say);//split message string to array of char
        $newmessage=""; //answer
        $sum2_min_index=0;
        $sum2_min_value=0;
        $sum2=0;

//ASCII codes "A"-65 -> "Z"-90    "a"-97 -> "z"-122
        $frequency_array=array();
        for($ii=0;$ii<26;$ii++){$frequency_array[] = 0;}//create empty array with 26 elements
        $english_letters_input=0;

//Encode message
        if ($todo=="encode")
        {
            foreach ($arr1 as &$value)
            {
                $ascii_code=ord($value); //convert char to ASCII code
                if($ascii_code>=65 and $ascii_code<=90) //look for A-Z ("A"-65 -> "Z"-90)
                {
                    if ($ascii_code+$shift>90){$ascii_code+=$shift-26;}//in case of overload shift
                    else {$ascii_code+=$shift; }
                    $frequency_array[$ascii_code-65]++; //B->code(B)=66->fr_array[66-65]=>[0,+1,0,...]
                    $english_letters_input++; //N of english letter elements ++
                }
                else if ($ascii_code>=97 and $ascii_code<=122) //look for a-z "a"-97 -> "z"-122
                {
                    if ($ascii_code+$shift>122){$ascii_code+=$shift-26;}//in case of overload shift
                    else {$ascii_code+=$shift; }
                    $frequency_array[$ascii_code-97]++; //a->code(a)=97->fr_array[97-97]=>[+1,0,0,...]
                    $english_letters_input++; //N of english letter elements ++
                }
                $newmessage.=chr($ascii_code);
            }
            unset($value); // разорвать ссылку на последний элемент
            if ($english_letters_input!=0)
            {
                for ($j = 0; $j <= 25; $j++)
                {
                    $frequency_array[$j]=round(($frequency_array[$j]/$english_letters_input), 3); //round with precision 3 i.e. to 0.123
                    $ChartArray[]=array("letter"=>chr(65+$j),"frequency"=>$frequency_array[$j]);
                }
            }
            $input_catsays->PredictionShift="";
            $input_catsays->Decoded_predict=$you_say;
        }
//Decode message
        if ($todo=="decode")
        {
            for ($h=0;$h<=25;$h++)
            {
                $english_letters_input=0;
                $frequency_array=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);    //reset array
                foreach ($arr1 as &$value)
                {
                    $ascii_code=ord($value); //convert char to code
                    if($ascii_code>=65 and $ascii_code<=90) //look for A-Z
                    {
                        if ($ascii_code-$h<65){$ascii_code=$ascii_code-$h+26;} //leter code after shift
                        else {$ascii_code=$ascii_code-$h;}
                        $frequency_array[$ascii_code-65]++; //B->code(B)=66->fr_array[66-65]=>[0,+1,0,...]
                        $english_letters_input++; //N of english letter elements ++
                    }
                    else if ($ascii_code>=97 and $ascii_code<=122) //look for a-z
                    {
                        if ($ascii_code-$h<97){$ascii_code=$ascii_code-$h+26;} //leter code after shift
                        else {$ascii_code=$ascii_code-$h;}
                        $frequency_array[$ascii_code-97]++; //a->code(a)=97->fr_array[97-97]=>[+1,0,0,...]
                        $english_letters_input++; //N of english letter elements ++
                    }
                    if ($h==$shift) {$newmessage.=chr($ascii_code);}
                }
                unset($value); // разорвать ссылку на последний элемент $value
                //calculate letter frequency percentage
                if ($english_letters_input!=0)
                {
                    $sum2=0;
                    for ($j = 0; $j <= 25; $j++)
                    {
                        $frequency_array[$j]=round(($frequency_array[$j]/$english_letters_input), 3); //round with precision 3 i.e. to 0.123
                        $sum2=$sum2+($frequency_array[$j]-$statistic_array[$j])*($frequency_array[$j]-$statistic_array[$j]);
                        if ($h==$shift) {$ChartArray[]=array("letter"=>chr(65+$j),"frequency"=>$frequency_array[$j]);}
                    }
                }
                if ($h==0){$sum2_min_value=$sum2;}//1st approach
                if ($sum2_min_value>$sum2){$sum2_min_value=$sum2;$sum2_min_index=$h;}
            }
            //decoded message prediction is:
            $newmessage_predict="";
            foreach ($arr1 as &$value)
            {
                $ascii_code=ord($value); //convert char to code
                if($ascii_code>=65 and $ascii_code<=90) //look for A-Z
                {
                    if ($ascii_code-$sum2_min_index<65){$ascii_code=$ascii_code-$sum2_min_index+26;} //leter code after shift
                    else {$ascii_code=$ascii_code-$sum2_min_index;}
                }
                else if ($ascii_code>=97 and $ascii_code<=122) //look for a-z
                {
                    if ($ascii_code-$sum2_min_index<97){$ascii_code=$ascii_code-$sum2_min_index+26;} //leter code after shift
                    else {$ascii_code=$ascii_code-$sum2_min_index;}
                }
                $newmessage_predict.=chr($ascii_code);
            }
            unset($value); // разорвать ссылку на последний элемент $value
            if ($english_letters_input!=0)
            {
                $input_catsays->PredictionShift=$sum2_min_index;
                $input_catsays->Decoded_predict=$newmessage_predict;
            }
            else
            {
                $input_catsays->PredictionShift=0;
                $input_catsays->Decoded_predict=$newmessage_predict;
            }
        }

        $input_catsays->a_input_text=$newmessage;
        $input_catsays->JSONChart=$ChartArray;

        echo json_encode($input_catsays);
    }
}
