<?php

/*
 * Functions from this file are exported — a "public interface" of this library.
 * (just functions, not classes — on purpose)
 */

function packInteger(int $value): ?string {
  $packer = new MessagePack\Packer();
  return $packer->pack($value);
}

function packIntegerDebug(int $value): array {
  $packed = packInteger($value);
  return [
    'value'  => $value,
    'packed' => $packed,
    'length' => \DummyNamespace\DummyClass::getLengthOfString($packed),
  ];
}

function unpackInteger(string $packed): ?int {
  $unpacker = new MessagePack\BufferUnpacker();
  $unpacker->reset($packed);
  $value = $unpacker->unpack();

  return is_int($value) ? $value : null;
}
