<?php

// dummy tests
// how to execute: `php -f tests-pack.php`

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../exported-functions.php';

/**
 * Test that $value === unpack(pack($value))
 */
function testThatPackUnpackEquals() {
  $values = [1, 42, -12731802, 1 << 31, PHP_INT_MAX, PHP_INT_MIN];
  $not_equals = [];
  foreach ($values as $int) {
    $packed = packInteger($int);
    $restored = unpackInteger($packed);
    $eq = $int === $restored;
    if (!$eq) {
      $not_equals[] = $int;
    }
  }

  if (!count($not_equals)) {
    echo __FUNCTION__ . " passed\n";
  } else {
    echo __FUNCTION__ . " failed for: " . implode(',', $not_equals) . "\n";
  }
}

/**
 * Test that DummyClass is correctly autoloaded
 */
function testDummyMethod() {
  \DummyNamespace\DummyClass::someDummyMethod();
  echo __FUNCTION__ . " passed\n";
}


testThatPackUnpackEquals();
testDummyMethod();
