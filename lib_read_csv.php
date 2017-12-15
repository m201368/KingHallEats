<!--
 +Description: PHP file that allows users to contact the staff for feedback.
 +Created by : Ben Birney
 +Created on : 27 NOV 2017
 +Last Modified by: Ben Birney
 +Last Modified on: 11 DEC 2017
 +Modified by: Ben Birney
 +-->

<?php

  // This function reads in a CSV, Comma Seperated file, and returns a
  // 2D array indexed like, $table[ROW_ID][COLUMN_ID] = CELL_VALUE
  // Inputs:
  //   $filename = 'test.csv' // specific file
  //   $withHeaders = True    // Is their a header row
  //   $withLeftID = True     // Can a row be determined by the leftmost column
  //   $withDelimiter = ','   // What is the default delimiter
  function read_csv($filename, $withHeaders=True, $withLeftID=True, $withDelimiter=',') {
    if ($fp = fopen($filename, 'r')) {
      $counter = 0;
      while($row = fgetcsv($fp, 0, $withDelimiter)) {
        if (!isset($headers) && !$withHeaders) {
          $headers = array_keys($row);
        }
        if (!isset($headers)) {
          $headers = $row;
        } else {
          foreach ($row as $i => $value) {
            if ($withLeftID) {
              $table[$row[0]][$headers[$i]] = $value;
            } else {
              $table[$counter][$headers[$i]] = $value;
            }
          }
        }
        $counter++;
      }
    }
    return $table;
  }

// function: allows writing to a csv file while retaining the format given by read_csv().
    function write_csv($filename, $data=array(), $withHeaders=True, $withLeftID=True, $leftID='', $withDelimiter=',') {
    if ($withHeaders) {
      $headers = get_csv_headers($filename);
    }

    if($fp = fopen($filename, 'w')) {
      if ($withHeaders) {
        fputcsv($fp, $headers, $withDelimiter);
      }
      foreach ($data as $row) {
        if ($row[$headers[0]] != "") {
          fputcsv($fp, $row, $withDelimiter);
        } else if ($withHeaders == False) {
          fputcsv($fp, $row, $withDelimiter);
        }
      }

      fclose($fp);
      return True;
    } else {
      return False;
    }
  }

 ?>
