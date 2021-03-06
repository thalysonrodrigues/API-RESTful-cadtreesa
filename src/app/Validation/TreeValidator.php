<?php
/**
 *
 *
 * @author Thalyson Alexandre Rodrigues de Sousa <tha.motog@gmail.com>
 * @link https://github.com/thalysonrodrigues/
 *
 * @version 1.0
 * @package Validation
 */

namespace Cadtreesa\Validation;


use Respect\Validation\Validator as v;


class TreeValidator extends LogErrors implements ValidatorInterface
{
  public static function validate(\stdClass $object) {

    self::$code = 1;
    self::$message = 'Validation failed';

    if (!isset($object->name))
      self::setError(1, 'name', 'Not configured name field (implementation error)');

    if (!isset($object->specie))
      self::setError(1, 'specie', 'Not configured specie field (implementation error)');

    if (!isset($object->family))
      self::setError(1, 'family', 'Not configured family field (implementation error)');

    if (!isset($object->cap))
      self::setError(1, 'cap', 'Not configured cap field (implementation error)');

    if (!isset($object->height))
      self::setError(1, 'height', 'Not configured height field (implementation error)');

    if (!isset($object->classcup))
      self::setError(1, 'classcup', 'Not configured classcup field (implementation error)');

    if (!isset($object->sanity))
      self::setError(1, 'sanity', 'Not configured sanity field (implementation error)');

    if (!isset($object->growth))
      self::setError(1, 'growth', 'Not configured growth field (implementation error)');

    if (!isset($object->sociological))
      self::setError(1, 'sociological', 'Not configured sociological field (implementation error)');

    if (!isset($object->utilization))
      self::setError(1, 'utilization', 'Not configured utilization field (implementation error)');

    if (!isset($object->features))
      self::setError(1, 'features', 'Not configured features field (implementation error)');

    if (!isset($object->latitude))
      self::setError(1, 'latitude', 'Not configured latitude field (implementation error)');

    if (!isset($object->longitude))
      self::setError(1, 'longitude', 'Not configured longitude field (implementation error)');

    if (self::$countErrors > 0)
      return ['success' => false, 'log' => self::getErrors()];

    if (!v::stringType()->validate($object->name))
      self::setError(4, 'name', 'This field require type string');

    if (!v::stringType()->validate($object->specie))
      self::setError(4, 'name', 'This field require type string');

    if (!v::stringType()->validate($object->family))
      self::setError(4, 'name', 'This field require type string');

    if (!v::length(0, 45)->validate($object->name))
      self::setError(5, 'name', 'This field require length 0 a 45 characters');

    if (!v::length(0, 45)->validate($object->specie))
      self::setError(5, 'specie', 'This field require length 0 a 45 characters');

    if (!v::length(0, 45)->validate($object->family))
      self::setError(5, 'family', 'This field require length 0 a 45 characters');

    if (!filter_var($object->cap, FILTER_VALIDATE_FLOAT) && (int) $object->cap !== 0)
      self::setError(9, 'cap', 'This field require type float');

    if (!filter_var($object->height, FILTER_VALIDATE_INT) && (int) $object->cap !== 0)
      self::setError(10, 'height', 'This field require type int');

    if (!v::contains($object->classcup)->validate(['ampla', 'mediana', 'curta']))
      self::setError(11, 'classcup', 'This field must be: [ampla, mediana, curta]');

    if (!v::contains($object->sanity)->validate(['boa', 'média', 'ruim']))
      self::setError(11, 'sanity', 'This field must be: [boa, média, ruim]');

    if (!v::contains($object->growth)->validate(['lento', 'devagar', 'normal', 'rápido', 'muito rápido']))
      self::setError(11, 'growth', 'This field must be: [lento, devagar, normal, rápido, muito rápido]');

    if (!v::contains($object->sociological)->validate(['emergente', 'superior', 'médio', 'inferior', 'isolada']))
      self::setError(11, 'sociological', 'This field must be: [emergente, superior, médio, inferior, isolada]');

    if (!v::stringType()->validate($object->utilization))
      self::setError(4, 'utilization', 'This field require type string');

    if (!v::stringType()->validate($object->features))
      self::setError(4, 'features', 'This field require type string');

    if (!v::length(0, 255)->validate($object->utilization))
      self::setError(5, 'utilization', 'This field require length 0 a 255 characters');

    if (!v::length(0, 1500)->validate($object->features))
      self::setError(5, 'features', 'This field require length 0 a 1500 characters');

    if (!filter_var($object->latitude, FILTER_VALIDATE_FLOAT) && (int) $object->cap !== 0)
      self::setError(9, 'latitude', 'This field require type float');

    if (!filter_var($object->longitude, FILTER_VALIDATE_FLOAT) && (int) $object->cap !== 0)
      self::setError(9, 'longitude', 'This field require type float');

    return self::$countErrors > 0? ['success' => false, 'log' => self::getErrors()]: ['success' => true];
  }
}
