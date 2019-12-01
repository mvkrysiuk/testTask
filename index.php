<?php

$delimiter = ',';
$handleNewFile = fopen("MOCK_DATA_TEST_TI_res.csv", "w");

$i = 0;
if (($handle = fopen("MOCK_DATA_TEST_TI.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
        if ($i++) {
            $data[6] = preg_replace("/[^0-9]/is", '', $data[6]);
            $originFormatDate = strtotime($data[8]);

            if (!empty($data[8])) {
                $data[8] = $newFormatDate = date('d.m.y', $originFormatDate);
            }
            print_r($data);
        }
       fputcsv($handleNewFile, $data, $delimiter, '"');
    }
    fclose($handle);

}

