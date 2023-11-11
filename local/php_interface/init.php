<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?php


function mb_wordwrap($string, $width = 75, $break = "\n", $cut = false) {
  $string = (string) $string;
  if ($string === '') {
    return '';
  }

  $break = (string) $break;
  if ($break === '') {
    trigger_error('Break string cannot be empty', E_USER_ERROR);
  }

  $width = (int) $width;
  if ($width === 0 && $cut) {
    trigger_error('Cannot force cut when width is zero', E_USER_ERROR);
  }

  if (strlen($string) === mb_strlen($string)) {
    return wordwrap($string, $width, $break, $cut);
  }

  $stringWidth = mb_strlen($string);
  $breakWidth = mb_strlen($break);

  $result = '';
  $lastStart = $lastSpace = 0;

  for ($current = 0; $current < $stringWidth; $current++) {
    $char = mb_substr($string, $current, 1);

    $possibleBreak = $char;
    if ($breakWidth !== 1) {
      $possibleBreak = mb_substr($string, $current, $breakWidth);
    }

    if ($possibleBreak === $break) {
      $result .= mb_substr($string, $lastStart, $current - $lastStart + $breakWidth);
      $current += $breakWidth - 1;
      $lastStart = $lastSpace = $current + 1;
      continue;
    }

    if ($char === ' ') {
      if ($current - $lastStart >= $width) {
        $result .= mb_substr($string, $lastStart, $current - $lastStart) . $break;
        $lastStart = $current + 1;
      }

      $lastSpace = $current;
      continue;
    }

    if ($current - $lastStart >= $width && $cut && $lastStart >= $lastSpace) {
      $result .= mb_substr($string, $lastStart, $current - $lastStart) . $break;
      $lastStart = $lastSpace = $current;
      continue;
    }

    if ($current - $lastStart >= $width && $lastStart < $lastSpace) {
      $result .= mb_substr($string, $lastStart, $lastSpace - $lastStart) . $break;
      $lastStart = $lastSpace = $lastSpace + 1;
      continue;
    }
  }

  if ($lastStart !== $current) {
    $result .= mb_substr($string, $lastStart, $current - $lastStart);
  }

  return $result;
}


function explodeServiceTitle($origTitle, $lineLength, $secondLineLength) {

  $lines = explode('<br>', mb_wordwrap($origTitle, $lineLength, '<br>', true));

  if (isset($lines[1]) && (mb_strlen($lines[1]) > $secondLineLength) || isset($lines[2])) {
    $title = $lines[0] . '<br>' . mb_substr($lines[1], 0, $secondLineLength) . '...';
  } else if (isset($lines[1]) && mb_strlen($lines[1]) <= $secondLineLength) {
    $title = $lines[0] . '<br>' . $lines[1];
  } else {
    $title = $lines[0] . '<br>';
  }

  return $title;
}