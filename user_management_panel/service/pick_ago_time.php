<?php

function time_elapsed_string($datetime, $full = false)
        {
            date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
            $timezone = date_default_timezone_get();
            // echo "The current server timezone is: " . $timezone;
            $now = new DateTime();;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);

            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;

            $string = array(
                'y' => 'yr',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hr',
                'i' => 'min',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    if($diff->$k){

                        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                    }
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
             ?>