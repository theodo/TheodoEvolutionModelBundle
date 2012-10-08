<?php
namespace Theodo\Evolution\LegacyModelBundle\Model\Doctrine;

/**
 * This class only exists to override the Doctrine class contructor in 
 * order to allow new instance creation by Doctrine1Service.
 *
 * @author      Jonathan Beurel <jonathanb@theodo.fr>
 */
class Doctrine extends \Doctrine
{
	public function __construct ()
	{
	}
}