<?php

echo '
<style>
/* calendar */
table.calendar    { border-left:1px solid #949; }
tr.calendar-row  {  }
td.calendar-day  { min-height:80px; font-size:11px; position:relative; } * html div.calendar-day { height:80px; }
td.calendar-day:hover  { background:#eceff5; }
td.calendar-day-np  { background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
td.calendar-day-head { background:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; border-bottom:1px solid #119; border-top:1px solid #1199; border-right:1px solid #999; }
div.day-number    { background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
/* shared */
td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
</style>
';

/* генерации календаря */
function draw_calendar($month,$year){

    /* Начало таблицы */
    $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

    /* Заглавия в таблице */
    $headings = array('Понедельник','Вторник','Среда','Четверг','Пятница','Субота','Воскресенье');
    $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

    /*переменные дней и недель */
    $running_day = date('w',mktime(0,0,0,$month,1,$year));
    $running_day = $running_day - 1;
    $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
    $days_in_this_week = 1;
    $day_counter = 0;
    $dates_array = array();

    /* первая строка календаря */
    $calendar.= '<tr class="calendar-row">';

    /*пустые  ячейки в календаре */
    for($x = 0; $x < $running_day; $x++):
        $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
        $days_in_this_week++;
    endfor;

    /* запись чисел в первую строку */
    for($list_day = 1; $list_day <= $days_in_month; $list_day++):
        $calendar.= '<td class="calendar-day">';
        /* Пишем номер в ячейку */
        $calendar.= '<div class="day-number">'.$list_day.'</div>';

        /** SQL ЗАПРОС **/
        $mysqli = new mysqli ('localhost', 'nameofbase', '1');
        $running_date = $year.'-'.$month.'-'.$running_day;
        $query = mysqli_query("SELECT * FROM events WHERE date = '$running_date' ");
        while($result = mysqli_fetch_array($query))
        {
            $calendar.= '<p>'.$result['event_name'].'</p>';
        }
        $calendar.= str_repeat('<p>&nbsp;</p>',2);
        $mysqli->close();

        $calendar.= '</td>';
        if($running_day == 6):
            $calendar.= '</tr>';
            if(($day_counter+1) != $days_in_month):
                $calendar.= '<tr class="calendar-row">';
            endif;
            $running_day = -1;
            $days_in_this_week = 0;
        endif;
        $days_in_this_week++; $running_day++; $day_counter++;
    endfor;

    /* Пустые ячейки в самом конце */
    if($days_in_this_week < 8):
        for($x = 1; $x <= (8 - $days_in_this_week); $x++):
            $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
        endfor;
    endif;

    /* offstroca */
    $calendar.= '</tr>';

    /* offtable */
    $calendar.= '</table>';

    /* Возврат результат */
    return $calendar;
}

/* СПОСОБ ПРИМЕНЕНИЯ */
echo '<h2>Июнь 2019</h2>';
echo draw_calendar(6,2019);

?>