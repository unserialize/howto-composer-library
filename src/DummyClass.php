<?php

/*
 * This class can also be accessed from your project,
 * but logically it is considered private.
 */

// note that this file is in 'src/' folder, not 'DummyNamespace/'
// (see "autoload" in composer.json)
namespace DummyNamespace;

class DummyClass {
  static public function someDummyMethod(): void {
    // do nothing — just ensure, that this class is autoloaded
  }

  public static function getLengthOfString(string $s): int {
    return strlen($s);
  }
}
